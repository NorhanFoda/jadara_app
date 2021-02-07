<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" target="_blank" href="#">
                    <h2 class="brand-text mb-0">{{trans('admin.jadara')}}</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class=" nav-item"><a href="home"><i class="fa fa-home"></i><span class="menu-title" data-i18n="Email">{{trans('admin.settings')}}</span></a></li>
            <li class=" nav-item"><a href="{{route('links.index')}}"><i class="fa fa-link"></i><span class="menu-title" data-i18n="Email">{{trans('admin.additional_links')}}</span></a></li>
            <li class=" nav-item"><a href="{{route('notifications.index')}}"><i class="fa fa-bell"></i><span class="menu-title" data-i18n="Email">{{trans('admin.notifications')}}</span></a></li>

        </ul>
    </div>
</div>
<!-- END: Main Menu-->
