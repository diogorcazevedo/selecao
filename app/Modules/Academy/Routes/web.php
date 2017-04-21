<?php

/*
|--------------------------------------------------------------------------
| CONTEÚDO PROGRAMÁTICO
|--------------------------------------------------------------------------
|
|
|
 */

Route::group(['prefix' => 'programs','middleware'=>'auth.checkrole:admin','as'=>'programs.'], function() {

    Route::get('index',         ['as'=>'index',       'uses'=> 'ProgramsController@index']);
    Route::get('create',        ['as'=>'create',      'uses'=> 'ProgramsController@create'])->middleware('can:permissao_gerente');
    Route::post('store',        ['as'=>'store',       'uses'=> 'ProgramsController@store'])->middleware('can:permissao_gerente');
    Route::get('edit/{id}',     ['as'=>'edit',        'uses'=> 'ProgramsController@edit'])->middleware('can:permissao_gerente');
    Route::post('update/{id}',  ['as'=>'update',      'uses'=> 'ProgramsController@update'])->middleware('can:permissao_gerente');
    Route::get('destroy/{id}',  ['as'=>'destroy',     'uses'=> 'ProgramsController@destroy'])->middleware('can:permissao_gerente');


});

//items do que compõe o programa
Route::group(['prefix' => 'programs','middleware'=>'auth.checkrole:admin','as'=>'programs.'], function() {

    Route::get('items/index/{id}',                    ['as'=>'items.index',          'uses'=> 'ProgramItemsController@index']);
    Route::get('items/create/{id}',                   ['as'=>'items.create',         'uses'=> 'ProgramItemsController@create'])->middleware('can:permissao_gerente');
    Route::post('items/store/{id}',                   ['as'=>'items.store',          'uses'=> 'ProgramItemsController@store'])->middleware('can:permissao_gerente');
    Route::get('items/edit/{item_id}',                ['as'=>'items.edit',           'uses'=> 'ProgramItemsController@edit'])->middleware('can:permissao_gerente');
    Route::post('items/update/{id}',                  ['as'=>'items.update',         'uses'=> 'ProgramItemsController@update'])->middleware('can:permissao_gerente');
    Route::get('items/destroy/{id}',                  ['as'=>'items.destroy',        'uses'=> 'ProgramItemsController@destroy'])->middleware('can:permissao_gerente');


    Route::get('sub_items/index/{id}',                    ['as'=>'sub_items.index',          'uses'=> 'ProgramSubItemsController@index'])->middleware('can:permissao_gerente');
    Route::get('sub_items/create/{id}',                   ['as'=>'sub_items.create',         'uses'=> 'ProgramSubItemsController@create'])->middleware('can:permissao_gerente');
    Route::post('sub_items/store/{id}',                   ['as'=>'sub_items.store',          'uses'=> 'ProgramSubItemsController@store'])->middleware('can:permissao_gerente');
    Route::get('sub_items/edit/{item_id}',                ['as'=>'sub_items.edit',           'uses'=> 'ProgramSubItemsController@edit'])->middleware('can:permissao_gerente');
    Route::post('sub_items/update/{id}',                  ['as'=>'sub_items.update',         'uses'=> 'ProgramSubItemsController@update'])->middleware('can:permissao_gerente');
    Route::get('sub_items/destroy/{id}',                  ['as'=>'sub_items.destroy',        'uses'=> 'ProgramSubItemsController@destroy'])->middleware('can:permissao_gerente');

});


/*
|--------------------------------------------------------------------------
| QUESTÕES DE PROVA
|--------------------------------------------------------------------------
|
|
|
 */

Route::group(['prefix' => 'items','middleware'=>'auth.checkrole:admin','as'=>'items.'], function() {


    Route::get('index',                             ['as'=>'index',       'uses'=> 'ItemOperationsController@index'])->middleware('can:permissao_academico');
    Route::get('search',                            ['as'=>'search',      'uses'=> 'ItemOperationsController@search'])->middleware('can:permissao_academico');
    Route::get('all/{program_id}',                  ['as'=>'all',         'uses'=> 'ItemOperationsController@all'])->middleware('can:permissao_academico');
    Route::get('status/{status}/{program_id}',      ['as'=>'status',      'uses'=> 'ItemOperationsController@status'])->middleware('can:permissao_academico');
   // Route::get('preview/{id}',                      ['as'=>'preview',     'uses'=> 'ItemOperationsController@preview'])->middleware('can:permissao_academico');
    Route::get('pdf/{id}',                          ['as'=>'pdf',         'uses'=> 'ItemOperationsController@pdf'])->middleware('can:permissao_academico');

});


