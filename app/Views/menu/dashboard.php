<?php

$session = session();

?>

<style>
    #table1 th,
    tr {
        line-height: 10px;
    }
</style>
<section class="section">
    <div class="row mb-2">
        <div class="col-12 col-md-2">
            <div class="card card-statistic">
                <div class="card-body p-0">
                    <div class="d-flex flex-column">
                        <div class='px-3 py-3 d-flex justify-content-between'>
                            <h3 class='card-title'>L0</h3>
                            <div class="card-right d-flex align-items-center">
                                <p id='l0_tot'></p>
                            </div>
                        </div>
                        <div class="chart-wrapper">
                            <canvas id="" style="height:100px !important"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-2">
            <div class="card card-statistic">
                <div class="card-body p-0">
                    <div class="d-flex flex-column">
                        <div class='px-3 py-3 d-flex justify-content-between'>
                            <h3 class='card-title'>L1</h3>
                            <div class="card-right d-flex align-items-center">
                                <p id='l1_tot'></p>
                            </div>
                        </div>
                        <div class="chart-wrapper">
                            <canvas id="" style="height:100px !important"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-2">
            <div class="card card-statistic">
                <div class="card-body p-0">
                    <div class="d-flex flex-column">
                        <div class='px-3 py-3 d-flex justify-content-between'>
                            <h3 class='card-title'>L2</h3>
                            <div class="card-right d-flex align-items-center">
                                <p id='l2_tot'></p>
                            </div>
                        </div>
                        <div class="chart-wrapper">
                            <canvas id="" style="height:100px !important"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-2">
            <div class="card card-statistic">
                <div class="card-body p-0">
                    <div class="d-flex flex-column">
                        <div class='px-3 py-3 d-flex justify-content-between'>
                            <h3 class='card-title'>L3</h3>
                            <div class="card-right d-flex align-items-center">
                                <p id='l3_tot'></p>
                            </div>
                        </div>
                        <div class="chart-wrapper">
                            <canvas id="" style="height:100px !important"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-2">
            <div class="card card-statistic">
                <div class="card-body p-0">
                    <div class="d-flex flex-column">
                        <div class='px-3 py-3 d-flex justify-content-between'>
                            <h3 class='card-title'>L4</h3>
                            <div class="card-right d-flex align-items-center">
                                <p id='l4_tot'></p>
                            </div>
                        </div>
                        <div class="chart-wrapper">
                            <canvas id="canvas2" style="height:100px !important"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-2">
            <div class="card card-statistic">
                <div class="card-body p-0">
                    <div class="d-flex flex-column">
                        <div class='px-3 py-3 d-flex justify-content-between'>
                            <h3 class='card-title'>L5</h3>
                            <div class="card-right d-flex align-items-center">
                                <p id='l5_tot'></p>
                            </div>
                        </div>
                        <div class="chart-wrapper">
                            <canvas id="canvas3" style="height:100px !important"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row mb-4">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Capaian Per Proda</h4>

                </div>
                <div class="card-body px-0 pb-0">
                    <div class="table-responsive">
                        <table class='table mb-0' id="table1">
                            <thead>
                                <tr class="text-center" >
                                    <th rowspan=2>Proda</th>

                                    <th colspan=2>L3</th>
                                    <th colspan=2>L4</th>
                                    <th colspan=2>L5</th>
                                    <th colspan=2>Jumlah (L3-L5)</th>
                                </tr>
                                <tr class="text-center">
                                    <th>Target</th>
                                    <th>Realisasi</th>
                                    <th>Target</th>
                                    <th>Realisasi</th>
                                    <th>Target</th>
                                    <th>Realisasi</th>
                                    <th>Target</th>
                                    <th>Realisasi</th>
                                </tr>
                            </thead>
                            <tbody id="list_data">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<script>
    $.ajax({
        url: "<?php echo base_url(); ?>/api/kab",
        type: 'POST',
        headers: {
            "Authorization": "Bearer " + "<?php echo $session->get('Token'); ?>"
        },
        success: function(data) {
            // console.log("Success!");
            $("#list_data").empty()
            let l0_jum = 0
            let l1_jum = 0
            let l2_jum = 0
            let l3_jum = 0
            let l4_jum = 0
            let l5_jum = 0
            let l_jum = 0
            data.forEach(e1 => {
                if (e1.Kab != '3372')

                    $("#list_data").append("<tr class='text-center'><td>" + e1.Kab + "</td><td>" + e1.TargetL3 + "</td><td>" + e1.real_l3 + "</td><td>" + e1.TargetL4 + "</td><td>" + e1.real_l4 + "</td><td>" + e1.TargetL5 + "</td><td>" + e1.real_l5 + "</td><td>" + parseInt(parseInt(e1.TargetL3) + parseInt(e1.TargetL4) + parseInt(e1.TargetL5)) + "</td><td>" + parseInt(parseInt(e1.real_l3) + parseInt(e1.real_l4) + parseInt(e1.real_l5)) + "</td></tr>")
                l0_jum = parseInt(l0_jum) + parseInt(e1.real_l0)
                l1_jum = parseInt(l1_jum) + parseInt(e1.real_l1)
                l2_jum = parseInt(l2_jum) + parseInt(e1.real_l2)
                l3_jum = parseInt(l3_jum) + parseInt(e1.real_l3)
                l4_jum = parseInt(l4_jum) + parseInt(e1.real_l4)
                l5_jum = parseInt(l5_jum) + parseInt(e1.real_l5)
                l_jum = l3_jum + l4_jum + l5_jum
            });

            $("#list_data").append("<tr class='text-center'><td>Jumlah</td><td>-</td><td>" + l3_jum + "</td><td>-</td><td>" + l4_jum + "</td><td>-</td><td>" + l5_jum + "</td><td>-</td><td>" + l_jum + "</td></tr>")
            $("#l0_tot").text(l0_jum)
            $("#l1_tot").text(l1_jum)
            $("#l2_tot").text(l2_jum)
            $("#l3_tot").text(l3_jum)
            $("#l4_tot").text(l4_jum)
            $("#l5_tot").text(l5_jum)
            $("#l_tot").text(l_jum)
        }
    });
</script>