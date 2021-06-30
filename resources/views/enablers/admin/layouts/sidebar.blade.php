<!-- /.Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ _asset('assets-admin/img/enablers-logo-mini-bg-transparent.png') }}" alt="Enablers Mini Logo" class="brand-image">
        <span class="brand-text">
            <img src="{{ _asset('assets-admin/img/enablers-logo-orange.png') }}" alt="Enablers Admin Logo" class="brand-image" style="margin-left: 0;">
        </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column pb-5 mb-5" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                <li class="nav-header">Reports</li>
                @can('isAdminOrSupportOrAccounts')
                    <li class="nav-item p-nav {{ request()->is('admin/enrollments*') ? 'menu-open' : '' }}">
                        <a href="javascript:void(0);" class="c-link nav-link">
                            <i class="fas fa-id-badge nav-icon"></i>
                            <p>Enrollments<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('enrollments.trainings.index') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Training Enrollments</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('enrollments.seminars.index') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Seminar Enrollments</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('enrollments.book-orders.index') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Book Orders List</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan()

                @can('isAdminOrSupport')
                    <li class="nav-item p-nav {{ request()->is('admin/appointments*') ? 'menu-open' : '' }}">
                        <a href="javascript:void(0);" class="c-link nav-link" >
                            <i class="far fa-calendar-check nav-icon"></i>
                            <p>Appointments<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('appointments.index') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>View Appointment List</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item p-nav {{ request()->is('admin/consents*') ? 'menu-open' : '' }}">
                        <a href="javascript:void(0);" class="c-link nav-link" >
                            <i class="fas fa-file-contract nav-icon"></i>
                            <p>User Consents<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('consents.student-consent.index') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Student Consents</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('consents.exl-consent.index') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>EXL Consents</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('consents.one-year-consent.index') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>One year Consents</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('consents.listing-promoter-consent.index') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Listing Promoter Consents</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('consents.fba-wholesale-consent.index') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Fba Wholesale  Consents</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item p-nav {{ request()->is('admin/support-requests*') ? 'menu-open' : '' }}">
                        <a href="javascript:void(0);" class="c-link nav-link" >
                            <i class="fas fa-envelope nav-icon"></i>
                            <p>Support Request<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('support-requests.refund.index') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Refund Requests</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('support-requests.payment-concern.index') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Payment Related Concern </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('support-requests.evs-concern.index') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>EVS Concern </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('support-requests.training-concern.index') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Training related Concern </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('support-requests.change-training.index') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Change of Training </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('support-requests.change-mentor.index') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Change of Mentor</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('support-requests.general-complaint.index') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>General Complaint</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('support-requests.suggestions.index') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Suggestions</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('support-requests.epas-concern.index') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>EPAS Concern</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item p-nav {{ request()->is('admin/virtual-assistant-requests*')? 'menu-open' : '' }}">
                        <a href="javascript:void(0);" class="c-link nav-link" >
                            <i class="fas fa-user-tie nav-icon"></i>
                            <p>VA Requests<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('va-request.index') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>VA Requests Table</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item p-nav {{ request()->is('admin/franchise-applications*')? 'menu-open' : '' }}">
                        <a href="javascript:void(0);" class="c-link nav-link" >
                            <i class="fas fa-school nav-icon"></i>
                            <p>Franchise Applications<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('franchise-applications.index') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Franchise Applications</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-header">EVS Reports</li>
                    <li class="nav-item p-nav {{ request()->is('admin/evs-users*') ? 'menu-open' : '' }}">
                        <a href="javascript:void(0);" class="c-link nav-link" >
                            <i class="fas fa-video nav-icon"></i>
                            <p>EVS Users<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('evs-users.index') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>EVS Users List</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item p-nav {{ request()->is('admin/evs-series*') ? 'menu-open' : '' }}">
                        <a href="javascript:void(0);" class="c-link nav-link" >
                            <i class="fas fa-cogs nav-icon"></i>
                            <p>EVS Categories<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('evs-series.create') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Add New Category</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('evs-series.index') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>EVS Categories List</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-header">Quiz & Certificate</li>
                    <li class="nav-item p-nav {{ request()->is('quiz-certification/admin/enrollments*')? 'menu-open' : '' }}">
                        <a href="javascript:void(0);" class="c-link nav-link" >
                            <i class="fas fa-font nav-icon"></i>
                            <p>Quiz Enrollments<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('quiz-enrollments.index') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Quiz Enrollments List</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item p-nav {{ request()->is('admin/users*') ? 'menu-open' : '' }}">
                        <a href="javascript:void(0);" class="c-link nav-link" >
                            <i class="fas fa-users nav-icon"></i>
                            <p>Examiners<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('examiners.create') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Add New Examiner</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('examiners.index') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Examiners List</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan()

                <li class="nav-header">App Setting</li>
                @can('isAdmin')
                    <li class="nav-item p-nav {{ request()->is('admin/slider-images*') ? 'menu-open' : '' }}">
                        <a href="javascript:void(0);" class="c-link nav-link">
                            <i class="fas fa-images nav-icon"></i>
                            <p>Slider Images<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('slider-images.create') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Add New Slider Image</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('slider-images.index') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Slider Images List</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item p-nav {{ request()->is('admin/achievements*') ? 'menu-open' : '' }}">
                        <a href="javascript:void(0);" class="c-link nav-link" >
                            <i class="fas fa-award nav-icon"></i>
                            <p>Achievements<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('achievements.create') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Add New Achievement</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('achievements.index') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Achievements List</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item p-nav {{ request()->is('admin/objectives*') ? 'menu-open' : '' }}">
                        <a href="javascript:void(0);" class="c-link nav-link" >
                            <i class="fas fa-trophy nav-icon"></i>
                            <p>Objectives<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('objectives.create') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Add New Objective</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('objectives.index') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Objectives List</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item p-nav {{ request()->is('admin/milestones*') ? 'menu-open' : '' }}">
                        <a href="javascript:void(0);" class="c-link nav-link" >
                            <i class="fas fa-landmark nav-icon"></i>
                            <p>Milestones<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('milestones.create') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Add New Milestone</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('milestones.index') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Milestones List</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item p-nav {{ request()->is('admin/collaborations*') ? 'menu-open' : '' }}">
                        <a href="javascript:void(0);" class="c-link nav-link" >
                            <i class="fas fa-file-signature nav-icon"></i>
                            <p>Collaborations<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('collaborations.create') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Add New Collaboration</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('collaborations.index') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Collaborations List</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item p-nav {{ request()->is('admin/products*') ? 'menu-open' : '' }}">
                        <a href="javascript:void(0);" class="c-link nav-link" >
                            <i class="fas fa-project-diagram nav-icon"></i>
                            <p>Products<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('products.create') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Add New Product</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('products.index') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Products List</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item p-nav {{ request()->is('admin/events*') ? 'menu-open' : '' }}">
                        <a href="javascript:void(0);" class="c-link nav-link" >
                            <i class="fas fa-bullhorn nav-icon"></i>
                            <p>Events<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('events.create') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Add New Event</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('events.index') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Events List</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item p-nav {{ request()->is('admin/trainers*') ? 'menu-open' : '' }}">
                        <a href="javascript:void(0);" class="c-link nav-link" >
                            <i class="fas fa-chalkboard-teacher nav-icon"></i>
                            <p>Trainers<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('trainers.create') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Add New Trainer</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('trainers.index') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Trainers List</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan()

                @can('isAdminOrSupport')
                    <li class="nav-item p-nav {{ request()->is('admin/trainings*') || request()->is('admin/cities*') ? 'menu-open' : '' }}">
                        <a href="javascript:void(0);" class="c-link nav-link" >
                            <i class="fas fa-graduation-cap nav-icon"></i>
                            <p>Trainings<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('trainings.create') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Add New Training</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('trainings.index') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Trainings List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('training-batches.create') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Add Training Batches</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('training-batches.index') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Training Batches</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('cities.create') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Add Training City</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('cities.index') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Training Cities</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan()

                @can('isAdmin')

                    <li class="nav-item p-nav {{ request()->is('admin/payment-accounts*') ? 'menu-open' : '' }}">
                        <a href="javascript:void(0);" class="c-link nav-link" >
                            <i class="fas fa-money-check-alt nav-icon"></i>
                            <p>Payment Accounts<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('payment-accounts.create') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Add Payment Account</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('payment-accounts.index') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Payment Accounts List</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item p-nav {{ request()->is('admin/virtual-assistants*') ? 'menu-open' : '' }}">
                        <a href="javascript:void(0);" class="c-link nav-link" >
                            <i class="fas fa-user-tie nav-icon"></i>
                            <p>Virtual Assistant<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('skills.create') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Add New Skill</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('skills.index') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Skills List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('virtual-assistants.create') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Add New Virtual Assistant</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('virtual-assistants.index') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Virtual Assistants List</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item p-nav {{ request()->is('admin/services*') ? 'menu-open' : '' }}">
                        <a href="javascript:void(0);" class="c-link nav-link" >
                            <i class="fas fa-globe nav-icon"></i>
                            <p>Services<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('services.create') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Add New Services</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('services.index') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Services List</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item p-nav {{ request()->is('admin/consent-terms*') ? 'menu-open' : '' }}">
                        <a href="javascript:void(0);" class="c-link nav-link" >
                            <i class="fas fa-file-contract nav-icon"></i>
                            <p>Consent Terms<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('consent-terms.create') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Add New Consent Terms</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('consent-terms.index') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Consent Terms List</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item p-nav {{ request()->is('admin/offices*') ? 'menu-open' : '' }}">
                        <a href="javascript:void(0);" class="c-link nav-link" >
                            <i class="fas fa-building nav-icon"></i>
                            <p>Offices<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('offices.create') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Add New Office</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('offices.index') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Offices List</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item p-nav {{ request()->is('admin/careers*') ? 'menu-open' : '' }}">
                        <a href="javascript:void(0);" class="c-link nav-link" >
                            <i class="fas fa-briefcase nav-icon"></i>
                            <p>Careers<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('careers.create') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Add New Career</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('careers.index') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Careers List</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item p-nav {{ request()->is('admin/blogs*') ? 'menu-open' : '' }}">
                        <a href="javascript:void(0);" class="c-link nav-link" >
                            <i class="fab fa-blogger nav-icon"></i>
                            <p>Blogs<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('blogs.create') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Add New Blog</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('blogs.index') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Blogs List</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item p-nav {{ request()->is('admin/redirect-urls*') ? 'menu-open' : '' }}">
                        <a href="javascript:void(0);" class="c-link nav-link" >
                            <i class="fas fa-link nav-icon"></i>
                            <p>Redirect Urls<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('redirect-urls.create') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Add New Redirect Url</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('redirect-urls.index') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Redirect Urls List</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item p-nav {{ request()->is('admin/faqs*') ? 'menu-open' : '' }}">
                        <a href="javascript:void(0);" class="c-link nav-link" >
                            <i class="fa fa-question-circle nav-icon"></i>
                            <p>FAQS<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('faqs.create') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Add New FAQ</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('faqs.index') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>FAQS List</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item p-nav {{ request()->is('admin/roles*') ? 'menu-open' : '' }}">
                        <a href="javascript:void(0);" class="c-link nav-link" >
                            <i class="fas fa-user-tag nav-icon"></i>
                            <p>Roles<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('roles.create') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Add New Role</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('roles.index') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Roles List</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item p-nav {{ request()->is('admin/examiners*') ? 'menu-open' : '' }}">
                        <a href="javascript:void(0);" class="c-link nav-link" >
                            <i class="fas fa-users nav-icon"></i>
                            <p>Users<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('users.create') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Add New User</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('users.index') }}" class="nav-link">
                                    <i class="fas fa-minus nav-icon"></i>
                                    <p>Users List</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                @endcan()
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
