<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Enablers\FAQController;
use App\Http\Controllers\Enablers\BookController;
use App\Http\Controllers\Enablers\BlogController;
use App\Http\Controllers\Enablers\HomeController;
use App\Http\Controllers\Enablers\PressController;
use App\Http\Controllers\Enablers\EventsController;
use App\Http\Controllers\Enablers\HireVAController;
use App\Http\Controllers\Enablers\CareerController;
use App\Http\Controllers\Enablers\SupportController;
use App\Http\Controllers\Enablers\AboutUsController;
use App\Http\Controllers\Enablers\OfficesController;
use App\Http\Controllers\Enablers\ServiceController;
use App\Http\Controllers\Enablers\MissionController;
use App\Http\Controllers\Enablers\ConsentController;
use App\Http\Controllers\Enablers\TrainersController;
use App\Http\Controllers\Enablers\TrainingsController;
use App\Http\Controllers\Enablers\AppointmentController;
use App\Http\Controllers\Enablers\EnrollmentsController;
use App\Http\Controllers\Enablers\DevelopmentController;
use App\Http\Controllers\Enablers\ServiceRequestController;
use App\Http\Controllers\Enablers\CollaborationsController;
use App\Http\Controllers\Enablers\Success_StoriesController;
use App\Http\Controllers\Enablers\FranchiseApplicationController;
use App\Http\Controllers\Enablers\VirtualAssistantRequestController;

Route::get('evs-update-slugs', [TrainingsController::class, 'updateSlugs']);
Route::get('guest-visitor', [HomeController::class, 'guestVisitor'])->name('guest-visitor');
Route::post('confirm-visitor', [HomeController::class, 'confirmVisitor'])->name('confirm-visitor');

