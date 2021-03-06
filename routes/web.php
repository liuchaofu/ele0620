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

Route::get('/', function () {
    return view('welcome');
});


Route::domain("admin.ele.com")->namespace("Admin")->group(function () {

    //region 后台用户
    #后台用户登录
    Route::any('admin/login', "AdminController@login")->name('admin.login');
    #后台用户退出
    Route::get('admin/logout', "AdminController@logout")->name('admin.logout');
    #用户更改密码
    Route::any('admin/changePassword', "AdminController@changePassword")->name('admin.changePassword');
    #后台用户列表
    Route::get('admin/index', "AdminController@index")->name('admin.index');
    #后台用户添加
    Route::any('admin/add', "AdminController@add")->name('admin.add');
    #后台用户删除
    Route::get('admin/del/{id}', "AdminController@del")->name('admin.del');
//endregion
    //region 店铺分类
    //店铺分类 App\Http\Controllers\Admin
    Route::get('shop_category/index', "ShopCategoryController@index")->name('shop_cate.index');
    Route::get('shop_category/del/{id}', "ShopCategoryController@del")->name('shop_cate.del');
    //endregion
    //region 店铺管理
    #店铺列表
    Route::get('shop/index', "ShopController@index")->name('admin.shop.index');
    Route::any('shop/add/{userId}', "ShopController@add")->name('admin.shop.add');
    #删除店铺
    Route::get('shop/del/{id}', "ShopController@del")->name('admin.shop.del');
    //通过审核
    Route::get('shop/changeStatus/{id}', "ShopController@changeStatus")->name('admin.shop.changeStatus');
    //endregion
    //region 商家用户
    //商家用户管理
    Route::get('user/index', "UserController@index")->name('admin.user.index');
    //endregion


});


Route::domain("shop.ele.com")->namespace("Shop")->group(function () {


    //region 商户首页
    Route::get("index/index", "IndexController@index")->name("shop.index.index");
    //endregion
    //region 用户列表
    Route::get("user/index", "UserController@index")->name("shop.user.index");
    Route::any("user/reg", "UserController@reg")->name("shop.user.reg");
    Route::any("user/login", "UserController@login")->name("shop.user.login");
    //endregion

    //region 店铺管理
    Route::any("shop/add", "ShopController@add")->name("shop.shop.add");

    //endregion

});