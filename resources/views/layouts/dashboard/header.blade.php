<div class="main-wrapper">
    <!-- Preloader -->
    <div id="preloader">
        <!-- Add your preloader animation or message here -->
        <div class="loader">Loading...</div>
    </div>

    <div class="header">
        <div class="header-left">
            <a href="{{ route('dashboard') }}" class="logo">
                <img src="{{ asset('dash/assets/img/logo.png') }} " width="35" height="35" alt="">
                <span>Preclinic</span>
            </a>
        </div>
        <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
        <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
        <ul class="nav user-menu float-right">
            <li class="nav-item dropdown d-none d-sm-block">

           
            </li>

            <li class="nav-item dropdown has-arrow">
                {{-- <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                    <span class="user-img">
                        <img class="rounded-circle" src="{{ asset('dash/assets/img/user.jpg') }} " width="24"
                            alt="Admin">
                        <span class="status online"></span>
                    </span>
                    <span>logout</span>
                </a> --}}
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="logout-button">
                    <span class="user-img">
                        <img class="rounded-circle" src="{{ asset('dash/assets/img/user.jpg') }}" width="24"
                            alt="Admin">
                        <span class="status online"></span>
                    </span>
                    <span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

            </li>
        </ul>
        <div class="dropdown mobile-user-menu float-right">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                    class="fa fa-ellipsis-v"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="profile.html">My Profile</a>
                <a class="dropdown-item" href="edit-profile.html">Edit Profile</a>
                <a class="dropdown-item" href="settings.html">Settings</a>
                <a class="dropdown-item" href="login.html">Logout</a>
            </div>
        </div>

        <div id="notification" class="">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>

    </div>



    <script>
        // Remove the notification after 5 seconds (5000 milliseconds)
        setTimeout(function() {
            document.getElementById('notification').remove();
        }, 5000); // Adjust the duration as needed
    </script>
