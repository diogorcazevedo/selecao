<?php


Route::get('project/',                                              ['as'=>'project.home.index',                    'uses'=> 'HomeController@index']);
Route::get('project/home/index/{project}',                          ['as'=>'project.home.index',                    'uses'=> 'HomeController@index']);
Route::post('checkCPF/{profile}/{job}',                             ['as'=>'registryOperations.checkCPF',           'uses'=> 'UserRegistry\RegistryOperationsController@checkCPF']);
Route::any('getRegistersByCPF',                                     ['as'=>'registryOperations.getRegistersByCPF',  'uses'=> 'UserRegistry\RegistryOperationsController@getRegistersByCPF']);



Route::group(['prefix' => 'project','middleware'=>'auth.checkrole:client','as'=>'project.'], function() {

    Route::get('home/client',  ['as'=>'home.client',       'uses'=> 'HomeController@client']);

});
Route::group(['prefix' => 'project','middleware'=>'auth.checkrole:admin','as'=>'project.'], function() {

    Route::get('home/admin',   ['as'=>'home.admin',        'uses'=> 'HomeController@admin']);

});
Route::group(['prefix' => 'project','middleware'=>'auth.checkrole:sponsor','as'=>'project.'], function() {

    Route::get('home/sponsor', ['as'=>'home.sponsor',        'uses'=> 'HomeController@sponsor']);

});



Route::group(['prefix' => 'project','as'=>'project.'], function() {



        Route::get('registers/create/{user}/{job}',               ['as'=>'registers.create',          'uses'=> 'UserRegistry\RegistersController@create'])->middleware('auth');
        Route::post('registers/store',                            ['as'=>'registers.store',           'uses'=> 'UserRegistry\RegistersController@store'])->middleware('auth');
        Route::post('registers/update/{register}',                ['as'=>'registers.update',          'uses'=> 'UserRegistry\RegistersController@update'])->middleware('auth');
        Route::get('preview/{register}',                          ['as'=>'registers.preview',         'uses'=> 'UserRegistry\RegistryOperationsController@preview'])->middleware('auth');


        Route::get('slips/store/{register}/{job}/{type}',         ['as'=>'slips.store',                       'uses'=> 'Payments\SlipsController@store']);
        Route::post('slips/storeDate/{id}',                       ['as'=>'slips.storeDate',                   'uses'=> 'Payments\SlipsController@storeDate']);

        Route::get('boletos/generate/bb/{slip}',                  ['as'=>'boletos.generate.bb',               'uses'=> 'Payments\Boletos\GenerateController@bb']);
        Route::get('boletos/generate/webCommerceBB/{slip}',       ['as'=>'boletos.generate.webCommerceBB',    'uses'=> 'Payments\Boletos\GenerateController@webCommerceBB']);

        Route::post('boletos/return/process/{project_id}',        ['as'=>'boletos.return.process',            'uses'=> 'Payments\Boletos\RetornoBoletoController@process'])->middleware('can:permissao_gerente');

        Route::get('iugu/checkout/{register}',                    ['as'=>'iugu.checkout',                     'uses'=> 'Payments\IuguController@checkout']);
        Route::post('iugu/charge',                                ['as'=>'iugu.charge',                       'uses'=> 'Payments\IuguController@charge']);

        //API
        Route::get('iugu/api/home/index/{project}',                                  ['as'=>'iugu.api.home.index',                      'uses'=> 'Payments\Iugu\HomeController@index'])->middleware('can:permissao_gerente');

        Route::get('iugu/api/invoices/index/{project}/{parameter?}',                 ['as'=>'iugu.api.invoices.index',                  'uses'=> 'Payments\Iugu\API\InvoicesController@index'])->middleware('can:permissao_gerente');
        Route::get('iugu/api/invoices/getById/{project}/{invoice}',                  ['as'=>'iugu.api.invoices.getById',                'uses'=> 'Payments\Iugu\API\InvoicesController@getById'])->middleware('can:permissao_gerente');
        Route::get('iugu/api/invoices/cancel/{project}/{invoice}',                   ['as'=>'iugu.api.invoices.cancel',                 'uses'=> 'Payments\Iugu\API\InvoicesController@cancel'])->middleware('can:permissao_gerente');
        Route::get('iugu/api/invoices/remove/{project}/{invoice}',                   ['as'=>'iugu.api.invoices.remove',                 'uses'=> 'Payments\Iugu\API\InvoicesController@remove'])->middleware('can:permissao_gerente');
        Route::get('iugu/api/invoices/cancelByStatus/{project}/{parameter}',         ['as'=>'iugu.api.invoices.cancelByStatus',         'uses'=> 'Payments\Iugu\API\InvoicesController@cancelByStatus'])->middleware('can:permissao_gerente');
        Route::get('iugu/api/invoices/clearAllCancel/{project}',                     ['as'=>'iugu.api.invoices.clearAllCancel',         'uses'=> 'Payments\Iugu\API\InvoicesController@clearAllCancel'])->middleware('can:permissao_gerente');
        Route::get('iugu/api/invoices/paymentReloadStatus/{project}/{parameter}',    ['as'=>'iugu.api.invoices.paymentReloadStatus',    'uses'=> 'Payments\Iugu\API\InvoicesController@paymentReloadStatus'])->middleware('can:permissao_gerente');
        Route::get('iugu/api/invoices/apiCreateInvoicesByJob/{project}/{job}',       ['as'=>'iugu.api.invoices.apiCreateInvoicesByJob', 'uses'=> 'Payments\Iugu\API\InvoicesController@apiCreateInvoicesByJob'])->middleware('can:permissao_gerente');
        Route::get('iugu/api/customers/createAPI/{project}',                         ['as'=>'iugu.api.customers.createAPI',             'uses'=> 'Payments\Iugu\API\CustomersController@createAPI'])->middleware('can:permissao_gerente');
        Route::get('iugu/api/customers/delete/{project}',                            ['as'=>'iugu.api.customers.delete',                'uses'=> 'Payments\Iugu\API\CustomersController@delete'])->middleware('can:permissao_gerente');

});


