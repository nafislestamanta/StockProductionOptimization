 <!-- Basic Vertical form layout section start -->
 <section id="basic-vertical-layouts">
     <div class="row match-height">

         <div class="card">
             <div class="card-header">
                 <h4 class="card-title">Tambah Bahan</h4>
             </div>
             <div class="card-content">
                 <div class="card-body">
                     <div class="form-vertical">
                         <div class="form-body">
                             <div class="row">
                                 <div class="col-12">
                                     <div class="form-group">
                                         <label for="product_name">Nama Bahan</label>
                                         <input type="text" id="material_name" class="form-control" name="material_name" placeholder="Nama Bahan">
                                     </div>
                                 </div>
                                 <div class="col-12 d-flex justify-content-end">
                                     <button onclick="save()" type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                     <a href="<?= base_url('Material') ?>" class="btn btn-light-secondary me-1 mb-1">Cancel</a>
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