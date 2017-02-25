<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Log;
use Braintree;
use Laravel\Cashier\Cashier;

class LaravelLoggerProxy {
    public function log( $msg ) {
        Log::info($msg);
    }
}

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Braintree\Configuration::environment(env('BRAINTREE_ENV'));
        Braintree\Configuration::merchantId(env('BRAINTREE_MERCHANT_ID'));
        Braintree\Configuration::publicKey(env('BRAINTREE_PUBLIC_KEY'));
        Braintree\Configuration::privateKey(env('BRAINTREE_PRIVATE_KEY'));

        //Cashier::useCurrency('eur', '€');

        $pusher = $this->app->make('pusher');
        $pusher->set_logger( new LaravelLoggerProxy() );
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
