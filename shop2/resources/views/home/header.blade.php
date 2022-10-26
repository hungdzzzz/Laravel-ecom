<header class="header_section">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" href="{{url('/')}}"><img width="250" src="images/logo.png" alt="#" /></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="nav-item active">
                           <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                        </li>
                       <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
                           <ul class="dropdown-menu">
                              
                           </ul>
                        </li>
                     
                        
                        <li class="nav-item">
                           <a class="nav-link" href="/">Account</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="contact.html">Contact</a>
                           @if (Route::has('login'))

@auth

<li class="nav-item">
   <a class="nav-link"  href="{{url('show_cart')}}"><i class="fas fa-shopping-cart" ></i>Cart  [{{App\Models\cart::where('user_id','=',Auth::user()->id)->count()}}]</span></a>
</li>
<!-- order -->
                      <li class="nav-item">
                           <a class="nav-link" href="{{url('showorder')}}">Order [{{App\Models\order::where('user_id','=',Auth::user()->id)->count()}}]</a>
                        </li>
                        </li> 


@else

 <li class="nav-item">
   <a class="nav-link"    href="{{url('show_cart')}}"><i class="fas fa-shopping-cart"></i>Cart </a>
</li>


<li class="nav-item">
                           <a class="nav-link" href="{{url('showorder')}}">Order</a>

@endauth

@endif
                     </a>
                        </li>
                      
                        
                        @if(Route::has('login'))
                        @auth
                        <li><a class="btn btn-danger"  href="{{ route('logout') }}"onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>
                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                      @else
                        <li class="nav-item">
                           <a class="btn btn-primary" id="logincss" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                           <a class="btn btn-success" href="{{ route('register') }}">Register</a>
                        </li>
                        @endauth
                        @endif
                        
                     </ul>
                  </div>
               </nav>
            </div>
         </header>
