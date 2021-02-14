<!doctype html>
<html lang="en">
  <head>
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <script src="https://kit.fontawesome.com/a685fc21bb.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->    
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> --}}
    
    <link href="https://fonts.googleapis.com/css2?family=Epilogue:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Great+Vibes&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text&family=Epilogue:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Great+Vibes&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Elsie+Swash+Caps:wght@400;900&family=Nanum+Myeongjo:wght@400;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Epilogue:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Great+Vibes&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,700&display=swap" rel="stylesheet">    

    
    {{-- <link href="/css/lightbox.css" rel="stylesheet" /> --}}
    <link href="{{asset('/css/lightbox.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">

    <title>AMRITA</title>
  </head>
  <body>
    <div class="wrapper">
      <header>
        <menu>
          <div class="menu" id="menu">
            <a  title="HOME" href="/"><div class="menu logo" id="shop">.AMRITA.</div></a>
            <div class="menu mainMenu">              
              <div class="mainMenu5">
                <a href="/shop" class="aMain aMain5  transition {{Request::is('shop')  ? 'activeLink' : ' '}}">SHOP <i class="fa fa-chevron-down ico" aria-hidden="true"></i></a>

                <div id="containerCategory">            
                  @foreach ($categoriesMenu as $category)
                    <div><a href="/category/{{$category->slug}}"  class="aMain1">{{$category->name}} .{{$category->products->count()}}.</a></div>
                  @endforeach	            
                </div>

              </div>
              
              <div {{Request::is('about')  ? 'class=activeLink' : ' '}}><a href="/about" class="aMain">ABOUT <i class="fa fa-chevron-down ico" aria-hidden="true"></i></a></div>
              <div {{Request::is('contacts')  ? 'class=activeLink' : ' '}}> <a href="/contacts" class="aMain">CONTACTS <i class="fa fa-chevron-down ico" aria-hidden="true"></i></a></div>
              <div {{Request::is('journal')  ? 'class=activeLink' : ' '}}><a href="/journal" class="aMain">JOURNAL <i class="fa fa-chevron-down ico" aria-hidden="true"></i></a></div>
            </div>
            <div class="menu extraMenu">
              @guest
              @else
                  <div  title="My kabinet" class="icoMenu cabinet">
                    <a href="/cabinet"><i class="fa fa-user-o" aria-hidden="true"></i></a>
                  </div>                
              @endguest

                @guest
                    <li class="">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest

                <div title="My cart" class="icoMenu basket">                  
                  <button type="button" class="" data-toggle="modal" data-target="#exampleModal">
                  <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                  </button>
                  <div class="count-product" id="count-product">{{(session('cart')) ? array_sum(array_column( session('cart'), 'qty')) : 0}}</div>
                </div>
                <div  title="Search" class="icoMenu search">
                  <button type="button" class="" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
            
            </div>        
            
          </div>
        </menu>      
      </header>
    

      @yield('content')	

        <footer>
          <div class="footer">
            <div class="follow i-b">
              <p>FOLLOW</p>
              <div class="connection">
                <a href=""><div title="We are on twitter" class="i-b fol"><i class="icoFollow  fa fa-twitter" aria-hidden="true"></i></div></a>
                <a href="https://www.facebook.com/elena.elenskaya.58"><div title="We are on facebook" class="i-b fol"><i class="icoFollow1 fa fa-facebook" aria-hidden="true"></i></div></a>
                <a href=""><div title="We are on pinterest" class="i-b fol"><i class="icoFollow2 fa fa-pinterest-p" aria-hidden="true"></i></div></a>
                <a href=""><div title="We are on instagram" class="i-b fol"><i class="icoFollow3 fa fa-instagram" aria-hidden="true"></i></div></a>
                <a href="mailto:EElenchik1@gmail.com" target="_blank" rel="noopener noreferrer"><div title="Write to us" class="i-b fol"><i class="icoFollow4 fa fa-envelope-o" aria-hidden="true"></i></div></a>
              </div>
            </div>
            <div class="subscription i-b">
              <p class="links2">
                <a href="/contacts">CONTACT US</a>
                <a href="">FAQ</a>
                <a href="">SHIPPING & RETURNS</a>
                <a href="">SIZING</a>
              </p>
              <p class="links2">
                <a href="">SK JOURNAL</a>
                <a href="">LOOKBOOKS</a>
              </p>
              <p class="links2">Sign up to get the latest on sales, new releases and more …</p>
              <form action="">
                <input type="email" id="emailUser" name="emailUser" class="" placeholder="Enter your email address">
                <button class="">Subscribe</button>
              </form>
              <p class="links2"><i class="fa fa-copyright" aria-hidden="true"></i> 2020  Eenskaya Elena</p>
            </div>
          </div>
            
        </footer>        
        

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg modalCartCont">
            <div class="modal-content modalCart">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">My cart</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                @include('shop._cart')
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="/checkout" class="btn btn-primary">Checkout</a>
                <button type="button" class="btn btn-danger clear-cart">Clear cart</button>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <form action="/search" class="searchForm" method="GET">
              @csrf
              <input type="text" name="search" class="inputSearch" value="">
              <button class="butSearch"><i class="fa fa-search" aria-hidden="true"></i></i></button>
            </form>
            </div>
          </div>
        </div>

        <div class="modal fade bd-example-modal-lg-liks" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <p>To add a product to your favorites:</p>
              <p><a href="{{ route('login') }}"  class="btn btn-primary">Login</a>  or  <a href="{{ route('register') }}"  class="btn btn-primary">Register</a></p>
            </div>
          </div>
        </div>

    <script src="{{asset('/js/app.js')}}"></script>
  </body>
</html>