<?php

use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('forgot-password', 'App\Http\Controllers\APIController\UserAuthController@forgot_password');
Route::post('change-password', 'App\Http\Controllers\APIController\UserAuthController@change_password');
Route::post('/change-old-password', 'App\Http\Controllers\APIController\UserAuthController@change_old_password')->middleware('auth:api');
Route::get('/check-existing-email', 'App\Http\Controllers\APIController\UserAuthController@existingEmail');
Route::get('/news', 'App\Http\Controllers\APIController\NewsApiController@index');
Route::get('/menu', 'App\Http\Controllers\APIController\MenuApiController@index');
Route::get('/homepage', 'App\Http\Controllers\APIController\NewsApiController@homepage');
Route::get('/event-expo', 'App\Http\Controllers\APIController\NewsApiController@eventandexpo');
Route::get('/show/{post}', 'App\Http\Controllers\APIController\NewsApiController@show');
Route::post('/send-sms', 'App\Http\Controllers\APIController\SMSController@send_sms');
Route::post('/register', 'App\Http\Controllers\APIController\UserAuthController@register');
Route::post('/school-profile-register', 'App\Http\Controllers\APIController\CompanyProfileApiController@upload_school_profile');
Route::post('/new-school', 'App\Http\Controllers\APIController\CompanyProfileApiController@new_school')->middleware('auth:api');
Route::post('/send-email-for-school-students', 'App\Http\Controllers\APIController\CompanyProfileApiController@send_mail')->middleware('auth:api');

//check two factor authorization enabled or disabled
Route::get('/check-2fa/{id}', 'App\Http\Controllers\APIController\UserAuthController@check2faStatus')->middleware('auth:api');
Route::post('/toggle-2fa/{id}/{number}', 'App\Http\Controllers\APIController\UserAuthController@toggle2faStatus')->middleware('auth:api');
// login
Route::group(['prefix' => '/login'], function () {
    Route::post('/', 'App\Http\Controllers\APIController\UserAuthController@login')->middleware('throttle:1,1');
    Route::post('/school-login', 'App\Http\Controllers\APIController\UserAuthController@schoolLogin')->middleware('throttle:1,1');
    Route::post('/create/qrcode', 'App\Http\Controllers\APIController\QRCodeLoginApiController@CreateQrcodeAction'); //creates QR and save it as png 
    Route::post('/mobile/scan/qrcode', 'App\Http\Controllers\APIController\QRCodeLoginApiController@mobileScanQrcodeAction')->middleware('auth:api'); //gets scaned by phone with key passed in header
});

