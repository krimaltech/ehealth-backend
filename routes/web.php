<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ActivateStudentController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookingListController;
use App\Http\Controllers\BookingReviewController;
use App\Http\Controllers\BookServiceController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CancelReasonController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyDetailsController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DoctorListController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\DoctorProfileController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InsuranceClaimController;
use App\Http\Controllers\InsuranceController;
use App\Http\Controllers\KnowYourCustomerController;
use App\Http\Controllers\MedicalReportController;
use App\Http\Controllers\AmbulanceController;
use App\Http\Controllers\BecomePrimaryMemberController;
use App\Http\Controllers\BookingNotificationController;
use App\Http\Controllers\BookLabtestController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\CampaignEmployeeController;
use App\Http\Controllers\CampaignUserController;
use App\Http\Controllers\CheckVersionController;
use App\Http\Controllers\CompanySchoolProfileController;
use App\Http\Controllers\DeactivateStudentController;
use App\Http\Controllers\DeathClaimController;
use App\Http\Controllers\DeathInsuranceClaimController;
use App\Http\Controllers\DeliveriesController;
use App\Http\Controllers\DieticianScreeningFormController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\DoctorScreeningAdviceController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\OurServiceController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PackageFeeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UploadMedicalHistoryConsultationController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\TeamCategoryController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserMedicalReportController;
use App\Http\Controllers\UserPackageController;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ViewNotFound;
use App\Http\Controllers\WebNotificationController;
use App\Http\Controllers\ExpoAndEventController;
use App\Http\Controllers\FitnessPricingController;
use App\Http\Controllers\FitnessTypeController;
use App\Http\Controllers\FrequentlyAskedQuestionController;
use App\Http\Controllers\GdFeedbackController;
use App\Http\Controllers\Newsportal\GalleryController;
use App\Http\Controllers\ReferralController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\IncentiveManagerController;
use App\Http\Controllers\IndividualSampleController;
use App\Http\Controllers\InvestorController;
use App\Http\Controllers\JobSkillController;
use App\Http\Controllers\LabDepartmentController;
use App\Http\Controllers\LabPackageController;
use App\Http\Controllers\LabProfileController;
use App\Http\Controllers\LabTestController;
use App\Http\Controllers\ManualNotificationController;
use App\Http\Controllers\MedicalSupportController;
use App\Http\Controllers\MemberLeaveRequestController;
use App\Http\Controllers\Newsportal\NewsController;
use App\Http\Controllers\Newsportal\AdvertisementController;
use App\Http\Controllers\Newsportal\MenuController;
use App\Http\Controllers\Newsportal\VideoController;
use App\Http\Controllers\NurseBookingController;
use App\Http\Controllers\NurseBookingReportController;
use App\Http\Controllers\NurseController;
use App\Http\Controllers\NurseListController;
use App\Http\Controllers\NurseShiftController;
use App\Http\Controllers\OnlineConsultationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailsController;
use App\Http\Controllers\OrderMailController;
use App\Http\Controllers\PackageListController;
use App\Http\Controllers\PackageScreeningTeamController;
use App\Http\Controllers\PackageSliderController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PdfReportController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PrimaryMemberRequestController;
use App\Http\Controllers\RejectReportController;
use App\Http\Controllers\RelationManagerController;
use App\Http\Controllers\RemoveFamilyRequestController;
use App\Http\Controllers\ReportProblemController;
use App\Http\Controllers\ReportSubjectController;
use App\Http\Controllers\RequestScreeningController;
use App\Http\Controllers\ROController;
use App\Http\Controllers\RoleUserController;
use App\Http\Controllers\ScreeningReviewController;
use App\Http\Controllers\ScreeningTeamController;
use App\Http\Controllers\ScreeningTestController;
use App\Http\Controllers\SubRoleController;
use App\Http\Controllers\SymptomController;
use App\Http\Controllers\TermConditionController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\UploadTestReportController;
use App\Http\Controllers\VendorAdvertisementController;
use App\Http\Controllers\VendorSliderController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SampleDropTeamController;
use App\Http\Controllers\SampleNotCollectedController;
use App\Http\Controllers\SkipSampleController;
use App\Http\Controllers\WebAnalyticsController;
use App\Http\Controllers\ImportExportController;
use App\Http\Controllers\NurseScreeningFormController;
use App\Http\Controllers\DentalScreeningFormController;
use App\Http\Controllers\PhysiotherapistScreeningFormController;
use App\Http\Controllers\DoctorScreeningFormController;
use App\Http\Controllers\InsuranceTypeController;
use App\Http\Controllers\OnlineDoctorConsultationController;
use App\Http\Controllers\OphthalmologistScreeningFormController;
use App\Http\Controllers\PackageInsuranceCoverageController;
use App\Http\Controllers\ScreeningRecommendFilesController;
use App\Http\Controllers\VerifyDateController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/',  function () {
    return view('welcome');
});

