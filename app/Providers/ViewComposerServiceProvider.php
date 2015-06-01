<?php namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use App\Contact;

class ViewComposerServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeNavigation();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }


    public function composeNavigation()
    {
        view()->composer('app', function ($view) {

            if ($user = Auth::user())
            {
                $contact = Contact::findOrFail(Auth::user()->id);

                $view->with('contact', $contact);
            }
        });
    }
}
