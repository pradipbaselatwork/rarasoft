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

// Route for front
Route::get('/', 'HomeController@index')->name('home');

Route::post('/contact-us', 'ContactController@addContact')->name('contact');

Route::get('/pages{url?}', 'HomeController@nav')->name('page');


// Route::get('/services', 'HomeController@servicehome')->name('home.services');
// Route::get('/projects', 'HomeController@projecthome')->name('home.projects');
// Route::get('/contact-us', 'HomeController@contacthome')->name('home.contact.us');
// Route::get('/about-us', 'HomeController@abouthome')->name('home.about.us');
// Route::get('/our-team', 'HomeController@ourteamhome')->name('home.our.team');

Route::prefix('/admin')->namespace('Admin')->as('admin.')->group(function(){
    // return 'dfds';
    //all the admin route we are going to add here :-
    Route::match(['get','post'],'/','AdminController@login');

    Route::group(['middleware'=>['admin']],function(){
        Route::get('dashboard','AdminController@dashboard');
        Route::get('settings','AdminController@settings');
        Route::get('logout','AdminController@logout');
        Route::post('check-current-pwd','AdminController@chkCurrentPassword');
        Route::post('update-current-pwd','AdminController@updateCurrentPassword');
        Route::match(['get','post'],'update-admin-details','AdminController@updateAdminDetails');


        // allbanner 
        Route::get('allbanner', 'AllbannerController@Allbanner')->name('allbanner');
        Route::match(['get', 'post'], 'add-edit-allbanner/{id?}', 'AllbannerController@addEditAllbanner')->name('add.edit.allbanner');
        // Route::get('delete-allbanner-image/{id?}', 'AllbannerController@deleteAllbanner')->name('delete.allbanner.image');
        Route::get('delete-allbanner/{id?}', 'AllbannerController@deleteAllbanner')->name('delete.allbanner');

        // navbar 
        Route::get('navbar', 'NavbarController@Navbar')->name('navbar');
        Route::post('update-navbar-status', 'NavbarController@updateNavbarStatus')->name('update.navbar.status');
        Route::match(['get', 'post'], 'add-edit-navbar/{id?}', 'NavbarController@addEditNavbar')->name('add.edit.navbar');
        Route::get('delete-navbar/{id?}', 'NavbarController@deleteNavbar')->name('delete.navbar');

        // banner 
        Route::get('banner', 'BannerController@Banner')->name('banner');
        Route::match(['get', 'post'], 'add-edit-banner/{id?}', 'BannerController@addEditBanner')->name('add.edit.banner');
        Route::get('delete-banner-image/{id?}', 'BannerController@deleteBannerImage')->name('delete.banner.image');
        Route::get('delete-banner/{id?}', 'BannerController@deleteBanner')->name('delete.banner');

        // about 
        Route::get('about', 'AboutController@About')->name('about');
        Route::match(['get', 'post'], 'add-edit-about/{id?}', 'AboutController@addEditAbout')->name('add.edit.about');
        Route::get('delete-about-image/{id?}', 'AboutController@deleteAboutImage')->name('delete.about.image');
        Route::get('delete-about/{id?}', 'AboutController@deleteAbout')->name('delete.about');

        
        // ourteam 
        Route::get('ourteam', 'OurteamController@Ourteam')->name('ourteam');
        Route::match(['get', 'post'], 'add-edit-ourteam/{id?}', 'OurteamController@addEditOurteam')->name('add.edit.ourteam');
        Route::get('delete-ourteam-image/{id?}', 'OurteamController@deleteOurteamImage')->name('delete.ourteam.image');
        Route::get('delete-ourteam/{id?}', 'OurteamController@deleteOurteam')->name('delete.ourteam');
        

        // font 
        Route::get('font', 'FontController@Font')->name('font');
        Route::match(['get', 'post'], 'add-edit-font/{id?}', 'FontController@addEditFont')->name('add.edit.font');
        Route::get('delete-font-image/{id?}', 'FontController@deleteFontImage')->name('delete.font.image');
        Route::get('delete-font/{id?}', 'FontController@deleteFont')->name('delete.font');

        // company 
        Route::get('company', 'CompanyController@company')->name('company');
        Route::match(['get', 'post'], 'add-edit-company/{id?}', 'CompanyController@addEditCompany')->name('add.edit.company');
        Route::get('delete-company-image/{id?}', 'CompanyController@deleteCompanyImage')->name('delete.company.image');
        Route::get('delete-company/{id?}', 'CompanyController@deleteCompany')->name('delete.company');

        // profession
        Route::get('profession', 'ProfessionController@Profession')->name('profession');
        Route::match(['get', 'post'], 'add-edit-profession/{id?}', 'ProfessionController@addEditProfession')->name('add.edit.profession');
        Route::get('delete-profession-image/{id?}', 'ProfessionController@deleteProfessionImage')->name('delete.profession.image');
        Route::get('delete-profession/{id?}', 'ProfessionController@deleteProfession')->name('delete.profession');

        // service
        Route::get('service', 'ServiceController@Service')->name('service');
        Route::match(['get', 'post'], 'add-edit-service/{id?}', 'ServiceController@addEditService')->name('add.edit.service');
        // Route::get('delete-service-image/{id?}', 'ServiceController@deleteServiceImage')->name('delete.service.image');
        Route::get('delete-service/{id?}', 'ServiceController@deleteService')->name('delete.service');

        // business
        Route::get('business', 'BusinessController@Business')->name('business');
        Route::match(['get', 'post'], 'add-edit-business/{id?}', 'BusinessController@addEditBusiness')->name('add.edit.business');
        Route::get('delete-business/{id?}', 'BusinessController@deleteBusiness')->name('delete.business');

        // project 
        Route::get('project', 'ProjectController@Project')->name('project');
        Route::match(['get', 'post'], 'add-edit-project/{id?}', 'ProjectController@addEditProject')->name('add.edit.project');
        Route::get('delete-project-image/{id?}', 'ProjectController@deleteProjectImage')->name('delete.project.image');
        Route::get('delete-project/{id?}', 'ProjectController@deleteProject')->name('delete.project');

        // footer
        Route::match(['get','post'],'edit-footer/{id?}', 'FooterController@editFooter')->name('edit.footer');
    });
});


