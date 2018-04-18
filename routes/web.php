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

//Route::get('/', 'HomeController@showLandingPage')->name('landing.page');

//Route::get('/', function () {
   // return view('welcome');
//});

Route::get('/', 'Auth\RegisterController@showRegistrationForm')->name('register');

Route::get('/ref/{phone}', 'Auth\RegisterController@showRegistrationForm')->name('register');



Auth::routes();

Route::get('/about-us', 'HomeController@about')->name('about-us');


Route::get('/testimonies', 'HomeController@showTestimonies')->name('testimonies');

Route::get('/contact-us', 'HomeController@showContactForm')->name('contact-us');

Route::post('/contact-us', 'HomeController@submitContactForm')->name('contact-us.submit');

Route::get('/faqs', 'HomeController@faqs')->name('faqs');

Route::get('/how-it-works', 'HomeController@hiw')->name('hiw');




Route::get('/activate_user/{id}', 'Auth\RegisterController@showActivationForm')->name('activate.user');

Route::post('/activate_user', 'Auth\RegisterController@activateUser')->name('activate.user.submit');

Route::get('/reVerify/{id}', 'Auth\RegisterController@reVerify')->name('activate.user.reverify');






//remove this when done
Route::get('/reVerify', 'Auth\RegisterController@reVerify')->name('user.ph.create');
//remove this when done
Route::get('/reVerify', 'Auth\RegisterController@showRegistrationForm')->name('terms');




Route::get('/user/error/blocked', function () {
   return view('dashboard.error.blocked');
})->name('user.error.blocked');


Route::get('/user/error/suspended', function () {
   return view('dashboard.error.suspended');
})->name('user.error.suspended');




Route::group(['middleware'=>['auth','isSuspended', 'isBlocked']], function(){

	Route::get('/user/profile', 'Dashboard\ProfileController@index')->name('user.profile');

	Route::post('/user/profile', 'Dashboard\ProfileController@update')->name('user.profile.update');

});


Route::group(['middleware'=>['auth', 'completeProfile', 'isSuspended', 'isBlocked']], function(){

	Route::get('/home', 'Dashboard\HomeController@index')->name('home');

	Route::get('/user/profile-view', 'Dashboard\ProfileController@view')->name('user.profile.view');

	Route::get('/user/help/provide', 'Dashboard\PhController@showPhForm')->name('user.help.provide');

	Route::post('/user/help/provide', 'Dashboard\PhController@create')->name('user.help.provide.submit');

	Route::get('/user/wallet', 'Dashboard\WalletController@view')->name('user.wallet');

	Route::get('/user/help/recommit/{id}', 'Dashboard\PhController@showRcForm')->name('user.help.recommit');

	Route::post('/user/help/recommit', 'Dashboard\PhController@createRc')->name('user.help.recommit.submit');

	//get help

	Route::get('/user/help/get/{id}', 'Dashboard\GhController@getHelp')->name('user.help.get');

	Route::get('/user/merges/imergedetailspher/{id}', 'Dashboard\MergeController@viewImergeDetailsPher')->name('user.merges.imergedetailspher');

	Route::get('/user/merges/imergedetailsgher/{id}', 'Dashboard\MergeController@viewImergeDetailsGher')->name('user.merges.imergedetailsgher');


	Route::get('/user/merges/insurance/flag/{id}', 'Dashboard\MergeController@flagInsurance')->name('user.merge.insurance.flag');

	Route::get('/user/merges/insurance/confirm/{id}', 'Dashboard\MergeController@confirmInsurance')->name('user.merge.insurance.confirm');

	Route::get('/user/merges/insurance/extendtime/{id}', 'Dashboard\MergeController@extendTimeForInsurance')->name('user.merge.insurance.extendtime');

	Route::post('/user/merges/insurance/hash/submit', 'Dashboard\MergeController@uploadHash')->name('user.merge.insurance.hash.submit');


	Route::post('/user/merges/insurance/teller/submit', 'Dashboard\MergeController@uploadTeller')->name('user.merge.insurance.teller.submit');

	//for reamining

	Route::get('/user/merges/rimergedetailspher/{id}', 'Dashboard\MergeController@RviewImergeDetailsPher')->name('user.merges.rimergedetailspher');

	Route::get('/user/merges/rimergedetailsgher/{id}', 'Dashboard\MergeController@RviewImergeDetailsGher')->name('user.merges.rimergedetailsgher');


	Route::get('/user/merges/remaining/flag/{id}', 'Dashboard\MergeController@flagRemaining')->name('user.merge.remaining.flag');

	Route::get('/user/merges/remaining/confirm/{id}', 'Dashboard\MergeController@confirmRemaining')->name('user.merge.remaining.confirm');



	Route::get('/user/merges/remaining/default/{id}', 'Dashboard\MergeController@defaultRemaining')->name('user.merge.remaining.default');


	Route::get('/user/merges/insurance/default/{id}', 'Dashboard\MergeController@defaultInsurance')->name('user.merge.insurance.default');

	//process ggp
	Route::get('/user/ggp/pick/{id}', 'Dashboard\MergeController@ggpPick')->name('user.ggp.pick');



	Route::get('/user/merges/remaining/extendtime/{id}', 'Dashboard\MergeController@extendTimeForRemaining')->name('user.merge.remaining.extendtime');

	Route::post('/user/merges/remaining/hash/submit', 'Dashboard\MergeController@uploadHashForRemaining')->name('user.merge.remaining.hash.submit');


	Route::post('/user/merges/remaining/teller/submit', 'Dashboard\MergeController@uploadTellerForRemaining')->name('user.merge.remaining.teller.submit');




	Route::get('/user/bonus/reg', 'Dashboard\BonusController@viewReg')->name('user.bonus.reg');

	Route::get('/user/bonus/ref', 'Dashboard\BonusController@viewRef')->name('user.bonus.ref');

	Route::get('/user/wallet/view', 'Dashboard\WalletController@view')->name('user.wallet.view');

	Route::get('/user/news/list', 'Dashboard\NewsController@list')->name('user.news.list');

	Route::get('/user/news/view/{id}', 'Dashboard\NewsController@view')->name('user.news.view');

	Route::get('/user/testimony/view', 'Dashboard\TestimonyController@view')->name('user.testimony.view');

	Route::get('/user/testimony/create', 'Dashboard\TestimonyController@showCreateForm')->name('user.testimony.create');

	Route::post('/user/testimony/create', 'Dashboard\TestimonyController@create')->name('user.testimony.create.submit');


	Route::get('/user/bonus/reg/cashout/{id}', 'Dashboard\BonusController@cashoutReg')->name('user.bonus.reg.cashout');


	Route::get('/user/bonus/ref/cashout/{id}', 'Dashboard\BonusController@cashoutRef')->name('user.bonus.ref.cashout');



});

















Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');

Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');