Route::post('/check-token', 'App\Http\Controllers\APIController\UserAuthController@checkToken');
Route::get('/revoke-token', 'App\Http\Controllers\APIController\UserAuthController@revokeToken')->middleware('auth:api');
Route::get('/check-topic-fcm-while-logout', 'App\Http\Controllers\APIController\UserAuthController@checkTopicBased')->middleware('auth:api');
Route::post('/logout', 'App\Http\Controllers\APIController\UserAuthController@logoutAll')->middleware('auth:api');
Route::delete('/qr-logout', 'App\Http\Controllers\APIController\UserAuthController@deleteTokenId')->middleware('auth:api');
Route::delete('/delete-fcm-while-logout', 'App\Http\Controllers\APIController\UserAuthController@deleteFcm')->middleware('auth:api');
Route::delete('/delete-topic-fcm-while-logout', 'App\Http\Controllers\APIController\UserAuthController@deleteTopicBased')->middleware('auth:api');
Route::post('/verify-phone', 'App\Http\Controllers\APIController\UserAuthController@verifyPhoneNumber')->middleware('auth:api');
Route::post('/verify-otp', 'App\Http\Controllers\APIController\UserAuthController@verifyOtp')->middleware('auth:api');
Route::post('/update-email', 'App\Http\Controllers\APIController\UserAuthController@updateEmail')->middleware('auth:api');
Route::post('/verify-email-otp', 'App\Http\Controllers\APIController\UserAuthController@verifyEmailOtp')->middleware('auth:api');
Route::post('/verify-login-otp', 'App\Http\Controllers\APIController\UserAuthController@verifyUser')->middleware('auth:api');
Route::get('/account/verify/{token}', 'App\Http\Controllers\APIController\UserAuthController@verifyAccount')->name('user.verify');
Route::get('/resend-verify-link', 'App\Http\Controllers\APIController\UserAuthController@resendVerifyToken');
Route::post('/recaptcha', 'App\Http\Controllers\APIController\UserAuthController@recaptcha');
Route::get('/slider', 'App\Http\Controllers\APIController\SliderApiController@index');
Route::get('/service', 'App\Http\Controllers\APIController\ServiceApiController@index');
Route::get('/service/{slug}', 'App\Http\Controllers\APIController\ServiceApiController@service');
Route::get('/package', 'App\Http\Controllers\APIController\PackageApiController@index');
Route::get('/package-slider', 'App\Http\Controllers\APIController\PackageApiController@slider');
Route::get('/about', 'App\Http\Controllers\APIController\AboutApiController@index');
Route::get('/top-doctors', 'App\Http\Controllers\APIController\TopDoctorsApiController@index');
Route::get('/vendor-type', 'App\Http\Controllers\APIController\VendorTypeApiController@index');
Route::get('/vendor-review', 'App\Http\Controllers\APIController\VendorTypeApiController@get_review');
Route::post('/vendor-review', 'App\Http\Controllers\APIController\VendorTypeApiController@vendor_review')->middleware('auth:api');
Route::get('/get-prescription', 'App\Http\Controllers\APIController\UpdatedMedicalHistoryController@getPrescription')->middleware('auth:api');
Route::post('/upload-prescription', 'App\Http\Controllers\APIController\UpdatedMedicalHistoryController@uploadPrescription')->middleware('auth:api');
Route::post('/vendor-follow', 'App\Http\Controllers\APIController\VendorTypeApiController@vendor_follower')->middleware('auth:api');
Route::get('/vendor-followercount', 'App\Http\Controllers\APIController\VendorTypeApiController@followerCount')->middleware('auth:api');
Route::get('/isFollowed', 'App\Http\Controllers\APIController\VendorTypeApiController@isFollowed')->middleware('auth:api');
Route::get('/vendor-details', 'App\Http\Controllers\APIController\VendorTypeApiController@vendor_details');
Route::get('/screening-service/{id}', 'App\Http\Controllers\APIController\ScreeningServiceApiController@index');
Route::get('/hospital', 'App\Http\Controllers\APIController\HospitalApiController@index');
Route::get('/ambulance', 'App\Http\Controllers\APIController\HospitalApiController@ambulance');
Route::get('/vendor-slider', 'App\Http\Controllers\APIController\VendorSliderApiController@index');
Route::post('/vendor-slider', 'App\Http\Controllers\APIController\VendorSliderApiController@store')->middleware('auth:api');
Route::post('/vendor-slider/update/{slug}', 'App\Http\Controllers\APIController\VendorSliderApiController@update')->middleware('auth:api');
// Route::get('/health-service', 'App\Http\Controllers\APIController\HealthServiceApiController@index');
Route::get('/nurse', 'App\Http\Controllers\APIController\NurseApiController@index');
Route::get('/nurse/{slug}', 'App\Http\Controllers\APIController\NurseApiController@nurse');
Route::get('/team-category', 'App\Http\Controllers\APIController\TeamApiController@category');
Route::get('/team/{slug}', 'App\Http\Controllers\APIController\TeamApiController@team');
Route::get('/check-stock', 'App\Http\Controllers\APIController\ProductApiController@checkStock');
Route::get('/check-updated', 'App\Http\Controllers\APIController\CheckVersionApiController@index');
Route::get('/search-history', 'App\Http\Controllers\APIController\ProductApiController@search_history')->middleware('auth:api');
Route::get('/transaction-history', 'App\Http\Controllers\APIController\OrderApiController@getAllStatement')->middleware('auth:api');
Route::delete('/remove-history/{id}', 'App\Http\Controllers\APIController\ProductApiController@remove_history')->middleware('auth:api');
Route::delete('/clear-history', 'App\Http\Controllers\APIController\ProductApiController@clear_history')->middleware('auth:api');
//exclusive vendors
Route::get('/exclusive-vendor', 'App\Http\Controllers\APIController\VendorTypeApiController@exclusive_vendor');
Route::get('/exclusive-advertisement', 'App\Http\Controllers\APIController\VendorTypeApiController@exclusive_advertisement');
//get brand by vendor
Route::get('/vendor/{slug}', 'App\Http\Controllers\APIController\VendorTypeApiController@get_vendor_by_slug');
//get category by vendor
Route::get('/vendor/category/{slug}', 'App\Http\Controllers\APIController\VendorTypeApiController@get_category_by_vendor');
//terms and conditions
Route::get('/terms-conditions', 'App\Http\Controllers\APIController\TermConditionController@index');
//frequently asked question
Route::get('/frequently-asked-question', 'App\Http\Controllers\APIController\FAQApiController@index');

Route::post('/gd-feedback', 'App\Http\Controllers\APIController\GdFeedbackApiController@feedback')->middleware('auth:api');
Route::post('/report-problem', 'App\Http\Controllers\APIController\ReportProblemApiController@report')->middleware('auth:api');
Route::get('/report-subject', 'App\Http\Controllers\APIController\ReportProblemApiController@subject');
Route::post('/contact-information', 'App\Http\Controllers\APIController\NotificationApiController@contact_information');

Route::group(['prefix' => '/booking'], function () {
    Route::get('/date', 'App\Http\Controllers\APIController\BookingSlotApiCotroller@date');
    // Route::get('/date/{date}', 'App\Http\Controllers\APIController\BookingSlotApiCotroller@index');
    Route::get('/time', 'App\Http\Controllers\APIController\BookingSlotApiCotroller@time')->middleware('auth:api');
});
Route::group(['prefix' => '/relation-manager', 'middleware' => 'auth:api'], function () {
    Route::post('/', 'App\Http\Controllers\APIController\RelationManagerApiController@store');
});

