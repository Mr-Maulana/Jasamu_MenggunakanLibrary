<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceVisit extends Model
{
    protected $guarded = []; // Izinkan mass assignment

    public $timestamps = false; // Tidak perlu kolom created_at dan updated_at

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
