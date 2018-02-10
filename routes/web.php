<?php

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

/* single pages */
Route::get('/author/{id}', 'HomeController@author')->name('normal.authors.show');
Route::get('/publication/{id}', 'HomeController@publication')->name('normal.publications.show');
Route::get('/dataset/{id}', 'HomeController@dataset')->name('normal.datasets.show');
Route::post('/dataset-request/{id}', 'HomeController@dataset_request')->name('normal.datasets.request')->middleware('auth');

/* listing pages */
Route::get('/authors/{page?}', 'HomeController@authors')->name('normal.authors');
Route::get('/publications/{page?}', 'HomeController@publications')->name('normal.publications');
Route::get('/datasets/{page?}', 'HomeController@datasets')->name('normal.datasets');
Route::get('/page/{page}', 'HomeController@page');
/* 
  ===================================================================================================
  ======================================= admin routes ==============================================
  ===================================================================================================
*/
Route::namespace('Admin')->prefix('admin')->middleware(['auth', 'checkPermission:admin'])->group(function (){
  Route::resources([
    'pages'               => 'PageController',
    'slides'              => 'SlideController',
    'authors'             => 'AuthorController',
    'publications'        => 'PublicationController',
    'datasets'            => 'DatasetController',
    'dataset-requests'    => 'DatasetRequestController',
  ]);
  
  Route::get('publications/{id}/authors', 'AuthorPublicationController@index')
    ->name('publication.authors');
  Route::get('publications/{id}/authors/create', 'AuthorPublicationController@create')
    ->name('publication.authors.create');
  Route::post('publications/{id}/authors/store', 'AuthorPublicationController@store')
    ->name('publication.authors.store');
  Route::post('publication/{publication_id}/authors/destroy/{author_id}', 'AuthorPublicationController@destroy')
    ->name('publication.authors.destroy');
});