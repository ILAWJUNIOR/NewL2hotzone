<?php

Auth::routes();
Route::group(['middleware' => ['guest']], function () {
    Route::get('/costa', 'backend\Auth\LoginController@getLoginForm');
    Route::get('costa/login', 'backend\Auth\LoginController@getLoginForm');
    Route::post('costa/authenticate', 'backend\Auth\LoginController@authenticate');

    Route::get('costa/register', 'backend\Auth\RegisterController@getRegisterForm');
    Route::post('costa/saveregister', 'backend\Auth\RegisterController@saveRegisterForm');
});

Route::group(['middleware' => ['admin']], function () {
    Route::get('costa', 'backend\AdminController@dashboard');

    Route::get('costa/dashboard', 'backend\AdminController@dashboard');
    Route::post('costa/logout', 'backend\Auth\LoginController@getLogout');
    Route::get('costa/server/add', 'backend\AdminController@add_new_server');
    Route::get('costa/server/list', 'backend\AdminController@server_list');
    Route::get('costa/server/edit/{server}', 'backend\AdminController@server_edit');
    Route::post('costa/server_update', 'backend\AdminController@server_update');
    Route::get('costa/banner/list', 'backend\AdminController@banner_list');
    Route::get('costa/advertisement/edit/{server}', 'backend\AdminController@advertisement_edit');
    Route::post('costa/advertisement_update', 'backend\AdminController@advertisement_update');
    Route::get('costa/server/active/{server}', 'backend\AdminController@server_active');
    Route::get('costa/server/inactive/{server}', 'backend\AdminController@server_inactive');
    Route::post('costa/server/delete', 'backend\AdminController@server_delete');
    Route::get('costa/advertisement/active/{server}', 'backend\AdminController@advertisement_active');
    Route::get('costa/advertisement/inactive/{server}', 'backend\AdminController@advertisement_inactive');
    Route::get('costa/advertisement/ad-active/{server}', 'backend\AdminController@ad_active');
    Route::get('costa/advertisement/banner-advertisement-add-active/{server}', 'backend\AdminController@banner_advertisement_add_active');
    Route::get('costa/premium-advertisement/premium-advertisement-add-active/{server}', 'backend\AdminController@premium_advertisement_add_active');

    Route::post('costa/advertisement/delete', 'backend\AdminController@advertisement_delete');
    Route::get('costa/payment/list', 'backend\AdminController@payment_list');

    Route::get('costa/stream/active/{id}', 'backend\AdminController@stream_active');
    Route::get('costa/stream/inactive/{id}', 'backend\AdminController@stream_inactive');
    Route::get('costa/stream/reactive/{id}', 'backend\AdminController@stream_reactive');
    Route::get('costa/stream/delete/{id}', 'backend\AdminController@stream_delete');

    Route::get('costa/stream/edit/{id}', 'backend\AdminController@stream_edit');
    Route::post('costa/stream_update/{id}', 'backend\AdminController@stream_update');

    Route::get('costa/banner-advertisement/list', 'backend\AdminController@text_banner_lsiting');
    Route::get('costa/banner-advertisement/edit/{server}', 'backend\AdminController@banner_advertisement_edit');
    Route::post('costa/banner_advertisement_update', 'backend\AdminController@banner_advertisement_update');
    Route::get('costa/banner-advertisement/active/{server}', 'backend\AdminController@banner_advertisement_active');
    Route::get('costa/banner-advertisement/inactive/{server}', 'backend\AdminController@banner_advertisement_inactive');
    Route::post('costa/banner-advertisement/delete', 'backend\AdminController@banner_advertisement_delete');
    Route::get('costa/premium-advertisement/list', 'backend\AdminController@premium_banner_lsiting');

    Route::get('costa/premium-advertisement/edit/{server}', 'backend\AdminController@premium_advertisement_edit');
    Route::post('costa/premium-advertisement_update', 'backend\AdminController@premiumadvertisement_update');
    Route::post('costa/premium-advertisement/delete', 'backend\AdminController@premium_advertisement_delete');

    Route::get('costa/premium-advertisement/active/{server}', 'backend\AdminController@premium_banner_active');
    Route::get('costa/premium-advertisement/inactive/{server}', 'backend\AdminController@premium_banner_inactive');

    Route::get('costa/stream-advertisement/list', 'backend\AdminController@streamlisting');
    Route::get('costa/advertisement-options/list', 'backend\AdminController@advertisement_options');

     Route::get('costa/textoptions/edit/{id}', 'backend\AdminController@textoptions_edit');
    Route::post('costa/textoptions_update', 'backend\AdminController@textoptions_update');
    Route::get('costa/textoptions/active/{server}', 'backend\AdminController@textoptions_active');
    Route::get('costa/textoptions/inactive/{server}', 'backend\AdminController@textoptions_inactive');
    Route::post('costa/textoptions/delete', 'backend\AdminController@textoptions_delete');

    Route::get('costa/check_expired', 'backend\AdminController@check_expired');
    Route::get('costa/reviews/list', 'backend\AdminController@reviews');
    Route::get('costa/reviews/active/{server}', 'backend\AdminController@reviews_active');
    Route::get('costa/reviews/inactive/{server}', 'backend\AdminController@reviews_inactive');
    Route::post('costa/reviews/delete', 'backend\AdminController@reviews_delete');

    //User Manage
    Route::get('costa/members','backend\AdminController@user_members');
    Route::post('costa/members/ban','backend\AdminController@ban_members');
    Route::get('costa/members/edit/{member_id}','backend\AdminController@edit_members');
    Route::post('costa/members/edit','backend\AdminController@edit_members_details');
    Route::post('costa/members/delete','backend\AdminController@delete_members_details');
    Route::post('costa/members/updatecoin','backend\AdminController@update_members_coin_details');
    Route::get('costa/member_search','backend\AdminController@serachmembers');

    //Log Management
    Route::get('costa/redirection_server_list','backend\AdminController@redirection_server_log');
});
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
Route::get('/posts/{post}', 'Viewservers@posts_details');
Route::get('/', 'Viewservers@homepage')->name('welcome');
Route::get('/demo', 'Viewservers@demo')->name('demo');
Route::get('/serverinfo/{id}/{servername}', 'Viewservers@serverdetail')->name('serverdetail')->where(['id'=>'[0-9]+', 'servername' => '^[a-zA-Z0-9._ -]+']);
Route::post('addreview', 'Viewservers@addreview')->name('addreview');
Route::get('/alllineage2servers', 'Viewservers@allTopserver');
Route::get('/premiumservers', 'Viewservers@premium');
Route::get('/newservers', 'Viewservers@newServer');
Route::get('/comingservers', 'Viewservers@comingserver');
Route::get('/searchservers', 'Viewservers@searchserver');
Route::get('lineagerstream', 'Viewservers@lineagerstream');

