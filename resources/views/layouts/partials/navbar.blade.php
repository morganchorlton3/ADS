<div class="top-bar">
	<div class="container">
		<div class="d-flex flex-row-reverse">
			<div class="col-md-6 d-flex flex-row-reverse">
				<ul id="top-header-menu" class="top-nav clearfix pr-4">
                    @guest
                    <li><a href="{{ route('register') }}"><i class="fas fa-user fa-fw mr-2 "></i>Register</a></li>
                    <li><a href="{{ route('login') }}"><i class="fas fa-sign-in-alt fa-fw mr-2 "></i>Log in</a></li>
                    @else
                    <li><a href="{{ route('account.manage') }}"><i class="fas fa-user fa-fw mr-2 "></i>Account</a></li>
                    <li><a href="{{ route('logout') }}"><i class="fas fa-sign-out-alt fa-fw mr-2 "></i>Log Out</a></li>
                    @can('manage-users')
                    <li><a href="{{ route('admin.index') }}"><i class="fas fa-shield-alt"></i> Admin Panel</a></li>
                    @endcan
                    @endguest
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="col-lg-12 row banner pt-4 pb-4 m-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <img src="{{ asset('img/banner-1.png')}}" class="img-fluid mx-auto d-block" style="height: 70px;" alt="">
            </div>
            <div class="col-lg-9 d-flex align-items-center">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search..." aria-label="Search..." aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
        {{--<img src="{{ asset('img/banner-1.png')}}" alt="">--}}
</div>
<!-- Main Nav -->
<div class="container mt-4">
    <div class="row col-lg-12">
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg navbar-classic shadow p-3">
                <!--<a class="navbar-brand" href="https://jituchauhan.com/quanto/"> Shop Co</a>-->
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbar-classic" aria-controls="navbar-classic" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar top-bar mt-0"></span>
                    <span class="icon-bar middle-bar"></span>
                    <span class="icon-bar bottom-bar"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar-classic">
                    <div class="col-lg-9">
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0 mr-3">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">
                                    Home
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="menu-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Groceries
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="menu-2">
                                    @foreach($parentCategories as $category)
                                    <li class="dropdown-submenu">
                                        <a class="dropdown-item dropdown-toggle" href="{{ route('category', $category->slug) }}">{{ $category->name}}</a>
                                        <ul class="dropdown-menu ">
                                            @if(count($category->subcategory))
                                                @include('subCategoryList',['subcategories' => $category->subcategory])
                                            @endif 
                                        </ul>
                                    </li>
                                    @endforeach                                    
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="col-lg-3 d-none d-lg-block">
            <nav class="navbar navbar-expand-lg navbar-classic shadow p-3" style="font-size:30px;">
                <a class="mx-auto nav-brand">Total: £ {{ number_format(cartTotal(), 2, '.', '') }}</a>
            </nav>
        </div>
    </div>
</div>