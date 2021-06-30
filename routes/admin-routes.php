<?php

use App\Http\Controllers\Enablers\Admin\RoleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Enablers\Admin\EvsController;
use App\Http\Controllers\Enablers\Admin\FAQController;
use App\Http\Controllers\Enablers\Admin\BlogController;
use App\Http\Controllers\Enablers\Admin\CityController;
use App\Http\Controllers\Enablers\Admin\SkillController;
use App\Http\Controllers\Enablers\Admin\UsersController;
use App\Http\Controllers\Enablers\Admin\CareerController;
use App\Http\Controllers\Enablers\Admin\EventsController;
use App\Http\Controllers\Enablers\Admin\ConsentController;
use App\Http\Controllers\Enablers\Admin\OfficesController;
use App\Http\Controllers\Enablers\Admin\ServiceController;
use App\Http\Controllers\Enablers\Admin\TrainersController;
use App\Http\Controllers\Enablers\Admin\ProductsController;
use App\Http\Controllers\Enablers\Admin\DashboardController;
use App\Http\Controllers\Enablers\Admin\EVSSeriesController;
use App\Http\Controllers\Enablers\Admin\TrainingsController;
use App\Http\Controllers\Enablers\Admin\ObjectivesController;
use App\Http\Controllers\Enablers\Admin\MilestonesController;
use App\Http\Controllers\Enablers\Admin\RedirectUrlController;
use App\Http\Controllers\Enablers\Admin\EnrollmentsController;
use App\Http\Controllers\Enablers\Admin\AppointmentController;
use App\Http\Controllers\Enablers\Admin\ConsentTermController;
use App\Http\Controllers\Enablers\Admin\SliderImagesController;
use App\Http\Controllers\Enablers\Admin\AchievementsController;
use App\Http\Controllers\Enablers\Admin\TrainingBatchController;
use App\Http\Controllers\Enablers\Admin\SupportRequestController;
use App\Http\Controllers\Enablers\Admin\CollaborationsController;
use App\Http\Controllers\Enablers\Admin\PaymentAccountController;
use App\Http\Controllers\Enablers\Admin\VirtualAssistantController;
use App\Http\Controllers\Enablers\Admin\FranchiseApplicationController;
use App\Http\Controllers\Enablers\Admin\VirtualAssistantRequestController;

// Quiz Certification
use App\Http\Controllers\QuizCertification\ExaminersController;
use App\Http\Controllers\QuizCertification\Admin\QuizCertificationEnrollmentController;