Route::group(['prefix' => '/company-school-profile', 'middleware' => 'auth:api'], function () {
    Route::get('/', 'App\Http\Controllers\APIController\CompanySchoolProfileApiController@index');
    Route::get('/student-details', 'App\Http\Controllers\APIController\CompanyProfileApiController@student_details');
    Route::get('/deactivated-student-details', 'App\Http\Controllers\APIController\CompanyProfileApiController@deactivated_student_details');
    Route::get('/deactivate-requests/{id}', 'App\Http\Controllers\APIController\CompanyProfileApiController@deactivateRequests');
    Route::post('/deactivate-users', 'App\Http\Controllers\APIController\UserAuthController@deactivate_users');
    Route::post('/cancel-deactivate-users/{id}', 'App\Http\Controllers\APIController\CompanyProfileApiController@cancel_deactivate_users');
    Route::post('/reactivate-users', 'App\Http\Controllers\APIController\UserAuthController@activate_users');
    Route::post('/', 'App\Http\Controllers\APIController\CompanyProfileApiController@upload_company_profile');
    Route::get('/reactivate-payment-calulation', 'App\Http\Controllers\APIController\CompanyProfileApiController@reactivatePaymentCalculation');
    Route::post('/reactivate-payment', 'App\Http\Controllers\APIController\CompanyProfileApiController@reactivatePayment');
    Route::post('/{id}', 'App\Http\Controllers\APIController\CompanyProfileApiController@edit_company_profile');
});

Route::group(['prefix' => '/online-consultation-meeting', 'middleware' => 'auth:api'], function () {
    Route::post('/', 'App\Http\Controllers\APIController\OnlineConsultationMeetingApi@create');
    Route::get('/', 'App\Http\Controllers\APIController\OnlineConsultationMeetingApi@meeting_history');
});

Route::get('/fetchprovince', 'App\Http\Controllers\APIController\DropdownApiController@fetchprovince');
Route::get('/fetchdistrict', 'App\Http\Controllers\APIController\DropdownApiController@fetchdistrict');
Route::get('/fetchmun', 'App\Http\Controllers\APIController\DropdownApiController@fetchmun');
Route::get('/fetchward', 'App\Http\Controllers\APIController\DropdownApiController@fetchward');
Route::post('/visitors', 'App\Http\Controllers\APIController\VisitorApiController@visitor');

//Product Api
Route::group(['prefix' => '/products'], function () {
    Route::get('/', 'App\Http\Controllers\APIController\ProductApiController@index');
    Route::post('/', 'App\Http\Controllers\APIController\ProductApiController@store')->middleware('auth:api');
    Route::post('/update/{id}', 'App\Http\Controllers\APIController\ProductApiController@update')->middleware('auth:api');
    Route::delete('/delete/{id}', 'App\Http\Controllers\APIController\ProductApiController@destroy')->middleware('auth:api');
});

// tags api
Route::group(['prefix' => '/tags'], function () {
    Route::get('/', 'App\Http\Controllers\APIController\VendorSliderApiController@tagsIndex');
    Route::post('/', 'App\Http\Controllers\APIController\VendorSliderApiController@tagsStore')->middleware('auth:api');
    Route::post('/update/{id}', 'App\Http\Controllers\APIController\VendorSliderApiController@tagsUpdate')->middleware('auth:api');
    Route::delete('/delete/{id}', 'App\Http\Controllers\APIController\VendorSliderApiController@tagsDestroy')->middleware('auth:api');
});

// brand api
Route::group(['prefix' => '/brand'], function () {
    Route::get('/', 'App\Http\Controllers\APIController\VendorSliderApiController@BrandIndex');
    Route::post('/', 'App\Http\Controllers\APIController\VendorSliderApiController@BrandStore')->middleware('auth:api');
    Route::post('/update/{id}', 'App\Http\Controllers\APIController\VendorSliderApiController@BrandUpdate')->middleware('auth:api');
    Route::delete('/delete/{id}', 'App\Http\Controllers\APIController\VendorSliderApiController@BrandDestroy')->middleware('auth:api');
});

// trips api
Route::group(['prefix' => '/trips'], function () {
    Route::get('/', 'App\Http\Controllers\APIController\TripApiController@index')->middleware('auth:api');
    Route::get('/user-trip', 'App\Http\Controllers\APIController\TripApiController@userTrip')->middleware('auth:api');
    Route::get('/driverList', 'App\Http\Controllers\APIController\TripApiController@driverList');
    Route::post('/', 'App\Http\Controllers\APIController\TripApiController@store')->middleware('auth:api');
    Route::post('/finish/{id}', 'App\Http\Controllers\APIController\TripApiController@finishTrip')->middleware('auth:api');
    Route::post('/location/{id}', 'App\Http\Controllers\APIController\TripApiController@updateDriverLocation')->middleware('auth:api');
    Route::post('/status/{id}', 'App\Http\Controllers\APIController\TripApiController@updateDriverStatus')->middleware('auth:api');
    Route::post('/driver-notification', 'App\Http\Controllers\APIController\TripApiController@driverNotification')->middleware('auth:api');
    Route::get('/driver-notification', 'App\Http\Controllers\APIController\TripApiController@getdriverNotification')->middleware('auth:api');
    Route::get('/user-notification', 'App\Http\Controllers\APIController\TripApiController@getUserNotification')->middleware('auth:api');
    Route::get('/medical-assistance', 'App\Http\Controllers\APIController\TripApiController@getMedicalAssistance')->middleware('auth:api');
    Route::post('/form-fillup', 'App\Http\Controllers\APIController\TripApiController@storeBookingDetails')->middleware('auth:api');
    Route::post('/extends-trip/{id}', 'App\Http\Controllers\APIController\TripApiController@extendsTrip')->middleware('auth:api');
    Route::post('/driver-arrived/{id}', 'App\Http\Controllers\APIController\TripApiController@driverArrived')->middleware('auth:api');
    Route::post('/driver-finished-trip/{id}', 'App\Http\Controllers\APIController\TripApiController@userFinishedTrip')->middleware('auth:api');
    Route::post('/user-finished-trip/{id}', 'App\Http\Controllers\APIController\TripApiController@driverFinishedTrip')->middleware('auth:api');
    Route::post('/hospitalization-form/{id}', 'App\Http\Controllers\APIController\TripApiController@hospitalization')->middleware('auth:api');
});

