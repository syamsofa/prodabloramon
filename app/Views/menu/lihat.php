<?php

$session = session();

?>
<script>
    var l
</script>
<script>
    var idtalent
    var inisialawal
    var inisialrevisi
</script>
<section class="bootstrap-select">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <h4>Pilih Wil Pembinaan/Proda</h4>
                                <fieldset class="form-group">
                                    <select class="form-select" id="kodekab">
                                        <option>--PILIH--</option>
                                        <?php
                                        foreach ($kab as $ka) {
                                            echo "<option value=" . $ka['Kode'] . ">" . $ka['Kab'] . "</option>";
                                            # code...
                                        }
                                        ?>
                                    </select>
                                </fieldset>
                            </div>

                        </div>


                        <div class="row">


                            <h4>Data Realisasi</h4>
                            <div class="col-md-12 mb-4">
                                <div class="table-responsive">
                                    <table id="datatabel" class="table table-striped w-auto">
                                        <thead class="bg-primary text-white">
                                            <tr class="text-center">
                                                <th>SubmitTime</th>
                                                <th>Inisial Awal</th>
                                                <th>Inisial Revisi</th>
                                                <th>Aksi</th>

                                                <th>Kab Domisili</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Umur</th>

                                            </tr>

                                        </thead>
                                        <tbody id="list_data">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <h4>Data duplikat/salah yang dihapus</h4>
                            <div class="col-md-12 mb-4">
                                <div class="table-responsive">
                                    <table id="datatabel" class="table table-striped w-auto">
                                        <thead class="bg-primary text-white">
                                            <tr class="text-center">
                                                <th>SubmitTime</th>
                                                <th>Inisial Awal</th>
                                                <th>Inisial Revisi</th>
                                                <th>Aksi</th>

                                                <th>Kab Domisili</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Umur</th>

                                            </tr>

                                        </thead>
                                        <tbody id="list_data_hide">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Ubah Inisial</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form id="formUbahInisial">
                <div class="modal-body">
                    <label>Inisial Awal: </label>
                    <div class="form-group">
                        <input type="text" readonly placeholder="Inisial Awal" id="inisialawal" class="form-control">
                    </div>
                    <label>Inisial Revisi: </label>
                    <div class="form-group">
                        <input type="text" placeholder="Inisial Revisi" id="inisialrevisi" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    // $.ajax({
    //     url: "<?php echo base_url(); ?>/api/talent",
    //     type: 'POST',
    //     headers: {
    //         "Authorization": "Bearer " + "<?php echo $session->get('Token'); ?>"
    //     },
    //     success: function(data) {
    //         console.log(data)
    //         $("#list_data").empty()
    //         data.forEach(e1 => {
    //             $("#list_data").append("<tr class='text-center'><td>" + e1['751898X1X1'] + "</td><td>" + e1['Kab'] + "</td><td>" + e1['751898X1X3'] + "</td><td>" + e1['751898X1X53'] + "</td><td>" + e1['umur'] + "</td></tr>")
    //         });

    //     }
    // });