Route::get('/addserver', function () {
    return view('addserver');
})->name('addserver');

// -----------------------Login Route --------------------------------
  // server
Route::group(['prefix' => 'createServer', 'middleware'=>'authenticate'], function () {
    Route::get('/free', function () {
        return view('server.serverForm');
    })->name('newserver');
    Route::post('/free', 'server@store')->name('free');
    Route::post('/servestore', 'server@store')->name('free');
    // premium server
    Route::group(['prefix' => 'premium'], function () {
        Route::get('/buy', 'server@buy')->name('buypremium');
        Route::post('/buy', 'server@buyconfirm')->name('purchaseserver');
        Route::get('/confirm', 'server@buynow')->name('confirmation');
    });
    Route::post('/premium', 'server@store')->name('premium');
});
Route::get('/mypremiumserver', 'server@myPremium')->middleware('authenticate')->name('premiumdashboard');

Route::get('/vote/{token}', 'server@vote')->middleware('authenticate')->name('votetoken');
Route::get('/vote/id/{serverid}', 'server@voteview')->middleware('authenticate')->name('voteview');
Route::post('/vote/id/{serverid}', 'server@votemanage')->middleware('authenticate');

// -----------------------------advertising --------------------------------//

Route::get('/advertising', 'Banneradd@advertising')->middleware('authenticate')->name('advertising');
// Route::get('/advertising', 'Banneradd@advertising');
// --------------------------- banner add -------------------------------//
Route::group(['prefix' => 'ads'], function () {
    Route::get('/', 'Banneradd@index')->middleware('authenticate')->name('ads');
    Route::post('/', 'Banneradd@confirm')->middleware('authenticate')->name('confirm');
    Route::get('/confirm', 'Banneradd@creatadd')->middleware('authenticate')->name('creatadd');
    Route::get('/myBanneradd', 'Banneradd@myBanneradd')->middleware('authenticate')->name('myBanneradd');
    // Route::get('/myBanneradd', 'Banneradd@myBanneradd');
});

