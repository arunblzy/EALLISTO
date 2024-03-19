<div class="hover-scroll-overlay-y my-2 py-5 py-lg-8" id="kt_aside_menu_wrapper"
     data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
     data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
     data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
    <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
         id="#kt_aside_menu" data-kt-menu="true">

        <div class="menu-item">
            <a class="menu-link {{ request()->routeIs(['admin.dashboard']) ? 'active' : '' }}"
               href="{{ route('admin.dashboard') }}">
                                    <span class="menu-icon">
                                        <i class="bi bi-grid fs-3"></i>
                                    </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </div>
        <div class="menu-item">
            <a class="menu-link {{ request()->routeIs(['admin.customers.*']) ? 'active' : '' }}"
               href="{{ route('admin.customers.index') }}">
                                    <span class="menu-icon">
                                        <i class="bi bi-grid fs-3"></i>
                                    </span>
                <span class="menu-title">Customers</span>
            </a>
        </div>
        <div class="menu-item">
            <a class="menu-link {{ request()->routeIs(['admin.invoices.*']) ? 'active' : '' }}"
               href="{{ route('admin.invoices.index') }}">
                                    <span class="menu-icon">
                                        <i class="bi bi-grid fs-3"></i>
                                    </span>
                <span class="menu-title">Invoices</span>
            </a>
        </div>
    </div>
</div>
