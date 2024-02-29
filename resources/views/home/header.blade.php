<!-- header inner -->
<div class="header">
   <div class="container-fluid">
      <div class="row">
         <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
            <div class="full">
               <div class="center-desk">
                  <div class="logo">
                     <a href="{{url('/')}}" style="text-align: center; display: block;">
                        <img src="images/logoad.png" alt="#" style="width: 100px; height: 60px; border-radius: 10px; box-shadow: 2px 2px 5px #888888;" />
                     </a>

                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
            <nav class="navigation navbar navbar-expand-md navbar-dark ">
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarsExample04">
                  <ul class="navbar-nav mr-auto">
                     <li class="nav-item active">
                        <a class="nav-link" href="{{url('/')}}">Home</a>
                     </li>
                     
                     <li class="nav-item">
                        <a class="nav-link" href="{{url('our_rooms')}}">Our room</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="{{url('hotel_gallary')}}">Gallery</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="{{url('contact_us')}}">Contact Us</a>
                     </li>

                     @if (Route::has('login'))
                    @auth

                    <x-app-layout>
  
                     </x-app-layout>

                    @else
                    <li class="nav-item">
                        <a class="nav-link btn" style="padding-left: 20px ;" href="{{url('login')}}">
                           <i class="fas fa-sign-in-alt" style="color: #007BFF;"></i> Login
                        </a>
                     </li>

                        @if (Route::has('register'))

                        <li class="nav-item">
                        <a class="nav-link btn" href="{{url('register')}}">
                           <i class="fas fa-user-plus" style="color: #007BFF;"></i> Register
                        </a>
                     </li>

                        @endif
                    @endauth
         
            @endif



                  </ul>
               </div>   
            </nav>
         </div>
      </div>
   </div>
</div>