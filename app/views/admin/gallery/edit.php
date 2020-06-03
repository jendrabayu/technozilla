  <!-- Main Content -->
  <div class="main-content">
      <section class="section">
          <div class="section-header">
              <h1>Edit Foto Produk</h1>
          </div>

          <div class="section-body">

              <div class="row">
                  <div class="col-8">
                      <div class="card">
                          <form class="" method="POST" action="<?= url('admin/gallery/update/'.$data['foto']['id']) ?>" enctype="multipart/form-data">
                              <div class="card-header">
                                  <h4>Edit Foto Produk</h4>
                                  <a href="<?= url('admin/gallery') ?>" class="btn btn-primary ml-auto">Lihat Galeri Foto</a>
                              </div>
                              <div class="card-body">
                                  <div class="form-group">
                                      <label>Pilih Produk</label>
                                      <select class="form-control" name="id">

                                          <?php foreach ($data['produk'] as $produk) : ?>
                                              <option value="<?= $produk['id'] ?> 
                                              
                                        
                                              
                                              " <?= $produk['id'] == $data['foto']['produk_id'] ? 'selected' : ''
                                                ?>><?= $produk['nama']; ?></option>
                                          <?php endforeach; ?>
                                      </select>
                                  </div>

                                  <div class="form-group">
                                      <label>Foto Produk</label>
                                      <img class="d-block m-2" style="max-width: 200px;" src="<?= url('images/' . $data['foto']['nama']) ?>" alt="">
                                      <input type="file" class="form-control" name="gambar">
                                  </div>
                              </div>
                              <div class="card-footer text-right">
                                  <button onclick="window.history.back()" class="btn btn-warning mr-2">Kembali</button>
                                  <button type="submit" class="btn btn-primary">Simpan</button>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </section>
  </div>