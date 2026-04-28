<div class="row">

    <!-- kategori -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <h5>Total Kategori</h5>
                <h3><?= $total_kategori; ?></h3>
            </div>
        </div>
    </div>

    <!-- buku -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <h5>Total Buku</h5>
                <h3><?= $total_buku; ?></h3>
            </div>
        </div>
    </div>

    <!-- chart (KECILIN DI SINI) -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card shadow h-100 py-2">
            <div class="card-body">
                <canvas id="chartDashboard" height="150"></canvas>
            </div>
        </div>
    </div>

</div>