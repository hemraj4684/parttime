<?php

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


// created by Hemraj Started here
Route::get('/notauthorized', function() {
    return View('errors.503');
})->name('503');




Route::group(['middleware' => ['checkrole']], function (){
    Route::get('/dummyurl', function() {
        return "CMS-ADMIN";
    })->name('dummy.url');

       

    Route::get('/dummyurl/second', function() {
        return "CMS-ADMIN SECOND";
    })->name('dummy.url.second');
});
//created by hemraj ended here






Route::get('/', function () {
	//redirect user
	if(Auth::guest())
	{
    	return view('auth.login');
	}else{
    	return view('dashboard.web');
	}

});

Route::get('register/verify/{confirmationCode}', [
    'as' => 'confirmation_path',
    'uses' => 'RegisterController@confirm'
]);


Route::group(['middleware' => ['web','checkrole']], function () {

    Route::auth();
    Route::get('/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);
    Route::get('accounts/forgot', [ 'as'=>'accounts.forgot','uses' => 'AccountController@getForgotPassword']);
    Route::get('password/forgot', ['as' => 'password.forgot', 'uses' => 'Auth\PasswordController@forgot']);
    Route::post('password/forgotreset', ['as' => 'password.forgotreset', 'uses' => 'Auth\PasswordController@forgotreset']);




    /*Org related routes started here*/
    Route::get('org/map', ['as' => 'org.map', 'uses' => 'OrganizationController@map']);
    Route::post('org/mapses/', ['as' => 'org.mapses', 'uses' => 'OrganizationController@mapses']);
    Route::get('org/{lat}/{lang}/{type}/show', ['as' => 'org.show','uses' => 'OrganizationController@show']);
    Route::post('org/searchres', [ 'as'=>'org.searchres','uses' => 'OrganizationController@searchres']);
    Route::post('org/adsearch', [ 'as'=>'org.adsearch','uses' => 'OrganizationController@advancesearch']);
    Route::post('org/decide', [ 'as'=>'org.decide','uses' => 'OrganizationController@decide']);
    Route::get('org/review', ['as' => 'org.review', 'uses' => 'OrganizationController@review']);
    Route::resource('org', 'OrganizationController');
    /*Org related routes ended here*/


    Route::get('/home', 'HomeController@web');
    Route::get('home/web', [ 'as'=>'home.web','uses' => 'HomeController@web']);
    Route::get('home/help', [ 'as'=>'home.help','uses' => 'HomeController@help']);
    Route::get('home/weather', [ 'as'=>'home.weather','uses' => 'HomeController@weather']);
    Route::get('home/reports', [ 'as'=>'home.reports','uses' => 'HomeController@reports']);



    /*Users related routes started here*/
    Route::get('users/{id}/settings',['as'=>'users.settings', 'uses' => 'UsersController@settings']);
    Route::post('users/setupdate',['as' => 'users.setupdate', 'uses' => 'UsersController@updatePassword']);
    Route::post('users/searchres', [ 'as'=>'users.searchres','uses' => 'UsersController@searchres']);
    Route::post('users/adsearch', [ 'as'=>'users.adsearch','uses' => 'UsersController@advancesearch']);
    Route::get('users/{id}/profile',['as'=>'users.profile', 'uses' => 'UsersController@profile']);
    Route::put('users/profileupdate/{id}',['as' => 'users.profileupdate', 'uses' => 'UsersController@profileupdate']);
    Route::resource('/users','UsersController');
    Route::resource('question','QuestionController');
    Route::post('question/updateques',['as' => 'question.updateques', 'uses' => 'QuestionController@updateques']);
    /*Users related routes ended here*/

    // modules related routes started here
    Route::resource('module', 'ModuleController'); 
    Route::resource('privileges', 'PrivilegeController');
    Route::post('privileges/searchres', [ 'as'=>'privileges.searchres','uses' => 'PrivilegeController@searchres']);
    // modules related routes ended here


    // permission related routes started here
    Route::resource('permissions','PermissionsController');
    Route::post('permissions/searchres', [ 'as'=>'permissions.searchres','uses' => 'PermissionsController@searchres']);
    Route::post('permissions/searchress', [ 'as'=>'permissions.searchress','uses' => 'PermissionsController@searchress']);
    Route::resource('permission', 'PermissionController');
    //Route::get('permission/{search?}', [ 'as'=>'permission.search','uses' => 'PermissionController@index']);
    // permission related routes ended here



    /*Organzation admin related routes started here*/
    Route::get('orgadmin/adduser', [ 'as'=>'orgadmin.adduser','uses' => 'OrgadminController@adduser']);
    Route::post('orgadmin/saveuser', ['as' => 'orgadmin.saveuser', 'uses' => 'OrgadminController@saveuser']);
    Route::post('orgadmin/searchres', [ 'as'=>'orgadmin.searchres','uses' => 'OrgadminController@searchres']);
    Route::post('orgadmin/adsearch', [ 'as'=>'orgadmin.adsearch','uses' => 'OrgadminController@advancesearch']);
    Route::resource('orgadmin','OrgadminController');
    /*Organzation admin related routes started here*/

    Route::resource('services','ServicesController');
    Route::post('services/searchres', [ 'as'=>'services.searchres','uses' => 'ServicesController@searchres']);


    // organization related routes started here
    Route::resource('orgservice', 'OrgServiceController');

    Route::resource('orgsupport','OrgSupportController');

    Route::resource('orgbills', 'OrgBillsController');

    Route::resource('orgprofusers', 'ProfessionalUserController');

    Route::get('orgcontracts/addcontract', [ 'as'=>'orgcontracts.addcontract','uses' => 'OrgContractsController@addcontract']);
    Route::post('orgcontracts/saveuser', ['as' => 'orgcontracts.saveuser', 'uses' => 'OrgContractsController@saveuser']);

    Route::resource('orgcontracts','OrgContractsController');

    Route::resource('contracts', 'ContractsController');
    Route::post('contracts/searchres', [ 'as'=>'contracts.searchres','uses' => 'ContractsController@searchres']);
    // organization related routes ended here

    // roles AND permission related routes started here
    Route::resource('/roles','RoleController');
    Route::post('roles/searchres', [ 'as'=>'roles.searchres','uses' => 'RoleController@searchres']);
    Route::get('/role/view', ['as'=>'role.permission.view','uses' => 'RolePermissionController@index']);
    Route::get('/role/permission/{id}', ['as'=>'role.permission.checkbox','uses' => 'RolePermissionController@getPermissionsAsPerRole']);
    Route::post('/role/save', ['as'=>'role.permission.save','uses' => 'RolePermissionController@store']);
    Route::get('/sunc', ['as'=>'permission.sync','uses' => 'PermissionController@sync']);
    Route::resource('tab', 'TabsController');
    // roles AND permission related routes ended here


    //TODO 

    Route::resource('settings', 'SettingController');
    Route::resource('/clients','ClientController');
    Route::resource('/messages','MessageController');
    Route::resource('/triggers', 'TriggerController');
    Route::resource('/weather', 'WeatherController');
    Route::resource('/contacts', 'ContactController');
    Route::resource('/locations', 'LocationsController');
    Route::resource('/session', 'SessionController');
    
});

