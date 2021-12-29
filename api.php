<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//UI  Login API
use App\Http\Controllers\API\LoginController;

//UI  Forget Password API
use App\Http\Controllers\API\ForgetPasswordController;

//UI Category List APIs
use App\Http\Controllers\API\UserController;
//UI Ca
use App\Http\Controllers\API\CategoryController;

//UI Registration API & Admin Dashboard CRUD API
use App\Http\Controllers\API\VendorRegisterController;
use App\Http\Controllers\API\AgentRegisterController;
use App\Http\Controllers\API\IconRegisterController;


//Stripe Payment Gateway
use App\Http\Controllers\API\StripePaymentController;

//Admin Login API  and Update Password
use App\Http\Controllers\API\AdminLoginController;

//UI Sate Category API
use App\Http\Controllers\API\StateCategoryController;

// Admin DashBoard Country CRUD API
use App\Http\Controllers\API\MasterCountryController;

// Admin DashBoard State CRUD API
use App\Http\Controllers\API\MasterStateController;

// Admin DashBoard Categories CRUD API
use App\Http\Controllers\API\MasterCategoriesController;

//Admin DashBoard Forum CRUD API
use App\Http\Controllers\API\ForumController;

//Activity Report
use App\Http\Controllers\API\ActivityController;

//Order History
use App\Http\Controllers\API\OrderHistoryController;

//notifiction
use App\Http\Controllers\API\NotificationsController;

use App\Http\Controllers\API\tempcontroller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//UI Login API
Route::post('login', [LoginController::class, 'login']);

//Forget Passsword API
Route::post('forget_password_mail', [ForgetPasswordController::class, 'SentMail']);
Route::post('forget_password', [ForgetPasswordController::class, 'ForgetPassword']);

//User Role
Route::get('role', [UserController::class, 'index']);
Route::post('add_role', [UserController::class, 'store']);
Route::get('edit_role/{id}', [UserController::class, 'edit']);
Route::put('update_role', [UserController::class, 'update']);
Route::delete('delete_role/{id}', [UserController::class, 'destory']);


//Vendor Create and Update  APIs
Route::get('vendor', [VendorRegisterController::class, 'index']);
Route::post('mail', [VendorRegisterController::class, 'mailsend']);
Route::post('vendorregister', [VendorRegisterController::class, 'store']);
Route::post('upload_image', [VendorRegisterController::class, 'upload_image']);
Route::get('edit_vendor/{id}', [VendorRegisterController::class, 'edit']);
Route::put('update_vendor/{id}' , [VendorRegisterController::class, 'update']);

//Agent Create and Update  APIs
Route::get('agent', [AgentRegisterController::class, 'index']);
Route::post('agentregister', [AgentRegisterController::class, 'store']);
Route::get('edit_agent/{id}', [AgentRegisterController::class, 'edit']);
Route::put('update_agent/{id}', [AgentRegisterController::class, 'update']);

//Icon Create and Update  APIs
Route::get('icon', [IconRegisterController::class, 'index']);
Route::post('iconregister', [IconRegisterController::class, 'store']);
Route::get('edit_icon/{id}', [IconRegisterController::class, 'edit']);
Route::put('update_icon/{id}', [IconRegisterController::class, 'update']); 

//UI Category List APIs
Route::get('category', [CategoryController::class, 'index']);

//Stripe Payment Gateway
Route::post('payment', [StripePaymentController::class, 'payment']);


//UI state Ctegory LIst APIs
//Route::post('state_category', [StateCategoryController::class, 'usercategory']);
Route::post('selectstatecategory', [StateCategoryController::class, 'usercategory']);
Route::get('selectcategoryuser/{name}', [StateCategoryController::class, 'userlist']);

//Admin Login and Update Password API
Route::post('adminlogin', [AdminLoginController::class, 'login']);
Route::post('updatepassword', [AdminLoginController::class, 'PasswordUpdate']);


//Master Country CURD APIs
Route::get('country', [MasterCountryController::class, 'index']);
Route::post('add_country', [MasterCountryController::class, 'store']);
Route::get('edit_country/{id}', [MasterCountryController::class, 'edit']);
Route::put('update_country/{id}', [MasterCountryController::class, 'update']);
Route::delete('delete_country/{id}', [MasterCountryController::class, 'destory']);

//Master State CURD APIs
Route::get('state', [MasterStateController::class, 'index']);
Route::post('add_state', [MasterStateController::class, 'store']);
Route::get('edit_state/{id}', [MasterStateController::class, 'edit']);
Route::put('update_state/{id}', [MasterStateController::class, 'update']);
Route::delete('delete_state/{id}', [MasterStateController::class, 'destory']);

//Master Category CURD APIs

Route::get('master_category', [MasterCategoriesController::class, 'index']);
Route::post('add_categories', [MasterCategoriesController::class, 'store']);
Route::get('edit_categories/{id}', [MasterCategoriesController::class, 'edit']);
Route::put('update_categories/{id}', [MasterCategoriesController::class, 'update']);
Route::delete('delete_category/{id}', [MasterCategoriesController::class, 'destory']);

//Master ForumGroup CURD APIs Admin
Route::get('forumgroup', [ForumController::class, 'ForumGroup_index']);
Route::post('add_forumgroup', [ForumController::class, 'ForumGroup_store']);
Route::get('edit_forumgroup/{id}', [ForumController::class, 'ForumGroup_edit']);
Route::put('update_forumgroup/{id}', [ForumController::class, 'ForumGroup_update']);
Route::delete('delete_forumgroup/{id}', [ForumController::class, 'ForumGroup_destory']);

//Join ForumGroup  APIs UI
Route::get('forum', [ForumController::class, 'Forum_index']);
Route::get('forum_add/{action}', [ForumController::class, 'Forum_store']);
Route::delete('forum_leave/{id}', [ForumController::class, 'Forum_leave']);


//newly added Forum group notifications 
Route::get('notifications', [NotificationsController::class, 'Notifications_index']);
Route::get('viewnotifications', [NotificationsController::class, 'Notifications_view']);
Route::get('badgescountnotifications', [NotificationsController::class, 'Notifications_badges_count']);
Route::get('updatenotifications', [NotificationsController::class, 'Notifications_updatenotify']);

Route::get('temp',[tempcontroller::class, 'tempcall']);

//Forum Post 
Route::get('post', [ForumController::class, 'Post_index']);

//Add Post
Route::post('add_post', [ForumController::class, 'Post_store']);




//Forum comments 
Route::get('comment', [ForumController::class, 'Comment_index']);
//Add Comment POst
Route::post('add_comment', [ForumController::class, 'Comment_store']);

//Add Comment Reply
Route::post('add_commentreply', [ForumController::class, 'Commentreply_store']);

//Forum post.,comment,commentrply LIkes 
Route::get('likes/{action}', [ForumController::class, 'like']);



//Order History
Route::get('order_histroy/{name}', [OrderHistoryController::class, 'index']);

//Ativity Report
//Vendor Report
Route::get('vendor_report/', [ActivityController::class, 'VendorActivity']);

//Agent Report
Route::get('agent_report/', [ActivityController::class, 'AgentActivity']);
//Account Activity Report 
Route::get('accountactivity/{name}', [ActivityController::class, 'AccountActivity']);
//User Activity Report 
Route::get('useractivity/{name}', [ActivityController::class, 'UserActivity']);
//Route::get('useractivity/{id}', [ActivityController::class, 'RoleUserActivity']);

//Category Activity Report 
Route::get('categoryactivity/{name}', [ActivityController::class, 'CategoryActivity']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