Route::group(['as'=>'app.'],function(){
    Route::get('/', [HomeController::class, 'index'])->name('welcome');

    Route::get('saqib-azhar', [TrainersController::class, 'showSaqibAzhar'])->name('trainers.show-saqib');
    Route::get('faisal-azhar', [TrainersController::class, 'showFaisalAzhar'])->name('trainers.show-faisal');
    Route::get('trainer/{slug}', [TrainersController::class, 'show'])->name('trainers.show');

    Route::group(['prefix' => 'trainings','as'=>'trainings.'],function(){
        Route::get('/', [TrainingsController::class, 'index'])->name('index');
        Route::get('enabling-video-series/{slug}', [TrainingsController::class, 'showCategories'])->name('showCategories');
        Route::get('{id}/batches', [TrainingsController::class, 'trainingBatches'])->name('batches');
        Route::get('{slug}', [TrainingsController::class, 'show'])->name('show');
    });

    ////////////////////////////////////////////  Start Support Routes //////////////////////////////////////////////////////////////////////////
    Route::get('support', [SupportController::class, 'index'])->name('support.index');

    Route::get('refund-request', [SupportController::class, 'refundRequestCreate'])->name('support.refundRequest.create');
    Route::post('refund-request', [SupportController::class, 'store'])->name('support.refundRequest.store');

    Route::get('payment-related-concern', [SupportController::class, 'paymentRelatedConcernCreate'])->name('support.paymentRelatedConcern.create');
    Route::post('payment-related-concern', [SupportController::class, 'store'])->name('support.paymentRelatedConcern.store');

    Route::get('training-related-concern', [SupportController::class, 'trainingRelatedConcernCreate'])->name('support.trainingRelatedConcern.create');
    Route::post('training-related-concern', [SupportController::class, 'store'])->name('support.trainingRelatedConcern.store');

    Route::get('change-of-training-request', [SupportController::class, 'changeOfTrainingRequestCreate'])->name('support.changeOfTrainingRequest.create');
    Route::post('change-of-training-request', [SupportController::class, 'store'])->name('support.changeOfTrainingRequest.store');

    Route::get('change-of-mentor-request', [SupportController::class, 'changeOfMentorRequestCreate'])->name('support.changeOfMentorRequest.create');
    Route::post('change-of-mentor-request', [SupportController::class, 'store'])->name('support.changeOfMentorRequest.store');

    Route::get('general-complaint', [SupportController::class, 'generalComplaintCreate'])->name('support.generalComplaint.create');
    Route::post('general-complaint', [SupportController::class, 'store'])->name('support.generalComplaint.store');

    Route::get('suggestions', [SupportController::class, 'suggestionsCreate'])->name('support.suggestions.create');
    Route::post('suggestions', [SupportController::class, 'store'])->name('support.suggestions.store');

    Route::get('evs-concern', [SupportController::class, 'evsConcernCreate'])->name('support.evsConcern.create');
    Route::post('evs-concern', [SupportController::class, 'store'])->name('support.evsConcern.store');

    Route::get('epas-concern', [SupportController::class, 'epasConcernCreate'])->name('support.epasConcern.create');
    Route::post('epas-concern', [SupportController::class, 'store'])->name('support.epasConcern.store');
    ////////////////////////////////////////////  End Support Routes ////////////////////////////////////////////////////////////////////////////

    Route::group(['prefix' => 'consents','as'=>'consents.'],function(){
        Route::get('submitted-successfully', [ConsentController::class, 'consentSuccess'])->name('consent-success');
        Route::get('{slug}', [ConsentController::class, 'create'])->name('create');
        Route::post('{slug}/store', [ConsentController::class, 'store'])->name('store');
    });

    Route::group(['prefix' => 'enrollment','as'=>'enrollment.'],function(){
        Route::get('create', [EnrollmentsController::class, 'create'])->name('create');
        Route::post('store', [EnrollmentsController::class, 'store'])->name('store');

        Route::post('confirm-enrollment', [EnrollmentsController::class, 'confirmEnrollment'])->name('confirm');

        Route::get('{id}/add-payment-proof', [EnrollmentsController::class, 'addPaymentProof'])->name('addPaymentProof');
        Route::post('{id}/store-payment-proof', [EnrollmentsController::class, 'storePaymentProof'])->name('storePaymentProof');
        Route::get('submitted-payment-proof', [EnrollmentsController::class, 'submittedPaymentProof'])->name('submittedPaymentProof');
    });
    Route::get('payment-proof', [EnrollmentsController::class, 'alreadyEnrolled'])->name('enrollment.verify');

    Route::get('seminars', [EventsController::class, 'index'])->name('seminars');
    Route::get('events', [EventsController::class, 'upcoming'])->name('upcoming-events');

    Route::get('about-us', [AboutUsController::class, 'index'])->name('about-us');

    Route::get('services', [ServiceController::class, 'index'])->name('services');
    Route::get('services-enrolment', [ServiceRequestController::class, 'create'])->name('services-enrolment.create');
    Route::post('services-enrolment', [ServiceRequestController::class, 'store'])->name('services-enrolment.store');

    Route::get('contact-us', [OfficesController::class, 'index'])->name('offices');
    Route::get('partners', [CollaborationsController::class, 'index'])->name('collaborations');
    Route::get('developments', [DevelopmentController::class, 'index'])->name('developments');
    Route::get('success-stories', [Success_StoriesController::class, 'index'])->name('success-stories');
    Route::get('press', [PressController::class, 'index'])->name('press');
    Route::get('mission', [MissionController::class, 'index'])->name('mission');
    Route::get('hire-va', [HireVAController::class, 'index'])->name('hire-va');

    Route::get('appointment', [AppointmentController::class, 'create'])->name('appointment.create');
    Route::post('appointment', [AppointmentController::class, 'store'])->name('appointment.store');
    Route::get('appointment-submitted', [AppointmentController::class ,'success'])->name('appointment.submitted');

    Route::get('virtual-assistant-request', [VirtualAssistantRequestController::class, 'create'])->name('va-request.create');
    Route::post('virtual-assistant-request', [VirtualAssistantRequestController::class, 'store'])->name('va-request.store');

    Route::get('career', [CareerController::class, 'index'])->name('career');

    Route::get('book', [BookController::class, 'index'])->name('book');
    Route::get('faqs', [FAQController::class, 'index'])->name('faqs');

    Route::group(['prefix' => 'franchise','as'=>'franchise.'],function(){
        Route::get('/', [FranchiseApplicationController::class , 'index'])->name('index');
        Route::get('application', [FranchiseApplicationController::class, 'create'])->name('application.create');
        Route::post('application', [FranchiseApplicationController::class, 'store'])->name('application.store');
        Route::get('application-submitted', [FranchiseApplicationController::class , 'success'])->name('application.submitted');
    });

    Route::get('terms-conditions', [HomeController::class , 'termsConditions'])->name('terms-conditions');
    Route::get('privacy-policy', [HomeController::class , 'privacyPolicy'])->name('privacy-policy');

    Route::get('blog', [BlogController::class, 'index'])->name('blogs');
    Route::get('{slug}', [BlogController::class, 'blogDetail'])->name('blogs.detail');
});
