<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-statistic-1 card-success">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-info"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Jumlah Pendaftar</h4>
                            </div>
                            <div class="card-body">
                                <span><?= $pendaftar; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-statistic-1 card-success">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-code"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Pendaftar RPL</h4>
                            </div>
                            <div class="card-body">
                                <span id="pH"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-statistic-1 card-success">
                        <div class="card-icon bg-info">
                            <i class="fas fa-code"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Status Lampu</h4>
                            </div>
                            <div class="card-body">
                                <span id="lampu"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-statistic-1 card-success">
                        <div class="card-icon bg-info">
                            <i class="fas fa-code"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Status Kipas</h4>
                            </div>
                            <div class="card-body">
                                <span id="kipas"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="<?= base_url('assets/highcharts/highcharts.js'); ?>"></script>
<script src="<?= base_url('assets/highcharts/exporting.js'); ?>"></script>
<script src="<?= base_url('assets/highcharts/export-data.js'); ?>"></script>
<script src="<?= base_url('assets/highcharts/accessibility.js'); ?>"></script>

<script>
    function realtime() {
        $.ajax({
            url: "<?= base_url('admin/getRealtime'); ?>",
            dataType: "json",
            success: function(result) {
                $('#suhu').html(result.sensor.suhu + ' &#8451;');
                $('#pH').text(result.sensor.pH);
                $('#kipas').text(result.sensor.status_kipas);
                $('#lampu').text(result.jadwal.status_lampu);

                setTimeout(2000, realtime())
            }
        });
    }

    realtime()
</script>