Route::group(['middleware'=>['auth:admin']], function(){

	Route::get('/admin/home', 'Admin\HomeController@index')->name('admin.home');

}); 




Route::group(['middleware'=>['auth:admin', 'superadmin']], function(){

	Route::get('/admin/register', 'Auth\AdminRegisterController@showRegisterForm')->name('admin.register');

	Route::post('/admin/register', 'Auth\AdminRegisterController@register')->name('admin.register.submit');

	Route::get('/admin/user/detele/{id}', 'Admin\UserController@delete')->name('admin.user.delete');

	Route::get('/admin/user/update/{id}', 'Admin\UserController@showUpdateForm')->name('admin.user.update');

	Route::post('/admin/user/update', 'Admin\UserController@update')->name('admin.user.update.submit');

	Route::get('/admin/user/block/{id}', 'Admin\UserController@block')->name('admin.user.block');

	Route::get('/admin/user/unblock/{id}', 'Admin\UserController@unblock')->name('admin.user.unblock');

	Route::get('/admin/user/suspend/{id}', 'Admin\UserController@suspend')->name('admin.user.suspend');

	Route::get('/admin/user/unsuspend/{id}', 'Admin\UserController@unsuspend')->name('admin.user.unsuspend');

	Route::get('/admin/user/verify/{id}', 'Admin\UserController@verify')->name('admin.user.verify');

	Route::get('/admin/user/list', 'Admin\UserController@list')->name('admin.user.list');

	Route::get('/admin/message/', 'Admin\MessageController@list')->name('admin.message');

	Route::get('/admin/message/view/{id}', 'Admin\MessageController@view')->name('admin.message.view');

	Route::get('/admin/message/delete/{id}', 'Admin\MessageController@delete')->name('admin.message.delete');



	Route::get('/admin/news/create', 'Admin\NewsController@showCreateForm')->name('admin.news.create');

	Route::post('/admin/news/create', 'Admin\NewsController@create')->name('admin.news.create.submit');

	Route::get('/admin/news/list', 'Admin\NewsController@list')->name('admin.news.list');

	Route::get('/admin/news/view/{id}', 'Admin\NewsController@view')->name('admin.news.view');

	Route::get('/admin/news/delete/{id}', 'Admin\NewsController@delete')->name('admin.news.delete');






	Route::get('/admin/stats', 'Admin\StatsController@index')->name('admin.stats');




	Route::get('/admin/ph/list/{filterBy}', 'Admin\PhController@list')->name('admin.ph.list');

	Route::get('/admin/ph/view/{id}', 'Admin\PhController@view')->name('admin.ph.view');

	Route::get('/admin/ph/delete/{id}', 'Admin\PhController@delete')->name('admin.ph.delete');


	Route::get('/admin/gh/list/{filterBy}', 'Admin\GHController@list')->name('admin.gh.list');

	Route::get('/admin/gh/view/{id}', 'Admin\GHController@view')->name('admin.gh.view');

	Route::get('/admin/gh/delete/{id}', 'Admin\GHController@delete')->name('admin.gh.delete');



	



	//dowpaymet receiver

	

	Route::get('/admin/etndpr/{id}', 'Admin\UserController@makeETNDPR')->name('admin.etndpr');

	Route::get('/admin/ethdpr/{id}', 'Admin\UserController@makeETHDPR')->name('admin.ethdpr');

	Route::get('/admin/lcdpr/{id}', 'Admin\UserController@makeLCDPR')->name('admin.lcdpr');


	Route::get('/admin/user/dpr/{filterBy}', 'Admin\UserController@listDPR')->name('admin.user.dpr.list');


	//merge insurance

	Route::get('/admin/merge/list/{filterBy}', 'Admin\MergeController@list')->name('admin.merge.list');

	Route::get('/admin/merge/downpaymet/{ph_id}', 'Admin\MergeDownPaymentController@showDPR')->name('admin.merge.downpayment');


	Route::post('/admin/merge/downpaymet/merge', 'Admin\MergeDownPaymentController@merge')->name('admin.merge.downpayment.merge');

	//merge remaining
//showDPR
	Route::get('/admin/merge/remaining/{gh_id}', 'Admin\MergeRemainingController@showAvailablePH')->name('admin.merge.remaining');


	Route::post('/admin/merge/reamining/merge', 'Admin\MergeRemainingController@merge')->name('admin.merge.remaining.merge');



	//merge common routes

	Route::get('/admin/unmergeinsurance/{id}', 'Admin\MergeController@unmergeInsurance')->name('admin.unmergeinsurance');

	Route::get('/admin/merge/confirminsurance/{id}', 'Admin\MergeController@confirmInsurance')->name('admin.merge.confirminsurance');

	Route::get('/admin/unmergeremaining/{id}', 'Admin\MergeController@unmergeRemaining')->name('admin.unmergeremaining');

	Route::get('/admin/merge/confirmremaining/{id}', 'Admin\MergeController@confirmRemaining')->name('admin.merge.confirmremaining');



	//config


	Route::get('/admin/config/lc', 'Admin\ConfigController@showFormLc')->name('admin.config.lc');

	Route::post('/admin/config/lc', 'Admin\ConfigController@updateLC')->name('admin.config.lc.update');


	Route::get('/admin/config/eth', 'Admin\ConfigController@showFormETH')->name('admin.config.eth');

	Route::post('/admin/config/eth', 'Admin\ConfigController@updateETH')->name('admin.config.eth.update');


	Route::get('/admin/config/etn', 'Admin\ConfigController@showFormETN')->name('admin.config.etn');

	Route::post('/admin/config/etn', 'Admin\ConfigController@updateETN')->name('admin.config.etn.update');



	Route::get('/admin/testimony/create', 'Admin\TestimonyController@showCreateForm')->name('admin.testimony.create');

	Route::post('/admin/testimony/create', 'Admin\TestimonyController@create')->name('admin.testimony.create.submit');

	Route::get('/admin/testimony/delete/{id}', 'Admin\TestimonyController@delete')->name('admin.testimony.delete');

	Route::get('/admin/testimony/approve/{id}', 'Admin\TestimonyController@approve')->name('admin.testimony.approve');

	Route::get('/admin/testimony/list', 'Admin\TestimonyController@list')->name('admin.testimony.list');



});



