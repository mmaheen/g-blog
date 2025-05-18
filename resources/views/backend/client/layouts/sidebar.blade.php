<nav id="sidebar">
   <div class="sidebar_blog_1">
      <div class="sidebar-header">
         <div class="logo_section">
            <a href="{{ route('dashboard.client.index') }}">
               @if (Auth::user()->image == null)
                  <img class="logo_icon img-responsive" src="{{ asset('assets/default-user.jpg') }}" alt="#" />
               @else
                  <img class="logo_icon img-responsive" src="{{ asset('uploads/users/'. Auth::user()->image) }}" alt="#" />                  
               @endif
            </a>
         </div>
      </div>
      <div class="sidebar_user_info">
         <div class="icon_setting"></div>
         <div class="user_profle_side">
            <div class="user_img">
               @if (Auth::user()->image == null)
                  <img class="img-responsive" src="{{ asset('assets/default-user.jpg') }}" alt="#" /> 
               @else
                  <img class="img-responsive" src="{{ asset('uploads/users/'. Auth::user()->image) }}" alt="#" />
               @endif
            </div>
            <div class="user_info">
               <h6>{{ Auth::user()->name }}</h6>
               <p><span class="online_animation"></span> Online</p>
            </div>
         </div>
      </div>
   </div>
   <div class="sidebar_blog_2">
      <h4>General</h4>
      <ul class="list-unstyled components">
       
         <li><a href="{{ route('dashboard.client.index') }}"><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a></li>
         <li><a href="{{ route('dashboard.client.gallery') }}"><i class="fa fa-object-group blue2_color"></i> <span>Media Gallery</span></a></li>
         <li>
            <a href="#element" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-table purple_color2"></i> <span>Tables</span></a>
            <ul class="collapse list-unstyled" id="element">
               <li><a href="{{ route('dashboard.client.blog.index') }}">> <span>Blogs</span></a></li>
               <li><a href="{{ route('dashboard.client.photo.index') }}">> <span>Photo</span></a></li>
            </ul>
         </li>
         
      </ul>
   </div>
</nav>