<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="profile-image">
                    <img class="img-xs rounded-circle" src="{{asset('images/admins/'.Auth::user()->avatar)}}" alt="profile image">
                    <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                    <p class="profile-name">{{ Auth::user()->name }}</p>
                    <p class="designation">{{  Auth::user()->type }}</p>
                </div>
            </a>
        </li>
        <li class="nav-item nav-category">Main Menu</li>
        <li class="nav-item">
            <a class="nav-link"  href="{{route('admin.index')}}">
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#products" aria-expanded="false" aria-controls="products">

                <span class="menu-title">Products</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="products">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.products')}}">List</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#orders" aria-expanded="false" aria-controls="orders">

                <span class="menu-title">Orders</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="orders">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.orders')}}">List</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#categories" aria-expanded="false" aria-controls="categories">

                <span class="menu-title">Categories</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="categories">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.categories')}}">List</a>
                    </li>

                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#brands" aria-expanded="false" aria-controls="brands">

                <span class="menu-title">Brands</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="brands">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.brands')}}">List</a>
                    </li>

                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#division" aria-expanded="false" aria-controls="division">

                <span class="menu-title">Division</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="division">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.divisions')}}">List</a>
                    </li>

                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#districts" aria-expanded="false" aria-controls="districts">

                <span class="menu-title">Districts</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="districts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.districts')}}">List</a>
                    </li>

                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#sliders" aria-expanded="false" aria-controls="sliders">

                <span class="menu-title">Sliders</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="sliders">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.sliders')}}">List</a>
                    </li>

                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">

                <span class="menu-title">Users</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.users')}}"> List </a>
                    </li>
                </ul>
            </div>
        </li>

{{--        <li class="nav-item">--}}
{{--            <a class="nav-link">--}}
{{--                <form class="form-inline" action="{{ route('admin.logout') }}"  method="post">--}}
{{--                    @csrf--}}
{{--                    <input type="submit" value="Logout Now" class="btn btn-danger">--}}
{{--                </form>--}}
{{--            </a>--}}
{{--        </li>--}}

    </ul>
</nav>
