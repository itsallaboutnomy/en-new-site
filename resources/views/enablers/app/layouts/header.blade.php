<!-- Start Navigation -->
<header id="header" class="navigation-wrap start-header start-style px-5">
    <div class="container-fuild">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ _asset('assets-app/img/Enablers-logo.png') }}" alt="Enablers-logo"></a>
                    <div class="mobile-bt-rap">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="head-support-btn d-block d-lg-none position-static">
                            <a href="javascript:void(0)">
                                <img src="{{ _asset('assets-app/img/Enablers-support-icon.png') }}">
                                <span class="d-block text-white">Support</span>
                            </a>
                        </div>
                    </div>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto py-4 py-md-0">
                            <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                <a class="nav-link text-uppercase" href="{{ route('app.about-us') }}">About</a>
                            </li>
                            <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                <a class="nav-link text-uppercase" href="{{ route('app.services') }}">Services</a>
                            </li>
                            <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                <a class="nav-link text-uppercase" href="{{ route('app.trainings.index') }}">Trainings</a>
                            </li>
                            <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                <a class="nav-link text-uppercase" href="{{ route('app.seminars') }}">Seminars</a>
                            </li>
                            <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                <a class="nav-link text-uppercase" href="https://www.enablers.org/marketplace/">marketplace</a>
                            </li>
                            <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                <a class="nav-link text-uppercase" href="https://worc.enablerspk.com/">worc</a>
                            </li>
                            <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                <a class="nav-link text-uppercase" href="{{ route('app.franchise.index') }}">School & Colleges</a>
                            </li>
                            <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                <a class="nav-link text-uppercase" href="{{ route('app.offices') }}">Offices</a>
                            </li>
                        </ul>
                        <div class="head-support-btn d-none d-lg-block">
                            <a href="{{ route('app.support.index') }}">
                                <img src="{{ _asset('assets-app/img/Enablers-support-icon.png') }}">
                                <span class="d-block text-white">Support</span>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- End Navigation -->
