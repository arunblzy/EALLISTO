<!DOCTYPE html>
<html lang="en">
@include('includes.admin.head')

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed aside-enabled aside-fixed"
    style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">

    <div class="d-flex flex-column flex-root">
        <div class="page d-flex flex-row flex-column-fluid">
            <div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true"
                data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}"
                data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}"
                data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
                <!--begin::Brand-->
                @include('includes.admin.logo')
                <div class="aside-menu flex-column-fluid">
                    @include('includes.admin.menu')
                </div>
            </div>
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                @include('includes.admin.header')
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    @yield('content')
                </div>
                @include('includes.admin.footer')
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let errorMessage = '';
        const statusMessages = {
            400: 'Bad Request: The server could not understand the request due to invalid syntax.',
            401: 'Unauthorized: The client must authenticate itself to get the requested response.',
            403: 'Forbidden: The client does not have access rights to the content.',
            404: 'Not Found: The server can not find the requested resource.',
            500: 'Internal Server Error: The server has encountered a situation it doesn\'t know how to handle.',
            502: 'Bad Gateway: The server received an invalid response from the upstream server while trying to fulfill the request.',
            503: 'Service Unavailable: The server is currently unavailable.',
            504: 'Gateway Timeout: The server, while acting as a gateway or proxy, did not receive a timely response from the upstream server specified by the URI.'
        };

    </script>
    @stack('scripts')
    @yield('scripts')
</body>

</html>
