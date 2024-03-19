@push('styles')
    <style>
        .error {
            color: red;
            font-weight: lighter;
            border-color: red !important;
        }
    </style>
@endpush
@push('scripts')
    <script src="{{ asset('assets/plugins/custom/jquery-validation-1.19.5/dist/jquery.validate.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/jquery-validation-1.19.5/dist/additional-methods.js') }}"></script>
@endpush
