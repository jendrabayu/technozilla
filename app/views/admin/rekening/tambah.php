  <!-- Main Content -->
  <div class="main-content">
      <section class="section">
          <div class="section-header">
              <h1>Tambah Rekening Bank</h1>
          </div>

          <div class="section-body">

              <div class="row">
                  <div class="col-8">
                      <div class="card">
                          <form class="" method="POST" action="<?= url('admin/rekening/store') ?>">
                              <div class="card-header">
                                  <h4>Tambah Rekening Bank Baru</h4>
                                  <a href="<?= url('admin/rekening') ?>" class="btn btn-primary ml-auto">Lihat Rekening</a>
                              </div>
                              <div class="card-body">
                                  <div class="form-group">
                                      <label>Nama Bank</label>
                                      <input type="text" class="form-control" name="nama_bank" required>
                                  </div>
                                  <div class="form-group">
                                      <label>Atas Nama</label>
                                      <input type="text" class="form-control" name="atas_nama" required>
                                  </div>
                                  <div class="form-group">
                                      <label>No. Rekening</label>
                                      <input type="text" class="form-control" name="no_rekening" required>
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