 <!-- Basic Vertical form layout section start -->
 <section id="basic-vertical-layouts">
     <div class="row match-height">
         <div class="page-title">
             <div class="row">
                 <div class="col-12 col-md-6 order-md-1 order-last">
                     <h3>Optimasi Stok Produksi</h3>
                     <p class="text-subtitle text-muted">Menu Utama</p>
                 </div>
                 <div class="col-12 col-md-6 order-md-2 order-first">
                     <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                         <ol class="breadcrumb">
                             <li class="breadcrumb-item"><a href="<?= base_url('Dashboard') ?>">Dashboard</a></li>
                             <li class="breadcrumb-item active" aria-current="page">Optimasi Stok Produksi</li>
                         </ol>
                     </nav>
                 </div>
             </div>
         </div>
         <div id="page1">
             <div class="card">
                 <div class="card-content">
                     <div class="card-body">
                         <div class="form-vertical">
                             <div class="form-body">
                                 <div class="row">
                                     <div class="form-group">
                                         <h4 class="card-title">Produk</h4>
                                         <select class="form-control products select2" multiple name="product" id="product">
                                             <?php foreach ($product as $value) : ?>
                                                 <option value="<?= $value['nama_produk'] ?>"><?= $value['nama_produk'] ?></option>
                                             <?php endforeach; ?>
                                         </select>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="card">
                 <div class="card-content">
                     <div class="card-body">
                         <div class="form-vertical">
                             <div class="form-body">
                                 <div class="row">
                                     <div class="form-group">
                                         <h4 class="card-title">Bahan</h4>
                                         <select class="form-control materials select2" multiple name="material" id="material">
                                             <?php foreach ($material as $value) : ?>
                                                 <option value="<?= $value['nama_bahan'] ?>"><?= $value['nama_bahan'] ?></option>
                                             <?php endforeach; ?>
                                         </select>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-12 d-flex justify-content-end">
                 <button onclick="goToPage2()" class="btn btn-success mb-5">Next Halaman 2</button>
             </div>
         </div>
         <div id="page2" style="display: none;">
             <div class="card" id="page2-form1">
                 <div class="card-content">
                     <div class="card-body">
                         <div class="form-vertical">
                             <div class="form-body">
                                 <h4 class="card-title">Bahan</h4>
                                 <hr>
                                 <div class="row" id="multipleMaterial">
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="card" id="page2-form2">
                 <div class="card-content">
                     <div class="card-body">
                         <div class="form-vertical">
                             <div class="form-body">
                                 <h4 class="card-title">Waktu Pengerjaan</h4>
                                 <hr>
                                 <div class="row" id="ProcessingTime">
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="card" id="page2-form3">
                 <div class="card-content">
                     <div class="card-body">
                         <div class="form-vertical">
                             <div class="form-body">
                                 <h4 class="card-title">Produksi</h4>
                                 <hr>
                                 <div class="row" id="productionAmount">
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <!-- <div class="card" id="page2-form4">
                 <div class="card-content">
                     <div class="card-body">
                         <div class="form-vertical">
                             <div class="form-body">
                                 <h4 class="card-title">Tenaga Kerja</h4>
                                 <hr>
                                 <div class="row" id="labor">
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div> -->
             <div class="card" id="page2-form5">
                 <div class="card-content">
                     <div class="card-body">
                         <div class="form-vertical">
                             <div class="form-body">
                                 <h4 class="card-title">Keuntungan Produk</h4>
                                 <hr>
                                 <div class="row" id="profit">
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-12 d-flex justify-content-end">
                 <button onclick="goToPage3()" class="btn btn-success mb-5">Next Halaman 3</button>
             </div>
         </div>
         <div id="page3" style="display: none;">
             <div id="addTable">
                 <div class="card" id="cardFirstData">
                     <div class="card-content">
                         <div class="card-body">
                             <div class="form-vertical">
                                 <div class="form-body">
                                     <h4 class="card-title">Data Awal</h4>
                                     <hr>
                                     <div class="row">
                                         <div class="table-responsive">
                                             <table class="table" id="tableFirstData">
                                                 <thead>
                                                 </thead>
                                                 <tbody>
                                                 </tbody>
                                             </table>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="card">
                 <div class="card-content">
                     <div class="card-body">
                         <div class="form-vertical">
                             <div class="form-body">
                                 <h4 class="card-title">Kesimpulan</h4>
                                 <hr>
                                 <div class="row">
                                     <div class="table-responsive">
                                         <table class="table" id="tableKesimpulan">
                                             <thead>
                                                 <tr>
                                                     <th>Produk</th>
                                                     <th>Stok</th>
                                                 </tr>
                                             </thead>
                                             <tbody>

                                             </tbody>
                                             <tfoot id="laba"></tfoot>
                                         </table>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- // Basic Vertical form layout section end -->