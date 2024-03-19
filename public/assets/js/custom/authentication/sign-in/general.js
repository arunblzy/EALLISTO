"use strict";
var KTSigninGeneral = (function () {
    var t, e, i;
    return {
        init: function () {
            (t = document.querySelector("#kt_sign_in_form")),
                (e = document.querySelector("#kt_sign_in_submit")),
                (i = FormValidation.formValidation(t, {
                    fields: {
                        username: { validators: { notEmpty: { message: "Username is required" } } },
                        password: { validators: { notEmpty: { message: "The password is required" } } },
                    },
                    plugins: { trigger: new FormValidation.plugins.Trigger(), bootstrap: new FormValidation.plugins.Bootstrap5({ rowSelector: ".fv-row" }) },
                })),
                e.addEventListener("click", function (n) {
                    n.preventDefault(),
                        i.validate().then(function (i) {
                            "Valid" == i
                                ? (e.setAttribute("data-kt-indicator", "on"),
                                    (e.disabled = !0),
                                    setTimeout(function () {
                                        $.ajaxSetup({
                                            headers: {
                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                            }
                                        });
                                        $.ajax({
                                            url: document.querySelector("#kt_sign_in_form").getAttribute("action"),
                                            data: {
                                                'username': $('#username').val(),
                                                'password': $('#password').val(),
                                                'remember': !!$('#remember').val()
                                            },
                                            type: "POST",
                                            success: function (response) {
                                                if ((response.status === 'Success')) {
                                                    e.removeAttribute("data-kt-indicator"),
                                                        (e.disabled = !1),
                                                        Swal.fire({
                                                            text: "You have successfully logged in!",
                                                            icon: "success",
                                                            buttonsStyling: !1,
                                                            confirmButtonText: "Ok, got it!",
                                                            customClass: { confirmButton: "btn btn-primary" }
                                                        }).then(function (e) {
                                                            e.isConfirmed && ((t.querySelector('[name="username"]').value = ""),
                                                                (t.querySelector('[name="password"]').value = ""));
                                                            location.href = response.url;
                                                        });
                                                } else if (response.status === 'Validation-Errors' || response.status === 'validation_error') {
                                                    let jsonError = [];
                                                    e.setAttribute("data-kt-indicator", "off");
                                                    e.disabled = !!0;
                                                    $.each(response.errors, function (ii, ele) {
                                                        $.each(ele, function (iii, elee) {
                                                            jsonError[ii] = elee;
                                                            console.log(jsonError[ii]);
                                                            document.querySelector('input[name="' + ii + '"]').nextElementSibling.innerHTML = elee;
                                                        });
                                                    });
                                                } else if (response.success === 'Redirect') {
                                                    window.location.replace(response.url);
                                                } else if (response.success === 'Refresh') {
                                                    window.location.reload();
                                                } else {
                                                    $(SubmitButton).button('reset');
                                                    $('#username').removeAttr('disabled');
                                                    $('#password').removeAttr('disabled');
                                                }
                                            },
                                            error: function (error) {
                                                console.log('error');
                                                console.log(error);
                                            }
                                        })




                                        // e.removeAttribute("data-kt-indicator"),
                                        //     (e.disabled = !1),

                                        //     Swal.fire({
                                        //         text: "You have successfully logged in!",
                                        //         icon: "success",
                                        //         buttonsStyling: !1,
                                        //         confirmButtonText: "Ok, got it!",
                                        //         customClass: { confirmButton: "btn btn-primary" }
                                        //     }).then(function (e) {
                                        //         e.isConfirmed && ((t.querySelector('[name="email"]').value = ""),
                                        //             (t.querySelector('[name="password"]').value = ""));
                                        //     });
                                    }, 2e3))
                                : Swal.fire({
                                    text: "Sorry, looks like there are some errors detected, please try again.",
                                    icon: "error",
                                    buttonsStyling: !1,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: { confirmButton: "btn btn-primary" },
                                });
                        });
                });
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTSigninGeneral.init();
});
