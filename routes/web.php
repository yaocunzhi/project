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
    //echo '这是路由';
   // echo date("Y-m-d H:i:s");
   // 获取配置信息
  //echo Config::get("app.timezone");
   // Config::set("app.locale","cn");
   // echo Config::get("app.locale");
   // 获取快速配置文件信息
    // /echo env("DB_PORT");
});


//后台登录 退出
Route::resource('/adminlogin','admin\AdminloginController');

Route::group(['middleware'=>'adminlogin'],function(){
//后台首页
Route::resource("admin",'Admin\AdminController');
//会员模型
Route::resource('/user','Admin\UserController');
//会员详情
Route::get('/userinfo/{id}','Admin\UserController@userinfo');
//收货地址
Route::get('/useradd/{id}','Admin\UserController@useradd');
//后台无线分类模块
Route::resource('/admincate','Admin\CateController');
//后台管理员
Route::resource('/adminuser','Admin\AdminuserController');
//角色分配的信息
Route::get('/userrole/{id}','Admin\AdminuserController@userrole');
//保存角色的信息
Route::post("/saverole",'Admin\AdminuserController@saverole');
//角色管理
Route::resource('/adminrole','Admin\RoleController');
//权限分配
Route::get('/adminauth/{id}','Admin\RoleController@adminauth');
// 保存权限
Route::post('/saveauth','Admin\RoleController@saveauth');
 //权限管理
Route::resource('/auth','Admin\AuthController');
//公告管理
Route::resource('/dexte','Admin\DexteController');
 //公告用ajax删除
Route::get('/dextedel','Admin\DexteController@del');
//后台商品模块
Route::resource('/adminshop','Admin\ShopController');
//轮播图管理
Route::resource('/adminlunbo','Admin\LunboController');
//友情链接
Route::resource('/adminlink','Admin\linkController');
//后台订单管理
Route::resource('/adminorder',"Admin\AdminOrderController");
//广告
Route::resource('/guang','Admin\GuangController');
//评价管理
Route::resource('/pingjia','Admin\pingjiaController');

});


//邮件测试发送原始的字符串
Route::get('/sendmail','Home\RegisterController@sendmail');
//发送视图
Route::get('/sendmail1','Home\RegisterController@sendmail1');
//激活用户
Route::get('/jihuo','home\RegisterController@jihuo');
//验证码
Route::get('/code','home\RegisterController@code');
//前台邮件注册页面
Route::resource('/homeregister','Home\RegisterController');
//手机号码注册
Route::post('/registerphone','Home\RegisterController@registerphone');
//检测手机号码是否唯一
Route::get('/checkphone','Home\RegisterController@checkphone');
//发送短信验证
Route::get('/registersendphone','Home\RegisterController@registersendphone');
//检测校验码
Route::get('/checkcode','Home\RegisterController@checkcode');
//邮箱登录
Route::resource('/homelogin','Home\HomeloginController');
//找回密码
Route::get('/forget','Home\HomeloginController@forget');
Route::post('/doforget','Home\HomeloginController@doforget');
//加载密码重置模板
Route::get('/reset','Home\HomeloginController@reset');
Route::post('/doreset','Home\HomeloginController@doreset');

//前台首页模块
Route::resource('/homeindex','Home\IndexController');
//分词搜素
Route::get('/homefen','Home\IndexController@homefen');

//详情页减
Route::get('/infojian','Home\IndexController@infojian');
Route::group(["middleware"=>"login"],function(){
// 购物详情页
Route::resource('/homecart','Home\CartController');
//删除购物框
Route::get('/alldelete','Home\CartController@alldelete');
//数量减操作
Route::get('/cartupdatee','Home\CartController@cartupdatee');
//数量加操作
Route::get('/cartupdate','Home\CartController@cartupdate');
//勾选的商品
Route::get('/carttot','Home\CartController@carttot');
//结算页面
Route::get('/jiesuan','Home\OrderController@jiesuan');
Route::get("/homeoder/inster","Home\OrderController@inster");
//获取城市级联数据
Route::get("/address","Home\AddressController@address");
//插入收货地址
Route::post("/addressinsert","Home\AddressController@insert");
//切换默认地址
Route::get("/choose","Home\AddressController@choose");
//下单
Route::any('/order/create','Home\OrderController@ordercreate');
//支付跳转也页面
Route::get('/returnurl','Home\OrderController@returnurl');
//订单管理
Route::resource("/personal","Home\PersonalController");
//评价
Route::get("/pinlun/create/{id}","Home\PinlunController@create");
Route::resource("/pinlun","Home\PinlunController");
//Route::('/evaluate/{id}','Home\PersonalController@evaluate');
// Route::get('/evalin/{id}',"Home\PersonalController@evalin");
});

//登录退出
Route::get('/homelogout','Home\IndexController@homelogout');


