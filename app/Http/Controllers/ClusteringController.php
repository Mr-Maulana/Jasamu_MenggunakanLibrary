<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Review;
use App\Models\DailyReport;
use Illuminate\Support\Facades\DB;
use Phpml\Clustering\KMeans;

class ClusteringController extends Controller
{
    public function clusterServices()
    {
        $services = Service::select('id', 'name', 'category')
            ->withCount('reviews')
            ->get();

        $serviceReviews = Review::select('service_id', DB::raw('AVG(rating) as average_rating'))
            ->groupBy('service_id')
            ->get();

        $interactions = DailyReport::select('service_id', DB::raw('SUM(interactions) as total_interactions'))
            ->groupBy('service_id')
            ->get();

        $normalizedServices = [];
        foreach ($services as $service) {
            $averageRating = $serviceReviews->where('service_id', $service->id)->first()->average_rating ?? 0;
            $interactionData = $interactions->where('service_id', $service->id)->first();
        
            $minInteractions = $interactions->min('total_interactions');
            $maxInteractions = $interactions->max('total_interactions');
        
            $normalizedRating = ($averageRating - 1) / 4;
            $normalizedRating = max($normalizedRating, 0);

            if ($interactionData) {
                $normalizedInteractions = ($interactionData->total_interactions - $minInteractions) / ($maxInteractions - $minInteractions);
            } else {
                $normalizedInteractions = 0;
            }

            $normalizedServices[] = [
                'id' => $service->id,
                'name' => $service->name,
                'category' => $service->category,
                'normalized_rating' => $normalizedRating,
                'normalized_interactions' => $normalizedInteractions,
            ];
        }

        $samples = [];
        foreach ($normalizedServices as $service) {
            $samples[] = [$service['normalized_rating'], $service['normalized_interactions']];
        }

        $kmeans = new KMeans(4);
        $clusters = $kmeans->cluster($samples);

        $clusterData = [];

        // Calculate cluster centroids and counts
        foreach ($clusters as $index => $clusterId) {
            if (floatval($clusterData) && !isset($clusterData[$clusterId])) {
                $clusterData[$clusterId] = [
                    'centroid' => [$samples[$index][0], $samples[$index][1]],
                    'count' => 1,
                ];
            } else {
                $clusterData[$clusterId]['centroid'][0] += $samples[$index][0];
                $clusterData[$clusterId]['centroid'][1] += $samples[$index][1];
                $clusterData[$clusterId]['count']++;
            }
        }

        // Calculate the average for each cluster centroid
        foreach ($clusterData as $clusterId => &$data) {
            $centroid = $data['centroid'];
            $count = $data['count'];

            $centroid[0] /= $count;
            $centroid[1] /= $count;

            $data['centroid'] = $centroid;
        }

        $mostPopular = [];
        $popular = [];
        $lessPopular = [];
        $leastPopular = [];

        foreach ($clusters as $index => $clusterId) {
            $cluster = $normalizedServices[$index];
            $centroid = $clusterData[$clusterId]['centroid'];

            $averageRating = $centroid[0];
            $averageInteractions = $centroid[1];

            if ($averageRating >= 0.8 && $averageInteractions >= 1.0) {
                $mostPopular[] = $cluster;
            } elseif ($averageRating >= 0.5 && $averageInteractions >= 0.7) {
                $popular[] = $cluster;
            } elseif ($averageRating >= 0.1 && $averageInteractions >= 0.4) {
                $lessPopular[] = $cluster;
            } else {
                $leastPopular[] = $cluster;
            }
        }

        return view('clustered-services', [
            'services' => $normalizedServices,
            'mostPopularCategories' => $mostPopular,
            'popularCategories' => $popular,
            'lessPopularCategories' => $lessPopular,
            'leastPopularCategories' => $leastPopular,
        ]);
    }
}
