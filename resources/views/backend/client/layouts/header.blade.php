<nav class="navbar navbar-expand-lg navbar-light">
    <div class="full">
    <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
    <div class="logo_section">
        <a href="{{ route('index') }}"><h1 class = "text-white pt-3 pl-3">G Blog</h1></a>
    </div>
    <div class="right_topbar">
        <div class="icon_info">
            <ul class="user_profile_dd">
                <li>
                <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src="{{ asset('uploads/users') }}/{{ Auth::user()->image }}" alt="#" /><span class="name_user">{{ Auth::user()->name }}</span></a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="profile.html">My Profile</a>
                    <a class="dropdown-item" href="settings.html">Settings</a>
                    <a class="dropdown-item" href="help.html">Help</a>
                    <form action="{{ route('logout') }}" method = "POST">
                        @csrf
                        <button type="submit" class="dropdown-item">Log Out</button>
                    </form>
                </div>
                </li>
            </ul>
        </div>
    </div>
    </div>
</nav>