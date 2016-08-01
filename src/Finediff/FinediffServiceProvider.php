<?php
namespace Gummibeer\Finediff;

use Gummibeer\Finediff\Contracts\FinediffContract;
use Gummibeer\Finediff\Lib\Finediff;
use Illuminate\Support\ServiceProvider;

class FinediffServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(FinediffContract::class, 'finediff');
        $this->app->singleton('finediff', function ($app) {
            return new Finediff();
        });
    }
}