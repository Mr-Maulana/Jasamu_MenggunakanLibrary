<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cluster
{
    use HasFactory;

    public static function kmeans(array $dataPoints, int $k, int $maxIterations = 100): array
    {
        $numDataPoints = count($dataPoints);
        if ($numDataPoints === 0) {
            return [];
        }
        
        // Initialize centroids with the first $k data points
        $centroids = array_slice($dataPoints, 0, $k);

        for ($iteration = 0; $iteration < $maxIterations; $iteration++) {
            $clusters = array_fill(0, $k, []);
            
            foreach ($dataPoints as $index => $dataPoint) {
                $minDistance = INF;
                $nearestCluster = null;

                foreach ($centroids as $clusterIndex => $centroid) {
                    $distance = self::calculateDistance($dataPoint, $centroid);

                    if ($distance < $minDistance) {
                        $minDistance = $distance;
                        $nearestCluster = $clusterIndex;
                    }
                }

                if ($nearestCluster !== null) {
                    $clusters[$nearestCluster][] = $index;
                }
            }

            $newCentroids = [];
            foreach ($clusters as $cluster) {
                // Calculate new centroids based on the data points in the cluster
                foreach ($clusters as $cluster){
                    $clusterDataPoints[] = array_intersect_key($dataPoints, array_flip($cluster));
                }
                $newCentroids[] = self::calculateCentroid($clusterDataPoints);
            }

            // Check for convergence
            $centroidsChanged = false;
            foreach ($newCentroids as $i => $newCentroid) {
                if ($newCentroid !== $centroids[$i]) {
                    $centroidsChanged = true;
                    break;
                }
            }

            if (!$centroidsChanged) {
                break;
            }

            $centroids = $newCentroids;
        }
        dd($clusters);
        return [
            'clusters' => $clusters,
            'centroids' => $centroids,
        ];
    }

    private static function calculateDistance(array $point1, array $point2): float
    {
        $squaredSum = 0;

        foreach ($point1 as $dimension => $value) {
            if (isset($point2[$dimension])) {
                $squaredSum += pow(floatval($value) - floatval($point2[$dimension]), 2);
            } else {
                // Handle the case where values are not available
                // In this case, we'll consider the missing value as 0
                $squaredSum += pow(floatval($value), 2); // Assuming missing value as 0
            }
        }
        
        return sqrt($squaredSum);
    }

    private static function calculateCentroid(array $dataPoints): array
    {
        $centroid = [];
        $numDataPoints = count($dataPoints);

        if ($numDataPoints === 0) {
            return $centroid;
        }
        
        $numDimensions = count($dataPoints);
        
        for ($dimension = 0; $dimension < $numDimensions; $dimension++) {
            $sum = 0;
            $validDataPoints = 0;

            foreach ($dataPoints as $dataPoint) {
                
                if (isset($dataPoint['normalized_rating'][$dimension]) && isset($dataPoint['normalized_interactions'][$dimension])) {
                    $rating = ($dataPoint['normalized_rating'][$dimension]);
                    $interactions = ($dataPoint['normalized_interactions'][$dimension]);

                    if (is_numeric($rating) && is_numeric($interactions)) {
                        $sum += $rating;
                        $validDataPoints++;
                    }
                }
            }

            if ($validDataPoints > 0) {
                $centroid[$dimension] = $sum / $validDataPoints;
            } else {
                // Handle the case where no valid data points were found in this dimension
                $centroid[$dimension] = 0;
            }
        }
        dd($centroid);
        return $centroid;
    }
}
