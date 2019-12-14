<?php


namespace Karu\ApiResponse;

use Illuminate\Support\ServiceProvider;

class ApiResponseProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/apiResponse.php' => config_path('apiResponse.php'),
        ]);
    }
}