Route::group(['prefix' => 'admin'],function ()
{
    Auth::routes();

    Route::group(['middleware' => ['auth']], function() {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('home');
            Route::group(['middleware' => ['can:isAdminOrSupportOrAccounts']], function() {

                //Enrollments
                Route::group(['prefix' => 'enrollments', 'as' => 'enrollments.'], function () {
                    Route::get('{id}/show', [EnrollmentsController::class, 'show'])->name('show');

                    Route::get('trainings', [EnrollmentsController::class, 'indexTrainings'])->name('trainings.index');
                    Route::get('data-trainings', [EnrollmentsController::class, 'trainingEnrollmentsData'])->name('trainings.data');

                    Route::get('seminars', [EnrollmentsController::class, 'indexSeminars'])->name('seminars.index');
                    Route::get('data-seminars', [EnrollmentsController::class, 'seminarsEnrollmentsData'])->name('seminars.data');

                    Route::get('book-orders', [EnrollmentsController::class, 'indexBookOrder'])->name('book-orders.index');
                    Route::get('data-book-orders', [EnrollmentsController::class, 'bookOrdersData'])->name('book-orders.data');

                    Route::post('{id}/update-status', [EnrollmentsController::class, 'updatePaymentStatus'])->name('update-status');
                    Route::post('{id}/delete', [EnrollmentsController::class, 'destroy'])->name('delete');
                });
            });

            Route::group(['middleware' => ['can:isAdminOrSupport']], function() {
                //Appointments
                Route::group(['prefix' => 'appointments','as'=>'appointments.'],function() {
                    Route::get('/', [AppointmentController::class, 'index'])->name('index');
                    Route::get('data', [AppointmentController::class, 'appointmentData'])->name('data');
                    Route::get('{id}', [AppointmentController::class, 'show'])->name('show');
                });

                //Consents
                Route::group(['prefix' => 'consents','as'=>'consents.'],function(){
                    Route::get('{id}/show', [ConsentController::class, 'show'])->name('show');

                    Route::get('student-consent', [ConsentController::class,'indexStudentConsent'])->name('student-consent.index');
                    Route::get('student-consent-data', [ConsentController::class,'studentConsentData'])->name('student-consent.data');

                    Route::get('exl-consent', [ConsentController::class,'indexExlConsent'])->name('exl-consent.index');
                    Route::get('exl-consent-data', [ConsentController::class,'ExlConsentData'])->name('exl-consent.data');

                    Route::get('one-year-consent', [ConsentController::class,'indexOneYearConsent'])->name('one-year-consent.index');
                    Route::get('one-year-consent-data', [ConsentController::class,'OneYearConsentData'])->name('one-year-consent.data');

                    Route::get('listing-promoter-consent', [ConsentController::class,'indexListingPromoterConsent'])->name('listing-promoter-consent.index');
                    Route::get('listing-promoter-consent-data', [ConsentController::class,'ListingPromoterConsentData'])->name('listing-promoter-consent.data');

                    Route::get('fba-wholesale-consent', [ConsentController::class,'indexFbaWholeSaleConsent'])->name('fba-wholesale-consent.index');
                    Route::get('fba-wholesale-consent-data', [ConsentController::class,'FbaWholeSaleConsentData'])->name('fba-wholesale-consent.data');

                    Route::post('consents/{id}/update-status', [ConsentController::class, 'updateStatus'])->name('update-status');
                });

                //Support Requests
                Route::group(['prefix' => 'support-requests','as'=>'support-requests.'],function(){
                    Route::get('{id}/show', [SupportRequestController::class, 'show'])->name('show');

                    Route::get('refund', [SupportRequestController::class,'indexRefund'])->name('refund.index');
                    Route::get('refund-data', [SupportRequestController::class,'refundRequestsData'])->name('refund.data');

                    Route::get('payment-related-concern', [SupportRequestController::class,'indexPaymentRelatedConcern'])->name('payment-concern.index');
                    Route::get('payment-data', [SupportRequestController::class,'paymentRelatedConcernData'])->name('payment-concern.data');

                    Route::get('evs-concern', [SupportRequestController::class,'indexEVSConcern'])->name('evs-concern.index');
                    Route::get('evs-concern-data', [SupportRequestController::class,'evsConcernData'])->name('evs-concern.data');

                    Route::get('training-related-concern', [SupportRequestController::class,'indexTrainingRelatedConcern'])->name('training-concern.index');
                    Route::get('training-related-concern-data', [SupportRequestController::class,'trainingRelatedConcernData'])->name('training-concern.data');

                    Route::get('change-of-training-request', [SupportRequestController::class,'indexChangeOfTrainingRequest'])->name('change-training.index');
                    Route::get('change-of-training-request-data', [SupportRequestController::class,'changeOfTrainingRequestData'])->name('change-training.data');

                    Route::get('change-of-mentor-request', [SupportRequestController::class,'indexChangeOfMentorRequest'])->name('change-mentor.index');
                    Route::get('change-of-mentor-request-data', [SupportRequestController::class,'changeOfMentorRequestData'])->name('change-mentor.data');

                    Route::get('general-complaint', [SupportRequestController::class,'indexGeneralComplaint'])->name('general-complaint.index');
                    Route::get('general-complaint-data', [SupportRequestController::class,'generalComplaintData'])->name('general-complaint.data');

                    Route::get('suggestions', [SupportRequestController::class,'indexSuggestions'])->name('suggestions.index');
                    Route::get('suggestions-data', [SupportRequestController::class,'suggestionsData'])->name('suggestions.data');

                    Route::get('epas-concern', [SupportRequestController::class,'indexEpasConcern'])->name('epas-concern.index');
                    Route::get('epas-concern-data', [SupportRequestController::class,'epasConcernData'])->name('epas-concern.data');
                });

                //Virtual Assistant Requests
                Route::get('virtual-assistant-requests', [VirtualAssistantRequestController::class,'index'])->name('va-request.index');
                Route::get('virtual-assistant-requests-data', [VirtualAssistantRequestController::class,'vaRequestData'])->name('va-request.data');
                Route::post('virtual-assistant-requests/{id}/update-status', [VirtualAssistantRequestController::class, 'updateStatus'])->name('va-request.update-status');
                Route::get('virtual-assistant-requests/{id}/show', [VirtualAssistantRequestController::class, 'show'])->name('va-request.show');

                //franchise application
                Route::group(['prefix' => 'franchise-applications','as'=>'franchise-applications.'], function() {
                    Route::get('/', [FranchiseApplicationController::class,'index'])->name('index');
                    Route::get('data', [FranchiseApplicationController::class,'franchiseApplicationData'])->name('data');
                    Route::post('/{id}/update-status', [FranchiseApplicationController::class, 'updateStatus'])->name('update-status');
                    Route::get('/{id}/show', [FranchiseApplicationController::class, 'show'])->name('show');
                    Route::post('/{id}/delete', [FranchiseApplicationController::class, 'delete'])->name('delete');
                });

                //quiz enrollment
                    Route::group(['prefix' => 'quiz-enrollments','as'=>'quiz-enrollments.'], function() {
                    Route::get('/', [QuizCertificationEnrollmentController::class,'index'])->name('index');
                    Route::get('data', [QuizCertificationEnrollmentController::class,'quizEnrollmentData'])->name('data');
                    Route::post('/{id}/update-status', [QuizCertificationEnrollmentController::class, 'updateStatus'])->name('update-status');
                    Route::get('/{id}/show', [QuizCertificationEnrollmentController::class, 'show'])->name('show');
                    Route::post('/{id}/delete', [QuizCertificationEnrollmentController::class, 'delete'])->name('delete');
                });

                //Trainings
                Route::resource('trainings', TrainingsController::class);
                Route::post('trainings/{id}/update-status', [TrainingsController::class, 'updateStatus'])->name('trainings.update-status');

                Route::resource('training-batches', TrainingBatchController::class);

                Route::resource('cities', CityController::class);
                Route::post('cities/{id}/update-status', [CityController::class, 'updateStatus'])->name('cities.update-status');

            });

            Route::group(['middleware' => ['can:isAdmin']], function() {
                Route::get('import-evs-users', [EvsController::class, 'importEVSUsers']);
                Route::get('import-emis-enrollments', [EnrollmentsController::class,'importEMISEnrollments']);

                Route::get('evs-users', [EvsController::class,'index'])->name('evs-users.index');
                Route::get('evs-users-data', [EvsController::class,'evsData'])->name('evs-users.data');
                Route::get('evs-user/{id}/show', [EvsController::class, 'show'])->name('evs-users.show');
                Route::post('evs-user/{id}/update-status', [EvsController::class, 'updateStatus'])->name('evs-users.update-status');
                Route::post('evs-user/{id}/change-password', [EvsController::class, 'changePassword'])->name('evs-users.change-password');

                Route::resource('users', UsersController::class);
                Route::post('users/{id}/update-status', [UsersController::class, 'updateStatus'])->name('users.update-status');

                Route::resource('examiners', ExaminersController::class);
                Route::post('examiners/{id}/update-status', [ExaminersController::class, 'updateStatus'])->name('examiners.update-status');

                Route::resource('slider-images', SliderImagesController::class);
                Route::post('slider-images/{id}/update-status', [SliderImagesController::class, 'updateStatus'])->name('slider-images.update-status');

                Route::resource('objectives', ObjectivesController::class);
                Route::post('objectives/{id}/update-status', [ObjectivesController::class, 'updateStatus'])->name('objectives.update-status');

                Route::resource('achievements', AchievementsController::class);
                Route::post('achievements/{id}/update-status', [AchievementsController::class, 'updateStatus'])->name('achievements.update-status');

                Route::resource('milestones', MilestonesController::class);
                Route::post('milestones/{id}/update-status', [MilestonesController::class, 'updateStatus'])->name('milestones.update-status');

                Route::resource('collaborations', CollaborationsController::class);
                Route::post('collaborations/{id}/update-status', [CollaborationsController::class, 'updateStatus'])->name('collaborations.update-status');

                Route::resource('products', ProductsController::class);
                Route::post('products/{id}/update-status', [ProductsController::class, 'updateStatus'])->name('products.update-status');

                Route::resource('consent-terms', ConsentTermController::class);
                Route::post('consent-terms/{id}/update-status', [ConsentTermController::class, 'updateStatus'])->name('consent-terms.update-status');

                Route::resource('trainers', TrainersController::class);
                Route::post('trainers/{id}/update-status', [TrainersController::class, 'updateStatus'])->name('trainers.update-status');

                Route::resource('events', EventsController::class);
                Route::post('events/{id}/update-status', [EventsController::class, 'updateStatus'])->name('events.update-status');

                Route::resource('services', ServiceController::class);
                Route::post('services/{id}/update-status', [ServiceController::class, 'updateStatus'])->name('services.update-status');

                Route::resource('skills', SkillController::class);
                Route::post('skills/{id}/update-status', [SkillController::class, 'updateStatus'])->name('skills.update-status');

                Route::resource('virtual-assistants', VirtualAssistantController::class);
                Route::post('virtual-assistants/{id}/update-status', [VirtualAssistantController::class, 'updateStatus'])->name('virtual-assistants.update-status');

                Route::resource('payment-accounts', PaymentAccountController::class);
                Route::post('payment-accounts/{id}/update-status', [PaymentAccountController::class, 'updateStatus'])->name('payment-accounts.update-status');

                Route::resource('offices', OfficesController::class);
                Route::post('offices/{id}/update-status', [OfficesController::class, 'updateStatus'])->name('offices.update-status');

                Route::resource('faqs', FAQController::class);
                Route::post('faqs/{id}/update-status', [FAQController::class, 'updateStatus'])->name('faqs.update-status');

                Route::resource('evs-series', EVSSeriesController::class);
                Route::get('evs-series-data', [EVSSeriesController::class,'evsCategoryData'])->name('evs-categories.data');
                Route::get('evs-series/{id}/show', [QuizCertificationEnrollmentController::class, 'show'])->name('show');
                Route::post('evs-series/{id}/update-status', [EVSSeriesController::class, 'updateStatus'])->name('evs-series.update-status');
                Route::post('evs-series/{id}/delete', [EVSSeriesController::class, 'destroy'])->name('evs-series.delete');

                Route::resource('careers', CareerController::class);
                Route::post('careers/{id}/update-status', [CareerController::class, 'updateStatus'])->name('careers.update-status');

                Route::resource('blogs', BlogController::class);
                Route::post('blogs/{id}/update-status', [BlogController::class, 'updateStatus'])->name('blogs.update-status');

                Route::resource('redirect-urls', RedirectUrlController::class);
                Route::post('redirect-urls/{id}/update-status', [RedirectUrlController::class, 'updateStatus'])->name('redirect-urls.update-status');

                Route::resource('roles', RoleController::class);

            });
    });
});

