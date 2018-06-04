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

Route::get('/dashboard', 'HomeController@index')->name('home');
/*********************************************************/
/************* Group Route **************/
	/******* post **********/
	Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){

	 Route::get('/post/create',[

		'uses' => 'PostController@create',

		'as' =>   'post.create'

	]);

	/************ post store **********/

	Route::post('/post/store',[

		'uses' => 'PostController@store',

		'as' =>   'post.store'

	]);



/********** Show all Post *************/
 Route::get('/post/index',[

		'uses' => 'PostController@index',

		'as' =>   'posts'

	]);

/********* Trashed Post **************/
Route::get('/post/delete/{id}',[

	'uses' => 'PostController@destroy',

	'as'  => 'post.delete'

]);
/******** Trashed Post Retrieve data which you delete *******/
Route::get('/post/trashed',[

	'uses' => 'PostController@trashed',

	'as'  => 'post.trashed'

]);

/********* Kill From Trashed ************/
Route::get('/post/kill/{id}',[

	'uses' => 'PostController@kill',

	'as'  => 'post.kill'

]);

/************ Restore trashed ****/ 
Route::get('/post/restore/{id}',[

	'uses' => 'PostController@restore',

	'as'  => 'post.restore'

]);

/***************** Edit Post *******************/
Route::get('/post/edit/{id}',[

	'uses' => 'PostController@edit',

	'as'  => 'post.edit'

]);
Route::post('/post/update/{id}',[

	'uses' => 'PostController@update',

	'as'  => 'post.update'

]);
/*************************************************************************/

/******** Category CURD *************/

 Route::get('/category/create',[

		'uses' => 'CategoriesController@create',

		'as' =>   'category.create'

	]);

 Route::post('/category/store',[

		'uses' => 'CategoriesController@store',

		'as' =>   'category.store'

	]);
/* show editi delete */

 Route::get('/categories',[

		'uses' => 'CategoriesController@index',

		'as' =>   'categories'

	]);

Route::get('/category/edit/{id}',[

		'uses' => 'CategoriesController@edit',

		'as' =>   'category.edit'

	]);

Route::post('/category/update/{id}',[

		'uses' => 'CategoriesController@update',

		'as' =>   'category.update'

	]);



Route::get('/category/delete/{id}',[

		'uses' => 'CategoriesController@destroy',

		'as' =>   'category.delete'

	]);

/************************************************************/
/****************** Tag CRUD ***************************/
 Route::get('/tags',[

		'uses' => 'TagsController@index',

		'as' =>   'tags'

	]);


  Route::get('/tags/create',[

		'uses' => 'TagsController@create',

		'as' =>   'tag.create'

	]);

    Route::post('/tags/store',[

		'uses' => 'TagsController@store',

		'as' =>   'tag.store'

	]);

  Route::get('/tag/edit/{id}',[

		'uses' => 'TagsController@edit',

		'as' =>   'tag.edit'

	]);

    Route::post('/tag/update/{id}',[

		'uses' => 'TagsController@update',

		'as' =>   'tag.update'

	]);

	Route::get('/tag/delete/{id}',[

		'uses' => 'TagsController@destroy',

		'as' =>   'tag.delete'

	]);


/****************************************************/
/***************** user **************/
 Route::get('/users',[

		'uses' => 'UsersController@index',

		'as' =>   'users'

	]);

  Route::get('/users/create',[

		'uses' => 'UsersController@create',

		'as' =>   'user.create'

	]);


   Route::post('/users/store',[

		'uses' => 'UsersController@store',

		'as' =>   'user.store'

	]);
/************* Make User admin or not **********/

    Route::get('/users/admin/{id}',[

		'uses' => 'UsersController@admin',

		'as' =>   'user.admin'

	]);

	Route::get('/users/not-admin/{id}',[

		'uses' => 'UsersController@not_admin',

		'as' =>   'user.not.admin'

	]);

	Route::get('/users/delete/{id}',[

		'uses' => 'UsersController@destroy',

		'as' =>   'user.delete'

	]);
/**************************************************************/
/********* Profile *****************/
Route::get('/user/profile',[

		'uses' => 'ProfileController@index',

		'as' =>   'user.profile'

	]);


Route::post('/users/profile/update',[

	'uses' => 'ProfileController@update',

	'as' =>   'user.update.profile'

]);

/*************************************************************/

/*********** Settings *************/
Route::get('/setting',[

		'uses' => 'SettingsController@index',

		'as' =>   'setting.index'

	]);

Route::post('/setting/update',[

		'uses' => 'SettingsController@update',

		'as' =>   'setting.update'

	]);


});

/*********************************************************************/
/************ Font End Controller ***************/

Route::get('/',[

	'uses' =>'FronteEndController@index',
	'as'   => 'index'
]);
/*********** for single post *************/

Route::get('/post/{slug}',[

	'uses' => 'FronteEndController@singlePost',
	'as'  => 'post.single'

]);

Route::get('/category/{id}',[

		'uses' => 'FronteEndController@category',
		'as'   => 'category.single'
 
]);

/**************** tag post to show in page *******/

Route::get('/tag/{id}',[

        'uses' => 'FronteEndController@tag',
		'as'   => 'tag.single'

]);


/***********************************************************/
/************* Route search ****************/

Route::get('/results',function(){

$post = \App\Post::where('title','like','%'.request('query').'%')->get();

return view('results')->with('posts',$post)
                     ->with('title','Search Result :'.request('query'))/* to get title of site */
			         ->with('setting',\App\Setting::first()) /* to make footer */
		              ->with('categories',\App\Category::take(4)->get())
		              ->with('query',request('query'));

});
