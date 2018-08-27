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

Route::get('/home', 'IndexController@indexPage')->name('home');
Route::get('/', 'IndexController@indexPage')->name('index');//首页

Route::get('/user/{user_id}','UserController@userPage')->name('userPage');//用户页面

Route::get('/posts/{posts_id}','IndexController@postsPage')->name('postsPage');//文章页面
Route::get('/tags/{tagName}','TagsController@tagsPage')->name('tagsPage');//标签页面
Route::get('/explore/tags','TagController@tagsExplorePage');//探索标签

Route::group(['prefix' => '/home/posts/', 'middleware' => 'throttle:60,5'], function () {
    Route::get('add', 'PostsController@addPostsPage');//添加文章
    Route::post('add', 'PostsController@addPostsAction');//添加操作
    Route::get('edit/{posts_id}', 'PostsController@editPostsPage');//编辑文章页面
    Route::post('edit', 'PostsController@editPostsAction');//编辑文章操作
    Route::get('show', 'PostsController@showPostsPage');//文章列表
    Route::post('del', 'PostsController@delPostsAction');//删除文章

    Route::post('comment/add','CommentController@addCommentPostsAction');
    Route::get('comment/add','IndexController@indexPage');//临时debug
});
Route::group(['prefix' => '/home/', 'middleware' => 'throttle:30,5'], function () {
    Route::get('user/setting','HomeController@userSettingPage');
    Route::post('user/setting','HomeController@userSettingAction');
});

Route::post('/posts/zans/{posts_id}', 'ZansController@postsZansAction');//文章点赞
Route::get('/explore','IndexController@explorePage');//探索页面
Route::get('/back/error','ErrorNumBackController@backPage');//一些错误返回