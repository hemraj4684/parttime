<?php


Route::get('/', function () {
    return view('welcome');
});
Event::listen('illuminate.query', function($query)
{
    var_dump($query);
});
// Route group for API versioning
Route::group(array('prefix' => 'api/v1'), function()
{
	#Roles
    Route::resource('roles', 'RolesController');
	Route::get('roles/', 'RolesController@index');
	Route::get('roles/show/{id}', 'RolesController@show');
	Route::get('roles/edit/{id}', 'RolesController@edit');
	Route::put('roles/update/{id}', 'RolesController@update');
	Route::put('roles/delete/{id}', 'RolesController@delete');
	Route::put('roles/create','RolesController@create');
	Route::post('roles/store','RolesController@store');
	
	#Privileges
    Route::resource('privileges', 'PrivilegeController');
	Route::get('privileges/', 'PrivilegeController@index');
	Route::get('privileges/show/{id}', 'PrivilegeController@show');
	Route::get('privileges/edit/{id}', 'PrivilegeController@edit');
	Route::put('privileges/update/{id}', 'PrivilegeController@update');
	Route::put('privileges/delete/{id}', 'PrivilegeController@delete');
	Route::put('privileges/create','PrivilegeController@create');
	Route::post('privileges/store','PrivilegeController@store');

	#Permissions
    Route::resource('permissions', 'PermissionsController');
	Route::get('permissions/', 'PermissionsController@index');
	Route::get('permissions/show/{id}', 'PermissionsController@show');
	Route::get('permissions/edit/{id}', 'PermissionsController@edit');
	Route::put('permissions/update/{id}', 'PermissionsController@update');
	Route::put('permissions/delete/{id}', 'PermissionsController@delete');
	Route::put('permissions/create','PermissionsController@create');
	Route::post('permissions/store','PermissionsController@store');


	#Organization
    Route::resource('orgs', 'OrganizationController');
	Route::get('orgs/', 'OrganizationController@index');
	Route::get('orgs/show/{id}', 'OrganizationController@show');
	Route::get('orgs/edit/{id}', 'OrganizationController@edit');
	Route::put('orgs/update/{id}', 'OrganizationController@update');
	Route::put('orgs/delete/{id}', 'OrganizationController@delete');
	Route::put('orgs/create','OrganizationController@create');
	Route::post('orgs/store','OrganizationController@store');

	#OrganizationAdmins
    Route::resource('orgadmins', 'OrgadminController');
	Route::get('orgadmins/', 'OrgadminController@index');
	Route::get('orgadmins/show/{id}', 'OrgadminController@show');
	Route::get('orgadmins/edit/{id}', 'OrgadminController@edit');
	Route::put('orgadmins/update/{id}', 'OrgadminController@update');
	Route::put('orgadmins/delete/{id}', 'OrgadminController@delete');
	Route::put('orgadmins/create','OrgadminController@create');
	Route::post('orgadmins/store','OrgadminController@store');


	#Organization Services
    Route::resource('orgservices', 'OrgServiceController');
	Route::get('orgservices/', 'OrgServiceController@index');
	Route::get('orgservices/show/{id}', 'OrgServiceController@show');
	Route::get('orgservices/edit/{id}', 'OrgServiceController@edit');
	Route::put('orgservices/update/{id}', 'OrgServiceController@update');
	Route::put('orgservices/delete/{id}', 'OrgServiceController@delete');
	Route::put('orgservices/create','OrgServiceController@create');
	Route::post('orgservices/store','OrgServiceController@store');

	#Organization Support
    Route::resource('orgsupport', 'OrgSupportController');
	Route::get('orgsupport/', 'OrgSupportController@index');
	Route::get('orgsupport/show/{id}', 'OrgSupportController@show');
	Route::get('orgsupport/edit/{id}', 'OrgSupportController@edit');
	Route::put('orgsupport/update/{id}', 'OrgSupportController@update');
	Route::put('orgsupport/delete/{id}', 'OrgSupportController@delete');
	Route::put('orgsupport/create','OrgSupportController@create');
	Route::post('orgsupport/store','OrgSupportController@store');
	
	#Organization Bills
    Route::resource('orgbills', 'OrgBillsController');
	Route::get('orgbills/', 'OrgBillsController@index');
	Route::get('orgbills/show/{id}', 'OrgBillsController@show');
	Route::get('orgbills/edit/{id}', 'OrgBillsController@edit');
	Route::put('orgbills/update/{id}', 'OrgBillsController@update');
	Route::put('orgbills/delete/{id}', 'OrgBillsController@delete');
	Route::put('orgbills/create','OrgBillsController@create');
	Route::post('orgbills/store','OrgBillsController@store');
	
	
	#Organization Professional Services
    Route::resource('orgprofusers', 'ProfessionalUserController');
	Route::get('orgprofusers/', 'ProfessionalUserController@index');
	Route::get('orgprofusers/show/{id}', 'ProfessionalUserController@show');
	Route::get('orgprofusers/edit/{id}', 'ProfessionalUserController@edit');
	Route::put('orgprofusers/update/{id}', 'ProfessionalUserController@update');
	Route::put('orgprofusers/delete/{id}', 'ProfessionalUserController@delete');
	Route::put('orgprofusers/create','ProfessionalUserController@create');
	Route::post('orgprofusers/store','ProfessionalUserController@store');

	#Org Contracts
	Route::resource('orgcontracts', 'OrgContractsController');
	Route::get('orgcontracts/', 'OrgContractsController@index');
	Route::get('orgcontracts/show/{id}', 'OrgContractsController@show');
	Route::get('orgcontracts/edit/{id}', 'OrgContractsController@edit');
	Route::put('orgcontracts/update/{id}', 'OrgContractsController@update');
	Route::put('orgcontracts/delete/{id}', 'OrgContractsController@delete');
	Route::put('orgcontracts/create','OrgContractsController@create');
	Route::post('orgcontracts/store','OrgContractsController@store');

	#Contracts
    Route::resource('contracts', 'ContractsController');
	Route::get('contracts/', 'ContractsController@index');
	Route::get('contracts/show/{id}', 'ContractsController@show');
	Route::get('contracts/edit/{id}', 'ContractsController@edit');
	Route::put('contracts/update/{id}', 'ContractsController@update');
	Route::put('contracts/delete/{id}', 'ContractsController@delete');
	Route::put('contracts/create','ContractsController@create');
	Route::post('contracts/store','ContractsController@store');

	#Services
    //Route::resource('services', 'ServicesController');
	Route::get('services/', 'ServicesController@index');
	Route::get('services/show/{id}', 'ServicesController@show');
	Route::get('services/edit/{id}', 'ServicesController@edit');
	Route::put('services/update/{id}', 'ServicesController@update');
	Route::put('services/delete/{id}', 'ServicesController@delete');
	Route::put('services/create','ServicesController@create');
	Route::post('services/store','ServicesController@store');

	
	#Users 
//	Route::resource('users', 'UsersController');
	Route::get('users/{id}', 'UsersController@index');
	Route::get('users/show/{id}', 'UsersController@show');
	Route::get('users/edit/{id}', 'UsersController@edit');
	Route::put('users/update/{id}', 'UsersController@update');
	Route::put('users/delete/{id}', 'UsersController@delete');
	Route::post('users/create','UsersController@create');
	Route::post('users/store','UsersController@store');
	

	#Messages
//	Route::resource('messages', 'MessageController');
	Route::get('messages/{id}', 'MessageController@index');
	Route::get('messages/show/{id}', 'MessageController@show');
	Route::get('messages/edit/{id}', 'MessageController@edit');
	Route::put('messages/update/{id}', 'MessageController@update');
	Route::put('messages/delete/{id}', 'MessageController@delete');
	Route::post('messages/create','MessageController@create');
	Route::post('messages/store','MessageController@store');

	#Triggers
//	Route::resource('triggers', 'TriggerController');
	Route::get('triggers/{id}', 'TriggerController@index');
	Route::get('triggers/show/{id}', 'TriggerController@show');
	Route::get('triggers/edit/{id}', 'TriggerController@edit');
	Route::put('triggers/update/{id}', 'TriggerController@update');
	Route::put('triggers/delete/{id}', 'TriggerController@delete');
	Route::post('triggers/create','TriggerController@create');
	Route::post('triggers/store','TriggerController@store');
	
	#Contacts
	//Route::resource('contacts', 'ContactController');
	Route::get('contacts/{id}', 'ContactController@index');
	Route::get('contacts/show/{id}', 'ContactController@show');
	Route::get('contacts/edit/{id}', 'ContactController@edit');
	Route::put('contacts/update/{id}', 'ContactController@update');
	Route::put('contacts/delete/{id}', 'ContactController@delete');
	Route::post('contacts/create','ContactController@create');
	
	#Weather
	//Route::resource('weather', 'WeatherController');
	Route::get('weather/', 'WeatherController@index');
	Route::get('weather/show/{id}', 'WeatherController@show');
	Route::get('weather/edit/{id}', 'WeatherController@edit');
	Route::put('weather/update/{id}', 'WeatherController@update');
	Route::put('weather/delete/{id}', 'WeatherController@delete');
	Route::post('weather/create','WeatherController@create');
		Route::post('weather/store','WeatherController@store');

	#Location
	//Route::resource('location', 'LocationController');
	Route::get('location/', 'LocationController@index');
	Route::get('location/show/{id}', 'LocationController@show');
	Route::get('location/edit/{id}', 'LocationController@edit');
	Route::put('location/update/{id}', 'LocationController@update');
	Route::put('location/delete/{id}', 'LocationController@delete');
	Route::post('location/create','LocationController@create');
		Route::post('location/store','LocationController@store');

	#Subscribe
	//Route::resource('subscribe', 'SubscribeController');
	Route::get('subscribe/', 'SubscribeController@index');
	Route::get('subscribe/show/{id}', 'SubscribeController@show');
	Route::get('subscribe/edit/{id}', 'SubscribeController@edit');

	Route::put('subscribe/update/{id}', 'SubscribeController@update');
	Route::put('subscribe/delete/{id}', 'SubscribeController@delete');
	Route::post('subscribe/create','SubscribeController@create');
		Route::post('subscribe/store','SubscribeController@store');

	#SubscribeUSers
	//Route::resource('subscribe', 'SubscribeController');
	Route::get('subscribeusers/', 'SubscribeUsersController@index');
	Route::get('subscribeusers/show/{id}', 'SubscribeUsersController@show');
	Route::get('subscribeusers/edit/{id}', 'SubscribeUsersController@edit');
	Route::put('subscribeusers/update/{id}', 'SubscribeUsersController@update');
	Route::put('subscribeusers/delete/{id}', 'SubscribeUsersController@delete');
	Route::post('subscribeusers/create','SubscribeUsersController@create');
		Route::post('subscribeusers/store','SubscribeUsersController@store');


});

#Roles
Route::resource('/roles','RolesController');