 <!-- header start -->
 <div class="header-classic">
    <!-- top header start -->
    <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-8 col-sm-12 col-12 d-none d-xl-block d-lg-block d-md-block">
                    <p>Account</p>
                </div>
                <div class="col-xl-7 col-lg-6 col-md-4 col-sm-12 col-12 d-flex justify-content-end">
                    <ul class="list-unstyled">
                        @guest
                        <li><a href="{{ route('register') }}"><i class="fas fa-user fa-fw mr-2 "></i>Register</a></li>
                        <li><a href="{{ route('login') }}"><i class="fas fa-sign-in-alt fa-fw mr-2 "></i>Log in</a></li>
                        @else
                        <li><a href="{{ route('register') }}"><i class="fas fa-user fa-fw mr-2 "></i>Account</a></li>
                        <li><a href="{{ route('logout') }}"><i class="fas fa-sign-out-alt fa-fw mr-2 "></i>Log Out</a></li>
                        @can('manage-users')
                        <li><a href="{{ route('admin.users.index') }}"><i class="fas fa-user-shield fa-fw mr-2 "></i>Manage Users</a></li>
                        @endcan
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- top header close -->
    <!-- navigation start -->
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <nav class="navbar navbar-expand-lg navbar-classic">
                    <a class="navbar-brand" href="https://jituchauhan.com/quanto/"> Shop Co</a>
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbar-classic" aria-controls="navbar-classic" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar top-bar mt-0"></span>
                        <span class="icon-bar middle-bar"></span>
                        <span class="icon-bar bottom-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbar-classic">
                        <ul class="navbar-nav ml-auto mt-2 mt-lg-0 mr-3">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="menu-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Groceries
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="menu-2">
                                    @foreach($parentCategories as $category)
                                    <li class="dropdown-submenu">
                                        <a class="dropdown-item dropdown-toggle" href="#">{{ $category->name}}</a>
                                        <ul class="dropdown-menu ">
                                            @if(count($category->subcategory))
                                                @include('subCategoryList',['subcategories' => $category->subcategory])
                                            @endif 
                                        </ul>
                                    </li>
                                    @endforeach
                                    <li class="dropdown-submenu">
                                        <a class="dropdown-item dropdown-toggle" href="#">Demo 2</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">
                                                    Demo sub two</a>
                                            </li>
                                            <li><a class="dropdown-item" href="#">
                                                    Demo sub three</a>
                                            </li>
                                           
                                        </ul>
                                    </li>
                                    
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact-us.html">Contact</a>
                            </li>
                        </ul>
                        <a href="#" class="btn btn-brand btn-rounded btn-sm">Get Started Now</a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- navigation close -->
</div>
<!-- header close -->