
<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">

        <!-- User -->
        <div class="user-box">
            <h5><a href="#">{{ \Illuminate\Support\Facades\Auth::user()->name }}</a> </h5>
            <p>
                <a class="text-muted" href="{{ route('logout') }}"><i class="mdi mdi-power"></i> Logout</a>
            </p>
        </div>
        <!-- End User -->

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul>
                <li class="text-muted menu-title">Navigation</li>

                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect {{  $active == 'admin' ? 'activemenu' : '' }}"><i class="mdi mdi-view-dashboard"></i> <span> Dashboard </span> </a>
                </li>


                <li class="has_sub sidebar-dropdown ">
                    <a href="javascript:void(0);" class="waves-effect {{  $active == 'posts' ? 'activemenu' : '' }}"><i class="mdi mdi-view-list"></i> <span> Blog Posts </span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('posts.index') }}">Manage Blog Posts</a></li>
                        <li><a href="{{ route('posts.create') }}">Add new Blog Posts</a></li>
                    </ul>
                </li>

                <li class="has_sub sidebar-dropdown ">
                    <a href="javascript:void(0);" class="waves-effect {{  $active == 'categories' ? 'activemenu' : '' }}"><i class="mdi mdi-view-list"></i> <span> Categories </span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('categories.index') }}">Manage Categories</a></li>
                        <li><a href="{{ route('categories.create') }}">Add new Category</a></li>
                    </ul>
                </li>

                <li class="has_sub sidebar-dropdown ">
                    <a href="javascript:void(0);" class="waves-effect {{  $active == 'messages' ? 'activemenu' : '' }}"><i class="mdi mdi-message-text"></i> <span> Contact Messages </span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('messages.index') }}">All Contact Messages</a></li>
                    </ul>
                </li>

                <li class="has_sub sidebar-dropdown ">
                    <a href="javascript:void(0);" class="waves-effect {{  $active == 'settings' ? 'activemenu' : '' }}"><i class="mdi mdi-view-list"></i> <span> Settings </span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('sitemap') }}">Sitemap Settings</a></li>
                    </ul>
                </li>

            </ul>
            <div class="clearfix"></div>
        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>

</div>
<!-- Left Sidebar End -->
