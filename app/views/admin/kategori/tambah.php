  <!-- Main Content -->
  <div class="main-content">
      <section class="section">
          <div class="section-header">
              <h1>Tambah Kategori</h1>
          </div>

          <div class="section-body">

              <div class="row">
                  <div class="col-8">
                      <div class="card">
                          <form class="" method="POST" action="<?= url('admin/kategori/store') ?>">
                              <div class="card-header">
                                  <h4>Tambah Kategori Baru</h4>
                                  <a href="<?= url('admin/brand') ?>" class="btn btn-primary ml-auto">Lihat Kategori</a>
                              </div>
                              <div class="card-body">
                                  <div class="form-group">
                                      <label>Nama Kategori</label>
                                      <input type="text" class="form-control" name="nama_kategori" required>
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