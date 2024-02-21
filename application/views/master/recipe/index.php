<header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Resep</h3>
                    <p class="text-subtitle text-muted">Master</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('Dashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Resep</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
                <div class="card-header">
                <a href="<?= base_url('Recipe/create') ?>" class="btn icon icon-left btn-primary"><i class="fa-regular fa-square-plus"></i> Tambah Resep</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="tableListRecipe">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Produk</th>
                                    <th>Bahan</th>
                                    <th>Batas Jumlah Bahan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </section>
        <!-- Basic Tables end -->
    </div>