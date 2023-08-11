<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', 'WebsiteController@index');
Route::get('/resume', 'WebsiteController@resume');
Route::get('/blog', 'WebsiteController@blog');
Route::get('/blog-detail/{slug}', 'WebsiteController@blog_detail');
Route::get('/contact', 'WebsiteController@contact');

Route::post('/send-contact', 'WebsiteController@create_contact');

Route::get('/login', 'AdminViewController@login');
Route::get('/td-admin', 'AdminViewController@dashboard');
Route::get('/td-admin/all-blog', 'AdminViewController@blog');
Route::get('/td-admin/create-blog', 'AdminViewController@create_blog');
Route::get('/td-admin/edit-blog/{id}', 'AdminViewController@edit');
Route::get('/td-admin/introduction', 'AdminViewController@introduction');
Route::get('/td-admin/what-doing', 'AdminViewController@doing');

Route::get('/td-admin/testimonial', 'AdminViewController@testimonial');
Route::get('/td-admin/education', 'AdminViewController@education');
Route::get('/td-admin/experience', 'AdminViewController@experience');
Route::get('/td-admin/skill', 'AdminViewController@skill');



Route::post('/auth-pass', 'AuthController@login');
Route::post('/create-post', 'AdminController@create_post');
Route::post('/edit-post/{id}', 'AdminController@edit_post');
Route::get('/get_all_blog', 'AdminController@get_all');
Route::get('/get_all_doing', 'AdminController@get_all_doing');
Route::get('/delete_post/{id}', 'AdminController@delete_post');
Route::get('/delete_doing/{id}', 'AdminController@delete_doing');
Route::post('/edit-what-doing/{id}', 'AdminController@edit_doing');

Route::post('/change-introduction', 'AdminController@change_introduction');
Route::post('/save-what-doing', 'AdminController@save_doing');

