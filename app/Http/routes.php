<?php

use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$request = Request::capture();
if(preg_match('/intranet/', $request->getHost()))
{
    View::share('rname', 'intra');
}
else
{
    View::share('rname', 'extra');
}

Route::group(['domain' => '{name}.intranet.dev'], function($name)
{
    $request = Request::capture();



    /*


    Route::get('ouvrir-un-compte',['uses' => 'OrganisationsController@create', 'as' => 'createaccount.intra']);
    Route::get('mon-ouverture/{id}', ['uses' => 'OrganisationsController@formToPrint', 'as' => 'formtoprint.intra']);
    Route::resource('organisations','OrganisationsController',
        [
            'names' =>
                [
                    'index' => 'organisations.intra',
                    'create' => 'organisations.new.intra',
                    'store' => 'organisations.store.intra',
                    'update' => 'organisations.update.intra',
                    'show' => 'organisations.show.intra',
                    'edit' => 'organisations.edit.intra',
                    'destroy' => 'organisations.destroy.intra']
        ]);


    Route::resource('sites','SitesController');
    Route::resource('contacts.organisations','ContactsOrganisationsController',
        [
        'names' =>
            [
                'index' => 'contacts.organisations.intra',
                'create' => 'contacts.organisations.new.intra',
                'store' => 'contacts.organisations.store.intra',
                'update' => 'contacts.organisations.update.intra',
                'show' => 'contacts.organisations.show.intra',
                'edit' => 'contacts.organisations.edit.intra',
                'destroy' => 'contacts.organisations.destroy.intra']
        ]);*/
    Route::group(['middleware' => 'guest'], function()
    {
        Route::get('/', function()
        {
            return view('admin.login');
        });
    });
    Route::post('login',['uses' => 'ContactsController@postLogin','as' => 'vodologin.intra']);
    Route::get('logout', ['uses' => 'ContactsController@getLogout', 'as' => 'intravodo.logout']);

    Route::group(['prefix' => 'admin'], function()
    {
        Route::get('contacts',['uses' => 'ContactsController@index','as' => 'admin.contactlist']);
        Route::get('organisations',['uses' => 'OrganisationsController@index','as' => 'admin.orgalist']);
        Route::get('dashboard',['uses' => 'AdminDashboardController@index']);
        Route::get('organisation/files/{id}',['uses' => 'ContactsOrganisationsController@fileManager']);
        Route::get('download/{filename}', ['uses' => 'ContactsOrganisationsController@downloadFile','as' => 'admin.download']);
        Route::get('organisation/{id}', ['uses' => 'OrganisationsController@show','as' => 'admin.organisation.show']);
        Route::get('contact/{id}', ['uses' => 'ContactsController@show', 'as' => 'admin.contact.show']);
        Route::get('edit/organisation/{id}', ['uses' => 'OrganisationsController@edit','as' => 'admin.organisation.edit']);
        Route::post('edit/organisation/{id}',['uses' => 'OrganisationsController@update', 'as' => 'admin.organisation.update']);
    });

});



Route::group(['domain' => '{name}.extranet.dev'], function()
{
    Route::group(['middleware' => 'guest'], function()
    {
        Route::get('/', 'ContactsController@getLogin');

    });


    Route::get('login','ContactsController@getLogin');
    Route::post('login',['uses' => 'ContactsController@postLogin','as' => 'vodologin.extra']);
    Route::get('logout', 'ContactsController@getLogout');

    Route::get('ouvrir-un-compte',['uses' => 'OrganisationsController@create', 'as' => 'createaccount.extra']);
    Route::get('mon-ouverture/{id}',['uses' => 'ContactsOrganisationsController@formToPrint', 'as' => 'formtoprint.extra']);
    Route::get('mandat-sepa/{id}', ['uses' => 'ContactsOrganisationsController@sepaToPrint', 'as' => 'sepatoprint.extra']);

    /*
     * Routes permettant d'accéder aux resources du controlleur Organisations
     */
    Route::resource('organisations','OrganisationsController',
        [
            'names' =>
                [
                    'index' => 'organisations.extra',
                    'create' => 'organisations.new.extra',
                    'store' => 'organisations.store.extra',
                    'update' => 'organisations.update.extra',
                    'show' => 'organisations.show.extra',
                    'edit' => 'organisations.edit.extra',
                    'destroy' => 'organisations.destroy.extra']
        ]);
     /*
     * Routes permettant d'accéder aux resources du controlleur ContactsOrganisations
     */
    Route::resource('contacts.organisations','ContactsOrganisationsController',
        [
            'names' =>
                [
                    'index' => 'contacts.organisations.extra',
                    'create' => 'contacts.organisations.new.extra',
                    'store' => 'contacts.organisations.store.extra',
                    'update' => 'contacts.organisations.update.extra',
                    'show' => 'contacts.organisations.show.extra',
                    'edit' => 'contacts.organisations.edit.extra',
                    'destroy' => 'contacts.organisations.destroy.extra']
        ]);


    //Route::get('contact/{contact}/organisation/{organisation}/upload',['uses' => 'ContactsOrganisationsController@getUpload','as' => 'contactorg.upload.extra']);
    Route::any('contact/{contact}/organisation/{organisation}/upload',['uses' => 'ContactsOrganisationsController@anyUpload', 'as' => 'contactorg.upload.extra']);
    Route::get('confirm/{token}',['uses' => 'OrganisationsController@confirm','as' => 'organisations.confirm.extra']);

    Route::controllers([
        'auth' => 'Auth\AuthController',
        'password' => 'Auth\PasswordController',
    ]);
    Route::get('dashboard',['uses' => 'DashboardController@index','as' => 'dashboard.extra']);
    Route::get('confirmation-requise',function()
    {
       return view('contacts.reqconfirm');
    });



});




// Route::get('home', 'HomeController@index');
// Route::any('register',['uses' => 'OrganisationsController@create', 'as' => 'organisations.create']);
// Route::any('login',['uses' => 'UsersController@login', 'as' => 'user.login']);

