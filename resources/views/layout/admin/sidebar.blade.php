<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            <img class="img-fluid" src="{{ asset('/assets/images/logo.png') }}" alt="" width="150px;">
        </a>
        <div class="sidebar-toggler @if(!empty($get_cookie_value)) {{$get_cookie_value}} @else not-active @endif ">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item {{ active_class(['admin/dashboard']) }}{{ active_class(['/admin/dashboard']) }}">
                <a href="{{ url('/admin/dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="home"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            
            <li class="nav-item {{ active_class(['admin/admin_users']) }}{{ active_class(['admin/admin_users/*']) }}">
                <a href="{{ url('/admin/admin_users') }}" class="nav-link">
                    <i class="link-icon" data-feather="users"></i>
                    <span class="link-title">Users</span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['admin/order_requests']) }}{{ active_class(['admin/order_requests/*']) }}">
                <a href="{{ url('/admin/order_requests') }}" class="nav-link">
                    <i class="link-icon" data-feather="truck"></i>
                    <span class="link-title">Orders Request</span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['admin/customer_support']) }}{{ active_class(['admin/customer_support/*']) }}">
                <a href="{{ url('/admin/customer_support') }}" class="nav-link">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Customer Support</span>
                </a>
            </li>
            {{-- <li class="nav-item {{ active_class(['admin/job-queue']) }}{{ active_class(['/admin/job-queue']) }}">
                <a href="{{ url('/admin/job-queue') }}" class="nav-link">
                    <i class="link-icon" data-feather="home"></i>
                    <span class="link-title">Job & Queue</span>
                </a>
            </li> --}}
         
        </ul>
    </div>
</nav>