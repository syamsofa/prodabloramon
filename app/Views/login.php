<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STP2025</title>
    <link rel="stylesheet" href="dist/assets/css/bootstrap.css">

    <link rel="shortcut icon" href="dist/assets/images/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="dist/assets/css/app.css">


    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>



</head>

<body>
    <div id="auth">

        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-12 mx-auto">
                    <div class="card pt-4">
                        <div class="card-body">
                            <div class="text-center mb-5">
                                <h3>Monev STP2025</h3>
                                <p>Please sign in to continue</p>
                            </div>
                            <form id="form_login" name="form_login" action="">
                                <div class="form-group position-relative has-icon-left">
                                    <label for="username">Username</label>
                                    <div class="position-relative">
                                        <input required type="text" class="form-control" id="username">
                                        <div class="form-control-icon">
                                            <i data-feather="user"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group position-relative has-icon-left">
                                    <div class="clearfix">
                                        <label for="password">Password</label>

                                    </div>
                                    <div class="position-relative">
                                        <input required type="password" class="form-control" id="password">
                                        <div class="form-control-icon">
                                            <i data-feather="lock"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group position-relative has-icon-left">
                                    <div class="clearfix">
                                        <label for="password">Kode Enkripsi (yang biasa dipakai untuk membuka NL),<div style="color:red">Jangan sampai salah, karena akan membuat data gagal DIBACA</div></label>

                                    </div>
                                    <div class="position-relative">
                                        <input required type="text" class="form-control" id="kode_enkripsi">
                                        <div class="form-control-icon">
                                            <i data-feather="lock"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix">
                                    <button class="btn btn-primary float-end">Submit</button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="dist/assets/js/feather-icons/feather.min.js"></script>
    <script src="dist/assets/js/app.js"></script>

    <script src="dist/assets/js/main.js"></script>

    <script>
        $("#form_login").submit(function() {
            event.preventDefault();

            $.post("<?php echo base_url(); ?>/login", {
                        username: $("#username").val(),
                        password: $("#password").val(),
                        kode_enkripsi: $("#kode_enkripsi").val()
                    },
                    function(data, status) {
                        console.log(data)
                        if (data.status == true)
                            location.reload();
                        // alert("success");
                    })
                .done(function() {
                    // alert("second success");
                })
                .fail(function() {
                    alert("Username atau Password mungkin salah yaaa");
                })
                .always(function() {
                    // alert("finished");
                });
        });
    </script>

</body>

</html>