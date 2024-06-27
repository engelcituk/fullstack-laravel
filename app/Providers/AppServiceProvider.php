<?php

namespace App\Providers;


use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        foreach ( glob(  app_path('Macros/Blueprint/*.php') ) as $fileName ) {
            $fileName = basename($fileName, '.php');
            $class ='App\\Macros\\Blueprint\\' . $fileName;
            $this->app->call( $class );
        }

        $this->registerJsonGroup();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }

    private function registerJsonGroup(): void
    {
        Route::macro('jsonGroup', function ( string $prefix, string $controller, array $methods = [] ) {
            Route::prefix( $prefix )->name($prefix.'.')->group( function () use ( $controller, $methods ) {
                if( is_array('index', $methods) ){
                    Route::get('/',  [$controller,'index'])->name('index');
                }

                if( is_array('json', $methods) ){
                    Route::get('/json',  [$controller,'json'])->name('json');
                }

                if( is_array('export', $methods) ){
                    Route::post('/generate-export-url',  [$controller,'generateExportUrl'])->name('generate_export_url');
                    Route::get('/export',  [$controller,'export'])->name('export');
                }

                if( is_array('store', $methods) ){
                    Route::post('/',  [$controller,'store'])->name('store');
                }

                if( is_array('update', $methods) ){
                    Route::put('/{id}',  [$controller,'update'])->name('update');
                }

                if( is_array('destroy', $methods) ){
                    Route::delete('/{id}',  [$controller,'destroy'])->name('destroy');
                }
            });
        });
    }
}
