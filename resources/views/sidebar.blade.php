<div class='dashboard'>
    <div class="dashboard-nav">
        <header>
            <a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a>
            <a href="#" class="brand-logo"><i class="fas fa-code"></i> <span>Codely</span></a>
        </header>
        <nav class="dashboard-nav-list">
            <a href="{{route('dashboard')}}" class="dashboard-nav-item"><i class="fas fa-home"></i>Home </a>
            <a xd="" href="{{route('mynote')}}" class="dashboard-nav-item {{Route::currentRouteName() == 'mynote' ? 'active': ''}}"><i class="fas fa-tachometer-alt"></i> My Snippet Code</a>             
            <a href="{{route('mycategory')}}" class="dashboard-nav-item {{Route::currentRouteName() == 'mycategory' ? 'active': ''}}"><i class="fas fa-cogs"></i> My Category </a>
            <a href="{{route('addnote')}}" class="dashboard-nav-item {{Route::currentRouteName() == 'addnote' ? 'active': ''}}"><i class="fas fa-code"></i> Add Snippet </a>
            <a href="{{route('account')}}" class="dashboard-nav-item {{Route::currentRouteName() == 'account' ? 'active': ''}}"><i class="fas fa-user"></i> Account </a>
            <div class="nav-item-divider"></div>
            <a href="{{route('logout')}}" class="dashboard-nav-item"><i class="fas fa-sign-out-alt"></i> Logout </a>
        </nav>
    </div>
 </div>