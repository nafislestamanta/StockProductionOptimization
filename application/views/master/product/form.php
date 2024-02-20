 <!-- Basic Vertical form layout section start -->
 <section id="basic-vertical-layouts">
     <div class="row match-height">

         <div class="card">
             <div class="card-header">
                 <h4 class="card-title">Tambah Produk</h4>
             </div>
             <div class="card-content">
                 <div class="card-body">
                     <div class="form-vertical">
                         <div class="form-body">
                             <div class="row">
                                 <div class="col-12">
                                     <div class="form-group">
                                         <label for="product_name">Nama Produk</label>
                                         <input type="text" id="product_name" class="form-control" name="product_name" placeholder="Nama Produk">
                                     </div>
                                 </div>
                                 <div class="col-12">
                                     <div class="form-group">
                                         <label for="production_limit">Batas Jumlah Produksi</label>
                                         <div class="input-group mb-3">
                                             <input type="number" id="production_limit" class="form-control" name="production_limit" placeholder="Batas Jumlah Produksi">
                                             <span class="input-group-text">pcs</span>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-12">
                                     <div class="form-group">
                                         <label for="work_deadline">Batas Waktu Pengerjaan</label>
                                         <div class="input-group mb-3">
                                         <input type="number" id="work_deadline" class="form-control" name="work_deadline" placeholder="Batas Waktu Pengerjaan">
                                         <span class="input-group-text">menit</span>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-12">
                                     <div class="form-group">
                                         <label for="labor_limit">Batas Tenaga Kerja</label>
                                         <div class="input-group mb-3">
                                         <input type="number" id="labor_limit" class="form-control" name="labor_limit" placeholder="Batas Tenaga Kerja">
                                         <span class="input-group-text">orang</span>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-12">
                                     <div class="form-group">
                                         <label for="product_profit">laba Produk</label>
                                         <div class="input-group mb-3">
                                             <span class="input-group-text">Rp.</span>
                                         <input type="number" id="product_profit" class="form-control" name="product_profit" placeholder="Laba Produk">
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-12 d-flex justify-content-end">
                                     <button onclick="save()" type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                     <a href="<?= base_url('Product') ?>" class="btn btn-light-secondary me-1 mb-1">Cancel</a>
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