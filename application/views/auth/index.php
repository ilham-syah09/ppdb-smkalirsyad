<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?= $title; ?></title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/node_modules/bootstrap-social/bootstrap-social.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/components.css">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/izitoast/css/iziToast.min.css">

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
</head>

<body>
    <div class="toastr-success" data-flashdata="<?= $this->session->flashdata('toastr-success'); ?>"></div>
    <div class="toastr-error" data-flashdata="<?= $this->session->flashdata('toastr-error'); ?>"></div>
    <div class="swal-success" data-flashdata="<?= $this->session->flashdata('swal-success'); ?>"></div>
    <div class="swal-error" data-flashdata="<?= $this->session->flashdata('swal-error'); ?>"></div>
    <div id="app">
        <?php $this->load->view($page); ?>
    </div>

    <!-- General JS Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="<?= base_url(); ?>assets/modules/izitoast/js/iziToast.min.js"></script>
    <script src="<?= base_url('assets/sweetalert/sweetalert2.js'); ?>"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

    <!-- Template JS File -->
    <script src="<?= base_url(); ?>assets/js/scripts.js"></script>
    <script src="<?= base_url(); ?>assets/js/custom.js"></script>

    <script src="<?= base_url(); ?>assets/js/page/modules-toastr.js"></script>

    <!-- Page Specific JS File -->

    <script>
        var success = $('.toastr-success').data('flashdata');
        var error = $('.toastr-error').data('flashdata');

        if (success) {
            iziToast.success({
                title: 'success',
                message: success,
                position: 'topRight',
                transitionIn: 'bounceInUp',
                transitionOut: 'bounceInOut',
                transitionInMobile: 'bounceInUp',
                transitionOutMobile: 'bounceInOut',
            });
        }

        if (error) {
            iziToast.error({
                title: 'Error',
                message: error,
                position: 'topRight',
                transitionIn: 'bounceInUp',
                transitionOut: 'bounceInOut',
                transitionInMobile: 'bounceInUp',
                transitionOutMobile: 'bounceInOut',
            });
        }

        let swal_success = $('.swal-success').data('flashdata');
        let swal_error = $('.swal-error').data('flashdata');

        if (swal_success) {
            Swal.fire({
                title: 'Success',
                text: swal_success,
                icon: 'success'
            });
        }

        if (swal_error) {
            Swal.fire({
                title: 'Sorry !!',
                text: swal_error,
                icon: 'warning'
            });
        }

        $('.show-pass').click(function() {
            if ($(this).is(':checked')) {
                $('.hide-pass').attr('type', 'text');
            } else {
                $('.hide-pass').attr('type', 'password');
            }
        });

        $('#loginForm').validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true
                }
            },
            messages: {
                email: {
                    required: "Email harus diisi!",
                    email: "Format email salah!"
                },
                password: {
                    required: "Password harus diisi!",
                }
            },
            errorPlacement: function(label, element) {
                label.addClass('arrow text-danger');
                label.insertAfter(element);
            },
            wrapper: 'span'
        });

        $('#registerForm').validate({
            rules: {
                nik: {
                    required: true,
                    number: true,
                    minlength: 16
                },
                name: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                },
                no_hp: {
                    required: true,
                    number: true,
                    maxlength: 13,
                },
                progstudi: {
                    required: true,
                },
                password: {
                    required: true,
                    minlength: 8,
                },
                retype_password: {
                    required: true,
                    equalTo: '#password'
                }
            },
            messages: {
                nik: {
                    required: "NIK tidak boleh kosong!",
                    number: "NIK berisi hanya angka!",
                    minlength: "NIK terdiri 16 Angka"
                },
                name: {
                    required: "Nama lengkap tidak boleh kosong!",
                },
                email: {
                    required: "Email harus diisi!",
                    email: "Format email salah!"
                },
                no_hp: {
                    required: "No Handphone tidak boleh kosong!",
                    number: "No Handphone hanya diisi dengan angka!",
                    maxlength: "Maksimal no handphone 13 karakter"
                },
                progstudi: {
                    required: "Program studi tidak boleh kosong!",
                },
                password: {
                    required: "Password tidak boleh kosong!",
                    minlength: "Password minimal 8 karakter"
                },
                retype_password: {
                    required: "Password tidak boleh kosong!",
                    equalTo: "Password tidak sama!"
                },
            },
            errorPlacement: function(error, element) {
                error.addClass('text-danger');
                if (element.is(":radio")) {
                    error.appendTo('#jk');
                } else {
                    error.insertAfter(element);
                }
            },
            wrapper: 'span'
        });
    </script>
</body>

</html>