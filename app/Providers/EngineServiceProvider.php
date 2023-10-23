<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rule;

class EngineServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Rule::macro('uniqueMultipleColumns', function ($table, $columns) {
            return Rule::unique($table)->where(function ($query) use ($columns) {
                foreach ($columns as $column) {
                    $query->where($column, request($column));
                }
            });
        });
    }
}