Route::group(['prefix' => 'reports','middleware'=>'auth.checkrole:admin','as'=>'reports.'], function() {

    Route::get('registers/cities/{project}',    ['as'=>'registers.cities',    'uses'=> 'Reports\RegistersController@cities']);
    Route::get('registers/jobs/{project}',      ['as'=>'registers.jobs',      'uses'=> 'Reports\RegistersController@jobs']);

});


Route::group(['prefix' => 'financial','middleware'=>'auth.checkrole:admin','as'=>'financial.'], function() {

    Route::get('transactions/index/{project}',    ['as'=>'transactions.index',    'uses'=> 'Financial\TransactionsController@index']);

});

Route::group(['prefix' => 'settings','middleware'=>'auth.checkrole:admin','as'=>'settings.'], function() {

    Route::get('release/{project}',    ['as'=>'release',            'uses'=> 'Settings\ReleasesController@index'])->middleware('can:permissao_gerente');
    Route::post('release/publish',     ['as'=>'release.publish',    'uses'=> 'Settings\ReleasesController@publish'])->middleware('can:permissao_gerente');


});

Route::group(['prefix' => 'exams','middleware'=>'auth.checkrole:admin','as'=>'exams.'], function() {

    Route::get('generate/view',    ['as'=>'generate.view',    'uses'=> 'Exams\GenerateController@view'])->middleware('can:permissao_gerente');
    Route::get('generate/pdf',    ['as'=>'generate.pdf',    'uses'=> 'Exams\GenerateController@pdf'])->middleware('can:permissao_gerente');

});





Route::group(['prefix' => 'homologation','as'=>'homologation.'], function() {

    Route::get('index/{project}',     ['as'=>'index',    'uses'=> 'Homologation\GenerateController@index']);
    Route::get('job/{job}',           ['as'=>'job',      'uses'=> 'Homologation\GenerateController@job']);
    Route::any('name',                ['as'=>'name',     'uses'=> 'Homologation\GenerateController@name']);
    Route::get('pdf/{job}',           ['as'=>'pdf',      'uses'=> 'Homologation\GenerateController@pdf','middleware'=>'auth.checkrole:admin'])->middleware('can:permissao_gerente');

});

Route::group(['prefix' => 'applications','middleware'=>'auth.checkrole:admin','as'=>'applications.'], function() {

    Route::get('reports/index/{project}',     ['as'=>'reports.index',    'uses'=> 'Applications\ReportsController@index'])->middleware('can:permissao_gerente');
    Route::get('reports/job/{job}',           ['as'=>'reports.job',      'uses'=> 'Applications\ReportsController@job'])->middleware('can:permissao_gerente');
    Route::get('reports/pdf/{job}',           ['as'=>'reports.pdf',      'uses'=> 'Applications\ReportsController@pdf'])->middleware('can:permissao_gerente');

    Route::get('reports/needs/job/{job}',           ['as'=>'reports.needs.job',      'uses'=> 'Applications\ReportsController@needsjob'])->middleware('can:permissao_gerente');
    Route::get('reports/needs/pdf/{job}',           ['as'=>'reports.needs.pdf',      'uses'=> 'Applications\ReportsController@needspdf'])->middleware('can:permissao_gerente');


});

Route::group(['prefix' => 'applications','middleware'=>'auth.checkrole:admin','as'=>'applications.'], function() {

    Route::any('schools/index',         ['as'=>'schools.index',      'uses'=> 'Applications\SchoolsController@index'])->middleware('can:permissao_gerente');
    Route::get('schools/create',        ['as'=>'schools.create',     'uses'=> 'Applications\SchoolsController@create'])->middleware('can:permissao_gerente');
    Route::post('schools/store',        ['as'=>'schools.store',      'uses'=> 'Applications\SchoolsController@store'])->middleware('can:permissao_gerente');
    Route::get('schools/edit/{id}',     ['as'=>'schools.edit',       'uses'=> 'Applications\SchoolsController@edit'])->middleware('can:permissao_gerente');
    Route::post('schools/update',       ['as'=>'schools.update',     'uses'=> 'Applications\SchoolsController@update'])->middleware('can:permissao_gerente');
    Route::get('schools/destroy/{id}',  ['as'=>'schools.destroy',    'uses'=> 'Applications\SchoolsController@destroy'])->middleware('can:permissao_gerente');
    Route::get('schools/config/{id}',   ['as'=>'schools.config',     'uses'=> 'Applications\SchoolsController@config'])->middleware('can:permissao_gerente');
    Route::post('schools/make',          ['as'=>'schools.make',       'uses'=> 'Applications\SchoolsController@make'])->middleware('can:permissao_gerente');
});
