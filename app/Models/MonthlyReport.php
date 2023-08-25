<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MonthlyReport extends Model
{
    protected $fillable = ['service_id', 'year', 'month', 'interactions'];

    public static function generateMonthlyReport($serviceId)
    {
        return DB::table('service_visits')
            ->select(DB::raw('YEAR(visited_at) as year'), DB::raw('MONTH(visited_at) as month'), DB::raw('COUNT(*) as interactions'))
            ->where('service_id', $serviceId)
            ->groupBy(DB::raw('YEAR(visited_at)'), DB::raw('MONTH(visited_at)'))
            ->get();
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public static function saveMonthlyReport($serviceId, $year, $month, $interactions)
    {
        self::create([
            'service_id' => $serviceId,
            'year' => $year,
            'month' => $month,
            'interactions' => $interactions,
        ]);
    }
}