</script>
<script>
    function tampil(kodekab) {
        $.ajax({
            url: "<?php echo base_url(); ?>/api/talent/byproda",
            type: 'POST',
            headers: {
                "Authorization": "Bearer " + "<?php echo $session->get('Token'); ?>"
            },
            data: {
                kodekab: kodekab
            },
            success: function(data) {
                // if (DataTable.isDataTable('#datatabel'))
                //     l.clear();

                // console.log(data)
                // console.log(data)
                $("#list_data").empty()
                // 751898X9X6
                data.forEach(e1 => {
                    $("#list_data").append("<tr class='text-center'><td>" + e1['submitdate'] + "</td><td>" + e1['751898X1X1'].toUpperCase() + "</td><td><b>" + e1['inisial_revisi'].toUpperCase() + " </b></td><td><button class='btn btn-success btn-sm' data-bs-toggle='modal' data-inisialawal='" + e1['751898X1X1'] + "' data-idtalent='" + e1['id'] + "' data-bs-target='#inlineForm'>Ubah Inisial</button><button onclick='hapusData(" + e1['id'] + ")' class='btn btn-danger btn-sm'>Hapus</button></td><td>" + e1['kab_domisili'] + "</td><td>" + e1['751898X1X53'] + "</td><td>" + e1['umur'] + "</td></tr>")
                });


                // l = new DataTable('#datatabel')


                // 
                // $('#datatabel').DataTable();
                // let l = new DataTable('#datatabel', {
                //     layout: {
                //         topStart: {
                //             buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5']
                //         }
                //     }
                // });

            }
        });
    }

    function tampilHide(kodekab) {
        $.ajax({
            url: "<?php echo base_url(); ?>/api/talent/byproda_hide",
            type: 'POST',
            headers: {
                "Authorization": "Bearer " + "<?php echo $session->get('Token'); ?>"
            },
            data: {
                kodekab: kodekab
            },
            success: function(data) {
                // console.log(data)
                // console.log(data)
                $("#list_data_hide").empty()
                // 751898X9X6
                data.forEach(e1 => {
                    $("#list_data_hide").append("<tr class='text-center'><td>" + e1['submitdate'] + "</td><td>" + e1['751898X1X1'].toUpperCase() + "</td><td><b>" + e1['inisial_revisi'].toUpperCase() + " </b></td><td><button onclick='restoreData(" + e1['id'] + ")' class='btn btn-warning btn-sm'>Restore</button></td><td>" + e1['kab_domisili'] + "</td><td>" + e1['751898X1X53'] + "</td><td>" + e1['umur'] + "</td></tr>")
                });

                // let l = new DataTable('#datatabel', {
                //     layout: {
                //         topStart: {
                //             buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5']
                //         }
                //     }
                // });

            }
        });
    }
</script>
<script>
    $("#kodekab").on("change", function() {
        tampil($(this).val())
        tampilHide($(this).val())
    });
</script>

<script>
    // let l=new DataTable('#datatabel');
</script>

<script>
    $('#inlineForm').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        inisialawal = button.data('inisialawal') // Extract info from data-* attributes
        idtalent = button.data('idtalent')
        // alert(inisialawal+idtalent)

        $("#inisialawal").val(inisialawal)
        var modal = $(this)
        // modal.find('.modal-title').text('New message to ' + recipient)
        // modal.find('.modal-body input').val(recipient)
    })
</script>

<script>
    $("#formUbahInisial").submit(function(event) {
        // alert("Submitted");

        $.ajax({
            url: "<?php echo base_url(); ?>/api/talent/ubahinisial",
            type: 'POST',
            headers: {
                "Authorization": "Bearer " + "<?php echo $session->get('Token'); ?>"
            },
            data: {
                idtalent: idtalent,
                inisialawal: $("#inisialawal").val(),
                inisialrevisi: $("#inisialrevisi").val(),

            },
            success: function(data) {
                // console.log(data)
                alert(data.messages.success)
                $('#formUbahInisial')[0].reset();
                tampil($("#kodekab").val())
                tampilHide($("#kodekab").val())
                //     $response = [
                // 'status'   => 200,
                // 'error'    => null,
                // 'messages' => [
                //     'success' => 'Data inisial berhasil diubah.'
                // ]
                // ];



            }
        });

        event.preventDefault();
    });
</script>

<script>
    function hapusData(id) {
        let text = "Yakin hapus? Data yang dihapus akan tetap tersimpan, namun disembunyikan dan tidak dihitung sebagai realisasi";
        if (confirm(text) == true) {
            text = "You pressed OK!";
            $.ajax({
                url: "<?php echo base_url(); ?>/api/talent/update",
                type: 'POST',
                headers: {
                    "Authorization": "Bearer " + "<?php echo $session->get('Token'); ?>"
                },
                data: {
                    id: id
                },
                success: function(data) {
                    // console.log(data)

                    alert(data.messages.success)
                    tampil($("#kodekab").val())
                    tampilHide($("#kodekab").val())





                }
            });
        } else {
            text = "You canceled!";
        }
        // alert(text + ' ' + id)
    }
    function restoreData(id) {
        let text = "Yakin restore?";
        if (confirm(text) == true) {
            text = "You pressed OK!";
            $.ajax({
                url: "<?php echo base_url(); ?>/api/talent/restore",
                type: 'POST',
                headers: {
                    "Authorization": "Bearer " + "<?php echo $session->get('Token'); ?>"
                },
                data: {
                    id: id
                },
                success: function(data) {
                    // console.log(data)

                    alert(data.messages.success)
                    tampil($("#kodekab").val())
                    tampilHide($("#kodekab").val())





                }
            });
        } else {
            text = "You canceled!";
        }
        // alert(text + ' ' + id)
    }

</script>