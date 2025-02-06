<?php
$session = session(); ?>

<div class="row" id="basic-table">
  <div class="col-12 col-md-12">
    <div class="card">
      <div class="card-header">
        <h4>
          Jika data relawan tidak muncul, kemungkinan karena Anda salah memasukkan kode enkripsi
        </h4>
        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#primary">
          Tambah
        </button>
      </div>
      <div class="card-content">
        <div class="card-body">
          <p class="card-text"></p>
          <!-- Table with outer spacing -->
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>NAME</th>
                  <th>RATE</th>
                  <th>SKILL</th>
                </tr>
              </thead>
              <tbody id="relawanList">


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
        <h5 class="modal-title white" id="myModalLabel160">Tambah Relawan</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <i data-feather="x"></i>
        </button>
      </div>
      <div class="modal-body">
        <form id="formTambahRelawan" class="form form-horizontal">
          <div class="form-body">
            <div class="row">
              <div class="col-md-4">
                <label>Nama</label>
              </div>
              <div class="col-md-8">
                <div class="form-group has-icon-left">
                  <div class="position-relative">
                    <input required type="text" class="form-control" placeholder="nama" id="nama">
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
                <label>Jenis Kelamin</label>
              </div>
              <div class="col-md-8">
                <div class="form-group has-icon-left">
                  <div class="position-relative">
                    <select required class="form-control" id="jeniskelamin">
                      <option value=''>Pilih</option>

                      <option value='laki-laki'>Laki2</option>
                      <option value="perempuan">Perempuan</option>
                    </select>
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
                <label>Level</label>
              </div>
              <div class="col-md-8">
                <div class="form-group has-icon-left">
                  <div class="position-relative">
                    <select required class="form-control" id="Level">
                      <option value=''>Pilih</option>

                      <option value='L0'>0</option>
                      <option value="L1">1</option>
                      <option value='L2'>2</option>
                      <option value="L3">3</option>
                      <option value='L4'>4</option>
                      <option value="L5">5</option>
                    </select>
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
  function tampilRelawan() {
    $.post("<?php echo base_url(); ?>/api/relawan", {
          kodeenkripsi: '<?php echo $session->get('Kode_enkripsi'); ?>'

        },
        function(data, status) {
          console.log(data)
          $("#relawanList").empty()
          data.forEach(e1 => {
            $("#relawanList").append("<tr><td>" + e1.Nama + "</td><td>" + e1.JenisKelamin + "</td></tr>")

          });
          // if (data.status == true)
          // location.reload();
          // alert("success");
        })
      .done(function() {
        // alert("second success");
      })
      .fail(function() {
        // alert("error");
      })
      .always(function() {
        // alert("finished");
      });

  }
</script>

<script>
  tampilRelawan()
</script>


<script>
  $("#formTambahRelawan").submit(function() {
    event.preventDefault();

    $.post("<?php echo base_url(); ?>/relawan/tambah", {
          nama: $("#nama").val(),
          jeniskelamin: $("#jeniskelamin").val(),
          level: $("#level").val(),
          kodeenkripsi: '<?php echo $session->get('Kode_enkripsi'); ?>',

        },
        function(data, status) {
          console.log(data)

        })
      .done(function() {
        alert("success");
        // $('#modal').modal('toggle');

        $('#formTambahRelawan')[0].reset();
        tampilRelawan()
      })
      .fail(function(data, messages) {
        alert("Buatkan Username di atas 4 karakter, password di atas 8 karakter");

      })
      .always(function() {
        // alert("finished");
      });
  });
</script>