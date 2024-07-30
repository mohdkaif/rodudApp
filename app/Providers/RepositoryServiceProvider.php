<?php

namespace App\Providers;

use App\Models\ProductSystem\ProductComparison;
use App\Models\Report\ProductSystemReport;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        // $this->app->bind(ProcessAnalysisInterface::class, ProcessAnalysisRepository::class);
        // $this->app->bind(ProcesComparsionReport::class, ProcessComparsionRepository::class);
        // $this->app->bind(ProductSystemInterface::class, ProductSystemRepository::class);
        // $this->app->bind(ProductComparsionInterface::class, ProductComparsionRepository::class);
    }

    public function boot()
    {
    }
}
