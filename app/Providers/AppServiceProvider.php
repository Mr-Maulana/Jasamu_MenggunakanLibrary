<?php

namespace App\Providers;

use Livewire\Livewire;
use Illuminate\Support\ServiceProvider;
use App\Http\Livewire\DailyInteractionReport;
use App\Http\Livewire\UserRegistrationReport;
use App\Http\Livewire\YearlyInteractionReport;
use App\Http\Livewire\MonthlyInteractionReport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Livewire::component('daily-interaction-report', DailyInteractionReport::class);
        Livewire::component('monthly-interaction-report', MonthlyInteractionReport::class);
        Livewire::component('yearly-interaction-report', YearlyInteractionReport::class);
        Livewire::component('user-registration-report', UserRegistrationReport::class);
    }
}
