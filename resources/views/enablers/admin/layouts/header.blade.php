<nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="{{ _asset(auth()->user()->profile_image_path) }}" class="user-image img-circle elevation-2" alt="User Image">
                <span class="d-none d-md-inline">{{ auth()->user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- User image -->
                <li class="user-header bg-primary">
                    <img src="{{ _asset(auth()->user()->profile_image_path) }}" class="img-circle elevation-2" alt="User Image">
                    <p>
                        {{ auth()->user()->name }} - Role: ___
                        <small>Member since {{ date('d M, Y',strtotime(auth()->user()->created_at)) }}</small>
                    </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body">
                    <div class="row">
                        <div class="col-4 text-center">
                            <a href="javascript:void(0);">Followers</a>
                        </div>
                        <div class="col-4 text-center">
                            <a href="javascript:void(0);">Sales</a>
                        </div>
                        <div class="col-4 text-center">
                            <a href="javascript:void(0);">Friends</a>
                        </div>
                    </div>
                    <!-- /.row -->
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <a href="javascript:void(0);" class="btn btn-default btn-flat">Profile</a>
                    <a href="javascript:void(0);" class="btn btn-default btn-flat float-right" onclick="document.getElementById('logout-form').submit();">Sign out</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                </li>
            </ul>
        </li>
    </ul>
</nav>
