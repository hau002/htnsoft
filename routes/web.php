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

//-------------------User client-----------------------------------------

Route::group(['prefix'=>'/','middleware'=>['localization']],function(){

	 //---------------------Trang chủ-------------------------------
	Route::get('/','HomeController@Home')->name('home');
    
    //------------------Sản phẩm------------------------------------
	Route::get('chi-tiet-san-pham/{slug}','ProjectController@ProjectDetail')->name('product-detail');
    
    //------------------Tin tức------------------------------------
	Route::get('tin-tuc','BlogController@index')->name('blog');
	Route::get('tin-tuc/danh-muc/{slug}','BlogController@Category')->name('category-news');	
	Route::get('tin-tuc/tim-kiem','BlogController@Search')->name('search-news');	
	Route::get('ban-tin/{slug}','BlogController@detail')->name('single-blog');	
	Route::post('comment','BlogController@CmtBlog')->name('cmt-blog');
	// Route::post('/','BlogController@deleteCmt')->name('delete-cmt');

    //------------------Liên hệ--------------------------------------
	Route::post('luu-lien-he','AdminController@SaveContact')->name('save-contact');

	 // ------------------Authentication-----------------------------
	Route::get('/admin','UserController@Login')->name('login')->middleware('checkLogout');
	Route::post('/login','UserController@getLogin')->name('getLogin');
	Route::get('/logout','UserController@Logout')->name('logout');
	Route::get('/change-language/{language}', 'UserController@changeLanguage')->name('change-language');

	



});


// -------------------------Admin Panel--------------------------------------------------
Route::group(['prefix'=>'admin','as'=>'admin.','middleware'=>['checkLogin','localization']],function(){

	//-----------------------------Trang chủ------------------
	Route::get('trang-chu','AdminController@Home')->name('home');

	//-----------------------------Quản lý người dùng---------- 
	Route::get('/danh-sach-tai-khoan','AdminController@ManageUsers')->name('manage-users');
	Route::get('/them-moi-tai-khoan','AdminController@CreateUsers')->name('create-users');
	Route::post('/luu-tai-khoan','UserController@SaveUsers')->name('save-users');
	Route::get('/xoa-tai-khoan/{id}','UserController@DeleteUsers')->name('delete-users');
	
	Route::get('/them-moi-danh-muc-tin-tuc','AdminController@NewsCate')->name('news-cate');
	Route::get('tat-ca-danh-muc-tin-tuc','AdminController@AllNewsCate')->name('all-news-cate');
	Route::post('luu-danh-muc-tin-tuc','AdminController@SaveNewsCate')->name('save-news-cate');
	Route::get('sua-danh-muc-tin-tuc/{id}','AdminController@editNewsCate')->name('edit-news-cate');
	Route::post('cap-nhat-danh-muc-tin-tuc','AdminController@updateNewsCate')->name('update-news-cate');
	Route::get('xóa-danh-muc-tin-tuc/{id}','AdminController@deleteNewsCate')->name('delete-news-cate');

	Route::get('/them-moi-tin-tuc','AdminController@News')->name('news');
	Route::get('quan-ly-tat-ca-tin-tuc','AdminController@AllNews')->name('all-news');
	Route::post('luu-tin-tuc','AdminController@SaveNews')->name('save-news');
	Route::get('sua-tin-tuc/{id}','AdminController@editNews')->name('edit-news');
	Route::post('cap-nhat-tin-tuc','AdminController@updateNews')->name('update-news');
	Route::get('xóa-tin-tuc/{id}','AdminController@deleteNews')->name('delete-news');
	Route::get('chi-tiet-tin-tuc/{slug}','AdminController@detailNews')->name('detail-news');

	Route::get('/them-moi-danh-muc-san-pham','ProjectController@ProjectCate')->name('project-cate');
	Route::get('tat-ca-danh-muc-san-pham','ProjectController@AllProjectCate')->name('all-project-cate');
	Route::post('luu-danh-muc-san-pham','ProjectController@SaveProjectCate')->name('save-project-cate');
	Route::get('sua-danh-muc-san-pham/{id}','ProjectController@editProjectCate')->name('edit-project-cate');
	Route::post('cap-nhat-danh-muc-san-pham','ProjectController@updateProjectCate')->name('update-project-cate');
	Route::get('xóa-danh-muc-san-pham/{id}','ProjectController@deleteProjectCate')->name('delete-project-cate');

	Route::get('/them-moi-san-pham','ProjectController@Project')->name('project');
	Route::get('quan-ly-tat-ca-san-pham','ProjectController@AllProject')->name('all-project');
	Route::post('luu-san-pham','ProjectController@SaveProject')->name('save-project');
	Route::get('sua-san-pham/{id}','ProjectController@editProject')->name('edit-project');
	Route::post('cap-nhat-san-pham','ProjectController@updateProject')->name('update-project');
	Route::get('xóa-san-pham/{id}','ProjectController@deleteProject')->name('delete-project');

	
	Route::get('danh-sach-lien-he','AdminController@AllContact')->name('all-contact');

	Route::get('cai-dat-website','AdminController@SettingWebsite')->name('setting-website');
	Route::post('luu-cai-dat-website','AdminController@SaveSettingWebsite')->name('save-setting-website');
	


	// //-----------------------------Quản lý danh mục sản phẩm---------- 
	// Route::get('/danh-sach-danh-muc','AdminController@ListCate')->name('list-cate');
	// Route::get('/them-moi-danh-muc','AdminController@AddNewCate')->name('addnew-cate');

	// //-----------------------------Quản lý sản phẩm---------- 
	// Route::get('/danh-sach-san-pham','AdminController@ListProject')->name('list-project');
	// Route::get('/them-moi-san-pham','AdminController@AddNewProject')->name('addnew-project');

});



