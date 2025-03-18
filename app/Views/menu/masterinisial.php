<?php

$session = session();
$arrayPekerjaan = [
    ['AO01', 'ASN / Pegawai Lembaga Non Struktural'],
    ['AO02', 'Karyawan BUMN'],
    ['AO03', 'Karyawan BUMD'],
    ['AO04', 'LSM/NGO bidang Charity, Sosial, Ekonomi, Lingkungan, Pendidikan, dll Pusat'],
    ['AO05', 'LSM/NGO bidang Charity, Sosial, Ekonomi, Lingkungan, Pendidikan, dll Provinsi'],
    ['AO06', 'LSM/NGO bidang Charity, Sosial, Ekonomi, Lingkungan, Pendidikan, dll Kabupaten/Kota'],
    ['AO07', 'Karyawan swasta'],
    ['AO08', 'Wiraswasta/Usaha'],
    ['AO09', 'Lainnya (mis: Tenaga Harian Lepas, dsb)'],


];

$arrayPangkat = [
    ['1', ' Juru Muda - I/a'],
    ['2', ' Juru Muda Tingkat I - I/b'],
    ['3', ' Juru - I/c'],
    ['4', ' Juru Tingkat I - I/d'],
    ['5', ' Pengatur Muda - II/a'],
    ['6', ' Pengatur Muda Tingkat I - II/b'],
    ['7', ' Pengatur Muda - II/c'],
    ['8', ' Pengatur Muda - II/d'],
    ['9', ' Penata Muda - III/a'],
    ['10', ' Penata Muda Tingkat I - III/b'],
    ['11', ' Penata - III/c'],
    ['12', ' Penata Tingkat I - III/d'],
    ['13', ' Pembina - IV/a'],
    ['14', ' Pembina Tingkat I - IV/b'],
    ['15', ' Pembina Utama Muda - IV/c'],
    ['16', ' Pembina Utama Madya - IV/d'],
    ['17', ' Pembina Utama - IV/e']


];
$arrayInstansi = [
    ['AO01', 'Instansi Pusat'],
    ['AO02', 'Instansi Provinsi non Sekolah'],
    ['AO03', 'Instansi Kab/Kota non Sekolah'],
    ['AO04', 'Perguruan Tinggi'],
    ['AO06', 'SLTA'],
    ['AO05', 'SLTP'],
    ['AO07', 'SD'],
    ['AO08', 'TK'],
    ['AO09', 'Lembaga Non Struktural (Komisi, Badan, dll) Pusat'],
    ['AO10', 'Lembaga Non Struktural (Komisi, Badan, dll) Provinsi'],
    ['AO11', 'Lembaga Non Struktural (Komisi, Badan, dll) Kab/Kota'],



];
?>
<style>
    .header {
        position: sticky;
        top: 0;
    }

    body {
        height: 800px;
    }
</style>
<script>
    var l
</script>
<script>
    var idtalent
    var inisialawal
    var inisialrevisi
    var kodeKab_
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
                            <h5><button class='btn btn-success' data-bs-toggle='modal' data-bs-target='#kerjaForm'>Tambah Inisial</button>

                            </h5>

                            <fieldset class="form-group">
                                FILTER: <input type="text" id="myInput" class="form-input" style="background-color:yellow" onkeyup="myFunction()" placeholder="Cari inisial talent.." title="Type in a name">
                            </fieldset>
                            <div class="col-md-12 mb-4">
                                <div class="table-responsive">
                                    <table id="datatabel" class="table table-striped w-auto">
                                        <thead style="position: sticky;top: 0" class="bg-primary text-white">
                                            <tr class="text-center">
                                                <th>No</th>
                                                <th>Inisial</th>
                                                <th>Nama encripted</th>
                                                <th>Nama asli</th>
                                            </tr>
                                        </thead>
                                        <tbody id="list_data">

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
                        <select id='inisialrevisi' class="form-control">

                        </select>

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
<div class="modal fade text-left" id="wilForm" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Ubah Wilayah Pembinaan</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>


        </div>
    </div>
