<?php

use App\Http\Controllers\Front\AboutCompanyController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

/*******************************************************************************/
/**********************************start front part*********************************/
/*******************************************************************************/

Route::group(
    [
        'namespace' => 'Front',
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ //...

    Route::get('/dashboard', 'HomeController@index')->name('home');


    Route::resource('about-company', 'AboutCompanyController');
    Route::resource('apply', 'ApplyController');
    Route::resource('news', 'NewsController');
    Route::resource('project', 'ProjectController');
    Route::resource('main', 'MainController');
    Route::resource('footer', 'FooterController');
    Route::post('employees_store' , 'EmployeeController@StoreEmployees')->name('employees_front.store');






    Route::get('/home2', function () {
        return view('home');
    });

});

/*******************************************************************************/
/**********************************end front part*********************************/
/*******************************************************************************/








/*******************************************************************************/
/********************************start admin part*******************************/
/*******************************************************************************/

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

Auth::routes();



// routes/web.php

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' , 'auth' ]
    ], function(){ //...

    Route::get('/dashboard', 'HomeController@index')->name('home');
    Route::resource('about_company', 'Admin\AboutCompanyController');
    Route::resource('constructions', 'Admin\ConstructionController');
    Route::resource('roads', 'Admin\RoadController');
    Route::resource('electrics', 'Admin\ElectricController');
    Route::resource('landscapes', 'Admin\LandscapeController');
    Route::resource('carousels', 'Admin\CarouselController');
    Route::resource('carousels_attributes', 'Admin\CarouselAttributeController');
    Route::resource('employees', 'Admin\EmployeeController');
    Route::resource('groups', 'Admin\GroupOfNewsController');
    Route::resource('newss', 'Admin\NewsController');
    Route::resource('managers', 'Admin\ManagersController');
    Route::resource('footers', 'Admin\FooterController');
    Route::resource('clients', 'Admin\ClientController');



    /**************************video route****************/
    Route::post('videoStore/{carousel}' , 'Admin\CarouselAttributeController@videoStore')->name('videoStore');




    /********************************employees**************/
    Route::get('accepted_employees' , 'Admin\EmployeeController@acceptedEmployees');
    Route::get('unseen_employees' , 'Admin\EmployeeController@unseenEmployees');
    Route::get('postponed_employees' , 'Admin\EmployeeController@postponedEmployees');
    Route::get('rejected_employees' , 'Admin\EmployeeController@rejectedEmployees');



    /**********search routes*****************/
    Route::get('search/construction' , 'Admin\ConstructionController@search')->name('search');
    Route::get('search/road' , 'Admin\RoadController@search')->name('search');
    Route::get('search/electric' , 'Admin\ElectricController@search')->name('search');
    Route::get('search/landscape' , 'Admin\LandscapeController@search')->name('search');
    Route::get('search/carousels' , 'Admin\CarouselController@search')->name('search');
    Route::get('search/employee' , 'Admin\EmployeeController@search')->name('search');
    Route::get('search/group' , 'Admin\GroupOfNewsController@search')->name('search');
    Route::get('search/news' , 'Admin\NewsController@search')->name('search');
    Route::get('search/manager' , 'Admin\ManagersController@search')->name('search');
    Route::get('search/client' , 'Admin\ClientController@search')->name('search');
    Route::get('search/carousels_attribute' , 'Admin\CarouselAttributeController@search')->name('search');




//    Route::get('/home2', function () {
//        return view('home');
//    });

//    Route::get('/grades', function () {
//        return view('admin.Grades');
//    })->name('Grades.store');
//    Route::get('/grades/u', function () {
//        return view('admin.Grades');
//    })->name('Grades.update');
//    Route::get('/grades/u/d', function () {
//        return view('admin.Grades');
//    })->name('Grades.destroy');


    });
/*******************************************************************************/
/********************************end admin part*******************************/
/*******************************************************************************/