// vendor profile api
Route::group(['prefix' => '/vendor-profile'], function () {
    Route::get('/', 'App\Http\Controllers\APIController\VendorSliderApiController@vendor_profile')->middleware('auth:api');
    Route::post('/store', 'App\Http\Controllers\APIController\VendorSliderApiController@vendor_profile_store')->middleware('auth:api');
    Route::post('/update/{slug}', 'App\Http\Controllers\APIController\VendorSliderApiController@vendor_profile_update')->middleware('auth:api');
});

//get all brand
Route::get('/brand', 'App\Http\Controllers\APIController\ProductApiController@brand');
// get product review
Route::get('/get_review', 'App\Http\Controllers\APIController\ProductApiController@get_review');
//Category Api
Route::group(['prefix' => '/categories'], function () {
    Route::get('/', 'App\Http\Controllers\APIController\CategoryApiController@index');
    Route::get('/vendortype', 'App\Http\Controllers\APIController\CategoryApiController@vendortype');
});
Route::get('/google-location', 'App\Http\Controllers\APIController\DoctorReviewController@googleLocation');
Route::get('/doctorReview', 'App\Http\Controllers\APIController\DoctorReviewController@getDoctorReview');
Route::get('/countDepartment', 'App\Http\Controllers\APIController\DoctorReviewController@countDepartment');
Route::post('/doctorReview', 'App\Http\Controllers\APIController\DoctorReviewController@doctorReview')->middleware('auth:api');

Route::get('/nurseReview', 'App\Http\Controllers\APIController\NurseReviewApiController@getNurseReview');
Route::post('/nurseReview', 'App\Http\Controllers\APIController\NurseReviewApiController@nurseReview')->middleware('auth:api');

// KYC api
Route::get('/view-global-form', 'App\Http\Controllers\APIController\KYCApiController@viewGloablForm')->middleware('auth:api');
Route::get('/kycstatus', 'App\Http\Controllers\APIController\KYCApiController@kyc_status')->middleware('auth:api');
Route::post('/kyc/personal-information', 'App\Http\Controllers\APIController\KYCApiController@personal_information')->middleware('auth:api');
Route::post('/kyc/address-information/{id}', 'App\Http\Controllers\APIController\KYCApiController@address_information')->middleware('auth:api');
Route::post('/kyc/professional-information/{id}', 'App\Http\Controllers\APIController\KYCApiController@professional_information')->middleware('auth:api');
Route::post('/kyc/declaration-and-services/{id}', 'App\Http\Controllers\APIController\KYCApiController@declaration_and_services')->middleware('auth:api');
Route::post('/kyc/upload-document/{id}', 'App\Http\Controllers\APIController\KYCApiController@upload_document')->middleware('auth:api');
Route::post('/kyc/update/{id}', 'App\Http\Controllers\APIController\KYCApiController@update')->middleware('auth:api');

// Fitness center
Route::group(['prefix' => '/fitness'], function () {
    Route::get('/fitness-category', 'App\Http\Controllers\APIController\FitnessApiController@fitnessCategory');
    Route::get('/fitness-pricing', 'App\Http\Controllers\APIController\FitnessApiController@fitnessPricing');
    Route::get('/fitness-booking', 'App\Http\Controllers\APIController\FitnessApiController@getFitnessBooking')->middleware('auth:api');
    Route::post('/fitness-booking', 'App\Http\Controllers\APIController\FitnessApiController@fitnessBooking')->middleware('auth:api');
    Route::post('/fitness-payment', 'App\Http\Controllers\APIController\FitnessApiController@fitnessPayment')->middleware('auth:api');
});
//Insurance Details Api
Route::group(['prefix' => '/insurance'], function () {
    Route::get('/', 'App\Http\Controllers\APIController\@index')->middleware('auth:api');
    Route::get('/type', 'App\Http\Controllers\APIController\InsuranceApiController@type');
});

Route::post('/insurance-claim/death-store', 'App\Http\Controllers\APIController\InsuranceClaimApiController@deathStore');

