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


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

Route::get('/page/{id}', function ($page_id) {
  return "page $page_id loaded";
})->name('page');

/* single pages */
Route::get('/author/{id}', function ($author_id) {
  return "author $author_id loaded";
})->name('people');

Route::get('/publication/{id}', function ($publication_id) {
  return "publication $publication_id loaded";
})->name('publication');

Route::get('/dataset/{id}', function ($dataset_id) {
  return "dataset $dataset_id loaded";
})->name('dataset');

Route::get('/dataset-request/{id}', function ($dataset_request_id) {
  return "dataset-request $dataset_request_id sending";
})->name('dataset-request');

Route::post('/dataset-request/{id}', function ($dataset_request_id) {
  return "dataset-request $dataset_request_id sent";
})->name('dataset-request');

/* listing pages */
Route::get('/authors/{page?}', function ($authors_page=0) {
  return "authors $authors_page loaded";
})->name('peoples');

Route::get('/publications/{page?}', function ($publications_page=0) {
  return "publications $publications_page loaded";
})->name('publications');

Route::get('/datasets/{page?}', function ($datasets_page=0) {
  return "datasets $datasets_page loaded";
})->name('datasets');

/* 
  ===================================================================================================
  ======================================= admin routes ==============================================
  ===================================================================================================
*/
Route::namespace('Admin')->prefix('admin')->middleware(['auth', 'checkPermission:admin'])->group(function (){
  Route::resources([
    'pages' => 'PageController'
  ]);
  Route::resources([
    'slides' => 'SlideController'
  ]);
  /* 
    =================================================================================================
    ======================================= publications ============================================
    =================================================================================================
  */
  Route::namespace('Publication')->prefix('publication')->group(function (){
    Route::get('/deactive/{id}', function ($publication_id) {
      return "publication $publication_id deactivating";
    })->name('admin-publication-deactive-get');

    Route::get('/active/{id}', function ($publication_id) {
      return "publication $publication_id activating";
    })->name('admin-publication-active-get');

    Route::get('/remove/{id}', function ($publication_id) {
      return "publication $publication_id removing";
    })->name('admin-publication-remove-get');

    Route::get('/edit/{id}', function ($publication_id) {
      return "publication $publication_id editing";
    })->name('admin-publication-edit-get');

    Route::post('/edit/{id}', function ($publication_id) {
      return "publication $publication_id edited";
    })->name('admin-publication-edit-post');

    Route::get('/new', function ($publication_id) {
      return "publication $publication_id newing";
    })->name('admin-publication-new-get');

    Route::post('/new', function ($publication_id) {
      return "publication $publication_id newed";
    })->name('admin-publication-new-post');

    Route::get('/{page?}', function ($publication_page=0) {
      return "publication page $publication_page loaded";
    })->name('admin-publication-list');

  });
  /* 
    =================================================================================================
    ========================================== authors ==============================================
    =================================================================================================
  */
  Route::namespace('Author')->prefix('author')->group(function (){
    Route::get('/deactive/{id}', function ($author_id) {
      return "author $author_id deactivating";
    })->name('admin-author-deactive-get');

    Route::get('/active/{id}', function ($author_id) {
      return "author $author_id activating";
    })->name('admin-author-active-get');

    Route::get('/remove/{id}', function ($author_id) {
      return "author $author_id removing";
    })->name('admin-author-remove-get');

    Route::get('/edit/{id}', function ($author_id) {
      return "author $author_id editing";
    })->name('admin-author-edit-get');

    Route::post('/edit/{id}', function ($author_id) {
      return "author $author_id edited";
    })->name('admin-author-edit-post');

    Route::get('/new', function ($author_id) {
      return "author $author_id newing";
    })->name('admin-author-new-get');

    Route::post('/new', function ($author_id) {
      return "author $author_id newed";
    })->name('admin-author-new-post');

    Route::get('/{page?}', function ($author_page=0) {
      return "author page $author_page loaded";
    })->name('admin-author-list');
  });
  /* 
    =================================================================================================
    ======================================= pages ============================================
    =================================================================================================
  */
  Route::namespace('Page')->prefix('page')->group(function (){
    Route::get('/deactive/{id}', function ($page_id) {
      return "page $page_id deactivating";
    })->name('admin-page-deactive-get');

    Route::get('/active/{id}', function ($page_id) {
      return "page $page_id activating";
    })->name('admin-page-active-get');

    Route::get('/remove/{id}', function ($page_id) {
      return "page $page_id removing";
    })->name('admin-page-remove-get');

    Route::get('/edit/{id}', function ($page_id) {
      return "page $page_id editing";
    })->name('admin-page-edit-get');

    Route::post('/edit/{id}', function ($page_id) {
      return "page $page_id edited";
    })->name('admin-page-edit-post');

    Route::get('/new', function ($page_id) {
      return "page $page_id newing";
    })->name('admin-page-new-get');

    Route::post('/new', function ($page_id) {
      return "page $page_id newed";
    })->name('admin-page-new-post');

    Route::get('/{page?}', function ($page_page=0) {
      return "page page $page_page loaded";
    })->name('admin-page-list');
  });
  /* 
    =================================================================================================
    ========================================= slides ================================================
    =================================================================================================
  */
  Route::namespace('Slide')->prefix('slide')->group(function (){
    Route::get('/deactive/{id}', function ($slide_id) {
      return "slide $slide_id deactivating";
    })->name('admin-slide-deactive-get');

    Route::get('/active/{id}', function ($slide_id) {
      return "slide $slide_id activating";
    })->name('admin-slide-active-get');

    Route::get('/remove/{id}', function ($slide_id) {
      return "slide $slide_id removing";
    })->name('admin-slide-remove-get');

    Route::get('/edit/{id}', function ($slide_id) {
      return "slide $slide_id editing";
    })->name('admin-slide-edit-get');

    Route::post('/edit/{id}', function ($slide_id) {
      return "slide $slide_id edited";
    })->name('admin-slide-edit-post');

    Route::get('/new', function ($slide_id) {
      return "slide $slide_id newing";
    })->name('admin-slide-new-get');

    Route::post('/new', function ($slide_id) {
      return "slide $slide_id newed";
    })->name('admin-slide-new-post');

    Route::get('/{page?}', function ($slide_page=0) {
      return "slide page $slide_page loaded";
    })->name('admin-slide-list');
  });
  /* 
    =================================================================================================
    ========================================= datasets ==============================================
    =================================================================================================
  */
  Route::namespace('Dataset')->prefix('dataset')->group(function (){
    Route::get('/deactive/{id}', function ($dataset_id) {
      return "dataset $dataset_id deactivating";
    })->name('admin-dataset-deactive-get');

    Route::get('/active/{id}', function ($dataset_id) {
      return "dataset $dataset_id activating";
    })->name('admin-dataset-active-get');

    Route::get('/remove/{id}', function ($dataset_id) {
      return "dataset $dataset_id removing";
    })->name('admin-dataset-remove-get');

    Route::get('/edit/{id}', function ($dataset_id) {
      return "dataset $dataset_id editing";
    })->name('admin-dataset-edit-get');

    Route::post('/edit/{id}', function ($dataset_id) {
      return "dataset $dataset_id edited";
    })->name('admin-dataset-edit-post');

    Route::get('/new', function ($dataset_id) {
      return "dataset $dataset_id newing";
    })->name('admin-dataset-new-get');

    Route::post('/new', function ($dataset_id) {
      return "dataset $dataset_id newed";
    })->name('admin-dataset-new-post');

    Route::get('/{page?}', function ($dataset_page=0) {
      return "dataset page $dataset_page loaded";
    })->name('admin-dataset-list');
  });
  /* 
    =================================================================================================
    =================================== dataset requests ============================================
    =================================================================================================
  */
  Route::namespace('DatasetRequest')->prefix('dataset-request')->group(function (){
    Route::get('/refuse/{id}', function ($dataset_request_id) {
      return "dataset_request $dataset_request_id deactivating";
    })->name('admin-dataset_request-refuse-get');

    Route::get('/accept/{id}', function ($dataset_request_id) {
      return "dataset_request $dataset_request_id activating";
    })->name('admin-dataset_request-accept-get');

    Route::get('/remove/{id}', function ($dataset_request_id) {
      return "dataset_request $dataset_request_id removing";
    })->name('admin-dataset_request-remove-get');

    Route::get('/{page?}', function ($dataset_request_page=0) {
      return "dataset_request page $dataset_request_page loaded";
    })->name('admin-dataset_request-list');
  });
});