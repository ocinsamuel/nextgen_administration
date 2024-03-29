<!-- BEGIN: Left Aside -->
<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
    <i class="la la-close"></i>
</button>
<div id="m_aside_left" class="m-grid__item  m-aside-left  m-aside-left--skin-dark ">
    <!-- BEGIN: Aside Menu -->
    <div 
            id="m_ver_menu" 
            class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " 
            data-menu-vertical="true"
             data-menu-scrollable="false" data-menu-dropdown-timeout="500"  
            >
            <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
                <li class="m-menu__item  <?php if (isset($active)) { if ($active == 'dashboard') { echo 'm-menu__item--active'; }} ?>" aria-haspopup="true" >
                    <a  href="{{ route('home') }}" class="m-menu__link ">
                        <i class="m-menu__link-icon flaticon-line-graph"></i>
                        <span class="m-menu__link-title">
                            <span class="m-menu__link-wrap">
                                <span class="m-menu__link-text">
                                    Dashboard
                                </span>
                            </span>
                        </span>
                    </a>
                </li>
                <li class="m-menu__item  m-menu__item--submenu <?php if (isset($active)) { if ($active == 'leader' || $active == 'pengerja' || $active == 'jemaat') { echo 'm-menu__item--open m-menu__item--expanded'; }} ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
                    <a  href="#" class="m-menu__link m-menu__toggle">
                        <i class="m-menu__link-icon  flaticon-users"></i>
                        <span class="m-menu__link-text">
                            User
                        </span>
                        <i class="m-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="m-menu__submenu">
                        <span class="m-menu__arrow"></span>
                        <ul class="m-menu__subnav">
                            <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
                                <a  href="#" class="m-menu__link ">
                                    <span class="m-menu__link-text">
                                        User
                                    </span>
                                </a>
                            </li>
                            <li class="m-menu__item <?php if (isset($active)) { if ($active == 'leader') { echo 'm-menu__item--active'; }} ?>" aria-haspopup="true" >
                                <a  href="{{ route ('leader') }}" class="m-menu__link ">
                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                        <span></span>
                                    </i>
                                    <span class="m-menu__link-text">
                                        Leader
                                    </span>
                                </a>
                            </li>
                            <li class="m-menu__item <?php if (isset($active)) { if ($active == 'pengerja') { echo 'm-menu__item--active'; }} ?>" aria-haspopup="true" >
                                <a  href="{{ route ('pengerja') }}" class="m-menu__link ">
                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                        <span></span>
                                    </i>
                                    <span class="m-menu__link-text">
                                        Pengerja
                                    </span>
                                </a>
                            </li>
                            <li class="m-menu__item <?php if (isset($active)) { if ($active == 'jemaat') { echo 'm-menu__item--active'; }} ?>" aria-haspopup="true" >
                                <a  href="{{ route ('jemaat') }}" class="m-menu__link ">
                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                        <span></span>
                                    </i>
                                    <span class="m-menu__link-text">
                                        Jemaat
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="m-menu__item <?php if (isset($active)) { if ($active == 'event') { echo 'm-menu__item--active'; }} ?>" aria-haspopup="true" >
                    <a  href="{{ route('event') }}" class="m-menu__link ">
                        <i class="m-menu__link-icon flaticon-calendar"></i>
                        <span class="m-menu__link-title">
                            <span class="m-menu__link-wrap">
                                <span class="m-menu__link-text">
                                    Event
                                </span>
                            </span>
                        </span>
                    </a>
                </li>
                <li class="m-menu__item <?php if (isset($active)) { if ($active == 'branch') { echo 'm-menu__item--active'; }} ?>" aria-haspopup="true" >
                    <a  href="{{ route('branch') }}" class="m-menu__link ">
                        <i class="m-menu__link-icon flaticon-placeholder-1"></i>
                        <span class="m-menu__link-title">
                            <span class="m-menu__link-wrap">
                                <span class="m-menu__link-text">
                                    Branch
                                </span>
                            </span>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- END: Aside Menu -->
</div>
<!-- END: Left Aside -->