Route::group(['prefix' => '/referralFriend'], function () {
    Route::get('/', 'App\Http\Controllers\APIController\ReferralController@index')->middleware('auth:api');
    Route::get('/referredBy', 'App\Http\Controllers\APIController\ReferralController@referredBy')->middleware('auth:api');
    Route::post('/', 'App\Http\Controllers\APIController\ReferralController@referralFriend')->middleware('auth:api');
    Route::delete('/delete/{id}', 'App\Http\Controllers\APIController\ReferralController@destroy')->middleware('auth:api');
});

Route::group(['prefix' => '/lab-test'], function () {
    Route::get('/department', 'App\Http\Controllers\APIController\LabTestApiController@department');
    Route::get('/tests/{id}', 'App\Http\Controllers\APIController\LabTestApiController@tests');
});

Route::group(['prefix' => '/vacancy'], function () {
    Route::get('/', 'App\Http\Controllers\APIController\VacancyApiController@index');
});
Route::group(['prefix' => '/enquiry'], function () {
    Route::get('/', 'App\Http\Controllers\APIController\EnquiryApiController@index');
});

Route::group(['prefix' => '/app-analytics'], function () {
    Route::get('/', 'App\Http\Controllers\APIController\VisitorApiController@index');
    Route::post('/store', 'App\Http\Controllers\APIController\VisitorApiController@store');
});

