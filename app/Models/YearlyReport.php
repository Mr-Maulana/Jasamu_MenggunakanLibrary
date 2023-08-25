<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class YearlyReport extends Model
{
    protected $fillable = ['service_id', 'year', 'interactions'];

    public static function generateYearlyReport()
    {
        return DB::table('service_visits')
            ->select(DB::raw('service_id'), DB::raw('YEAR(visited_at) as year'), DB::raw('COUNT(*) as interactions'))
            ->groupBy('service_id', DB::raw('YEAR(visited_at)'))
            ->get();
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    public static function saveYearlyReport($serviceId, $year, $interactions)
    {
        self::create([
            'service_id' => $serviceId,
            'year' => $year,
            'interactions' => $interactions,
        ]);
    }
}
