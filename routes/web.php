<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*  ---------------------------------------------------------------------------------------------
 *      ROTA NÃO AUTENTICADA
 *  --------------------------------------------------------------------------------------------- */


Route::get('/',                             ['as'=>'home.index',               'uses'=> 'HomeController@index']);
Route::get('/home',                         ['as'=>'home.index',               'uses'=> 'HomeController@index']);
Route::get('/home/services',                ['as'=>'home.services',            'uses'=> 'HomeController@services']);
Route::get('/home/institucional',           ['as'=>'home.institucional',       'uses'=> 'HomeController@institucional']);
Auth::routes();
Route::get('return/pay/success/{id?}',      ['as'=>'return.pay.success',       'uses'=> 'HomeController@paySuccess']);



Route::group(['prefix' => 'authentication','as'=>'authentication.'], function() {

    Route::get('sessions/create',                            ['as'=>'sessions.create',               'uses'=> 'Authentication\SessionsController@create']);
    Route::post('sessions/authenticate',                     ['as'=>'sessions.authenticate',         'uses'=> 'Authentication\SessionsController@authenticate']);

    Route::get('registrations/create/{profile}/{job}',       ['as'=>'registrations.create',          'uses'=> 'Authentication\RegistrationsController@create']);
    Route::post('registrations/store/{job}',                 ['as'=>'registrations.store',           'uses'=> 'Authentication\RegistrationsController@store']);

});




/*  ----------------------------------------------
 *    ROTAS AUTENTICADAS:
 *  ---------------------------------------------- */


Route::group(['prefix' => 'users','as'=>'users.'], function() {

    Route::any('index',                   ['as'=>'index',                 'uses'=> 'Authentication\UsersController@index'])->middleware('auth');
    Route::get('password/{id}',           ['as'=>'password',              'uses'=> 'Authentication\UsersController@password'])->middleware('auth');
    Route::get('edit/{id}',               ['as'=>'edit',                  'uses'=> 'Authentication\UsersController@edit'])->middleware('auth');
    Route::post('update',                 ['as'=>'update',                'uses'=> 'Authentication\UsersController@update'])->middleware('auth');
    Route::post('updatePassword',         ['as'=>'updatePassword',        'uses'=> 'Authentication\UsersController@updatePassword'])->middleware('auth');

});


/*  ----------------------------------------------------------------------------------
 *     CONTATOS
 *  ---------------------------------------------------------------------------------- */

Route::group(['prefix' => 'clients','as'=>'clients.'], function() {

    Route::get('send/index/{user}',              ['as'=>'send.index',           'uses'=> 'Contacts\ClientController@index'])->middleware('auth');
    Route::get('send/dialog/{order}',            ['as'=>'send.dialog',          'uses'=> 'Contacts\ClientController@dialog'])->middleware('auth');
    Route::post('send/notes/store/{order}',      ['as'=>'send.notes.store',     'uses'=> 'Contacts\ClientController@store'])->middleware('auth');
    Route::get('send/close/{user}',              ['as'=>'send.close',           'uses'=> 'Contacts\ClientController@close'])->middleware('auth');


});



