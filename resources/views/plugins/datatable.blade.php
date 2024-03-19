@push('styles')
{{--    <link rel="stylesheet" href="{{ asset('assets/plugins/custom/DataTables/datatables.min.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('assets/plugins/custom/DataTables/Responsive-2.2.0/css/responsive.bootstrap.min.css') }}">--}}
{{--    <style>--}}
{{--        .form-inline .dataTables_length label {--}}
{{--            gap: 0.5rem !important;--}}
{{--        }--}}
{{--    </style>--}}
@endpush
@push('scripts')
    <script src="{{ asset('assets/plugins/custom/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/DataTables/DataTables-1.10.16/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets\plugins\custom\DataTables\Buttons-1.4.2\js\buttons.print.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/DataTables/Buttons-1.4.2/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/DataTables/pdfmake-0.1.32/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/DataTables/pdfmake-0.1.32/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/DataTables/JSZip-2.5.0/jszip.min.js') }}"></script>
    <script>
        $.extend(true, $.fn.dataTable.defaults, {
            dom: "<'row headerbar gap-2 ml-0'<'col heading'l><'searching'Bf>>" +
                "<'row dataTable-body-row'<'col col-sm-12 col-xs-12 xs-full'tr>>" +
                "<'row dataTable-footer-row'<'col-sm-4'i><'col-sm-8'p>>",
            deferRender: true
        });
    </script>
@endpush