Route::group(['prefix' => 'items','middleware'=>'auth.checkrole:admin','as'=>'items.'], function() {

    Route::post('store/{program_id}',                   ['as'=>'store',          'uses'=> 'ItemsController@store'])->middleware('can:permissao_academico');
    Route::post('update/{item}',                        ['as'=>'update',         'uses'=> 'ItemsController@update'])->middleware('can:permissao_academico');
    Route::get('destroy/{item}',                        ['as'=>'destroy',        'uses'=> 'ItemsController@destroy'])->middleware('can:permissao_academico');
    Route::get('save/{item}/{edict}',                   ['as'=>'save',           'uses'=> 'ItemsController@save'])->middleware('can:permissao_academico');
    Route::get('img/destroy/{item}',                    ['as'=>'img.destroy',    'uses'=> 'ItemsController@destroyImg'])->middleware('can:permissao_academico');
    Route::get('addProgram/{programitems}/{Item}',      ['as'=>'addProgram',     'uses'=> 'ItemsController@addProgram'])->middleware('can:permissao_academico');
    Route::get('revokeProgram/{programitems}/{Item}',   ['as'=>'revokeProgram',  'uses'=> 'ItemsController@revokeProgram'])->middleware('can:permissao_academico');

});

Route::group(['prefix' => 'questions','middleware'=>'auth.checkrole:admin','as'=>'questions.'], function() {

    Route::post('store/{program_id}',        ['as'=>'store',         'uses'=> 'QuestionsController@store'])->middleware('can:permissao_academico');
    Route::post('update/{item_id}',          ['as'=>'update',        'uses'=> 'QuestionsController@update'])->middleware('can:permissao_academico');
    Route::get('destroy/{item_id}',          ['as'=>'destroy',       'uses'=> 'QuestionsController@destroy'])->middleware('can:permissao_academico');
    Route::get('img/destroy/{item}',         ['as'=>'img.destroy',   'uses'=> 'QuestionsController@destroyImg'])->middleware('can:permissao_academico');

});

Route::group(['prefix' => 'choices','middleware'=>'auth.checkrole:admin','as'=>'choices.'], function() {

    Route::post('store/{item_id}',          ['as'=>'store',         'uses'=> 'QuestionChoicesController@store'])->middleware('can:permissao_academico');
    Route::post('update/{choice_id}',       ['as'=>'update',        'uses'=> 'QuestionChoicesController@update'])->middleware('can:permissao_academico');
    Route::get('destroy/{choice_id}',       ['as'=>'destroy',       'uses'=> 'QuestionChoicesController@destroy'])->middleware('can:permissao_academico');

});



Route::group(['prefix' => 'rails','middleware'=>'auth.checkrole:admin','as'=>'rails.'], function() {


    Route::get('index/{program_id}/{user_id?}',                   ['as'=>'index',                   'uses'=> 'RailsController@index'])->middleware('can:permissao_academico');
    Route::get('items/{item_id}',                                 ['as'=>'items',                   'uses'=> 'RailsController@items'])->middleware('can:permissao_academico');
   // Route::get('view/{user_id}/{item_id}',                        ['as'=>'view',                    'uses'=> 'RailsController@view'])->middleware('can:permissao_academico');

});

        //ITEMS (ASSOCIAR CONTEÚDO PROGRAMÁTICO AO ITEM)

    //Route::get('items/index/{user_id?}',                    ['as'=>'items.index',           'uses'=> 'ItemsController@index'])->middleware('can:permissao_academico');
    //Route::get('items/byProgram/{user_id}/{program_id}',    ['as'=>'items.byProgram',       'uses'=> 'ItemsController@byProgram'])->middleware('can:permissao_academico');
    // Route::post('items/programs/add/{id}',                            ['as'=>'items.programs.add',               'uses'=> 'Program\ItemsController@add'])->middleware('can:permissao_academico');
    // Route::get('items/programs/revoke/{id}/revoke/{program_item_id}', ['as'=>'items.programs.revoke',            'uses'=> 'Program\ItemsController@revoke'])->middleware('can:permissao_academico');



/*
|
|
|
|--------------------------------------------------------------------------
| CONTRUÇÃO DE PROVAS
|--------------------------------------------------------------------------
|
|
|
 */

Route::group(['prefix' => 'exams','middleware'=>'auth.checkrole:admin','as'=>'exams.'], function() {

    Route::get('index',                     ['as'=>'index',          'uses'=> 'ExamsController@index'])->middleware('can:permissao_academico');
   // Route::get('byJob/{job}',               ['as'=>'byJob',          'uses'=> 'ExamsController@byJob'])->middleware('can:permissao_academico');
    Route::get('create/{job}/{program}',    ['as'=>'create',         'uses'=> 'ExamsController@create'])->middleware('can:permissao_academico');
    Route::get('add/{job}/{item}',          ['as'=>'add',            'uses'=> 'ExamsController@add'])->middleware('can:permissao_academico');
    Route::get('revoke/{job}/{item}',       ['as'=>'revoke',         'uses'=> 'ExamsController@revoke'])->middleware('can:permissao_academico');
    Route::get('preview/{job}',             ['as'=>'preview',        'uses'=> 'ExamsController@preview'])->middleware('can:permissao_academico');
    Route::get('pdf/{job}',                 ['as'=>'pdf',            'uses'=> 'ExamsController@pdf'])->middleware('can:permissao_academico');

});