</div>
<div class="modal fade text-left" id="kerjaForm" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Tambah Inisial Baru</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form id="formUbahWilPembinaan">
                <div class="modal-body">

                    <label>Inisial </label>
                    <div class="form-group">

                        <input id='tambahInisial' class="form-control" type='text'>

                    </div>
                    <label>Nama Lengkap </label>
                    <div class="form-group">

                        <input id='tambahNama' class="form-control" type='text'>

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
            url: "<?php echo base_url(); ?>/api/talent/masterinisial",
            type: 'POST',
            headers: {
                "Authorization": "Bearer " + "<?php echo $session->get('Token'); ?>"
            },
            data: {
                kodekab: kodekab,
                search: $("#myInput").val()
            },
            success: function(data) {

                $("#list_data").empty()
                // 751898X9X6
                let nom = 1
                let stat
                data.forEach(e1 => {
                    if (e1['status_inisial'] == 'sesuai')
                        stat = 'bg-success'
                    else
                        stat = 'bg-danger'

                    if (e1['statusbekerja'] == 'Ya')
                        statusbekerja = 'bg-success'
                    else
                        statusbekerja = 'bg-danger'
                    // statusbekerja

                    $("#list_data").append("<tr class='text-center'><td>" + nom + "</td><td>" + e1['Inisial'].toUpperCase() + "</td><td>" + e1['NamaTerenkripsi'] + "</td><td>" + e1['NamaAsli'] + "</td></tr>")
                    nom++
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
                    $("#list_data_hide").append("<tr class='text-center'><td>" + e1['submitdate'] + "</td><td>" + e1['751898X1X1'].toUpperCase() + "</td><td><b>" + e1['inisial_revisi'].toUpperCase() + " </b></td><td><button onclick='restoreData(" + e1['id'] + ")' class='btn btn-warning btn-sm'>Restore</button></td><td>" + e1['kab_domisili'] + "</td><td>" + e1['751898X1X53'] + "</td></tr>")
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

        kodeKab_ = $(this).val()

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

        $.ajax({
            url: "<?php echo base_url(); ?>/api/talent/inisialbyproda",
            type: 'POST',
            headers: {
                "Authorization": "Bearer " + "<?php echo $session->get('Token'); ?>"
            },
            data: {
                kodekab: kodeKab_
                // search: $("#myInput").val()
            },
            success: function(data) {

                $("#inisialrevisi").empty()
                $("#inisialrevisi").append("<option value=''>--Pilih--</option>")
                data.forEach(el => {
                    $("#inisialrevisi").append("<option value='" + el['Inisial'] + "'>" + el['Inisial'] + " - " + el['NamaAsli'] + "</option>")
                });

                $("#inisialrevisi").val(inisialawal)

            }
        });

    })
</script>

<script>
    $('#wilForm').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        idtalent = button.data('idtalent')
        // alert(inisialawal+idtalent)
        // alert(button.data('wilayahpembinaanawal'))
        $("#wilpembinaan").val(button.data('wilayahpembinaanawal'))


        // $("#inisialawal").val(inisialawal)
        var modal = $(this)
        // modal.find('.modal-title').text('New message to ' + recipient)
        // modal.find('.modal-body input').val(recipient)
    })
</script>
<script>
    $('#kerjaForm').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        idtalent = button.data('idtalent')

        
        setTimeout(() => {
            if ($("#kodekab").val() == '') {
            alert('pilih proda kab/proda terlebih dahulu')
            $('#kerjaForm').modal('hide');
        }
        }, 2000);

        // alert(111)

        var modal = $(this)


    })
</script>
<script>
    $('#detailForm').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        idtalent = button.data('idtalent')
        var modal = $(this)
        $.ajax({
            url: "<?php echo base_url(); ?>/api/talent/individu",
            type: 'POST',
            headers: {
                "Authorization": "Bearer " + "<?php echo $session->get('Token'); ?>"
            },
            data: {
                idtalent: idtalent
            },
            success: function(data) {
                // data = data[0]
                console.log(data)
                $("#detailNamaLengkap").val(data.NamaAsli)
                $("#detailTempatBekerja").val(data.tempatbekerja_samar)
                $("#detailGender").val(data.gender)
                $("#detailLevel").val(data.level)

                //                 <input readonly id='detailNamaLengkap' class="form-control" type='text'>

                // </div>
                // <label>Tempat Bekerja </label>
                // <div class="form-group">

                //     <input readonly id='detailTempatBekerja' class="form-control" type='text'>





            }
        });
    })
</script>

<script>
    $("#kerjaForm").submit(function(event) {
        // alert("Submitted");

        $.ajax({
            url: "<?php echo base_url(); ?>/api/talent/ubahkerja",
            type: 'POST',
            headers: {
                "Authorization": "Bearer " + "<?php echo $session->get('Token'); ?>"
            },
            data: {
                idtalent: idtalent,
                statusbekerja: $("#751898X9X6").val(),
                pekerjaan: $("#751898X9X11").val(),
                instansi: $("#751898X9X12").val(),
                pangkat: $("#751898X8X32").val(),

            },


            success: function(data) {
                //   console.log(data)
                alert('Sukses ubah data')
                tampil($("#kodekab").val())
                tampilHide($("#kodekab").val())
            }
        });

        event.preventDefault();
    });
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
    $("#formUbahWilPembinaan").submit(function(event) {
        $.ajax({
            url: "<?php echo base_url(); ?>/api/talent/tambahinisial",
            type: 'POST',
            headers: {
                "Authorization": "Bearer " + "<?php echo $session->get('Token'); ?>"
            },
            data: {
                kodekab: $("#kodekab").val(),
                inisial: $("#tambahInisial").val(),
                nama: $("#tambahNama").val(),

            },
            success: function(data) {
                // console.log(data)
                alert('Sukses')

                tampil($("#kodekab").val())
             
              

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

<script>
    $("#myInput").change(function() {
        tampil($("#kodekab").val())
    });
</script>