Route::group(['middleware'=>'auth.checkrole:admin'], function() {


    Route::group(['prefix' => 'users','as'=>'users.'], function() {

        Route::get('index',                   ['as'=>'index',                 'uses'=> 'Authentication\UsersController@index']);
    });

    Route::group(['prefix' => 'authentication','as'=>'authentication.'], function() {

        Route::get('profiles/getUserByProfile/{profile}',        ['as'=>'profiles.getUserByProfile',     'uses'=> 'Authentication\ProfilesController@getUserByProfile'])->middleware('can:permissao_gerente');
        Route::get('profiles/changeProfile/{user}/{profile}',    ['as'=>'profiles.changeProfile',        'uses'=> 'Authentication\ProfilesController@changeProfile'])->middleware('can:permissao_gerente');

    });


    Route::group(['prefix' => 'authorization','as'=>'authorization.'], function() {


        Route::get('role/user/index',                      ['as'=>'role.user.index',   'uses'=> 'Authorization\RoleUserController@index'])->middleware('can:permissao_gerente');
        Route::get('role/user/edit/{user}',                ['as'=>'role.user.edit',    'uses'=> 'Authorization\RoleUserController@edit'])->middleware('can:permissao_gerente');
        Route::post('role/user/{user}/store',              ['as'=>'role.user.store',   'uses'=> 'Authorization\RoleUserController@store'])->middleware('can:permissao_gerente');
        Route::get('role/user/{user}/revoke/{role}',       ['as'=>'role.user.revoke',  'uses'=> 'Authorization\RoleUserController@revoke'])->middleware('can:permissao_gerente');


        Route::get('roles/index',               ['as'=>'roles.index',       'uses'=> 'Authorization\RolesController@index'])->middleware('can:permissao_gerente');
        Route::get('roles/create',              ['as'=>'roles.create',      'uses'=> 'Authorization\RolesController@create'])->middleware('can:permissao_gerente');
        Route::post('roles/store',              ['as'=>'roles.store',       'uses'=> 'Authorization\RolesController@store'])->middleware('can:permissao_gerente');
        Route::get('roles/edit/{id}',           ['as'=>'roles.edit',        'uses'=> 'Authorization\RolesController@edit'])->middleware('can:permissao_gerente');
        Route::post('roles/update/{id}',        ['as'=>'roles.update',      'uses'=> 'Authorization\RolesController@update'])->middleware('can:permissao_gerente');
        Route::get('roles/destroy/{id}',        ['as'=>'roles.destroy',     'uses'=> 'Authorization\RolesController@destroy'])->middleware('can:permissao_gerente');


        Route::get('permission/role/index',                       ['as'=>'permission.role.index',     'uses'=> 'Authorization\PermissionRoleController@index'])->middleware('can:permissao_gerente');
        Route::get('permission/role/edit/{user}',                 ['as'=>'permission.role.edit',      'uses'=> 'Authorization\PermissionRoleController@edit'])->middleware('can:permissao_gerente');
        Route::post('permission/role/{role}/store',               ['as'=>'permission.role.store',     'uses'=> 'Authorization\PermissionRoleController@store'])->middleware('can:permissao_gerente');
        Route::get('permission/role/{role}/revoke/{permission}',  ['as'=>'permission.role.revoke',    'uses'=> 'Authorization\PermissionRoleController@revoke'])->middleware('can:permissao_gerente');

        Route::get('permissions/index',         ['as'=>'permissions.index',         'uses'=> 'Authorization\PermissionsController@index'])->middleware('can:permissao_gerente');
        Route::get('permissions/create',        ['as'=>'permissions.create',        'uses'=> 'Authorization\PermissionsController@create'])->middleware('can:permissao_gerente');
        Route::post('permissions/store',        ['as'=>'permissions.store',         'uses'=> 'Authorization\PermissionsController@store'])->middleware('can:permissao_gerente');
        Route::get('permissions/edit/{id}',     ['as'=>'permissions.edit',          'uses'=> 'Authorization\PermissionsController@edit'])->middleware('can:permissao_gerente');
        Route::post('permissions/update/{id}',  ['as'=>'permissions.update',        'uses'=> 'Authorization\PermissionsController@update'])->middleware('can:permissao_gerente');
        Route::get('permissions/destroy/{id}',  ['as'=>'permissions.destroy',       'uses'=> 'Authorization\PermissionsController@destroy'])->middleware('can:permissao_gerente');


        Route::get('roles/permissions/{id}',                        ['as'=>'roles.permissions',         'uses'=> 'Authorization\RolesController@permissions'])->middleware('can:permissao_gerente');
        Route::post('roles/permissions/{id}/store',                 ['as'=>'roles.permissions.store',   'uses'=> 'Authorization\RolesController@storePermissions'])->middleware('can:permissao_gerente');
        Route::get('roles/permissions/{id}/revoke/{permission_id}', ['as'=>'roles.permissions.revoke',  'uses'=> 'Authorization\RolesController@revokePermissions'])->middleware('can:permissao_gerente');

    });

    Route::group(['prefix' => 'contacts','as'=>'contacts.'], function() {

        Route::get('get/index/{status}',    ['as'=>'get.index',           'uses'=> 'Contacts\AdminController@index']);
        Route::get('get/dialog/{order}',    ['as'=>'get.dialog',          'uses'=> 'Contacts\AdminController@dialog']);
        Route::get('get/close/{order}',     ['as'=>'get.close',           'uses'=> 'Contacts\AdminController@close']);
        Route::post('get/notes/store/{id}', ['as'=>'get.notes.store',     'uses'=> 'Contacts\AdminController@store']);

    });

});