Route::prefix('/admin')->group(function () {

    Route::group(['prefix' => '/nurses', 'middleware' => 'auth:api'], function () {
        Route::get('/bookings', 'App\Http\Controllers\APIController\NurseApiController@bookings');
        Route::post('/store', 'App\Http\Controllers\APIController\NurseApiController@store');
        Route::post('/book', 'App\Http\Controllers\APIController\NurseApiController@book');
        Route::post('/payment', 'App\Http\Controllers\APIController\NurseApiController@payment');
        Route::get('/appointments', 'App\Http\Controllers\APIController\NurseApiController@appointments');
        Route::post('/addshifts', 'App\Http\Controllers\APIController\NurseApiController@addshifts');
        Route::get('/shifts', 'App\Http\Controllers\APIController\NurseApiController@getshifts');
    });
    Route::post('/calorieCalculate', 'App\Http\Controllers\APIController\UserProfileController@calculateCalorie');
    Route::group(['prefix' => '/user-profile', 'middleware' => 'auth:api'], function () {
        Route::get('/', 'App\Http\Controllers\APIController\UserProfileController@index');
        Route::get('/primary', 'App\Http\Controllers\APIController\UserProfileController@primary');
        Route::post('/update/{id}', 'App\Http\Controllers\APIController\UserProfileController@update');
        Route::post('/updatebp', 'App\Http\Controllers\APIController\UserProfileController@updatebp');
        Route::get('/updateheartrate', 'App\Http\Controllers\APIController\UserProfileController@getheartrate');
        Route::post('/updateheartrate', 'App\Http\Controllers\APIController\UserProfileController@updateheartrate');
        Route::post('/update-step-count', 'App\Http\Controllers\APIController\StepCountApiController@updateSteps');
        Route::post('/updatebmi', 'App\Http\Controllers\APIController\UserProfileController@updatebmi');
        Route::post('/upload-reports', 'App\Http\Controllers\APIController\UserProfileController@uploadStore');
        Route::get('/medical-history', 'App\Http\Controllers\APIController\UserProfileController@medicalHistory');
        Route::get('/medical-report', 'App\Http\Controllers\APIController\UserProfileController@medical_report');
        Route::post('/become-primary-member', 'App\Http\Controllers\APIController\UserProfileController@becomePrimary');
        Route::get('/gd-doctors', 'App\Http\Controllers\APIController\UserProfileController@gd_doctors');
        Route::get('/step-count', 'App\Http\Controllers\APIController\StepCountApiController@index');
    });
    Route::group(['prefix' => '/doctor-profile', 'middleware' => 'auth:api'], function () {
        Route::get('/', 'App\Http\Controllers\APIController\DoctorProfileController@index');
        Route::post('/store', 'App\Http\Controllers\APIController\DoctorProfileController@store');
        Route::post('/update/{id}', 'App\Http\Controllers\APIController\DoctorProfileController@update');
        Route::post('/location/{id}', 'App\Http\Controllers\APIController\DoctorProfileController@updateLocation');
    });
    Route::group(['prefix' => '/department'], function () {
        Route::get('/', 'App\Http\Controllers\APIController\DepartmentApiController@index');
        Route::post('/departmentBySymptoms', 'App\Http\Controllers\APIController\DepartmentApiController@departmentBySymptoms');
    });
    Route::group(['prefix' => '/symptom'], function () {
        Route::get('/', 'App\Http\Controllers\APIController\SymptomApiController@index');
    });
    Route::group(['prefix' => '/addfamily', 'middleware' => 'auth:api'], function () {
        Route::get('/', 'App\Http\Controllers\APIController\FamilyApiController@index');
        Route::get('/count', 'App\Http\Controllers\APIController\FamilyApiController@countRequest');
        Route::post('/store', 'App\Http\Controllers\APIController\FamilyApiController@store');
        Route::post('/approved', 'App\Http\Controllers\APIController\FamilyApiController@approved');
        Route::get('/myrequest', 'App\Http\Controllers\APIController\FamilyApiController@myRequest');
        Route::get('/family-request', 'App\Http\Controllers\APIController\FamilyApiController@familyRequest');
        Route::post('/accept-family-request', 'App\Http\Controllers\APIController\FamilyApiController@acceptfamilyRequest');
        Route::delete('/reject/{id}', 'App\Http\Controllers\APIController\FamilyApiController@reject');
        Route::delete('/reject-family-request/{id}', 'App\Http\Controllers\APIController\FamilyApiController@rejectfamilyRequest');
        Route::delete('/cancel/{id}', 'App\Http\Controllers\APIController\FamilyApiController@cancel');
        Route::delete('/cancel-family-request/{id}', 'App\Http\Controllers\APIController\FamilyApiController@cancelfamilyRequest');
    });
    Route::group(['prefix' => '/family', 'middleware' => 'auth:api'], function () {
        Route::get('/', 'App\Http\Controllers\APIController\FamilyApiController@family');
        Route::get('/get-leave-request', 'App\Http\Controllers\APIController\FamilyApiController@viewLeaveRequest');
        Route::post('/add-relation/{id}', 'App\Http\Controllers\APIController\FamilyApiController@addRelation');
        Route::get('/change-primary-member-list', 'App\Http\Controllers\APIController\FamilyApiController@changePrimaryList');
        Route::post('/change-primary-member', 'App\Http\Controllers\APIController\FamilyApiController@changePrimary');
        Route::post('/leave-request', 'App\Http\Controllers\APIController\FamilyApiController@leaveRequest');
        Route::post('/leave-request/approve', 'App\Http\Controllers\APIController\FamilyApiController@approveLeaveRequest');
        Route::post('/leave-request/reject/{id}', 'App\Http\Controllers\APIController\FamilyApiController@rejectLeaveRequest');
        Route::post('/remove-request/{id}', 'App\Http\Controllers\APIController\FamilyApiController@removeRequest');
        Route::post('/qrscan', 'App\Http\Controllers\APIController\FamilyApiController@qrscan');
        Route::post('/become-primary-member', 'App\Http\Controllers\APIController\BecomePrimaryApiController@change');
        Route::get('/become-primary-member-list', 'App\Http\Controllers\APIController\BecomePrimaryApiController@index');
    });
    Route::group(['prefix' => '/wishlist', 'middleware' => 'auth:api'], function () {
        Route::get('/', 'App\Http\Controllers\APIController\WIshlistApiController@index');
        Route::post('/addToWishlist', 'App\Http\Controllers\APIController\WIshlistApiController@addToWishlist');
        Route::delete('/wishlistDelete/{id}', 'App\Http\Controllers\APIController\WIshlistApiController@wishlistDelete');
        Route::delete('/allWishlistDelete', 'App\Http\Controllers\APIController\WIshlistApiController@allWishlistDelete');
    });

    Route::group(['prefix' => '/booking-review', 'middleware' => 'auth:api'], function () {
        Route::get('/', 'App\Http\Controllers\APIController\BookingSlotApiCotroller@index');
        Route::post('/review', 'App\Http\Controllers\APIController\BookingSlotApiCotroller@review');
        Route::post('/cancle/{id}', 'App\Http\Controllers\APIController\BookingSlotApiCotroller@cancleByDoctor');
        Route::post('/canclebyuser/{id}', 'App\Http\Controllers\APIController\BookingSlotApiCotroller@cancleByuser');
        Route::get('/test', 'App\Http\Controllers\APIController\BookingSlotApiCotroller@test');
        Route::get('/bookingStatus', 'App\Http\Controllers\APIController\BookingSlotApiCotroller@appointmentStatus');
        Route::post('/payment', 'App\Http\Controllers\APIController\BookingSlotApiCotroller@payment');
        Route::get('/appointments', 'App\Http\Controllers\APIController\BookingSlotApiCotroller@appointment');
        Route::post('/completed/{id}', 'App\Http\Controllers\APIController\BookingSlotApiCotroller@changeCompleted');
        Route::post('/doctor-booking-slots', 'App\Http\Controllers\APIController\BookingSlotApiCotroller@doctorBookingSlots');
        Route::get('/get-doctor-booking-slots', 'App\Http\Controllers\APIController\BookingSlotApiCotroller@getDoctorBookingSlots');
        Route::get('/doctor-hospital', 'App\Http\Controllers\APIController\BookingSlotApiCotroller@doctorHospital');
        Route::post('/premedical-report', 'App\Http\Controllers\APIController\BookingSlotApiCotroller@premedicalReport');
        Route::post('/forward-report/{slug}', 'App\Http\Controllers\APIController\BookingSlotApiCotroller@forwardReport');
        Route::get('/followup-doctor', 'App\Http\Controllers\APIController\BookingSlotApiCotroller@followUpDate');
    });

    Route::group(['prefix' => '/meeting', 'middleware' => 'auth:api'], function () {
        // Route::get('/scheduled', 'App\Http\Controllers\APIController\BookingSlotApiCotroller@scheduled');
        // Route::get('/completed', 'App\Http\Controllers\APIController\BookingSlotApiCotroller@completed');
        // Route::get('/rejected', 'App\Http\Controllers\APIController\BookingSlotApiCotroller@rejected');
        // Route::post('/addslots', 'App\Http\Controllers\APIController\BookingSlotApiCotroller@addSlots');
    });

    Route::group(['prefix' => '/userpackage', 'middleware' => 'auth:api'], function () {
        Route::get('/', 'App\Http\Controllers\APIController\UserPackageApiController@index');
        Route::post('/store', 'App\Http\Controllers\APIController\UserPackageApiController@store');
        Route::delete('/discard', 'App\Http\Controllers\APIController\UserPackageApiController@discardPackage');
        Route::post('/payment', 'App\Http\Controllers\APIController\UserPackageApiController@payment');
        Route::get('/calculate-initial-payment', 'App\Http\Controllers\APIController\UserPackageApiController@calculateInitialPayment');
        Route::post('/additional-payment', 'App\Http\Controllers\APIController\UserPackageApiController@initialAdditionalPayment');
        Route::get('/calculate-joint-payment/{id}', 'App\Http\Controllers\APIController\UserPackageApiController@calculateJointPayment');
        Route::post('/joint-payment', 'App\Http\Controllers\APIController\UserPackageApiController@jointPayment');
        // Route::post('/calculate-additional-payment/{id}', 'App\Http\Controllers\APIController\UserPackageApiController@calculateAdditionalPayment');
        Route::get('/calculate-amount/{id}', 'App\Http\Controllers\APIController\UserPackageApiController@calculate');
        Route::get('/check-family-size/{id}', 'App\Http\Controllers\APIController\UserPackageApiController@checkfamilysize');
    });
    Route::group(['prefix' => '/insurance-claim', 'middleware' => 'auth:api'], function () {
        Route::get('/', 'App\Http\Controllers\APIController\InsuranceClaimApiController@index');
        Route::post('/store', 'App\Http\Controllers\APIController\InsuranceClaimApiController@store');
        Route::get('/details', 'App\Http\Controllers\APIController\InsuranceClaimApiController@details');
        Route::post('/death-claim-store', 'App\Http\Controllers\APIController\InsuranceClaimApiController@deathClaimStore');
    });
    Route::group(['prefix' => '/insurance-details', 'middleware' => 'auth:api'], function () {
        Route::get('/insurance', 'App\Http\Controllers\APIController\InsuranceDetailsApiController@index');
    });
    Route::group(['prefix' => '/order', 'middleware' => 'auth:api'], function () {
        Route::get('/', 'App\Http\Controllers\APIController\OrderApiController@index');
        Route::get('/orderStatus', 'App\Http\Controllers\APIController\OrderApiController@orderStatus');
        Route::get('/cancelReason', 'App\Http\Controllers\APIController\OrderApiController@cancelReason');
        Route::post('/store', 'App\Http\Controllers\APIController\OrderApiController@store');
        Route::post('/cancelOrder/{order_number}', 'App\Http\Controllers\APIController\OrderApiController@cancelOrder');
        Route::post('/deliveredOrder/{order_number}', 'App\Http\Controllers\APIController\OrderApiController@deliveredOrder');
        Route::post('/paymentOrder', 'App\Http\Controllers\APIController\OrderApiController@paymentOrder');
        Route::get('/vendorWiseProduct', 'App\Http\Controllers\APIController\OrderApiController@vendorWiseProduct');
        Route::get('/shipping-details', 'App\Http\Controllers\APIController\OrderApiController@shippingDetails');
    });
    // product review api
    Route::get('/get_review', 'App\Http\Controllers\APIController\ProductApiController@get_review');
    Route::get('/rating_average', 'App\Http\Controllers\APIController\ProductApiController@rating_average');
    Route::get('/rating_onebyone', 'App\Http\Controllers\APIController\ProductApiController@rating_onebyone');
    Route::post('/product_review', 'App\Http\Controllers\APIController\ProductApiController@product_review')->middleware('auth:api');
    Route::post('/fcm', 'App\Http\Controllers\APIController\NotificationApiController@sendWebNotification')->middleware('auth:api');

    //store pushnotification token
    Route::post('/store-topic-based-token', 'App\Http\Controllers\APIController\NotificationApiController@store_topic_wise_fcm');
    Route::post('/store-token', 'App\Http\Controllers\APIController\NotificationApiController@store')->middleware('auth:api');
    Route::get('/booking-notification', 'App\Http\Controllers\APIController\NotificationApiController@bookingNotification')->middleware('auth:api');
    Route::get('notification/{type}/{id}',  'App\Http\Controllers\APIController\NotificationApiController@notification_view')->middleware('auth:api');
    Route::get('/nurse-notification', 'App\Http\Controllers\APIController\NotificationApiController@nurseBooking')->middleware('auth:api');

    Route::group(['prefix' => '/medical-report', 'middleware' => 'auth:api'], function () {
        Route::get('/', 'App\Http\Controllers\APIController\MedicalReportApiController@index');
        Route::get('/pdf', 'App\Http\Controllers\APIController\MedicalReportApiController@reportpdf'); 
        Route::get('/chart-data', 'App\Http\Controllers\APIController\MedicalReportApiController@chart'); 
        // Route::get('/services', 'App\Http\Controllers\APIController\MedicalReportApiController@services');
        // Route::get('/labtests', 'App\Http\Controllers\APIController\MedicalReportApiController@labtests');
        // Route::get('/service/{serviceId}/{testId}', 'App\Http\Controllers\APIController\MedicalReportApiController@viewChart');
        // Route::get('/{userpackage}/screening-report/{screening}', 'App\Http\Controllers\APIController\MedicalReportApiController@screeningReport');

    });
    Route::post('/payment/initiate', 'App\Http\Controllers\APIController\PaymentApiController@initiatePayment');
    Route::post('/payment/verify', 'App\Http\Controllers\APIController\PaymentApiController@verify');
    Route::post('/payment', 'App\Http\Controllers\EsewaController@payment');
    Route::get('/success', 'App\Http\Controllers\EsewaController@success');
    Route::get('/failure', 'App\Http\Controllers\EsewaController@failure');

    //Zoom Meeting API
    // Get list of meetings.
    Route::get('/meetings', 'App\Http\Controllers\APIController\MeetingApiController@list');

    // Create meeting room using topic, agenda, start_time.
    Route::post('/meetings', 'App\Http\Controllers\APIController\MeetingApiController@create');

    // Get information of the meeting room by ID.
    Route::get('/meetings/{id}', 'App\Http\Controllers\APIController\MeetingApiController@get')->where('id', '[0-9]+');
    Route::patch('/meetings/{id}', 'App\Http\Controllers\APIController\MeetingApiController@update')->where('id', '[0-9]+');
    Route::delete('/meetings/{id}', 'App\Http\Controllers\APIController\MeetingApiController@delete')->where('id', '[0-9]+');

    //WEB RTC Meeting API
    Route::post("/createMeeting", 'App\Http\Controllers\APIController\WebRTCMeetingApiController@createMeeting')->name("createMeeting");
    Route::post("/getAllMeeting", 'App\Http\Controllers\APIController\WebRTCMeetingApiController@getAllMeeting')->name("getAllMeeting");

    Route::post('password/email', 'ForgotPasswordController@forgot');

    // Route::post('/book-service', 'App\Http\Controllers\APIController\HealthServiceApiController@bookService')->middleware('auth:api');

    // Route::group(['prefix' => '/lab-test', 'middleware' => 'auth:api'], function () {
    //     Route::get('/', 'App\Http\Controllers\APIController\HealthServiceApiController@labTest');
    //     Route::post('/payment', 'App\Http\Controllers\APIController\HealthServiceApiController@payment');
    // });

    Route::group(['prefix' => '/nurse-profile', 'middleware' => 'auth:api'], function () {
        Route::get('/', 'App\Http\Controllers\APIController\NurseApiController@profile');
        Route::post('/update/{id}', 'App\Http\Controllers\APIController\NurseApiController@update');
    });

    //driver create
    Route::group(['prefix' => '/driver-profile', 'middleware' => 'auth:api'], function () {
        Route::post('/store', 'App\Http\Controllers\APIController\DriverProfileApiController@store');
    });


    Route::group(['prefix' => '/lab-test', 'middleware' => 'auth:api'], function () {
        Route::get('/', 'App\Http\Controllers\APIController\LabTestApiController@labTest');
        Route::post('/book-test', 'App\Http\Controllers\APIController\LabTestApiController@bookLabtest');
        Route::post('/payment', 'App\Http\Controllers\APIController\LabTestApiController@payment');
    });

    Route::group(['prefix' => '/screening', 'middleware' => 'auth:api'], function () {
        Route::post('/review', 'App\Http\Controllers\APIController\ScreeningUserReviewApiController@review');
    });

    Route::group(['prefix' => '/water-intake', 'middleware' => 'auth:api'], function () {
        Route::get('/', 'App\Http\Controllers\APIController\WaterIntakeApiController@index');
        Route::post('/store', 'App\Http\Controllers\APIController\WaterIntakeApiController@store');
        Route::post('/update/{id}', 'App\Http\Controllers\APIController\WaterIntakeApiController@update');
        Route::post('/update-intake/{id}', 'App\Http\Controllers\APIController\WaterIntakeApiController@updateIntake');
        Route::post('/notification', 'App\Http\Controllers\APIController\WaterIntakeApiController@updateNotification');
    });

    Route::group(['prefix' => '/request-screening-change', 'middleware' => 'auth:api'], function () {
        Route::post('/', 'App\Http\Controllers\APIController\RequestScreeningApiController@change');
    });
    Route::group(['prefix' => '/online-consultation', 'middleware' => 'auth:api'], function () {
        Route::post('/', 'App\Http\Controllers\APIController\OnlineConsultationApiController@store');
    });
    Route::group(['prefix' => '/import', 'middleware' => 'auth:api'], function () {
        Route::get('/status', 'App\Http\Controllers\APIController\ImportExportApiController@getImport');
        Route::post('/', 'App\Http\Controllers\APIController\ImportExportApiController@import');
    });
});
