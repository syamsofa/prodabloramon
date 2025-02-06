<?php

$session = session();

?>

<div class="row" id="basic-table">
    <div class="col-12 col-md-12">
        <div class="card">
            <div class="card-header"><button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#primary">
                    Tambah
                </button>
            </div>
            <div class="card-content">
                <div class="card-body">

                    <!-- Table with outer spacing -->
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Is Admin</th>
                                </tr>
                            </thead>
                            <tbody id='userlist'>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="modal fade text-left" id="primary" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel160" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title white" id="myModalLabel160">Tambah User</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="formTambahUser" class="form form-horizontal">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Username</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input required type="text" class="form-control" placeholder="Username" id="username">
                                        <div class="form-control-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="12" cy="7" r="4"></circle>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label>Password</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input required type="password" class="form-control" id="password" placeholder="password">
                                        <div class="form-control-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock">
                                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Password</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input required type="password" class="form-control" id="confirm_password" placeholder="confirm_password">
                                        <div class="form-control-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock">
                                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end ">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

<script>
    function tampilUser() {
        $.ajax({
            url: "<?php echo base_url(); ?>/api/users",
            type: 'POST',
            // Fetch the stored token from localStorage and set in the header
            headers: {
                "Authorization": "Bearer " + "<?php echo $session->get('Token'); ?>"
            },
            success: function(data) {
                console.log("Success!");
                $("#userlist").empty()
                data.forEach(e1 => {
                    $("#userlist").append("<tr><td>" + e1.Username + "</td><td>" + e1.IsAdmin + "</td></tr>")

                });
            }
        });

    }
</script>
<script>
    tampilUser()
</script>

<script>
    $("#formTambahUser").submit(function() {
        event.preventDefault();

        $.post("<?php echo base_url(); ?>/register", {
                    username: $("#username").val(),
                    password: $("#password").val(),
                    confirm_password: $("#confirm_password").val(),

                },
                function(data, status) {
                    console.log(data)

                })
            .done(function() {
                alert("success");
                tampilUser()
            })
            .fail(function(data, messages) {
                alert("Buatkan Username di atas 4 karakter, password di atas 8 karakter");

            })
            .always(function() {
                // alert("finished");
            });
    });
</script>