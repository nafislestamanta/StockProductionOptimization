 <!-- Basic Vertical form layout section start -->
 <section id="basic-vertical-layouts">
     <div class="row match-height">

         <div class="card">
             <div class="card-header">
                 <h4 class="card-title">Tambah Resep</h4>
             </div>
             <div class="card-content">
                 <div class="card-body">
                     <div class="form-vertical">
                         <div class="form-body">
                             <div class="row">
                                 <div class="col-12">
                                     <div class="form-group">
                                         <label for="product">Produk</label>
                                         <select class="form-control" name="product" id="product">
                                             <option value="">--Pilih Produk--</option>
                                             <?php foreach ($product as $value) : ?>
                                                <option value="<?= $value['id_produk'] ?>"><?= $value['nama_produk'] ?></option>
                                             <?php endforeach; ?>
                                         </select>
                                     </div>
                                 </div>
                                 <div class="col-12">
                                     <div class="form-group">
                                         <label for="material">Bahan</label>
                                         <select class="form-control" name="material" id="material">
                                             <option value="">--Pilih Bahan--</option>
                                             <?php foreach ($material as $value) : ?>
                                                <option value="<?= $value['id_bahan'] ?>"><?= $value['nama_bahan'] ?></option>
                                             <?php endforeach; ?>
                                         </select>
                                     </div>
                                 </div>
                                 <div class="col-12">
                                     <div class="form-group">
                                         <label for="limit_material">Batas Jumlah Bahan</label>
                                         <div class="input-group mb-3">
                                             <input type="number" id="limit_material" class="form-control" name="limit_material" placeholder="Batas Jumlah Bahan">
                                             <span class="input-group-text">kg</span>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-12 d-flex justify-content-end">
                                     <button onclick="save()" type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                     <a href="<?= base_url('Recipe') ?>" class="btn btn-light-secondary me-1 mb-1">Cancel</a>
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