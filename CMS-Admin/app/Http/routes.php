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
Route::get('/userNotFound', function() {
    return View('errors.503');
})->name('503');
Route::get('/role/view', 'RolePermissionController@index')->name('role.permission.view');
Route::get('/role/permission/{id}', 'RolePermissionController@getPermissionsAsPerRole')->name('role.permission.checkbox');
Route::post('/role/save', 'RolePermissionController@store')->name('role.permission.save');
Route::resource('permission', 'PermissionController');
Route::resource('tab', 'TabsController');
Route::resource('module', 'ModuleController');

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
/* Forgot password (GET) */

Route::group(['middlewareGroups' => ['web']], function () {


Route::get('logout', 'AuthController@getLogout');
Route::get('org/map', ['as' => 'org.map', 'uses' => 'OrganizationController@map']);
Route::post('org/mapses/', ['as' => 'org.mapses', 'uses' => 'OrganizationController@mapses']);
Route::get('org', ['as' => 'org.list', 'uses' => 'OrganizationController@index']);
Route::get('org/create', [ 'as'=>'org.create','uses' => 'OrganizationController@create']);
Route::post('org', ['as' => 'org.store', 'uses' => 'OrganizationController@store']);
Route::get('org/{lat}/{lang}/{type}/show', ['as' => 'org.show','uses' => 'OrganizationController@show']);
Route::get('org/{id}/edit',['as'=>'org.edit', 'uses' => 'OrganizationController@edit']);
Route::put('org/{id}',['as' => 'org.update', 'uses' => 'OrganizationController@update']);
Route::get('org/{id}/delete', ['as' => 'org.destroy', 'uses' => 'OrganizationController@destroy']);

Route::get('org/{lat}/{lang}/{type}/show', ['as' => 'org.show', 'uses' => 'OrganizationController@show']);
Route::post('org/searchres', [ 'as'=>'org.searchres','uses' => 'OrganizationController@searchres']);

Route::post('org/adsearch', [ 'as'=>'org.adsearch','uses' => 'OrganizationController@advancesearch']);
Route::post('org/decide', [ 'as'=>'org.decide','uses' => 'OrganizationController@decide']);

Route::get('org/review', ['as' => 'org.review', 'uses' => 'OrganizationController@review']);
Route::get('accounts/forgot', [ 'as'=>'accounts.forgot','uses' => 'AccountController@getForgotPassword']);
Route::auth();
Route::get('/home', 'HomeController@web');
Route::get('home/web', [ 'as'=>'home.web','uses' => 'HomeController@web']);
Route::get('home/help', [ 'as'=>'home.help','uses' => 'HomeController@help']);
Route::get('home/weather', [ 'as'=>'home.weather','uses' => 'HomeController@weather']);
Route::get('home/reports', [ 'as'=>'home.reports','uses' => 'HomeController@reports']);

Route::get('password/forgot', ['as' => 'password.forgot', 'uses' => 'Auth\PasswordController@forgot']);
Route::post('password/forgotreset', ['as' => 'password.forgotreset', 'uses' => 'Auth\PasswordController@forgotreset']);


//Route::resource('/users','UsersController');
//Route::resource('/roles','RoleController');
//Route::resource('/clients','ClientController');
//Route::resource('/messages','MessageController');
// Route::resource('/triggers', 'TriggerController');
// Route::resource('/weather', 'WeatherController');
// Route::resource('/contacts', 'ContactController');
// Route::resource('/locations', 'LocationsController');
// Route::resource('/session', 'SessionController');




Route::get('users', ['as' => 'users.list', 'uses' => 'UsersController@index']);
Route::get('users/create', [ 'as'=>'users.create','uses' => 'UsersController@create']);
Route::post('users', ['as' => 'users.store', 'uses' => 'UsersController@store']);
Route::get('users/{id}/show', ['as' => 'users.show', 'uses' => 'UsersController@show']);
Route::get('users/{id}/edit',['as'=>'users.edit', 'uses' => 'UsersController@edit']);
Route::put('users/{id}',['as' => 'users.update', 'uses' => 'UsersController@update']);
Route::get('users/{id}/delete', ['as' => 'users.destroy', 'uses' => 'UsersController@destroy']);
Route::get('users/{id}/settings',['as'=>'users.settings', 'uses' => 'UsersController@settings']);
Route::post('users/setupdate',['as' => 'users.setupdate', 'uses' => 'UsersController@updatePassword']);
Route::post('users/searchres', [ 'as'=>'users.searchres','uses' => 'UsersController@searchres']);
Route::post('users/adsearch', [ 'as'=>'users.adsearch','uses' => 'UsersController@advancesearch']);
Route::get('users/{id}/profile',['as'=>'users.profile', 'uses' => 'UsersController@profile']);
Route::put('users/profileupdate/{id}',['as' => 'users.profileupdate', 'uses' => 'UsersController@profileupdate']);


Route::get('privileges', ['as' => 'privileges.list', 'uses' => 'PrivilegeController@index']);
Route::get('privileges/create', [ 'as'=>'privileges.create','uses' => 'PrivilegeController@create']);
Route::post('privileges', ['as' => 'privileges.store', 'uses' => 'PrivilegeController@store']);
Route::get('privileges/{id}/show', ['as' => 'privileges.show', 'uses' => 'PrivilegeController@show']);
Route::get('privileges/{id}/edit',['as'=>'privileges.edit', 'uses' => 'PrivilegeController@edit']);
Route::put('privileges/{id}',['as' => 'privileges.update', 'uses' => 'PrivilegeController@update']);
Route::get('privileges/{id}/delete', ['as' => 'privileges.destroy', 'uses' => 'PrivilegeController@destroy']);
Route::post('privileges/searchres', [ 'as'=>'privileges.searchres','uses' => 'PrivilegeController@searchres']);

Route::get('permissions', ['as' => 'permissions.list', 'uses' => 'PermissionsController@index']);
Route::get('permissions/create', [ 'as'=>'permissions.create','uses' => 'PermissionsController@create']);
Route::post('permissions', ['as' => 'permissions.store', 'uses' => 'PermissionsController@store']);
Route::get('permissions/{id}/show', ['as' => 'permissions.show', 'uses' => 'PermissionsController@show']);
Route::get('permissions/{id}/edit',['as'=>'permissions.edit', 'uses' => 'PermissionsController@edit']);
Route::put('permissions/{id}',['as' => 'permissions.update', 'uses' => 'PermissionsController@update']);
Route::get('permissions/{id}/delete', ['as' => 'permissions.destroy', 'uses' => 'PermissionsController@destroy']);

Route::post('permissions/searchres', [ 'as'=>'permissions.searchres','uses' => 'PermissionsController@searchres']);
Route::post('permissions/searchress', [ 'as'=>'permissions.searchress','uses' => 'PermissionsController@searchress']);



Route::get('orgadmin/adduser', [ 'as'=>'orgadmin.adduser','uses' => 'OrgadminController@adduser']);
Route::post('orgadmin/saveuser', ['as' => 'orgadmin.saveuser', 'uses' => 'OrgadminController@saveuser']);
Route::get('orgadmin', ['as' => 'orgadmin.list', 'uses' => 'OrgadminController@index']);
Route::get('orgadmin/create', [ 'as'=>'orgadmin.create','uses' => 'OrgadminController@create']);
Route::post('orgadmin', ['as' => 'orgadmin.store', 'uses' => 'OrgadminController@store']);

Route::get('orgadmin/{id}/show', ['as' => 'orgadmin.show', 'uses' => 'OrgadminController@show']);
Route::get('orgadmin/{id}/edit',['as'=>'orgadmin.edit', 'uses' => 'OrgadminController@edit']);
Route::put('orgadmin/{id}',['as' => 'orgadmin.update', 'uses' => 'OrgadminController@update']);
Route::get('orgadmin/{id}/delete', ['as' => 'orgadmin.destroy', 'uses' => 'OrgadminController@destroy']);
Route::post('orgadmin/searchres', [ 'as'=>'orgadmin.searchres','uses' => 'OrgadminController@searchres']);

Route::post('orgadmin/adsearch', [ 'as'=>'orgadmin.adsearch','uses' => 'OrgadminController@advancesearch']);

Route::get('services', ['as' => 'services.list', 'uses' => 'ServicesController@index']);
Route::get('services/create', [ 'as'=>'services.create','uses' => 'ServicesController@create']);
Route::post('services', ['as' => 'services.store', 'uses' => 'ServicesController@store']);
Route::get('services/{id}/show', ['as' => 'services.show', 'uses' => 'ServicesController@show']);
Route::get('services/{id}/edit',['as'=>'services.edit', 'uses' => 'ServicesController@edit']);
Route::put('services/{id}',['as' => 'services.update', 'uses' => 'ServicesController@update']);
Route::get('services/{id}/delete', ['as' => 'services.destroy', 'uses' => 'ServicesController@destroy']);
Route::post('services/searchres', [ 'as'=>'services.searchres','uses' => 'ServicesController@searchres']);


Route::get('orgservice', ['as' => 'orgservice.list', 'uses' => 'OrgServiceController@index']);
Route::get('orgservice/create', [ 'as'=>'orgservice.create','uses' => 'OrgServiceController@create']);
Route::post('orgservice', ['as' => 'orgservice.store', 'uses' => 'OrgServiceController@store']);
Route::get('orgservice/{id}/show', ['as' => 'orgservice.show', 'uses' => 'OrgServiceController@show']);
Route::get('orgservice/{id}/edit',['as'=>'orgservice.edit', 'uses' => 'OrgServiceController@edit']);
Route::put('orgservice/{id}',['as' => 'orgservice.update', 'uses' => 'OrgServiceController@update']);
Route::get('orgservice/{id}/delete', ['as' => 'orgservice.destroy', 'uses' => 'OrgServiceController@destroy']);

Route::get('orgsupport', ['as' => 'orgsupport.list', 'uses' => 'OrgSupportController@index']);
Route::get('orgsupport/create', [ 'as'=>'orgsupport.create','uses' => 'OrgSupportController@create']);
Route::post('orgsupport', ['as' => 'orgsupport.store', 'uses' => 'OrgSupportController@store']);
Route::get('orgsupport/{id}/show', ['as' => 'orgsupport.show', 'uses' => 'OrgSupportController@show']);
Route::get('orgsupport/{id}/edit',['as'=>'orgsupport.edit', 'uses' => 'OrgSupportController@edit']);
Route::put('orgsupport/{id}',['as' => 'orgsupport.update', 'uses' => 'OrgSupportController@update']);
Route::get('orgsupport/{id}/delete', ['as' => 'orgsupport.destroy', 'uses' => 'OrgSupportController@destroy']);


Route::get('orgbills', ['as' => 'orgbills.list', 'uses' => 'OrgBillsController@index']);
Route::get('orgbills/create', [ 'as'=>'orgbills.create','uses' => 'OrgBillsController@create']);
Route::post('orgbills', ['as' => 'orgbills.store', 'uses' => 'OrgBillsController@store']);
Route::get('orgbills/{id}/show', ['as' => 'orgbills.show', 'uses' => 'OrgBillsController@show']);
Route::get('orgbills/{id}/edit',['as'=>'orgbills.edit', 'uses' => 'OrgBillsController@edit']);
Route::put('orgbills/{id}',['as' => 'orgbills.update', 'uses' => 'OrgBillsController@update']);
Route::get('orgbills/{id}/delete', ['as' => 'orgbills.destroy', 'uses' => 'OrgBillsController@destroy']);

Route::get('orgprofusers', ['as' => 'orgprofusers.list', 'uses' => 'ProfessionalUserController@index']);
Route::get('orgprofusers/create', [ 'as'=>'orgprofusers.create','uses' => 'ProfessionalUserController@create']);
Route::post('orgprofusers', ['as' => 'orgprofusers.store', 'uses' => 'ProfessionalUserController@store']);
Route::get('orgprofusers/{id}/show', ['as' => 'orgprofusers.show', 'uses' => 'ProfessionalUserController@show']);
Route::get('orgprofusers/{id}/edit',['as'=>'orgprofusers.edit', 'uses' => 'ProfessionalUserController@edit']);
Route::put('orgprofusers/{id}',['as' => 'orgprofusers.update', 'uses' => 'ProfessionalUserController@update']);
Route::get('orgprofusers/{id}/delete', ['as' => 'orgprofusers.destroy', 'uses' => 'ProfessionalUserController@destroy']);


Route::get('orgcontracts/addcontract', [ 'as'=>'orgcontracts.addcontract','uses' => 'OrgContractsController@addcontract']);
Route::post('orgcontracts/saveuser', ['as' => 'orgcontracts.saveuser', 'uses' => 'OrgContractsController@saveuser']);

Route::get('orgcontracts', ['as' => 'orgcontracts.list', 'uses' => 'OrgContractsController@index']);
Route::get('orgcontracts/create', [ 'as'=>'orgcontracts.create','uses' => 'OrgContractsController@create']);
Route::post('orgcontracts', ['as' => 'orgcontracts.store', 'uses' => 'OrgContractsController@store']);
Route::get('orgcontracts/{id}/show', ['as' => 'orgcontracts.show', 'uses' => 'OrgContractsController@show']);
Route::get('orgcontracts/{id}/edit',['as'=>'orgcontracts.edit', 'uses' => 'OrgContractsController@edit']);
Route::put('orgcontracts/{id}',['as' => 'orgcontracts.update', 'uses' => 'OrgContractsController@update']);
Route::get('orgcontracts/{id}/delete', ['as' => 'orgcontracts.destroy', 'uses' => 'OrgContractsController@destroy']);

Route::get('contracts', ['as' => 'contracts.list', 'uses' => 'ContractsController@index']);
Route::get('contracts/create', [ 'as'=>'contracts.create','uses' => 'ContractsController@create']);
Route::post('contracts', ['as' => 'contracts.store', 'uses' => 'ContractsController@store']);
Route::get('contracts/{id}/show', ['as' => 'contracts.show', 'uses' => 'ContractsController@show']);
Route::get('contracts/{id}/edit',['as'=>'contracts.edit', 'uses' => 'ContractsController@edit']);
Route::put('contracts/{id}',['as' => 'contracts.update', 'uses' => 'ContractsController@update']);
Route::get('contracts/{id}/delete', ['as' => 'contracts.destroy', 'uses' => 'ContractsController@destroy']);
Route::post('contracts/searchres', [ 'as'=>'contracts.searchres','uses' => 'ContractsController@searchres']);


Route::get('roles', ['as' => 'roles.list', 'uses' => 'RoleController@index']);
Route::get('roles/create', [ 'as'=>'roles.create','uses' => 'RoleController@create']);
Route::post('roles', ['as' => 'roles.store', 'uses' => 'RoleController@store']);
Route::get('roles/{id}/show', ['as' => 'roles.show', 'uses' => 'RoleController@show']);
Route::get('roles/{id}/edit',['as'=>'roles.edit', 'uses' => 'RoleController@edit']);
Route::put('roles/{id}',['as' => 'roles.update', 'uses' => 'RoleController@update']);
Route::get('roles/{id}/delete', ['as' => 'roles.destroy', 'uses' => 'RoleController@destroy']);
Route::post('roles/searchres', [ 'as'=>'roles.searchres','uses' => 'RoleController@searchres']);


Route::get('settings', ['as' => 'settings.list', 'uses' => 'SettingController@index']);
Route::get('settings/create', [ 'as'=>'settings.create','uses' => 'SettingController@create']);
Route::post('settings', ['as' => 'settings.store', 'uses' => 'SettingController@store']);
Route::get('settings/{id}/show', ['as' => 'settings.show', 'uses' => 'SettingController@show']);
Route::get('settings/{id}/edit',['as'=>'settings.edit', 'uses' => 'SettingController@edit']);
Route::put('settings/{id}',['as' => 'settings.update', 'uses' => 'SettingController@update']);
Route::get('settings/{id}/delete', ['as' => 'settings.destroy', 'uses' => 'SettingController@destroy']);

Route::get('question', ['as' => 'question.list', 'uses' => 'QuestionController@index']);
Route::get('question/create', [ 'as'=>'question.create','uses' => 'QuestionController@create']);
Route::post('question', ['as' => 'question.store', 'uses' => 'QuestionController@store']);
Route::get('question/{id}/show', ['as' => 'question.show', 'uses' => 'QuestionController@show']);
Route::get('question/{id}/edit',['as'=>'question.edit', 'uses' => 'QuestionController@edit']);
Route::post('question/{id}',['as' => 'question.update', 'uses' => 'QuestionController@update']);
Route::get('question/{id}/delete', ['as' => 'question.destroy', 'uses' => 'QuestionController@destroy']);
Route::post('question/updateques',['as' => 'question.updateques', 'uses' => 'QuestionController@updateques']);
});

