  <!-- Main Content -->
  <div class="main-content">
      <section class="section">
          <div class="section-header">
              <h1>Tambah Foto Produk</h1>
          </div>

          <div class="section-body">

              <div class="row">
                  <div class="col-8">
                      <div class="card">
                          <form class="" method="POST" action="<?= url('admin/gallery/store') ?>" enctype="multipart/form-data">
                              <div class="card-header">
                                  <h4>Tambah Foto Produk</h4>
                                  <a href="<?= url('admin/gallery') ?>" class="btn btn-primary ml-auto">Lihat Galeri Foto</a>
                              </div>
                              <div class="card-body">
                                  <div class="form-group">
                                      <label>Pilih Produk</label>
                                      <select class="form-control" name="id">
                                          <option value="">--Pilih Produk--</option>
                                          <?php foreach ($data['produk'] as $produk) : ?>
                                              <option value="<?= $produk['id'] ?>"><?= $produk['nama']; ?></option>
                                          <?php endforeach; ?>
                                      </select>
                                  </div>

                                  <div class="form-group">
                                      <label>Foto Produk</label>
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