//cron routes


Route::get('/admin/merge/insurance/payment/timeout', 'Admin\MergeController@takeActionOnPaymentTimeOutForInsurance')->name('admin.merge.insurance.payment.timeout');

Route::get('/admin/merge/insurance/payment/flag', 'Admin\MergeController@takeActionOnPaymentFlaggedForInsurance')->name('admin.merge.insurance.payment.flag');


Route::get('/admin/merge/insurance/payment/autoconfirm', 'Admin\MergeController@autoconfirmUnflaggedPaymentsForInsurance')->name('admin.merge.insurance.payment.autoconfirm');


//for remaining
Route::get('/admin/merge/remaining/payment/timeout', 'Admin\MergeController@takeActionOnPaymentTimeOutForRemaining')->name('admin.merge.remaining.payment.timeout');

Route::get('/admin/merge/remaining/payment/flag', 'Admin\MergeController@takeActionOnPaymentFlaggedForRemaining')->name('admin.merge.remaining.payment.flag');


Route::get('/admin/merge/remaining/payment/autoconfirm', 'Admin\MergeController@autoconfirmUnflaggedPaymentsForRemaining')->name('admin.merge.remaining.payment.autoconfirm');


Route::get('/admin/investmentperiod', 'Admin\InvestmentPeriodController@addPeriod')->name('admin.investment.period.add');

Route::get('/admin/growinvestment', 'Admin\GrowthController@addGrowth')->name('admin.investment.grow');


Route::get('/admin/domart', 'Admin\GrowthController@deleteDomartAccount')->name('admin.domart.delete');




