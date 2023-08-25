<?php

// DailyReport.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DailyReport extends Model
{
    protected $fillable = ['service_id', 'date', 'interactions'];

    public static function generateDailyReport($serviceId)
    {
        return DB::table('service_visits')
            ->select(DB::raw('service_id'), DB::raw('DATE(visited_at) as date'), DB::raw('COUNT(DISTINCT visitor_ip) as interactions'))
            ->where('service_id', $serviceId)
            ->groupBy('service_id', DB::raw('DATE(visited_at)'))
            ->get();
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public static function saveDailyReport($serviceId, $date, $interactions)
    {
        self::updateOrCreate(
            ['service_id' => $serviceId, 'date' => $date],
            ['interactions' => $interactions]
        );
    }
}