Auth::routes();
Route::get('/403-not-allowed', [ViewNotFound::class, 'viewnotfound'])->name('view.viewnotfound');
Route::get('/employee/account/verify/{token}', 'App\Http\Controllers\APIController\UserAuthController@resendEmployeeVerifyToken')->name('employee.resend')->middleware('auth');;
Route::get('send-mail', [OrderMailController::class, 'index']);
Route::group(['prefix' => '/admin',  'middleware' => ['auth', 'admin']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/getchange-password', [HomeController::class, 'showChangePasswordGet'])->name('getchange.password');
    Route::post('/change-password', [HomeController::class, 'changePassword'])->name('change.password');
    Route::get('/authentication-log', [HomeController::class, 'authenticationlog'])->name('authentication.log');
    Route::get('/logs', [HomeController::class, 'log'])->name('log');
    Route::get('/fetchdistrict/{id}', [HomeController::class, 'fetchdistrict'])->name('fetchdistrict');
    Route::get('/fetchmun/{id}', [HomeController::class, 'fetchmun'])->name('fetchmun');
    Route::get('/fetchward/{id}', [HomeController::class, 'fetchward'])->name('fetchward');

    Route::group(['prefix' => '/partner', 'middleware' => 'auth', 'at_least_two_role'], function () {
        Route::get('/switch-roles', [PartnerController::class, 'switchRole'])->name('partner.index');
        Route::get('/change-roles', [PartnerController::class, 'changeRole'])->name('partner.changerole');
    });

    Route::group(['prefix' => '/companydetails', 'middleware' => 'auth'], function () {
        Route::get('/', [CompanyDetailsController::class, 'index'])->name('details.index');
        Route::get('/edit/{id}', [CompanyDetailsController::class, 'edit'])->name('details.edit');
        Route::patch('/update/{id}', [CompanyDetailsController::class, 'update'])->name('details.update');
        Route::patch('/upload/{id}', [CompanyDetailsController::class, 'upload'])->name('ebrochure');
        Route::get('/show/{id}', [CompanyDetailsController::class, 'show'])->name('details.show');
        Route::get('/information', [CompanyDetailsController::class, 'information'])->name('details.information');
    });
    //Company School Profile
    Route::group(['prefix' => '/company-profile', 'middleware' => 'auth'], function () {
        Route::get('/', [CompanySchoolProfileController::class, 'index'])->name('company-profile.index');
        Route::get('/create', [CompanySchoolProfileController::class, 'create'])->name('company-profile.create');
        Route::post('/store', [CompanySchoolProfileController::class, 'store'])->name('company-profile.store');
        // Route::get('/edit/{id}', [CompanySchoolProfileController::class, 'edit'])->name('company-profile.edit');
        Route::patch('/update/{id}', [CompanySchoolProfileController::class, 'update'])->name('company-profile.update');
        Route::get('/show/{id}', [CompanySchoolProfileController::class, 'show'])->name('company-profile.show');
        Route::patch('/verify/{id}', [CompanySchoolProfileController::class, 'verify_profile'])->name('company-profile.verify_profile');
        Route::patch('/reject/{id}', [CompanySchoolProfileController::class, 'reject_profile'])->name('company-profile.reject');
        Route::post('/upload/{id}', [CompanySchoolProfileController::class, 'upload'])->name('company-profile.upload');
        Route::get('/verify/{id}', [CompanySchoolProfileController::class, 'verify'])->name('company-profile.verify');
        Route::patch('/reject-csv/{id}', [CompanySchoolProfileController::class, 'reject_csv'])->name('company-profile.reject_csv');
    });

    Route::group(['prefix' => '/about', 'middleware' => 'auth'], function () {
        Route::get('/', [AboutController::class, 'index'])->name('about.index');
        Route::get('/create', [AboutController::class, 'create'])->name('about.create');
        Route::post('/store', [AboutController::class, 'store'])->name('about.store');
        Route::get('/edit/{id}', [AboutController::class, 'edit'])->name('about.edit');
        Route::patch('/update/{id}', [AboutController::class, 'update'])->name('about.update');
    });

    Route::group(['prefix' => '/ro', 'middleware' => 'auth'], function () {
        Route::get('/', [ROController::class, 'index'])->name('ro.index');
        Route::get('/edit/{id}', [ROController::class, 'edit'])->name('ro.edit');
        Route::patch('/update/{id}', [ROController::class, 'update'])->name('ro.update');
    });

    //member route
    Route::group(['prefix' => '/member', 'middleware' => 'auth'], function () {
        Route::get('/', [MemberController::class, 'index'])->name('member.index');
        Route::get('/create', [MemberController::class, 'create'])->name('member.create');
        Route::post('/store', [MemberController::class, 'store'])->name('member.store');
        Route::get('/edit/{slug}', [MemberController::class, 'edit'])->name('member.edit');
        Route::patch('/update/{slug}', [MemberController::class, 'update'])->name('member.update');
        Route::patch('/update-bp/{id}', [MemberController::class, 'updatebp'])->name('member.updatebp');
        Route::get('/upload/{id}', [MemberController::class, 'upload'])->name('member.upload');
        Route::get('/editupload/{id}', [MemberController::class, 'editupload'])->name('member.editupload');
        Route::post('/upload-store', [MemberController::class, 'uploadStore'])->name('member.uploadStore');
        Route::get('/view-report/{id}', [MemberController::class, 'view'])->name('member.viewReport');
    });
    Route::group(['prefix' => '/doctor-profile', 'middleware' => 'auth'], function () {
        Route::get('/', [DoctorProfileController::class, 'index'])->name('doctorprofile.index');
        Route::post('/store', [DoctorProfileController::class, 'store'])->name('doctorprofile.store');
        Route::get('/edit/{slug}', [DoctorProfileController::class, 'edit'])->name('doctorprofile.edit');
        Route::patch('/update/{slug}', [DoctorProfileController::class, 'update'])->name('doctorprofile.update');
    });
    Route::group(['prefix' => '/users', 'middleware' => 'auth'], function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/manage-users', [UserController::class, 'userIndex'])->name('users.users');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/store', [UserController::class, 'store'])->name('users.store');
        // Route::get('/show/{id}', [UserController::class, 'show'])->name('users.show');
        Route::get('/edit/{slug}', [UserController::class, 'edit'])->name('users.edit');
        Route::patch('/update/{slug}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/delete/{slug}', [UserController::class, 'destroy'])->name('users.delete');
        Route::get('/change-Status', [UserController::class, 'changeStatus'])->name('users.changeStatus');
        Route::get('/deactivate-employee/{id}', [UserController::class, 'deactivateEmployee'])->name('users.deactivateEmployee');
        Route::post('/activate-employee/{id}', [UserController::class, 'activateEmployee'])->name('users.activateEmployee');
        Route::get('/calorie-intake', [UserController::class, 'calorie'])->name('users.calorie');
        Route::post('/calorie-intake/calculate', [UserController::class, 'calculateCalorie'])->name('users.calculateCalorie');
        Route::get('/verification', [UserController::class, 'verification'])->name('users.verification');
        Route::get('/doctordetail', [UserController::class, 'doctordetail'])->name('users.doctordetail');
        Route::get('/nursedetails', [UserController::class, 'nursedetails'])->name('users.nursedetails');
        Route::get('/driverdetails', [UserController::class, 'driverdetails'])->name('users.driverdetails');
        Route::get('/vendordetail', [UserController::class, 'vendorDetail'])->name('users.vendordetail');
        Route::get('/relationmanagerdetail', [UserController::class, 'relationManagerDetails'])->name('users.relationmanagerdetail');
        Route::patch('/add-ms-code/{id}', [UserController::class, 'addMsCode'])->name('users.addmscode');
        Route::get('/vendor-show/{id}', [UserController::class, 'vendorShow'])->name('users.vendorshow');
        Route::get('/doctor-show/{id}', [UserController::class, 'doctorShow'])->name('users.doctorshow');
        Route::get('/nurse-show/{id}', [UserController::class, 'nurseShow'])->name('users.nurseshow');
        Route::get('/driver-show/{id}', [UserController::class, 'driverShow'])->name('users.drivershow');
        Route::get('/relation-manager-show/{id}', [UserController::class, 'relationManagerShow'])->name('users.relationmanagershow');
        Route::post('/vendorupload/{id}', [UserController::class, 'vendorUpload'])->name('users.vendorupload');
        Route::post('/nurse-upload/{id}', [UserController::class, 'doctorUpload'])->name('users.doctorupload');
        Route::post('/doctor-upload/{id}', [UserController::class, 'nurseUpload'])->name('users.nurseupload');
        Route::post('/driver-upload/{id}', [UserController::class, 'driverUpload'])->name('users.driverupload');
        Route::post('/relationmanager-upload/{id}', [UserController::class, 'relationManagerUpload'])->name('users.relationmanagerupload');
        Route::post('/roleupdate/{role}/{id}', [UserController::class, 'roleupdate'])->name('users.roleupdate');
        Route::get('/is-exculsive/{id}', [UserController::class, 'isExclusive'])->name('users.exclusive');
        Route::get('/is-normal/{id}', [UserController::class, 'isNormal'])->name('users.normal');
        Route::get('/vendor-agreement/{id}', [UserController::class, 'vendorAgreement'])->name('users.vendoragreement');
        Route::post('/approve-agreement', [UserController::class, 'approveAgreement'])->name('users.approveagreement');
    });
    Route::group(['prefix' => '/vendor-profile', 'middleware' => 'auth'], function () {
        Route::get('/', [VendorController::class, 'index'])->name('vendor.index');
        Route::get('/create', [VendorController::class, 'create'])->name('vendor.create');
        Route::post('/store', [VendorController::class, 'store'])->name('vendor.store');
        Route::get('/edit/{slug}', [VendorController::class, 'edit'])->name('vendor.edit');
        Route::patch('/update/{slug}', [VendorController::class, 'update'])->name('vendor.update');
    });
    Route::group(['prefix' => '/employee-profile', 'middleware' => 'auth'], function () {
        Route::get('/', [EmployeeController::class, 'index'])->name('employee.index');
        Route::get('/edit/{slug}', [EmployeeController::class, 'edit'])->name('employee.edit');
        Route::patch('/update/{slug}', [EmployeeController::class, 'update'])->name('employee.update');
    });
    Route::group(['prefix' => '/department', 'middleware' => 'auth'], function () {
        Route::get('/', [DepartmentController::class, 'index'])->name('department.index');
        Route::get('/create', [DepartmentController::class, 'create'])->name('department.create');
        Route::post('/store', [DepartmentController::class, 'store'])->name('department.store');
        Route::get('/edit/{id}', [DepartmentController::class, 'edit'])->name('department.edit');
        Route::patch('/update/{id}', [DepartmentController::class, 'update'])->name('department.update');
    });
    Route::group(['prefix' => '/slider', 'middleware' => 'auth'], function () {
        Route::get('/', [BannerController::class, 'index'])->name('banner.index');
        Route::get('/create', [BannerController::class, 'create'])->name('banner.create');
        Route::post('/store', [BannerController::class, 'store'])->name('banner.store');
        Route::get('/edit/{slug}', [BannerController::class, 'edit'])->name('banner.edit');
        Route::patch('/update/{slug}', [BannerController::class, 'update'])->name('banner.update');
        Route::delete('/destroy/{id}', [BannerController::class, 'destroy'])->name('banner.destroy');
    });
    Route::group(['prefix' => '/service', 'middleware' => 'auth'], function () {
        Route::get('/', [ServiceController::class, 'index'])->name('service.index');
        Route::get('/create', [ServiceController::class, 'create'])->name('service.create');
        Route::post('/store', [ServiceController::class, 'store'])->name('service.store');
        Route::get('/edit/{slug}', [ServiceController::class, 'edit'])->name('service.edit');
        Route::patch('/update/{slug}', [ServiceController::class, 'update'])->name('service.update');
        Route::get('/show/{slug}', [ServiceController::class, 'show'])->name('service.show');
    });
    Route::group(['prefix' => '/package', 'middleware' => 'auth'], function () {
        Route::get('/', [PackageController::class, 'index'])->name('package.index');
        Route::get('/create', [PackageController::class, 'create'])->name('package.create');
        Route::post('/store', [PackageController::class, 'store'])->name('package.store');
        Route::post('/check-slug', [PackageController::class, 'checkSlug'])->name('package.checkSlug');
        Route::get('/edit/{slug}', [PackageController::class, 'edit'])->name('package.edit');
        Route::patch('/update/{slug}', [PackageController::class, 'update'])->name('package.update');
        Route::patch('/update-seo/{slug}', [PackageController::class, 'updateSeo'])->name('package.updateSeo');
        Route::get('/show/{slug}', [PackageController::class, 'show'])->name('package.show');
        Route::patch('/consultation-type/{id}', [PackageController::class, 'consultationtype'])->name('package.consultationtype');
        Route::group(['prefix' => '/fee-details', 'middleware' => 'auth'], function () {
            Route::get('/create/{id}', [PackageFeeController::class, 'create'])->name('packagefee.create');
            Route::post('/store', [PackageFeeController::class, 'store'])->name('packagefee.store');
            Route::get('/edit/{id}', [PackageFeeController::class, 'edit'])->name('packagefee.edit');
            Route::patch('/update', [PackageFeeController::class, 'update'])->name('packagefee.update');
        });
        Route::group(['prefix' => '/screening-tests', 'middleware' => 'auth'], function () {
            Route::get('/', [ScreeningTestController::class, 'index'])->name('screeningtest.index');
            Route::get('/create/{package_id}', [ScreeningTestController::class, 'create'])->name('screeningtest.create');
            Route::get('/addfetchtest/{package_id}', [ScreeningTestController::class, 'addfetchtest'])->name('screeningtest.addfetch');
            Route::get('/editfetchtest/{package_id}', [ScreeningTestController::class, 'editfetchtest'])->name('screeningtest.editfetch');
            Route::post('/store', [ScreeningTestController::class, 'store'])->name('screeningtest.store');
            Route::get('/edit/{package_id}', [ScreeningTestController::class, 'edit'])->name('screeningtest.edit');
            Route::post('/update', [ScreeningTestController::class, 'update'])->name('screeningtest.update');
        });
    });
    Route::group(['prefix' => '/addfamily', 'middleware' => 'auth'], function () {
        Route::get('/', [FamilyController::class, 'index'])->name('addfamily.index');
        Route::get('/create', [FamilyController::class, 'create'])->name('addfamily.create');
        Route::post('/store', [FamilyController::class, 'store'])->name('addfamily.store');
        Route::get('/approved', [FamilyController::class, 'approved'])->name('addfamily.approved');
        Route::delete('/destroy/{id}', [FamilyController::class, 'destroy'])->name('users.destroy');
    });
    Route::group(['prefix' => '/my-package', 'middleware' => 'auth'], function () {
        Route::get('/', [UserPackageController::class, 'index'])->name('userpackage.index');
        Route::get('/show/{slug}', [UserPackageController::class, 'show'])->name('userpackage.show');
        Route::patch('/payment/{slug}', [UserPackageController::class, 'payment'])->name('userpackage.payment');
    });
    Route::group(['prefix' => '/upload-medical-history-consultation', 'middleware' => 'auth'], function () {
        Route::get('/{query?}', [UploadMedicalHistoryConsultationController::class, 'index'])->name('upload_medical_history_consultation.index');
        Route::get('/show/{id}', [UploadMedicalHistoryConsultationController::class, 'show'])->name('upload_medical_history_consultation.show');
        Route::patch('/{id}', [UploadMedicalHistoryConsultationController::class, 'upload'])->name('upload_medical_history_consultation.upload');
        Route::patch('/reject/{id}', [UploadMedicalHistoryConsultationController::class, 'reject_reason'])->name('upload_medical_history_consultation.reject_reason');
        Route::patch('/reject-reason-doctor/{id}', [UploadMedicalHistoryConsultationController::class, 'reject_reason_doctor'])->name('upload_medical_history_consultation.reject_reason_doctor');
        Route::patch('/assign-doctor/{id}', [UploadMedicalHistoryConsultationController::class, 'assign_doctor'])->name('upload_medical_history_consultation.assign_doctor');
    });
    Route::group(['prefix' => '/our-service', 'middleware' => 'auth'], function () {
        Route::get('/', [OurServiceController::class, 'index'])->name('ourservice.index');
        Route::get('/create', [OurServiceController::class, 'create'])->name('ourservice.create');
        Route::post('/store', [OurServiceController::class, 'store'])->name('ourservice.store');
        Route::post('/check-slug', [OurServiceController::class, 'checkSlug'])->name('ourservice.checkSlug');
        Route::get('/edit/{slug}', [OurServiceController::class, 'edit'])->name('ourservice.edit');
        Route::get('/update-status/{id}', [OurServiceController::class, 'updateStatus'])->name('ourservice.updateStatus');
        Route::get('/show/{slug}', [OurServiceController::class, 'show'])->name('ourservice.show');
        Route::patch('/update/{slug}', [OurServiceController::class, 'update'])->name('ourservice.update');
        Route::patch('/update-seo/{slug}', [OurServiceController::class, 'updateSeo'])->name('ourservice.updateSeo');
        Route::delete('/destroy/{slug}', [OurServiceController::class, 'destroy'])->name('ourservice.destroy');
    });
    Route::group(['prefix' => '/team-category', 'middleware' => 'auth'], function () {
        Route::get('/', [TeamCategoryController::class, 'index'])->name('teamcategory.index');
        Route::get('/create', [TeamCategoryController::class, 'create'])->name('teamcategory.create');
        Route::post('/store', [TeamCategoryController::class, 'store'])->name('teamcategory.store');
        Route::get('/edit/{slug}', [TeamCategoryController::class, 'edit'])->name('teamcategory.edit');
        Route::patch('/update/{slug}', [TeamCategoryController::class, 'update'])->name('teamcategory.update');
    });
    Route::group(['prefix' => '/team', 'middleware' => 'auth'], function () {
        Route::get('/', [TeamController::class, 'index'])->name('team.index');
        Route::get('/create', [TeamController::class, 'create'])->name('team.create');
        Route::post('/store', [TeamController::class, 'store'])->name('team.store');
        Route::get('/edit/{slug}', [TeamController::class, 'edit'])->name('team.edit');
        Route::patch('/update/{slug}', [TeamController::class, 'update'])->name('team.update');
        Route::get('/update-status/{id}', [TeamController::class, 'updateStatus'])->name('team.updateStatus');
        Route::get('/show/{slug}', [TeamController::class, 'show'])->name('team.show');
        Route::delete('/destroy/{slug}', [TeamController::class, 'destroy'])->name('team.destroy');
    });

    Route::group(['prefix' => '/investor', 'middleware' => 'auth'], function () {
        Route::get('/', [InvestorController::class, 'index'])->name('investor.index');
        Route::get('/create', [InvestorController::class, 'create'])->name('investor.create');
        Route::post('/store', [InvestorController::class, 'store'])->name('investor.store');
        Route::get('/edit/{slug}', [InvestorController::class, 'edit'])->name('investor.edit');
        Route::patch('/update/{slug}', [InvestorController::class, 'update'])->name('investor.update');
        Route::get('/show/{slug}', [InvestorController::class, 'show'])->name('investor.show');
        Route::delete('/destroy/{slug}', [InvestorController::class, 'destroy'])->name('investor.destroy');
        Route::get('/user-investor-details', [InvestorController::class, 'user_details'])->name('investor.user_details');
    });

    Route::group(['prefix' => '/director', 'middleware' => 'auth'], function () {
        Route::get('/', [DirectorController::class, 'index'])->name('director.index');
        Route::get('/create', [DirectorController::class, 'create'])->name('director.create');
        Route::post('/store', [DirectorController::class, 'store'])->name('director.store');
        Route::get('/edit/{slug}', [DirectorController::class, 'edit'])->name('director.edit');
        Route::patch('/update/{slug}', [DirectorController::class, 'update'])->name('director.update');
        Route::get('/show/{slug}', [DirectorController::class, 'show'])->name('director.show');
        Route::delete('/destroy/{slug}', [DirectorController::class, 'destroy'])->name('director.destroy');
        Route::get('/user-details', [DirectorController::class, 'user_details'])->name('director.user_details');
    });

    Route::group(['prefix' => '/relationmanager', 'middleware' => 'auth'], function () {
        Route::get('/', [RelationManagerController::class, 'index'])->name('relationmanager.index');
        Route::get('/profile', [RelationManagerController::class, 'profile'])->name('relationmanager.profile');
        Route::get('/create', [RelationManagerController::class, 'create'])->name('relationmanager.create');
        Route::post('/store', [RelationManagerController::class, 'store'])->name('relationmanager.store');
        Route::get('/show/{slug}', [RelationManagerController::class, 'show'])->name('relationmanager.show');
        Route::get('/edit/{slug}', [RelationManagerController::class, 'edit'])->name('relationmanager.edit');
        Route::patch('/update/{slug}', [RelationManagerController::class, 'update'])->name('relationmanager.update');
        Route::get('/show/{slug}', [RelationManagerController::class, 'show'])->name('relationmanager.show');
        Route::patch('/upgrade_relation_manager/{id}', [RelationManagerController::class, 'upgrade_relation_manager'])->name('relationmanager.upgrade_relation_manager');
        Route::patch('/downgrade_relation_manager/{id}', [RelationManagerController::class, 'downgrade_relation_manager'])->name('relationmanager.downgrade_relation_manager');
        Route::post('/upload_file_relation_manager', [RelationManagerController::class, 'upload_file_relation_manager'])->name('relationmanager.upload_file_relation_manager');
        Route::post('/reffer-as-ro', [RelationManagerController::class, 'reffer_as_relation_manager'])->name('relationmanager.send');
        Route::get('/view-all/{id}', [RelationManagerController::class, 'view_all'])->name('relationmanager.viewall');
        Route::patch('/reject-ro/{id}', [RelationManagerController::class, 'reject_ro'])->name('relationmanager.reject_ro');
    });
    Route::group(['prefix' => '/deliveries', 'middleware' => 'auth'], function () {
        Route::get('/', [DeliveriesController::class, 'index'])->name('deliveries.index');
        Route::get('/create', [DeliveriesController::class, 'create'])->name('deliveries.create');
        Route::post('/store', [DeliveriesController::class, 'store'])->name('deliveries.store');
        Route::get('/show/{slug}', [DeliveriesController::class, 'show'])->name('deliveries.show');
        Route::get('/edit/{slug}', [DeliveriesController::class, 'edit'])->name('deliveries.edit');
        Route::patch('/update/{slug}', [DeliveriesController::class, 'update'])->name('deliveries.update');
    });
    Route::group(['prefix' => '/vacancy', 'middleware' => 'auth'], function () {
        Route::get('/', [VacancyController::class, 'index'])->name('vacancy.index');
        Route::get('/create', [VacancyController::class, 'create'])->name('vacancy.create');
        Route::get('/order-create', [VacancyController::class, 'orderCreate'])->name('vacancy.orderCreate');
        Route::post('/store', [VacancyController::class, 'store'])->name('vacancy.store');
        Route::post('/order-store', [VacancyController::class, 'orderStore'])->name('vacancy.orderStore');
        Route::post('/check-slug', [VacancyController::class, 'checkSlug'])->name('vacancy.checkSlug');
        Route::get('/edit/{slug}', [VacancyController::class, 'edit'])->name('vacancy.edit');
        Route::patch('/update/{slug}', [VacancyController::class, 'update'])->name('vacancy.update');
        Route::patch('/update-seo/{slug}', [VacancyController::class, 'updateSeo'])->name('vacancy.updateSeo');
        Route::get('/show/{slug}', [VacancyController::class, 'show'])->name('vacancy.show');
        Route::delete('/delete/{id}', [VacancyController::class, 'destroy'])->name('vacancy.delete');
        Route::get('/update-status/{id}', [VacancyController::class, 'updateStatus'])->name('vacancy.updateStatus');
    });
    Route::group(['prefix' => '/booking', 'middleware' => 'auth'], function () {
        Route::get('/', [BookingController::class, 'index'])->name('booking.index');
        Route::get('/create', [BookingController::class, 'create'])->name('booking.create');
        Route::post('/store', [BookingController::class, 'store'])->name('booking.store');
        Route::get('/edit/{slug}', [BookingController::class, 'edit'])->name('booking.edit');
        Route::patch('/update/{slug}', [BookingController::class, 'update'])->name('booking.update');
    });
    Route::group(['prefix' => '/bookingreview', 'middleware' => 'auth'], function () {
        Route::get('/', [BookingReviewController::class, 'index'])->name('bookingreview.index');
        Route::get('/create', [BookingReviewController::class, 'create'])->name('bookingreview.create');
        Route::post('/store', [BookingReviewController::class, 'store'])->name('bookingreview.store');
        Route::get('/show/{slug}', [BookingReviewController::class, 'show'])->name('bookingreview.show');
        Route::patch('/payment/{slug}', [BookingReviewController::class, 'payment'])->name('bookingreview.payment');
    });
    Route::group(['prefix' => '/kyc', 'middleware' => 'auth'], function () {
        // Route::get('/', [KnowYourCustomerController::class, 'index'])->name('kyc.index');
        Route::get('/create', [KnowYourCustomerController::class, 'create'])->name('kyc.create');
        Route::post('/store', [KnowYourCustomerController::class, 'store'])->name('kyc.store');
        Route::get('/show', [KnowYourCustomerController::class, 'show'])->name('kyc.view');
        Route::get('/edit', [KnowYourCustomerController::class, 'edit'])->name('kyc.edit');
        Route::patch('/update', [KnowYourCustomerController::class, 'update'])->name('kyc.update');
        // Route::patch('/verify/{id}', [KnowYourCustomerController::class, 'verify'])->name('kyc.verify');
    });

    Route::group(['prefix' => '/admin-kyc', 'middleware' => 'auth'], function () {
        Route::get('/', [KnowYourCustomerController::class, 'admin_index'])->name('kyc.admin_index');
        Route::get('/show/{slug}', [KnowYourCustomerController::class, 'admin_show'])->name('kyc.admin_show');
        Route::get('/verify/{slug}', [KnowYourCustomerController::class, 'admin_verify'])->name('kyc.admin_verify');
        Route::patch('/reject/{slug}', [KnowYourCustomerController::class, 'admin_reject'])->name('kyc.admin_reject');
        Route::patch('/upload/{slug}', [KnowYourCustomerController::class, 'uploadForm'])->name('kyc.admin_upload');
        Route::get('/bankform/{slug}', [KnowYourCustomerController::class, 'bankform'])->name('kyc.bankform');
        Route::get('/insurance/{slug}', [KnowYourCustomerController::class, 'insurance'])->name('kyc.insurance');
    });
    //Category Route
    Route::group(['prefix' => '/category', 'middleware' => 'auth'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::patch('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    });
    //Symptom Route
    Route::group(['prefix' => '/symptom', 'middleware' => 'auth'], function () {
        Route::get('/', [SymptomController::class, 'index'])->name('symptom.index');
        Route::get('/create', [SymptomController::class, 'create'])->name('symptom.create');
        Route::post('/store', [SymptomController::class, 'store'])->name('symptom.store');
        Route::get('/edit/{id}', [SymptomController::class, 'edit'])->name('symptom.edit');
        Route::patch('/update/{id}', [SymptomController::class, 'update'])->name('symptom.update');
        Route::delete('/delete/{id}', [SymptomController::class, 'destroy'])->name('symptom.delete');
    });
    Route::group(['prefix' => '/order', 'middleware' => 'auth'], function () {
        Route::get('/', [OrderDetailsController::class, 'index'])->name('order.index');
        Route::get('/show/{id}', [OrderDetailsController::class, 'show'])->name('order.show');
        Route::get('/confirm', [OrderController::class, 'confirm'])->name('order.confirm');
        Route::get('/details/{id}', [OrderController::class, 'details'])->name('order.details');
        Route::post('/confirmed/{id}', [OrderDetailsController::class, 'confirmed'])->name('order.confirmed');
        Route::get('/invoice/{id}', [OrderController::class, 'invoice'])->name('order.invoice');
    });
    //Product Route
    Route::group(['prefix' => '/product', 'middleware' => 'auth'], function () {
        Route::get('/', [ProductController::class, 'index'])->name('product.index');
        Route::get('/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::patch('/update/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::delete('/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
        Route::get('/multiple-image/{id}', [ProductController::class, 'gallery'])->name('product.gallery');
        Route::post('/filestore', [ProductController::class, 'filestore'])->name('product.filestore');
        Route::delete('/destroyImage/{id}', [ProductController::class, 'destroyImage'])->name('product.delete');
        Route::patch('/updatestock/{id}', [ProductController::class, 'updatestock'])->name('product.updatestock');
        Route::get('/stockmanage', [ProductController::class, 'stockmanage'])->name('product.stockmanage');
    });
    //Friend Referral Route
    Route::group(['prefix' => '/referral', 'middleware' => 'auth'], function () {
        Route::get('/', [ReferralController::class, 'index'])->name('referral.index');
        Route::get('/create', [ReferralController::class, 'create'])->name('referral.create');
        Route::post('/store', [ReferralController::class, 'store'])->name('referral.store');
        Route::get('/edit/{id}', [ReferralController::class, 'edit'])->name('referral.edit');
        Route::patch('/update/{id}', [ReferralController::class, 'update'])->name('referral.update');
    });
    //Tags Route
    Route::group(['prefix' => '/tags', 'middleware' => 'auth'], function () {
        Route::get('/', [TagsController::class, 'index'])->name('tags.index');
        Route::get('/create', [TagsController::class, 'create'])->name('tags.create');
        Route::post('/store', [TagsController::class, 'store'])->name('tags.store');
        Route::get('/edit/{id}', [TagsController::class, 'edit'])->name('tags.edit');
        Route::patch('/update/{id}', [TagsController::class, 'update'])->name('tags.update');
    });
    //Cancel Reason Route
    Route::group(['prefix' => '/cancelreason', 'middleware' => 'auth'], function () {
        Route::get('/', [CancelReasonController::class, 'index'])->name('cancelreason.index');
        Route::get('/create', [CancelReasonController::class, 'create'])->name('cancelreason.create');
        Route::post('/store', [CancelReasonController::class, 'store'])->name('cancelreason.store');
        Route::get('/edit/{id}', [CancelReasonController::class, 'edit'])->name('cancelreason.edit');
        Route::patch('/update/{id}', [CancelReasonController::class, 'update'])->name('cancelreason.update');
    });
    //Brand Route
    Route::resource('brand', BrandController::class);
    Route::resource('frequentlyaskedquestion', FrequentlyAskedQuestionController::class);
    //Shipping Route
    Route::resource('shipping', ShippingController::class);
    //Manage Roles and user
    Route::get('/archive', [RoleUserController::class, 'archive'])->name('user-role.archive');
    Route::post('/retrive/{id}', [RoleUserController::class, 'retrive'])->name('user-role.retrive');
    Route::resource('role', RoleController::class);
    Route::resource('user-role', RoleUserController::class);
    Route::resource('check-version', CheckVersionController::class);

    Route::group(['prefix' => '/insurance', 'middleware' => 'auth'], function () {
        Route::get('/', [InsuranceController::class, 'index'])->name('insurance.index');
        Route::get('/create', [InsuranceController::class, 'create'])->name('insurance.create');
        Route::post('/store', [InsuranceController::class, 'store'])->name('insurance.store');
        Route::get('/edit/{slug}', [InsuranceController::class, 'edit'])->name('insurance.edit');
        Route::patch('/update/{slug}', [InsuranceController::class, 'update'])->name('insurance.update');
    });
    Route::group(['prefix' => '/insurance-claim', 'middleware' => 'auth'], function () {
        Route::get('/', [InsuranceClaimController::class, 'index'])->name('insuranceclaim.index');
        Route::get('/show/{slug}', [InsuranceClaimController::class, 'show'])->name('insuranceclaim.show');
        Route::patch('/update/{slug}', [InsuranceClaimController::class, 'update'])->name('insuranceclaim.update');
        Route::patch('/change-status/{slug}', [InsuranceClaimController::class, 'changeStatus'])->name('insuranceclaim.changestatus');
    });
    Route::group(['prefix' => '/death-insurance-claim', 'middleware' => 'auth'], function () {
        Route::get('/', [DeathInsuranceClaimController::class, 'index'])->name('deathinsuranceclaim.index');
        Route::get('/show/{slug}', [DeathInsuranceClaimController::class, 'show'])->name('deathinsuranceclaim.show');
        Route::patch('/change-status/{slug}', [DeathInsuranceClaimController::class, 'changeStatus'])->name('deathinsuranceclaim.changestatus');
    });
    Route::group(['prefix' => '/death-claim', 'middleware' => 'auth'], function () {
        Route::get('/', [DeathClaimController::class, 'index'])->name('deathclaim.index');
        Route::get('/show/{id}', [DeathClaimController::class, 'show'])->name('deathclaim.show');
        Route::patch('/change-status/{id}', [DeathClaimController::class, 'changeStatus'])->name('deathclaim.changestatus');
    });

    Route::group(['prefix' => '/medicalreport', 'middleware' => 'auth'], function () {
        Route::get('/', [MedicalReportController::class, 'index'])->name('medicalreport.index');
        Route::post('/sample-store', [MedicalReportController::class, 'sampleStore'])->name('medicalreport.sampleStore');
        Route::post('/sample-not-store', [MedicalReportController::class, 'sampleNotStore'])->name('medicalreport.sampleNotStore');
        Route::post('/sample-deposited', [MedicalReportController::class, 'deposited'])->name('medicalreport.deposited');
        Route::post('/store', [MedicalReportController::class, 'store'])->name('medicalreport.store');
        Route::get('/search', [MedicalReportController::class, 'searchReport'])->name('report.searchReport');
        Route::post('/search-report', [MedicalReportController::class, 'search'])->name('report.search');
        Route::post('/publish-report', [MedicalReportController::class, 'publishReport'])->name('medicalreport.publish');
        Route::post('/verify-report', [MedicalReportController::class, 'verifyReport'])->name('medicalreport.verify');
        Route::post('/reject-report', [MedicalReportController::class, 'rejectReport'])->name('medicalreport.reject');
        Route::get('/view/{id}', [MedicalReportController::class, 'view'])->name('medicalreport.view');
        Route::get('/view-chart/{id}/{member}', [MedicalReportController::class, 'viewChart'])->name('medicalreport.viewchart');
        Route::get('/overall-chart/{test}/{member}', [MedicalReportController::class, 'overallChart'])->name('medicalreport.overallchart');
        Route::get('/{package}/show/{id}', [MedicalReportController::class, 'show'])->name('medicalreport.show');
        Route::get('/{screeningdate}/chart/{test}/{member}', [MedicalReportController::class, 'chart'])->name('medicalreport.chart');
        // Route::get('/sample', [MedicalReportController::class, 'sample'])->name('medicalreport.sample');
        // Route::get('/fetchscreening/{user_id}', [MedicalReportController::class, 'fetchscreening'])->name('medicalreport.fetchscreening');
        // Route::get('/upload-report/{id}', [MedicalReportController::class, 'create'])->name('medicalreport.create');
        // Route::get('/fetchtest/{id}', [MedicalReportController::class, 'fetchtest'])->name('medicalreport.fetchtest');
    });

    Route::group(['prefix' => '/pathology-report', 'middleware' => 'auth'], function () {
        Route::get('/', [MedicalReportController::class, 'reportIndex'])->name('findings.reportIndex');
        Route::get('/show/{id}', [MedicalReportController::class, 'reportView'])->name('findings.reportView');
        Route::get('/{package}/view-report/{screening}/{user}', [MedicalReportController::class, 'report'])->name('findings.report');
        Route::group(['prefix' => '/screening-advice', 'middleware' => 'auth'], function () {
            Route::post('/store', [DoctorScreeningAdviceController::class, 'store'])->name('screening_advice.store');
            Route::post('/skipStore', [DoctorScreeningAdviceController::class, 'skipStore'])->name('screening_advice.skipStore');
            // Route::get('/edit/{slug}', [DoctorScreeningAdviceController::class, 'edit'])->name('screening_advice.edit');
            // Route::patch('/update/{slug}', [DoctorScreeningAdviceController::class, 'update'])->name('screening_advice.update');
        });
    });

    Route::group(['prefix' => '/usermedicalreport', 'middleware' => 'auth'], function () {
        Route::get('/', [UserMedicalReportController::class, 'index'])->name('usermedicalreport.index');
        Route::get('/{id}', [UserMedicalReportController::class, 'report'])->name('usermedicalreport.report');
        // Route::get('/{screening}', [UserMedicalReportController::class, 'getCheckupList'])->name('usermedicalreport.checkup');
        Route::get('/{screening}/{service}', [UserMedicalReportController::class, 'getResult'])->name('usermedicalreport.getResult');
        Route::get('/checkup/chart/{test}', [UserMedicalReportController::class, 'getChart'])->name('usermedicalreport.getChart');
    });
    Route::get('/push-notification', [WebNotificationController::class, 'index'])->name('push-notificaiton');
    Route::post('/store-token', [WebNotificationController::class, 'storeToken'])->name('store.token');
    Route::post('/send-web-notification', [WebNotificationController::class, 'sendWebNotification'])->name('send.web-notification');

    // Route::group(['prefix' => '/screening-service', 'middleware' => 'auth'], function () {
    //     Route::get('/', [ScreeningServiceController::class, 'index'])->name('screeningservice.index');
    //     Route::get('/create', [ScreeningServiceController::class, 'create'])->name('screeningservice.create');
    //     Route::post('/store', [ScreeningServiceController::class, 'store'])->name('screeningservice.store');
    //     Route::get('/edit/{slug}', [ScreeningServiceController::class, 'edit'])->name('screeningservice.edit');
    //     Route::patch('/update/{slug}', [ScreeningServiceController::class, 'update'])->name('screeningservice.update');
    // });
    Route::get('import_export',[ImportExportController::class, 'importExport']);
    Route::post('import', [ImportExportController::class,'import'])->name('import');
    Route::get('export',[ImportExportController::class,'export'])->name('export');

    Route::group(['prefix' => '/meetings', 'middleware' => 'auth'], function () {
        // Get list of meetings.
        Route::get('/', 'App\Http\Controllers\MeetingController@list')->name('meetings.index');
        Route::get('/create', 'App\Http\Controllers\MeetingController@details')->name('meetings.details');

        // Create meeting room using topic, agenda, start_time.
        Route::post('/store', 'App\Http\Controllers\MeetingController@create')->name('meetings.create');

        // Get information of the meeting room by ID.
        Route::get('/{id}', 'App\Http\Controllers\MeetingController@get')->where('id', '[0-9]+');
        Route::patch('/{id}', 'App\Http\Controllers\MeetingController@update')->where('id', '[0-9]+');
        Route::delete('/{id}', 'App\Http\Controllers\MeetingController@delete')->where('id', '[0-9]+');
    });

    Route::group(['prefix' => '/bookinglist', 'middleware' => 'auth'], function () {
        Route::get('/scheduled', [BookingListController::class, 'scheduled'])->name('scheduled.index');
        Route::patch('/completed/{id}', [BookingListController::class, 'changeCompleted'])->name('scheduled.completed');
        Route::patch('/appointment-completed/{id}', [BookingListController::class, 'changeToCompleted'])->name('scheduled.completedappointment');
        Route::patch('/cancelled/{id}', [BookingListController::class, 'changeCancelled'])->name('scheduled.cancelled');
        Route::get('/completed', [BookingListController::class, 'completed'])->name('completed.index');
        Route::get('/cancelled', [BookingListController::class, 'cancelled'])->name('cancelled.index');
        Route::get('/scheduled-details/{id}', [BookingListController::class, 'scheduledDetails'])->name('scheduled.details');
        Route::get('/completed-details/{id}', [BookingListController::class, 'completedDetails'])->name('completed.details');
        Route::post('/user-review/{id}', [BookingListController::class, 'userReview'])->name('completed.userreview');
    });

    Route::group(['prefix' => '/appointments', 'middleware' => 'auth'], function () {
        Route::get('/', [BookingListController::class, 'appointments'])->name('appointment.index');
        Route::get('/show/{id}', [BookingListController::class, 'viewAppointment'])->name('appointment.show');
        Route::post('/search', [BookingListController::class, 'searchAppointment'])->name('appointment.search');
    });

    Route::group(['prefix' => '/user-packages', 'middleware' => 'auth'], function () {
        // Route::get('/', [PackageListController::class, 'userPackage'])->name('userpackages.index');
        Route::get('/screening', [PackageListController::class, 'getScreening'])->name('getScreening');

        Route::group(['prefix' => '/screening-team'], function () {
            Route::post('/', [PackageScreeningTeamController::class, 'team'])->name('screeningteam.team');
            Route::post('/doctor', [PackageScreeningTeamController::class, 'doctor'])->name('screeningteam.doctor');
            Route::post('/lab-team', [PackageScreeningTeamController::class, 'labTeam'])->name('screeningteam.labteam');
            Route::post('/doctor-team', [PackageScreeningTeamController::class, 'doctorTeam'])->name('screeningteam.doctorteam');
            Route::get('/edit-team', [PackageScreeningTeamController::class, 'editTeam'])->name('screeningteam.editTeam');
            Route::post('/update-lab-team', [PackageScreeningTeamController::class, 'updateLabTeam'])->name('screeningteam.updateLabTeam');
            Route::post('/update-doctor-team', [PackageScreeningTeamController::class, 'updateDoctorTeam'])->name('screeningteam.updateDoctorTeam');
        });
        Route::group(['prefix' => '/booked'], function () {
            Route::get('/', [PackageListController::class, 'booked'])->name('booked.index');
            Route::get('/show/{id}', [PackageListController::class, 'bookedShow'])->name('booked.show');
        });
        Route::group(['prefix' => '/consultant'], function () {
            Route::get('/', [PackageListController::class, 'consultant'])->name('consultant.index');
            Route::get('/show/{id}', [PackageListController::class, 'consultantShow'])->name('consultant.show');
        });
        Route::group(['prefix' => '/pending'], function () {
            // Route::get('/', [PackageListController::class, 'pending'])->name('pending.index');
            // Route::get('/show/{id}', [PackageListController::class, 'pendingShow'])->name('pending.show');
            Route::patch('/screening-time/{id}', [PackageListController::class, 'screeningTime'])->name('pending.screeningtime');
        });
        Route::group(['prefix' => '/activated'], function () {
            Route::get('/', [PackageListController::class, 'activated'])->name('activated.index');
            Route::get('/show/{id}', [PackageListController::class, 'activatedShow'])->name('activated.show');
            Route::patch('/doctor-visit-time/{id}', [PackageListController::class, 'doctorTime'])->name('activated.doctorTime');
        });
        Route::group(['prefix' => '/deactivated'], function () {
            Route::get('/', [PackageListController::class, 'deactivated'])->name('deactivated.index');
            Route::get('/show/{id}', [PackageListController::class, 'deactivatedShow'])->name('deactivated.show');
        });
        Route::get('/notbooked', [PackageListController::class, 'notbooked'])->name('notbooked.index');
        Route::get('/notrelated', [PackageListController::class, 'notrelated'])->name('notrelated.package');
        Route::post('/store-date', [PackageListController::class, 'storeDate'])->name('userpackages.storeDate');
        Route::post('/store-consultant-date', [PackageListController::class, 'storeConsultationDate'])->name('userpackages.storeConsultantDate');
        Route::get('/change-status/{id}', [PackageListController::class, 'changeStatus'])->name('activated.changeStatus');
        Route::patch('/reschedule-date/{id}', [PackageListController::class, 'reschedule'])->name('reschedule');
        Route::post('/employees', [PackageListController::class, 'getemployee'])->name('getpackage.employee');
        Route::post('/consultant-employees', [PackageListController::class, 'getConsultationEmployee'])->name('getpackage.consultantEmployee');
        Route::post('/online-consultation/{id}', [OnlineConsultationController::class, 'store'])->name('onlineconsultation.store');
        Route::get('/online-consultation-meeting', [OnlineConsultationController::class, 'index'])->name('onlineconsultation.index');
        Route::patch('/online-consultation-meeting/{id}', [OnlineConsultationController::class, 'completed'])->name('onlineconsultation.completed');
        Route::get('/online-consultation-meeting/{id}', [OnlineConsultationController::class, 'show'])->name('onlineconsultation.show');
    });

    Route::resource('hospital', HospitalController::class);
    Route::resource('screening-recommend-files', ScreeningRecommendFilesController::class);

    Route::group(['prefix' => '/vendor-slider', 'middleware' => 'auth'], function () {
        Route::get('/', [VendorSliderController::class, 'index'])->name('vendorslider.index');
        Route::get('/create', [VendorSliderController::class, 'create'])->name('vendorslider.create');
        Route::post('/store', [VendorSliderController::class, 'store'])->name('vendorslider.store');
        Route::get('/edit/{slug}', [VendorSliderController::class, 'edit'])->name('vendorslider.edit');
        Route::patch('/update/{slug}', [VendorSliderController::class, 'update'])->name('vendorslider.update');
        Route::delete('/destroy/{id}', [VendorSliderController::class, 'destroy'])->name('vendorslider.destroy');
    });

    Route::group(['prefix' => '/my-service', 'middleware' => 'auth'], function () {
        Route::get('/', [BookServiceController::class, 'index'])->name('myservice.index');
        Route::get('/show/{id}', [BookServiceController::class, 'show'])->name('myservice.show');
        Route::patch('/payment/{id}', [BookServiceController::class, 'payment'])->name('myservice.payment');
    });

    Route::group(['prefix' => '/service-bookings', 'middleware' => 'auth'], function () {
        Route::get('/', [BookServiceController::class, 'services'])->name('servicebookings.index');
        Route::get('/test-report/{id}', [BookServiceController::class, 'createReport'])->name('servicebookings.createReport');
        Route::post('/test-report', [BookServiceController::class, 'uploadReport'])->name('servicebookings.uploadReport');
        Route::patch('/test-report/assign-lab/{id}', [BookServiceController::class, 'assignLab'])->name('servicebookings.assignlab');
        Route::get('/test-report/view/{id}', [BookServiceController::class, 'viewReport'])->name('servicebookings.viewReport');
    });

    Route::group(['prefix' => '/nurse-profile', 'middleware' => 'auth'], function () {
        Route::get('/', [NurseController::class, 'index'])->name('nurse.index');
        Route::post('/store', [NurseController::class, 'store'])->name('nurse.store');
        Route::get('/edit/{slug}', [NurseController::class, 'edit'])->name('nurse.edit');
        Route::patch('/update/{slug}', [NurseController::class, 'update'])->name('nurse.update');
    });
    Route::group(['prefix' => '/nurse-shift', 'middleware' => 'auth'], function () {
        Route::get('/', [NurseShiftController::class, 'index'])->name('nurseshift.index');
        Route::post('/store', [NurseShiftController::class, 'store'])->name('nurseshift.store');
        Route::get('/edit/{slug}', [NurseShiftController::class, 'edit'])->name('nurseshift.edit');
        Route::patch('/update/{slug}', [NurseShiftController::class, 'update'])->name('nurseshift.update');
    });
    Route::group(['prefix' => '/doctor-list', 'middleware' => 'auth'], function () {
        Route::get('/', [DoctorListController::class, 'index'])->name('doctorlist.index');
        Route::get('/show/{id}', [DoctorListController::class, 'show'])->name('doctorlist.show');
        Route::get('/appointment-details/{id}', [DoctorListController::class, 'details'])->name('doctorlist.details');
    });
    Route::group(['prefix' => '/nurse-list', 'middleware' => 'auth'], function () {
        Route::get('/', [NurseListController::class, 'index'])->name('nurselist.index');
        Route::get('/show/{id}', [NurseListController::class, 'show'])->name('nurselist.show');
        Route::get('/appointment-details/{id}', [NurseListController::class, 'details'])->name('nurselist.details');
    });
    Route::group(['prefix' => '/patient-details', 'middleware' => 'auth'], function () {
        Route::get('/', [PatientController::class, 'index'])->name('patient.index');
        Route::get('/show/{id}', [PatientController::class, 'show'])->name('patient.show');
    });
    Route::post('/menu/order', 'MenuController@reorder')->name('menu.reorder');
    Route::get('/submenudelete/{menu}', [MenuController::class, 'submenudelete'])->name('children.delete');
    Route::get('/submenu/{menu}', [MenuController::class, 'submenu'])->name('submenu.index');
    Route::resource('menu', MenuController::class);
    Route::resource('/advertisement', AdvertisementController::class);
    Route::resource('/news', NewsController::class);
    Route::resource('/gallery', GalleryController::class)->except(['destroy', 'show']);
    Route::post('/gall/image/delete/', [GalleryController::class, 'gallerydelete'])->name('gallery.delete');

    //videos
    Route::get('/video-news/{news}', [VideoController::class, 'index'])->name('video.index');
    Route::get('/video-news/{news}/create', [VideoController::class, 'create'])->name('video.create');
    Route::post('/video-news/{news}', [VideoController::class, 'store'])->name('video.store');
    Route::get('/video-news/{news}/{video}', [VideoController::class, 'edit'])->name('video.edit');
    Route::put('/video-news/{news}/{video}', [VideoController::class, 'update'])->name('video.update');
    Route::delete('/video-news/delete', [VideoController::class, 'destroy'])->name('video.destroy');

    Route::resource('ambulance', AmbulanceController::class);
    Route::resource('driver', DriverController::class);
    Route::resource('vendorads', VendorAdvertisementController::class);

    // Route::delete('/driver/delete/{id}', [DriverController::class, 'destroy'])->name('driver.delete');
    Route::group(['prefix' => '/permission', 'middleware' => 'auth'], function () {
        Route::get('/', [PermissionController::class, 'index'])->name('permission.index');
        Route::get('/create/{id}', [PermissionController::class, 'create'])->name('permission.create');
        Route::post('/store', [PermissionController::class, 'store'])->name('permission.store');
        Route::get('/edit/{id}', [PermissionController::class, 'edit'])->name('permission.edit');
        Route::patch('/update/{id}', [PermissionController::class, 'update'])->name('permission.update');
        Route::get('/show/{id}', [PermissionController::class, 'show'])->name('permission.show');
    });
    Route::group(['prefix' => '/trip', 'middleware' => 'auth'], function () {
        Route::get('/', [TripController::class, 'index'])->name('trip.index');
        Route::get('/show/{id}', [TripController::class, 'show'])->name('trip.show');
    });
    Route::fallback(function () {
        return view('viewnotfound');
    });

    Route::group(['prefix' => '/nurse-booking', 'middleware' => 'auth'], function () {
        Route::get('/', [NurseBookingController::class, 'index'])->name('nursebooking.index');
        Route::post('/store', [NurseBookingReportController::class, 'store'])->name('nursebooking.store');
        Route::get('/show/{id}', [NurseBookingReportController::class, 'show'])->name('nursebooking.show');
    });

    Route::group(['prefix' => '/notification', 'middleware' => 'auth'], function () {
        Route::get('/all', [BookingNotificationController::class, 'allNotification'])->name('notification.all');
        Route::get('/{type}', [BookingNotificationController::class, 'index'])->name('notification.index');
        Route::get('/{type}/{id}', [BookingNotificationController::class, 'notification_view'])->name('notification.view');
    });

    Route::group(['prefix' => '/sub-role', 'middleware' => 'auth'], function () {
        Route::get('/', [SubRoleController::class, 'index'])->name('subrole.index');
        Route::post('/store', [SubRoleController::class, 'store'])->name('subrole.store');
        Route::patch('/{id}/update', [SubRoleController::class, 'update'])->name('subrole.update');
    });

    Route::group(['prefix' => '/report-pdf', 'middleware' => 'auth'], function () {
        Route::get('/', [PdfReportController::class, 'index'])->name('reportPdf.index');
        Route::get('/fetchscreening/{id}', [PdfReportController::class, 'fetchScreening'])->name('reportPdf.fetchScreening');
        Route::post('/pdf', [PdfReportController::class, 'generatePdf'])->name('reportPdf.generatePdf');
    });
    Route::group(['prefix' => '/expo-events', 'middleware' => 'auth'], function () {
        Route::get('/', [ExpoAndEventController::class, 'index'])->name('expo.index');
        Route::post('/store', [ExpoAndEventController::class, 'store'])->name('expo.store');
        Route::get('/create', [ExpoAndEventController::class, 'create'])->name('expo.create');
        Route::get('/edit/{id}', [ExpoAndEventController::class, 'edit'])->name('expo.edit');
        Route::post('/update/{id}', [ExpoAndEventController::class, 'update'])->name('expo.update');
    });
    Route::resource('fitnesstype', FitnessTypeController::class);
    Route::resource('fitness-price', FitnessPricingController::class);
    Route::resource('medical-support', MedicalSupportController::class);
    Route::get('/incentive-calculation', [IncentiveManagerController::class, 'calculationIndex'])->name('incentive_calculation.index');
    Route::get('/referred-family', [IncentiveManagerController::class, 'familyReferred'])->name('family_referred.index');
    Route::get('/referred-details', [IncentiveManagerController::class, 'familyReferredDetails'])->name('family_referred.details');
    Route::get('/referred-detail/{id}', [IncentiveManagerController::class, 'familyReferredDetail'])->name('family_referred.detail');
    Route::get('/referred-ro-family', [IncentiveManagerController::class, 'myRofamilyReferred'])->name('family_referred.ms');
    Route::get('/referred-family-single/{id}', [IncentiveManagerController::class, 'familyReferredSingle'])->name('family_referred_single.index');
    Route::resource('incentive', IncentiveManagerController::class);

    Route::group(['prefix' => '/primary-switch-request', 'middleware' => 'auth'], function () {
        Route::get('/', [PrimaryMemberRequestController::class, 'index'])->name('primarychangerequest.index');
        Route::get('/show/{id}', [PrimaryMemberRequestController::class, 'show'])->name('primarychangerequest.show');
        Route::post('/approve/{id}', [PrimaryMemberRequestController::class, 'approve'])->name('primarychangerequest.approve');
        Route::post('/reject/{id}', [PrimaryMemberRequestController::class, 'reject'])->name('primarychangerequest.reject');
    });
    Route::group(['prefix' => '/member-leave-request', 'middleware' => 'auth'], function () {
        Route::get('/', [MemberLeaveRequestController::class, 'index'])->name('leaverequest.index');
        Route::post('/approve/{id}', [MemberLeaveRequestController::class, 'approve'])->name('leaverequest.approve');
        Route::post('/reject/{id}', [MemberLeaveRequestController::class, 'reject'])->name('leaverequest.reject');
    });
    Route::group(['prefix' => '/remove-family-request', 'middleware' => 'auth'], function () {
        Route::get('/', [RemoveFamilyRequestController::class, 'index'])->name('removerequest.index');
        Route::post('/approve/{id}', [RemoveFamilyRequestController::class, 'approve'])->name('removerequest.approve');
        Route::post('/reject/{id}', [RemoveFamilyRequestController::class, 'reject'])->name('removerequest.reject');
    });

    Route::group(['prefix' => '/lab-department', 'middleware' => 'auth'], function () {
        Route::get('/', [LabDepartmentController::class, 'index'])->name('labdepartment.index');
        Route::post('/store', [LabDepartmentController::class, 'store'])->name('labdepartment.store');
        Route::patch('/update/{id}', [LabDepartmentController::class, 'update'])->name('labdepartment.update');
    });
    Route::group(['prefix' => '/lab-profile', 'middleware' => 'auth'], function () {
        Route::get('/', [LabProfileController::class, 'index'])->name('labprofile.index');
        Route::post('/store', [LabProfileController::class, 'store'])->name('labprofile.store');
        Route::patch('/update/{id}', [LabProfileController::class, 'update'])->name('labprofile.update');
    });

    Route::group(['prefix' => '/lab-test', 'middleware' => 'auth'], function () {
        Route::get('/', [LabTestController::class, 'index'])->name('labtest.index');
        Route::get('/create', [LabTestController::class, 'create'])->name('labtest.create');
        Route::post('/store', [LabTestController::class, 'store'])->name('labtest.store');
        Route::get('/edit/{id}', [LabTestController::class, 'edit'])->name('labtest.edit');
        Route::patch('/update/{id}', [LabTestController::class, 'update'])->name('labtest.update');
        Route::get('/show/{id}', [LabTestController::class, 'show'])->name('labtest.show');
    });
    //screening teams
    Route::group(['prefix' => '/screening-team', 'middleware' => 'auth'], function () {
        Route::get('/', [ScreeningTeamController::class, 'index'])->name('steam.index');
        Route::post('/store', [ScreeningTeamController::class, 'store'])->name('steam.store');
        // Route::get('/create', [ScreeningTeamController::class, 'create'])->name('steam.create');
        Route::get('/edit/{id}', [ScreeningTeamController::class, 'edit'])->name('steam.edit');
        Route::put('/update/{id}', [ScreeningTeamController::class, 'update'])->name('steam.update');
    });
    //terms and conditions
    Route::group(['prefix' => '/term-condition', 'middleware' => 'auth'], function () {
        Route::get('/', [TermConditionController::class, 'index'])->name('termcondition.index');
        Route::post('/store', [TermConditionController::class, 'store'])->name('termcondition.store');
        Route::post('/update/{id}', [TermConditionController::class, 'update'])->name('termcondition.update');
    });

    Route::group(['prefix' => '/lab-package', 'middleware' => 'auth'], function () {
        Route::get('/', [LabPackageController::class, 'index'])->name('labpackage.index');
        Route::get('/fetchcontent', [LabPackageController::class, 'fetchcontent'])->name('labpackage.fetchcontent');
        Route::get('/create', [LabPackageController::class, 'create'])->name('labpackage.create');
        Route::post('/store', [LabPackageController::class, 'store'])->name('labpackage.store');
        Route::get('/edit/{id}', [LabPackageController::class, 'edit'])->name('labpackage.edit');
        Route::patch('/update/{id}', [LabPackageController::class, 'update'])->name('labpackage.update');
        Route::get('/show/{id}', [LabPackageController::class, 'show'])->name('labpackage.show');
        Route::get('/fetchlabtest/{id}', [LabPackageController::class, 'fetchlabtest'])->name('labpackage.fetchlabtest');
    });

    Route::group(['prefix' => '/labtest-bookings', 'middleware' => 'auth'], function () {
        Route::get('/', [BookLabtestController::class, 'index'])->name('labtestbookings.index');
        Route::patch('/assign-lab-technician/{id}', [BookLabtestController::class, 'assignLab'])->name('labtestbookings.assignlab');
        Route::patch('/sample-date/{id}', [BookLabtestController::class, 'sample'])->name('labtestbookings.sample');
        Route::get('/create-report/{id}', [BookLabtestController::class, 'create'])->name('labtestbookings.create');
        Route::post('/upload-report', [BookLabtestController::class, 'store'])->name('labtestbookings.store');
        Route::get('/view-report/{id}', [BookLabtestController::class, 'show'])->name('labtestbookings.show');
    });

    Route::group(['prefix' => '/upload-report', 'middleware' => 'auth'], function () {
        Route::get('/', [UploadTestReportController::class, 'index'])->name('uploadreport.index');
        Route::post('/store', [UploadTestReportController::class, 'store'])->name('uploadreport.store');
        Route::post('/skip', [UploadTestReportController::class, 'skip'])->name('uploadreport.skip');
        Route::post('/store-tests', [UploadTestReportController::class, 'storeTests'])->name('uploadreport.storeTests');
        Route::get('/fetchdetails/{id}', [UploadTestReportController::class, 'fetchDetails'])->name('uploadreport.fetchdetails');
        Route::get('/fetchtest/{id}', [UploadTestReportController::class, 'fetchtest'])->name('uploadreport.fetchtest');
        Route::get('/{packagescreening}/fetchprofiletest/{id}', [UploadTestReportController::class, 'fetchprofiletest'])->name('uploadreport.fetchprofiletest');
    });

    Route::group(['prefix' => '/screening-feeback', 'middleware' => 'auth'], function () {
        Route::get('/user', [ScreeningReviewController::class, 'userindex'])->name('screeninguserreview.index');
        Route::get('/employee', [ScreeningReviewController::class, 'employeeindex'])->name('screeningemployeereview.index');
        Route::post('/review', [ScreeningReviewController::class, 'employeeReviewStore'])->name('screeningemployeereview.store');
    });
    Route::group(['prefix' => '/package-slider', 'middleware' => 'auth'], function () {
        Route::get('/', [PackageSliderController::class, 'index'])->name('packageslider.index');
        Route::get('/create', [PackageSliderController::class, 'create'])->name('packageslider.create');
        Route::post('/store', [PackageSliderController::class, 'store'])->name('packageslider.store');
        Route::get('/edit/{slug}', [PackageSliderController::class, 'edit'])->name('packageslider.edit');
        Route::patch('/update/{slug}', [PackageSliderController::class, 'update'])->name('packageslider.update');
        Route::delete('/destroy/{id}', [PackageSliderController::class, 'destroy'])->name('packageslider.destroy');
    });
    Route::group(['prefix' => '/gd-feedback', 'middleware' => 'auth'], function () {
        Route::get('/', [GdFeedbackController::class, 'index'])->name('gdfeedback.index');
    });
    Route::group(['prefix' => '/report-subject', 'middleware' => 'auth'], function () {
        Route::get('/', [ReportSubjectController::class, 'index'])->name('reportsubject.index');
        Route::post('/store', [ReportSubjectController::class, 'store'])->name('reportsubject.store');
        Route::patch('/update/{id}', [ReportSubjectController::class, 'update'])->name('reportsubject.update');
        Route::delete('/destroy/{id}', [ReportSubjectController::class, 'destroy'])->name('reportsubject.destroy');
    });
    Route::group(['prefix' => '/report-problems', 'middleware' => 'auth'], function () {
        Route::get('/', [ReportProblemController::class, 'index'])->name('reportproblem.index');
        Route::get('/show/{id}', [ReportProblemController::class, 'show'])->name('reportproblem.show');
    });
    Route::group(['prefix' => '/job-skills', 'middleware' => 'auth'], function () {
        Route::get('/', [JobSkillController::class, 'index'])->name('skills.index');
        Route::post('/store', [JobSkillController::class, 'store'])->name('skills.store');
        Route::patch('/update/{id}', [JobSkillController::class, 'update'])->name('skills.update');
        Route::delete('/destroy/{id}', [JobSkillController::class, 'destroy'])->name('skills.destroy');
    });
    Route::group(['prefix' => '/enquiry', 'middleware' => 'auth'], function () {
        Route::get('/', [EnquiryController::class, 'index'])->name('enquiry.index');
        Route::post('/store', [EnquiryController::class, 'store'])->name('enquiry.store');
        Route::patch('/update/{id}', [EnquiryController::class, 'update'])->name('enquiry.update');
    });
    Route::group(['prefix' => '/send-notification', 'middleware' => 'auth'], function () {
        Route::get('/', [ManualNotificationController::class, 'index'])->name('sendnotification.index');
        Route::get('/create', [ManualNotificationController::class, 'create'])->name('sendnotification.create');
        Route::post('/store', [ManualNotificationController::class, 'store'])->name('sendnotification.store');
        Route::get('/show/{id}', [ManualNotificationController::class, 'show'])->name('sendnotification.show');
    });
    Route::group(['prefix' => '/filter-notification', 'middleware' => 'auth'], function () {
        Route::get('/', [ManualNotificationController::class, 'filterIndex'])->name('filternotification.index');
        Route::get('/create', [ManualNotificationController::class, 'filterCreate'])->name('filternotification.create');
        Route::post('/store', [ManualNotificationController::class, 'filterStore'])->name('filternotification.store');
        Route::get('/show/{id}', [ManualNotificationController::class, 'filterShow'])->name('filternotification.show');
        Route::get('/fetch-user-count', [ManualNotificationController::class, 'fetchCount'])->name('filternotification.fetchCount');
    });
    Route::group(['prefix' => '/screening-reschedule-request', 'middleware' => 'auth'], function () {
        Route::get('/', [RequestScreeningController::class, 'index'])->name('rescheduleRequest.index');
        Route::get('/show/{id}', [RequestScreeningController::class, 'show'])->name('rescheduleRequest.show');
        Route::post('/approve/{id}', [RequestScreeningController::class, 'approve'])->name('rescheduleRequest.approve');
    });
    Route::group(['prefix' => '/sample-not-collection-reason', 'middleware' => 'auth'], function () {
        Route::group(['prefix' => '/first'], function () {
            Route::get('/', [SampleNotCollectedController::class, 'index'])->name('sampleReason.index');
            Route::get('/show/{id}', [SampleNotCollectedController::class, 'show'])->name('sampleReason.show');
            Route::post('/store/{id}', [SampleNotCollectedController::class, 'store'])->name('sampleReason.store');
        });
        Route::group(['prefix' => '/second'], function () {
            Route::get('/', [SampleNotCollectedController::class, 'secondIndex'])->name('secondSampleReason.index');
            Route::get('/show/{id}', [SampleNotCollectedController::class, 'secondShow'])->name('secondSampleReason.show');
        });
    });
    Route::group(['prefix' => '/sample-drop-team', 'middleware' => 'auth'], function () {
        Route::get('/', [SampleDropTeamController::class, 'index'])->name('sampleDrop.index');
        Route::get('/create', [SampleDropTeamController::class, 'create'])->name('sampleDrop.create');
        Route::get('/fetchdetails/{id}', [SampleDropTeamController::class, 'fetchDetails'])->name('sampleDrop.fetchDetails');
        Route::post('/store', [SampleDropTeamController::class, 'store'])->name('sampleDrop.store');
    });
    Route::group(['prefix' => '/individual-sample-collection', 'middleware' => 'auth'], function () {
        Route::get('/', [IndividualSampleController::class, 'index'])->name('individualSample.index');
        Route::post('/store/{id}', [IndividualSampleController::class, 'store'])->name('individualSample.store');
    });
    Route::group(['prefix' => '/skip-sample-collection', 'middleware' => 'auth'], function () {
        Route::get('/', [SkipSampleController::class, 'index'])->name('skipSample.index');
        Route::get('/show/{id}', [SkipSampleController::class, 'show'])->name('skipSample.show');
        Route::post('/store', [SkipSampleController::class, 'store'])->name('skipSample.store');
    });
    Route::group(['prefix' => '/rejected-pathology-report', 'middleware' => 'auth'], function () {
        Route::get('/', [RejectReportController::class, 'index'])->name('rejectReport.index');
        Route::get('/show/{id}', [RejectReportController::class, 'show'])->name('rejectReport.show');
        Route::get('/{id}/create/{rejectId}/{type}', [RejectReportController::class, 'create'])->name('rejectReport.create');
        Route::get('/{id}/edit/{rejectId}/{type}', [RejectReportController::class, 'edit'])->name('rejectReport.edit');
        Route::post('/store/{id}', [RejectReportController::class, 'store'])->name('rejectReport.store');
        Route::patch('/update/{id}', [RejectReportController::class, 'update'])->name('rejectReport.update');
    });
    Route::group(['prefix' => '/online-doctor-consultation', 'middleware' => 'auth'], function () {
        Route::get('/', [OnlineDoctorConsultationController::class, 'index'])->name('onlineDoctorConsultation.index');
        Route::get('/show/{id}', [OnlineDoctorConsultationController::class, 'show'])->name('onlineDoctorConsultation.show');
        Route::get('/findings', [OnlineDoctorConsultationController::class, 'findingsIndex'])->name('onlineDoctorConsultation.findingsIndex');
        Route::post('/get-employee', [OnlineDoctorConsultationController::class, 'employee'])->name('onlineDoctorConsultation.employee');
        Route::post('/store/{id}', [OnlineDoctorConsultationController::class, 'store'])->name('onlineDoctorConsultation.store');
        Route::post('/findings/store/{id}', [OnlineDoctorConsultationController::class, 'findingsStore'])->name('onlineDoctorConsultation.findingsStore');
        Route::patch('/findings/unavailable/{id}', [OnlineDoctorConsultationController::class, 'unavailable'])->name('onlineDoctorConsultation.unavailable');
        Route::get('/findings/show/{id}', [OnlineDoctorConsultationController::class, 'findingsShow'])->name('onlineDoctorConsultation.findingsShow');
    });

    Route::patch('/verify/{id}', [VerifyDateController::class, 'verify'])->name('next.verify');
    Route::patch('/reschedule/{id}', [VerifyDateController::class, 'reschedule'])->name('next.reschedule');

    Route::group(['prefix' => '/insurance-type', 'middleware' => 'auth'], function () {
        Route::get('/', [InsuranceTypeController::class, 'index'])->name('insurancetype.index');
        Route::post('/store', [InsuranceTypeController::class, 'store'])->name('insurancetype.store');
        Route::patch('/update/{id}', [InsuranceTypeController::class, 'update'])->name('insurancetype.update');
        Route::delete('/destroy/{id}', [InsuranceTypeController::class, 'destroy'])->name('insurancetype.destroy');
        Route::get('/show/{id}', [InsuranceTypeController::class, 'show'])->name('insurancetype.show');
        Route::group(['prefix' => '/coverage'], function () {
            Route::get('/{id}', [PackageInsuranceCoverageController::class, 'index'])->name('coverage.index');
            Route::post('/store/{id}', [PackageInsuranceCoverageController::class, 'store'])->name('coverage.store');
            Route::get('/edit/{id}', [PackageInsuranceCoverageController::class, 'edit'])->name('coverage.edit');
            Route::patch('/update/{id}', [PackageInsuranceCoverageController::class, 'update'])->name('coverage.update');
        });
    });

    Route::group(['prefix' => '/primary-change-request', 'middleware' => 'auth'], function () {
        Route::get('/', [BecomePrimaryMemberController::class, 'index'])->name('becomeprimary.index');
        Route::get('/show/{id}', [BecomePrimaryMemberController::class, 'show'])->name('becomeprimary.show');
        Route::post('/approve/{id}', [BecomePrimaryMemberController::class, 'approve'])->name('becomeprimary.approve');
        Route::post('/reject/{id}', [BecomePrimaryMemberController::class, 'reject'])->name('becomeprimary.reject');
    });

    Route::group(['prefix' => '/student-deactivation', 'middleware' => 'auth'], function () {
        Route::get('/', [DeactivateStudentController::class, 'index'])->name('deactivate.index');
        Route::get('/show/{id}', [DeactivateStudentController::class, 'show'])->name('deactivate.show');
        Route::post('/approve', [DeactivateStudentController::class, 'store'])->name('deactivate.store');
        Route::post('/reject/{id}', [DeactivateStudentController::class, 'reject'])->name('deactivate.reject');
    });

    Route::group(['prefix' => '/student-activation', 'middleware' => 'auth'], function () {
        Route::get('/', [ActivateStudentController::class, 'index'])->name('activate.index');
        Route::get('/show/{id}', [ActivateStudentController::class, 'show'])->name('activate.show');
        Route::post('/approve', [ActivateStudentController::class, 'store'])->name('activate.store');
        Route::post('/reject/{id}', [ActivateStudentController::class, 'reject'])->name('activate.reject');
    });
    
    Route::group(['prefix' => '/campaign', 'middleware' => 'auth'], function () {
        Route::group(['prefix' => '/ongoing', 'middleware' => 'auth'], function () {
            Route::get('/', [CampaignController::class, 'index'])->name('campaign.index');
            Route::get('/create', [CampaignController::class, 'create'])->name('campaign.create');
            Route::post('/store', [CampaignController::class, 'store'])->name('campaign.store');
            Route::get('/edit/{id}', [CampaignController::class, 'edit'])->name('campaign.edit');
            Route::patch('/update/{id}', [CampaignController::class, 'update'])->name('campaign.update');
            Route::get('/show/{id}', [CampaignController::class, 'show'])->name('campaign.show');
        });
        Route::post('/change-status', [CampaignController::class, 'changeStatus'])->name('campaign.changeStatus');
        Route::get('/user-list', [CampaignController::class, 'userList'])->name('campaign.userList');
        Route::get('/get-profile', [CampaignController::class, 'getProfile'])->name('campaign.getProfile');
        Route::get('/get-campaign', [CampaignController::class, 'getCampaign'])->name('campaign.getCampaign');
        Route::group(['prefix' => '/completed', 'middleware' => 'auth'], function () {
            Route::get('/', [CampaignController::class, 'completedCampaign'])->name('completedcampaign.index');
            Route::get('/show/{id}', [CampaignController::class, 'show'])->name('completedcampaign.show');
        });
        Route::group(['prefix' => '/employees'], function () {
            Route::post('/store/{id}', [CampaignEmployeeController::class, 'store'])->name('campaignemployee.store');
            Route::get('/get-employee', [CampaignEmployeeController::class, 'getEmployee'])->name('campaignemployee.getEmployee');
            Route::post('/switch', [CampaignEmployeeController::class, 'switch'])->name('campaignemployee.switch');
        });
        Route::get('/export-campaign-user',[CampaignController::class,'exportUsers'])->name('export-users');
    });

    Route::group(['prefix' => '/campaign-users', 'middleware' => 'auth'], function () {
        Route::group(['prefix' => '/ongoing', 'middleware' => 'auth'], function () {
            Route::get('/', [CampaignUserController::class, 'index'])->name('campaignusers.index');
            Route::get('/create', [CampaignUserController::class, 'create'])->name('campaignusers.create');
            Route::post('/store', [CampaignUserController::class, 'store'])->name('campaignusers.store');
            Route::patch('/update/{id}', [CampaignUserController::class, 'update'])->name('campaignusers.update');
            Route::get('/show/{id}', [CampaignUserController::class, 'show'])->name('campaignusers.show');
        });
        Route::group(['prefix' => '/completed', 'middleware' => 'auth'], function () {
            Route::get('/', [CampaignUserController::class, 'completedCampaignUsers'])->name('completedcampaignusers.index');
            Route::get('/show/{id}', [CampaignUserController::class, 'show'])->name('completedcampaignusers.show');
        });
        Route::get('/verify-phone', [CampaignUserController::class, 'verifyPhone'])->name('campaignusers.verifyPhone');
        Route::get('/get-profile', [CampaignUserController::class, 'getProfile'])->name('campaignusers.getProfile');
        Route::post('/generate-pdf', [CampaignUserController::class, 'generateReport'])->name('campaignusers.generateReport');
        Route::post('/send-report-email/{id}', [CampaignUserController::class, 'sendReportEmail'])->name('campaignusers.sendReportEmail');
    });


    //Campaign Routes
    
    Route::group(['prefix' => '/nurse-screening-form', 'middleware' => 'auth'], function () {
        Route::get('/', [NurseScreeningFormController::class, 'index'])->name('nurse-screening-form.index');
        Route::get('/create', [NurseScreeningFormController::class, 'create'])->name('nurse-screening-form.create');
        Route::post('/store', [NurseScreeningFormController::class, 'store'])->name('nurse-screening-form.store');
        Route::get('/show/{id}', [NurseScreeningFormController::class, 'show'])->name('nurse-screening-form.show');
        Route::get('/edit/{id}', [NurseScreeningFormController::class, 'edit'])->name('nurse-screening-form.edit');
        Route::patch('/update/{id}', [NurseScreeningFormController::class, 'update'])->name('nurse-screening-form.update');
    });

    Route::group(['prefix' => '/dental-screening-form', 'middleware' => 'auth'], function () {
        Route::get('/', [DentalScreeningFormController::class, 'index'])->name('dental-screening-form.index');
        Route::get('/create/{id}', [DentalScreeningFormController::class, 'create'])->name('dental-screening-form.create');
        Route::post('/store', [DentalScreeningFormController::class, 'store'])->name('dental-screening-form.store');
        Route::get('/show/{id}', [DentalScreeningFormController::class, 'show'])->name('dental-screening-form.show');
        Route::get('/edit/{id}', [DentalScreeningFormController::class, 'edit'])->name('dental-screening-form.edit');
        Route::patch('/update/{id}', [DentalScreeningFormController::class, 'update'])->name('dental-screening-form.update');
    });

    Route::group(['prefix' => '/physio-screening-form', 'middleware' => 'auth'], function () {
        Route::get('/', [PhysiotherapistScreeningFormController::class, 'index'])->name('physio-screening-form.index');
        Route::get('/create/{id}', [PhysiotherapistScreeningFormController::class, 'create'])->name('physio-screening-form.create');
        Route::post('/store', [PhysiotherapistScreeningFormController::class, 'store'])->name('physio-screening-form.store');
        Route::get('/show/{id}', [PhysiotherapistScreeningFormController::class, 'show'])->name('physio-screening-form.show');
        Route::get('/edit/{id}', [PhysiotherapistScreeningFormController::class, 'edit'])->name('physio-screening-form.edit');
        Route::patch('/update/{id}', [PhysiotherapistScreeningFormController::class, 'update'])->name('physio-screening-form.update');
    });

    Route::group(['prefix' => '/doctor-screening-form', 'middleware' => 'auth'], function () {
        Route::get('/', [DoctorScreeningFormController::class, 'index'])->name('doctor-screening-form.index');
        Route::get('/create/{id}', [DoctorScreeningFormController::class, 'create'])->name('doctor-screening-form.create');
        Route::post('/store', [DoctorScreeningFormController::class, 'store'])->name('doctor-screening-form.store');
        Route::get('/show/{id}', [DoctorScreeningFormController::class, 'show'])->name('doctor-screening-form.show');
        Route::get('/edit/{id}', [DoctorScreeningFormController::class, 'edit'])->name('doctor-screening-form.edit');
        Route::patch('/update/{id}', [DoctorScreeningFormController::class, 'update'])->name('doctor-screening-form.update');
    });

    Route::group(['prefix' => '/ophthalmologist-screening-form', 'middleware' => 'auth'], function () {
        Route::get('/', [OphthalmologistScreeningFormController::class, 'index'])->name('ophthalmologist.index');
        Route::get('/create/{id}', [OphthalmologistScreeningFormController::class, 'create'])->name('ophthalmologist.create');
        Route::post('/store', [OphthalmologistScreeningFormController::class, 'store'])->name('ophthalmologist.store');
        Route::get('/edit/{id}', [OphthalmologistScreeningFormController::class, 'edit'])->name('ophthalmologist.edit');
        Route::patch('/update/{id}', [OphthalmologistScreeningFormController::class, 'update'])->name('ophthalmologist.update');
        Route::get('/show/{id}', [OphthalmologistScreeningFormController::class, 'show'])->name('ophthalmologist.show');
    });

    Route::group(['prefix' => '/dietician-screening-form', 'middleware' => 'auth'], function () {
        Route::get('/', [DieticianScreeningFormController::class, 'index'])->name('dietician.index');
        Route::get('/create/{id}', [DieticianScreeningFormController::class, 'create'])->name('dietician.create');
        Route::post('/store', [DieticianScreeningFormController::class, 'store'])->name('dietician.store');
        Route::get('/edit/{id}', [DieticianScreeningFormController::class, 'edit'])->name('dietician.edit');
        Route::patch('/update/{id}', [DieticianScreeningFormController::class, 'update'])->name('dietician.update');
        Route::get('/show/{id}', [DieticianScreeningFormController::class, 'show'])->name('dietician.show');
    });
});

Route::get('convert-date', [HomeController::class, 'convertDate'])->name('convertDate');

