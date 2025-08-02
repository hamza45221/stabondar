<!--begin::Sidebar-->
<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <!--begin::Logo-->
    <div class="app-sidebar-logo px-6 d-flex justify-content-center align-items-center" style="height: 100px !important;" id="kt_app_sidebar_logo">
        <a href="{{ route('admin.dashboard') }}">
            <img alt="Logo" src="{{ asset('admin_assets/media/logos/custom-1.png') }}" class="h-65px my-4  app-sidebar-logo-default" />
            <img alt="Logo" src="{{ asset('admin_assets/media/logos/custom-1.png') }}" class="h-20px app-sidebar-logo-minimize" />
        </a>
        <div id="kt_app_sidebar_toggle" class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary h-30px w-30px position-absolute top-50 start-100 translate-middle rotate" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="app-sidebar-minimize">
            <i class="ki-duotone ki-black-left-line fs-3 rotate-180">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
        </div>
    </div>
    <!--end::Logo-->

    <!--begin::sidebar menu-->
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper">
            <div id="kt_app_sidebar_menu_scroll" class="scroll-y my-5 mx-3"
                 data-kt-scroll="true"
                 data-kt-scroll-activate="true"
                 data-kt-scroll-height="auto"
                 data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
                 data-kt-scroll-wrappers="#kt_app_sidebar_menu"
                 data-kt-scroll-offset="5px"
                 data-kt-scroll-save-state="true">

                <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold fs-6"
                     id="kt_app_sidebar_menu"
                     data-kt-menu="true">




                    <!-- Domain Section -->
                    <div data-kt-menu-trigger="click"
                         class="menu-item {{ request()->routeIs('admin.user*') ? 'here show' : '' }}">



{{--                        <div class="menu-item pt-5">--}}
{{--                            <div class="menu-content">--}}
                                <a class="menu-link {{ request()->routeIs('admin.heromain*') ? 'active' : '' }}"
                                   href="{{ route('admin.heromain') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                    <span class="menu-title">Hero Main</span>
                                </a>


                                <a class="menu-link {{ request()->routeIs('admin.case.blog*') ? 'active' : '' }}"
                                   href="{{ route('admin.case.blog') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                    <span class="menu-title">Case</span>
                                </a>


                                <a class="menu-link {{ request()->routeIs('admin.contact*') ? 'active' : '' }}"
                                   href="{{ route('admin.contact') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                    <span class="menu-title">Contact</span>
                                </a>


                                <a class="menu-link {{ request()->routeIs('admin.popup*') ? 'active' : '' }}"
                                   href="{{ route('admin.popup') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                    <span class="menu-title">Popup</span>
                                </a>



                        {{--                            </div>--}}
{{--                        </div>--}}
                        <!-- Users Section -->
{{--                        <div data-kt-menu-trigger="click"--}}
{{--                             class="menu-item menu-accordion {{ request()->routeIs('admin.user') ? 'here show' : '' }}">--}}
{{--                    <span class="menu-link">--}}
{{--                        <span class="menu-icon">--}}
{{--                            <i class="ki-duotone ki-element-11 fs-2"></i>--}}
{{--                        </span>--}}
{{--                        <span class="menu-title">Users</span>--}}
{{--                        <span class="menu-arrow"></span>--}}
{{--                    </span>--}}
{{--                            <div class="menu-sub menu-sub-accordion {{ request()->routeIs('admin.user') ? 'show' : '' }}">--}}
{{--                                <div class="menu-item">--}}
{{--                                    <a class="menu-link {{ request()->routeIs('admin.user') ? 'active' : '' }}"--}}
{{--                                       href="{{ route('admin.user') }}">--}}
{{--                                <span class="menu-bullet">--}}
{{--                                    <span class="bullet bullet-dot"></span>--}}
{{--                                </span>--}}
{{--                                        <span class="menu-title">Manage Users</span>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}



{{--                        <div class="menu-item pt-5">--}}
{{--                            <div class="menu-content">--}}
{{--                                <span class="menu-heading fw-bold text-uppercase fs-7">Content</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <a class="menu-link {{ request()->routeIs('admin.home*') ? 'active' : '' }}"--}}
{{--                           href="{{ route('admin.home') }}">--}}
{{--                                <span class="menu-bullet">--}}
{{--                                    <span class="bullet bullet-dot"></span>--}}
{{--                                </span>--}}
{{--                            <span class="menu-title">Home</span>--}}
{{--                        </a>--}}
{{--                        <a class="menu-link {{ request()->routeIs('admin.heromain*') ? 'active' : '' }}"--}}
{{--                           href="#">--}}
{{--                                <span class="menu-bullet">--}}
{{--                                    <span class="bullet bullet-dot"></span>--}}
{{--                                </span>--}}
{{--                            <span class="menu-title">Hero main</span>--}}
{{--                        </a>--}}




{{--                        <a class="menu-link {{ request()->routeIs('admin.location*') ? 'active' : '' }}"--}}
{{--                           href="{{ route('admin.location') }}">--}}
{{--                                <span class="menu-bullet">--}}
{{--                                    <span class="bullet bullet-dot"></span>--}}
{{--                                </span>--}}
{{--                            <span class="menu-title">Location</span>--}}
{{--                        </a>--}}
{{--                        <a class="menu-link {{ request()->routeIs('admin.heromain*') ? 'active' : '' }}"--}}
{{--                           href="{{ route('admin.heromain') }}">--}}
{{--                                <span class="menu-bullet">--}}
{{--                                    <span class="bullet bullet-dot"></span>--}}
{{--                                </span>--}}
{{--                            <span class="menu-title">Hero Main</span>--}}
{{--                        </a>--}}
{{--                --}}

                    </div>

                </div>

            </div>
        </div>
    </div>


    <!--end::sidebar menu-->
</div>
<!--end::Sidebar-->
