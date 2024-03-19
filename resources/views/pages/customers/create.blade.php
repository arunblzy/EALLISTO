@extends('layouts.admin')
@section('content')
    <div class="toolbar" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Create Customer</h1>
            </div>
        </div>
    </div>
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            {{--  =============================================  --}}
            <form id="customer-create-form" class="form" method="post" action="{{ $storeUrl }}" autocomplete="off">
                @csrf
                <div class="fv-row mb-10">
                    <label class="required form-label fs-6 mb-2">Name</label>
                    <input class="form-control form-control-lg form-control-solid" type="text" placeholder=""
                           name="name" id="name" autocomplete="off" />
                </div>
                <div class="fv-row mb-10">
                    <label class="required form-label fs-6 mb-2">Email</label>
                    <input class="form-control form-control-lg form-control-solid" type="email" placeholder=""
                           name="email" id="email" autocomplete="off" />
                </div>

                <div class="fv-row mb-10">
                    <label class="required form-label fs-6 mb-2">Phone</label>
                    <input class="form-control form-control-lg form-control-solid" type="tel" placeholder=""
                           name="phone" id="phone" autocomplete="off" />
                </div>

                <div class="fv-row mb-10">
                    <label class="required form-label fs-6 mb-2">Address</label>
                    <textarea name="address" id="address" class="form-control form-control-lg
                    form-control-solid"></textarea>
                </div>

                <button id="customer-create-form-submit" type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('admin.customers.index') }}" id="customer-create-form-cancel" class="btn
                btn-outline-secondary">Cancel</a>
            </form>
            {{--  =============================================  --}}
        </div>
    </div>
@endsection
@include('plugins.validation')
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#customer-create-form').validate({
                rules: {
                    name: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    phone: {
                        required: true,
                    },
                    address: {
                        required: true
                    }
                },
                messages: {
                    name: "Please enter your name",
                    email: {
                        required: "Please enter your email address",
                        email: "Please enter a valid email address"
                    },
                    phone: "Please enter your phone number",
                    address: "Please enter your address"
                },
                errorPlacement: function(error, element) {
                    error.insertAfter(element); // Display error message after the input field
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: $(form).attr('action'),
                        type: 'post',
                        data: $(form).serialize(),
                        success: function(response) {
                            Swal.fire({
                                text: "Customer created successfully!",
                                icon: "success",
                                buttonsStyling: !1,
                                confirmButtonText: "Ok, got it!",
                                customClass: { confirmButton: "btn btn-primary" }
                            }).then(function (e) {
                                location.href = $('#customer-create-form-cancel').attr('href');
                            });
                        },
                        error: function(xhr, status, error) {
                            var errors = xhr.responseJSON.errors;
                            if (errors || xhr.status === 422) {
                                $.each(errors, function(key, value) {
                                    let elementById = $('#'+key + '-error');
                                    (elementById.is('*')) ? elementById.remove() : '';
                                    let element = $('[name="' + key + '"]');
                                    element.addClass('error');
                                    element.after('<label id="' + key + '-error" class="error ' +
                                        '" for="' + key + '" >' + value[0] +
                                        '</label>');
                                });
                            } else {
                                let errMsg = statusMessages[xhr.status];
                                Swal.fire({
                                    text: errMsg,
                                    icon: "error",
                                    buttonsStyling: !1,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: { confirmButton: "btn btn-primary" },
                                });
                            }
                        }
                    });
                }
            });
        });
    </script>


@endpush
