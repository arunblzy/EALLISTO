<div id="kt_header" style="" class="header align-items-stretch">
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
            <div class="btn btn-icon btn-active-color-white" id="kt_aside_mobile_toggle">
                <i class="bi bi-list fs-1"></i>
            </div>
        </div>
        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
            <a href="javascript:void(0);" class="d-lg-none">
                <img alt="Logo" src="{{ asset('assets/media/logos/logo-demo13-compact.svg') }}"
                    class="h-25px" />
            </a>
        </div>
        <div class="d-flex align-items-stretch justify-content-end flex-lg-grow-1">
            <div class="d-flex align-items-stretch flex-shrink-0">
                <div class="topbar d-flex align-items-stretch flex-shrink-0">
                    <div class="d-flex align-items-stretch" id="kt_header_user_menu_toggle">
                        <!--begin::Menu wrapper-->
                        <div class="topbar-item cursor-pointer symbol px-3 px-lg-5 me-n3 me-lg-n5 symbol-30px symbol-md-35px"
                            data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                            data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
                            <img src="{{ asset('assets/media/avatars/150-2.jpg') }}" alt="metronic" />
                        </div>
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
                            data-kt-menu="true">


                            <div class="menu-item px-5">
                                <a href="javascript:void(0);"
                                    class="menu-link px-5">My Account</a>
                            </div>

                            <div class="separator my-2"></div>

                            <div class="menu-item px-5">
                                <a onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" href="javascript:void(0);"
                                    class="menu-link px-5">Sign Out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:
                                none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                            <div class="separator my-2"></div>

                        </div>
                    </div>
                    <div class="d-flex align-items-stretch d-lg-none px-3 me-n3"
                        title="Show header menu">
                        <div class="topbar-item" id="kt_header_menu_mobile_toggle">
                            <i class="bi bi-text-left fs-1"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
