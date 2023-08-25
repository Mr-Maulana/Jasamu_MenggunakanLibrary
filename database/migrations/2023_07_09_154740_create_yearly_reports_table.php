<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('yearly_reports', function (Blueprint $table) {
            $table->id();
            $table->integer('year');
            $table->unsignedBigInteger('service_id');
            $table->integer('interactions')->default(0);
            $table->timestamps();
        
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yearly_reports');
    }
};
