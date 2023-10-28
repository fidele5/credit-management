$(document).ready(function () {

    $(".accept").click(function (e) {
        e.preventDefault();
        var link = $(this).attr("href");
        var formdata = new FormData();
        formdata.append("_token", $('meta[name="csrf-token"]').attr('content'));
        formdata.append("_method", 'PATCH');
        formdata.append("status", 'accept');
        $.ajax({
            type: 'POST',
            url: link,
            data: formdata,
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                if (response.status === "success") {
                    location.reload(true);
                } else {
                    swalWithBootstrapButtons(
                        'Echec',
                        "L'opération a échoué",
                        'error'
                    );
                }
            },

            error: function (data) {
                swalWithBootstrapButtons(
                    'Echec',
                    "L'opération a échoué",
                    'error'
                );

            }
        });
    });


    $(document).ready(function () {
        $(".delete").click(function (e) {
            e.preventDefault();
            var link = $(this).attr("href");
            var token = $(this).data("method");
            console.log(token)
            const swalWithBootstrapButtons = swal.mixin({
                confirmButtonClass: 'btn btn-success btn-rounded',
                cancelButtonClass: 'btn btn-danger btn-rounded mr-3',
                buttonsStyling: false,
            });

            swalWithBootstrapButtons({
                title: 'Etes-vous sûr(e)?',
                text: "Une fois effectuée, cette action est irreversible!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true,
                padding: '2em'
            }).then(function (result) {
                if (result.value) {
                    var formdata = new FormData();
                    formdata.append("_token", $('meta[name="csrf-token"]').attr('content'));
                    formdata.append("_method", "delete");

                    $.ajax({

                        type: 'POST',

                        url: link,

                        data: formdata,

                        contentType: false,

                        cache: false,

                        processData: false,

                        success: function (response) {

                            if (response.status === "success") {
                                swalWithBootstrapButtons(
                                    'Supprimé',
                                    'La suppression a été effectuée avec succès',
                                    'success'
                                );

                                location.reload(true);
                            } else {
                                swalWithBootstrapButtons(
                                    'Echec',
                                    "L'opération a échoué",
                                    'error'
                                );
                            }

                        },

                        error: function (data) {

                            swalWithBootstrapButtons(
                                'Echec',
                                "L'opération a échoué",
                                'error'
                            );

                        }

                    });

                } else if (result.dismiss === swal.DismissReason.cancel) {
                    swalWithBootstrapButtons(
                        'Echec',
                        "L'opération a échoué",
                        'error'
                    );
                }

            });
        });
    });


    $(document).ready(function () {

        $("form").submit(function (e) {

            e.preventDefault();

            $('.champ + label +div').text('');

            $('.champ').removeClass('is-invalid');

            var assertions = [];

            var formdata = new FormData(this);

            var fields = [];

            var errors = 0;

            $(".champ").each(function (index, element) {

                if ($(this).val() == "") {

                    $(this).addClass("is-invalid");

                    $(this).next().append("<div class='invalid-feedback'>Ce champ est requis</div>");

                    errors++;

                } else fields.push($(this).val());

            });

            if (errors > 0) {

                toastr.warning("Completer tous les champs", "Mon cher!");

                fields = [];

            } else {

                $.ajax({

                    type: $(this).attr('method'),

                    url: $(this).attr('action'),

                    data: formdata,

                    contentType: false,

                    cache: false,

                    processData: false,

                    beforeSend: function () {

                        $('button[type=submit]').attr('disabled', 'disabled').html("<span class='spinner-grow spinner-grow-sm' role='status' aria-hidden='true'></span>Loading...");

                    },

                    success: function (response) {

                        if (response.status === "success") {
                            swal.fire({
                                title: 'Information',
                                text: "Enregistrement réussi!",
                                type: 'success',
                                padding: '2em'
                            });

                            location.href = "/" + response.back;
                        }

                    },

                    error: function (data) {
                        console.log(data);
                        $('button[type=submit]').removeAttr('disabled').html('Submit');

                        $.each(data.responseJSON.errors, function (key, value) {
                            console.log('here', key, value)
                            var input = 'form .champ[name=' + key + ']';

                            $(input).addClass('is-invalid');

                            $(input + " + label + div").html(value[0]);

                            $('div.carde').unblock();

                        });

                    }

                });

            }

        });
    });