Route::get('stream', 'Banneradd@stream')->middleware('authenticate');
Route::post('stream', 'Banneradd@stream_confirm')->middleware('authenticate');
Route::get('mystream', 'Banneradd@mystream')->middleware('authenticate');
Route::get('/buystream/confirm', 'Banneradd@buystream')->middleware('authenticate');

/*Route::group(['prefix' => 'stream','middleware' => 'authenticate' ], function () {
  Route::get('stream','Banneradd@stream')->name('stream');
  }*/
// --------------------------- banner add -------------------------------//
//-------------------------------Text -------------------------------------------//
Route::group(['prefix' => 'text', 'middleware' => 'authenticate'], function () {
    Route::get('/', 'Text@index')->name('text');
    Route::post('/', 'Text@pindex')->name('ptext');
    Route::get('/confirm', 'Text@textConfirm')->name('Tconfirm');
    Route::get('/my', 'Text@myTextadd')->name('mytextads');
});
// Route::get('/premium',function(){ echo 'premium' ;})->middleware('authenticate')->name('premium');;

// -----------------------------advertising end here--------------------------------//

  // authenicated routes
  // Route::get('lowamount', function(){ return view('lowAmount'); })->middleware('authenticate');
  // payment routes

  Route::get('/buycoins', 'Pay@index')->middleware('authenticate')->name('buycoins');
  Route::post('/buycoins', 'Money@bugcoins')->middleware('authenticate')->name('p.buycoins');

  Route::post('/buycoins/confirm', 'Pay@payconfirm')->middleware('authenticate')->name('payconfirm');

  Route::post('/paypal_notification', 'Pay@payResponse');

Route::get('/server-list', 'server@index')->middleware('authenticate')->name('userseverlist');
// Route::get('/server-list', 'server@index')->middleware('authenticate');
// Route::get('/server-list', 'server@index')->middleware('authenticate');
Route::get('/server/{serverid}/edit', 'server@edit')->middleware('authenticate')->name('editserver');
// server update

Route::post('/server/update/status', 'server@updateStatus')->middleware('authenticate');
Route::post('/server/update/ip', 'server@updateIp')->middleware('authenticate');
Route::post('/server/update/settings', 'server@updateSettings')->middleware('authenticate');
Route::post('/server/update/description', 'server@updateDescription')->middleware('authenticate');
Route::post('/server/update/news', 'server@updateNews')->middleware('authenticate');
Route::post('/server/update/reward', 'server@updateReward')->middleware('authenticate');
Route::post('/server/update/premium', 'server@updatePremium')->middleware('authenticate');
Route::post('/server/update/platformtype', 'server@updatePlatformtype')->middleware('authenticate');
Route::post('/server/{serverid}/update/premium', 'server@updatePremium')->middleware('authenticate');

Route::post('/server/delete/news', 'server@deleteNews')->middleware('authenticate');
Route::post('/server/display/news', 'server@displayNews')->middleware('authenticate');
/*Route::post('/server/{serverid}/update/status', 'server@updateStatus')->middleware('authenticate');
Route::post('/server/{serverid}/update/ip', 'server@updateIp')->middleware('authenticate');
Route::post('/server/{serverid}/update/settings', 'server@updateSettings')->middleware('authenticate');
Route::post('/server/{serverid}/update/description', 'server@updateDescription')->middleware('authenticate');
Route::post('/server/{serverid}/update/news', 'server@updateNews')->middleware('authenticate');
Route::post('/server/{serverid}/update/reward', 'server@updateReward')->middleware('authenticate');
Route::post('/server/{serverid}/update/premium', 'server@updatePremium')->middleware('authenticate');
Route::post('/server/{serverid}/update/platformtype', 'server@updatePlatformtype')->middleware('authenticate');*/

// server update end here
Route::post('/server/{serverid}/delete', 'server@destroy')->middleware('authenticate')->name('deleterver');
Route::post('/Re-generate_api_key', 'server@new_api_key')->middleware('authenticate')->name('new_api_key');
// Route::post('/check_ip','ApiController@check_api');

Route::get('/api.php','ApiController@check_api');

Route::post('lang','Viewservers@changeLang');

