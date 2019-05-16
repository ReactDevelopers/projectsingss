<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Dusterio\LumenPassport\LumenPassport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        LumenPassport::routes($this->app);
        LumenPassport::allowMultipleTokens();
        LumenPassport::tokensExpireIn(\Carbon\Carbon::now()->addYears(1), 1);

        if ($this->app->environment() == 'local') {

            $this->app->register('Wn\Generators\CommandsServiceProvider');
        }

        $this->app->validator->resolver(function($translator, $data, $rules, $messages)
        {
            return new \App\Validate\ExtendedValidator($translator, $data, $rules, $messages);
        });
    
    }
}
