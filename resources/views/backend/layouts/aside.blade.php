@section('aside')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jvectormap@2.0.4/jquery-jvectormap.min.css">
    <div class="g-navigation">
        <header class="g-header">
            <a class="g-header__title d-flex align-items-center justify-content-center" href="index.html">
                <i class="far fa-clone"></i>
                <span class="g-header__site-name">Laravel</span>
            </a>

            <div class="d-flex justify-content-between">
                <div class="d-flex align-items-center">
                    <a class="g-header__sidebar-toggle" href="javascript:void(0)">
                        <i class="fas fa-bars"></i>
                    </a>
                </div>

                <ul class="nav d-flex align-items-center">
                    <li class="g-header__nav-item dropdown">
                        <a class="g-header__nav-link nav-link dropdown-toggle d-flex active align-items-center" href="#">
                            <img class="g-header__profile-photo rounded-circle" src="{{url('lib/uploads/users/'.Auth::user()->image)}}">{{Auth::user()->username}}
                            <span class=" fa fa-angle-down"></span>
                        </a>
                    </li>


                    <li class="g-header__nav-item dropdown">
                        <a class="g-header__nav-link nav-link dropdown-toggle d-flex active align-items-center" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="g-header__icon g-header__icon--caret fas fa-caret-down"></i>
                        </a>
                        <div class="g-notification dropdown-menu dropdown-menu-right">
                            <a class="g-notification__item dropdown-item" href="#">Help</a>
                            <a class="g-notification__item dropdown-item" href="#">Activity Log</a>
                            <a class="g-notification__item dropdown-item" href="#">Preferences</a>
                            <a class="g-notification__item dropdown-item" href="#">
                                Settings
                                <span class="badge badge-pill badge-danger float-right">50%</span>
                            </a>
                            <div class="g-notification__divider dropdown-divider"></div>
                            <a class="g-notification__item dropdown-item" href="{{route('logout')}}">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </header>

        <nav class="g-sidebar">
            <div class="g-sidebar__profile container d-flex active align-items-center">
                <img class="g-sidebar__profile-photo rounded-circle img-fluid" src="{{url('lib/uploads/users/'.Auth::user()->image)}}" />

                <div class="g-sidebar__details">
                    <span class="g-sidebar__profile-message">Welcome,</span>
                    <span class="g-sidebar__profile-name">{{Auth::user()->username}}</span>
                </div>
            </div>

            <div class="g-sidebar__menu">
                <ul class="g-sidebar__menu-list">
                    <li class="g-sidebar__menu-item">
                        <a class="g-sidebar__menu-link" href="{{route('dashboard')}}">
                            <i class="g-sidebar__menu-icon fas fa-home"></i>
                            <span class="g-sidebar__menu-description">Dashboard</span>
                        </a>
                    </li>
                </ul>

                <span class="g-sidebar__menu-title">General</span>

                <ul class="g-sidebar__menu-list">
                    <li class="g-sidebar__menu-item">
                <a class="g-sidebar__menu-link" href="{{route('privilege')}}">
                    Manage Privilege
                </a>
                    </li>
                </ul>



                <ul class="g-sidebar__menu-list">
                    <li class="g-sidebar__menu-item">
                        <a class="g-sidebar__menu-link">
                            <i class="g-sidebar__menu-icon far fa-window-restore"></i>
                            <span class="fa fa-chevron-down">Users</span>
                        </a>
                        <ul class="g-sidebar__menu-list">
                            <li class="g-sidebar__menu-item">
                                <a class="g-sidebar__menu-link" href="{{route('add-user')}}">
                                    Add User
                                </a>
                            </li>
                            <li class="g-sidebar__menu-item">
                                <a class="g-sidebar__menu-link" href="{{route('users')}}">
                                    Show Users
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="g-sidebar__menu-item">
                        <a class="g-sidebar__menu-link">
                            <i class="g-sidebar__menu-icon fas fa-file"></i>
                            <span class="g-sidebar__menu-description">Table</span>
                        </a>
                        <ul class="g-sidebar__menu-list">
                            <li class="g-sidebar__menu-item">
                                <a class="g-sidebar__menu-link" href="pages-blank.html">
                                    Blank
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="g-sidebar__menu-item">
                        <a class="g-sidebar__menu-link">
                            <!-- <i class="g-sidebar__menu-icon fas fa-sitemap"></i> -->
                            <!-- <i class="g-sidebar__menu-icon fas fa-bars"></i> -->
                            <i class="g-sidebar__menu-icon fas fa-list-ul"></i>
                            <span class="g-sidebar__menu-description">Multilevel Menu</span>
                        </a>

                        <!-- First Level Menu -->
                        <ul class="g-sidebar__menu-list">
                            <li class="g-sidebar__menu-item">
                                <a class="g-sidebar__menu-link" href="javascript:void(0)">
                                    Level One
                                </a>
                            </li>
                            <li class="g-sidebar__menu-item">
                                <a class="g-sidebar__menu-link" href="javascript:void(0)">
                                    Level One
                                </a>

                                <!-- Second Level Menu -->
                                <ul class="g-sidebar__menu-list">
                                    <li class="g-sidebar__menu-item">
                                        <a class="g-sidebar__menu-link" href="javascript:void(0)">
                                            Level Two
                                        </a>
                                    </li>
                                    <li class="g-sidebar__menu-item">
                                        <a class="g-sidebar__menu-link" href="javascript:void(0)">
                                            Level Two
                                        </a>
                                    </li>
                                    <li class="g-sidebar__menu-item">
                                        <a class="g-sidebar__menu-link" href="javascript:void(0)">
                                            Level Two
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="g-sidebar__menu-item">
                                <a class="g-sidebar__menu-link" href="javascript:void(0)">
                                    Level One
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

@stop