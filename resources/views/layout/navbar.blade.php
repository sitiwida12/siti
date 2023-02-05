<div class="main-menu-wrap">
    <!-- logo -->
    <div class="site-logo">
        <a href="/">
            <img src=" {{ asset('/assets/img/logo.png') }}" alt="">
        </a>
    </div>
    <!-- logo -->

    <!-- menu start -->
    <nav class="main-menu">
        <ul id="menu-nav">
            <li class="{{ ($active === "index") ? 'current-list-item' : '' }}">
                <a href="/">Home</a>
            </li>
            <li class="{{ ($active === "about") ? 'current-list-item' : '' }}">
                <a href="/about">About</a></li>
              
            <li class="{{ ($active === "contact") ? 'current-list-item' : '' }}">
                <a href="/contact">Contact</a></li>

            <li><a href="/user/purchase">Purchase</a></li>
            
            {{-- <li class="{{ ($active === "shop") ? 'current-list-item' : '' }}"> --}}
                {{-- <a href="/user/purchase">Shop</a> --}}
                {{-- <ul class="sub-menu"> --}}
                    {{-- <li><a href="/user/purchase">Purchase</a></li> --}}
                    {{-- <li><a href="/checkout">Check Out</a></li> --}}
                    {{-- <li><a href="single-product.html">Products</a></li> --}}
                    {{-- <li><a href="/cart">Cart</a></li> --}}
                {{-- </ul> --}}
            {{-- </li> --}}
            
            <li>
                
                    {{-- <a class="shopping-cart" href="/cart"><i class="fas fa-shopping-cart"></i></a> --}}
                    {{-- <a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a> --}}
                    
                    @auth
                  
                    <a id="dropdownMenuLink" href="#" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="false" ><i class="fas fa-user" title="Halo! {{Str::ucfirst(auth()->user()->name)  }}"></i></a>
                    <ul id="menu-user" class="d-none sub-menu">
                        <li>
                            <a href="/seller" class="d-block">Dashboard Seller</a>
                        </li>
                        @can('admin')
                        <li>
                            <a href="/dashboard" class="d-block">Dashboard Admin</a>
                        </li>
                        @endcan
                        <li>
                            <form action="/logout" method="POST">
                                @csrf
                                <a href="javascript:$('form').submit()" class="d-block">Logout</a>
                            </form>
                        </li>
                    </ul>
                    @else
    
                        <a class="border px-4 py-2 m-auto" href="/login" role="button">Login</a>
                    @endauth
              

               
               

            </li>
            
          
        </ul>
       
    </nav>
    <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
    
    <div class="mobile-menu"></div>
    <!-- menu end -->
</div>