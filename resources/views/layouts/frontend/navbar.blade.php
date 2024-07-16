 <div class="row">
     <div class="col-lg-2 col-md-3 no-padding col-sm-12 nav-img">
         <img src="{{ asset('frontend/assets/images/logo.jpg') }} " alt="">
         <a data-toggle="collapse" data-target="#menu" href="#menu"><i
                 class="fas d-block d-md-none small-menu fa-bars"></i></a>
     </div>
     <div id="menu" class="col-lg-8 col-md-9 d-none d-md-block nav-item">
         <ul>
             <li><a href="#">Home</a></li>
             <li><a href="#services">Services</a></li>
             <li><a href="#about_us">About Us</a></li>
             <li><a href="#blog">Blog</a></li>
             <li><a href="#gallery">Gallery</a></li>
             <li><a href="#contact_us">Contact Us</a></li>
         </ul>
     </div>

     <div class="col-sm-2 d-none d-lg-block appoint">

         <div class="dropdown">
             <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton"
                 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 Account </button>
             <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                 <a class="dropdown-item " style="padding: 4px; text-align:center; color:##fff; margin-bottom:4px; " href="{{route('login')}}">Patient</a>
                 <a class="dropdown-item " style="padding: 4px; text-align:center; color:##fff; " href="{{route('doctor_login')}}">Doctor</a>
             </div>
         </div>
     </div>



 </div>
