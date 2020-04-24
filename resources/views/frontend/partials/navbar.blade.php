
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{route('home')}}"><img src="{{asset('images/products/'.'lo.png')}}" alt="" style="height: 52px; width: 80px;"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('products.index')}}">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contact')}}">Contact</a>
                    </li>
{{--                    <li class="nav-item dropdown">--}}
{{--                        <a class="nav-link dropdown-toggle" href="{{route('products')}}" id="navbarDropdown" role="button"--}}
{{--                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                            Product--}}
{{--                        </a>--}}
{{--                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
{{--                            <a class="dropdown-item" href="{{route('products')}}">Products</a>--}}
{{--                            <a class="dropdown-item" href="#">Another action</a>--}}
{{--                            <div class="dropdown-divider"></div>--}}
{{--                            <a class="dropdown-item" href="#">Something else here</a>--}}
{{--                        </div>--}}
{{--                    </li>--}}

                </ul>
                <form class="form-inline my-2 my-lg-0" action="{{route('search')}}" method="get">

                    <div class="input-group mb-3">
                        <input name="search" type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fa fa-search"></i></button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </nav>
