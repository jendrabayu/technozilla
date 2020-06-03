  <!-- Main Content -->
  <div class="main-content">
      <section class="section">
          <div class="section-header">
              <h1>Edit Rekening Bank</h1>
          </div>

          <div class="section-body">

              <div class="row">
                  <div class="col-8">
                      <div class="card">
                          <form class="" method="POST" action="<?= url('admin/rekening/update/' . $data['rekening']['id']) ?>">
                              <div class="card-header">
                                  <h4>Edit Rekening <?= $data['rekening']['nama']; ?> - <?= $data['rekening']['nomor']; ?></h4>
                                  <a href="<?= url('admin/rekening') ?>" class="btn btn-primary ml-auto">Lihat Rekening</a>
                              </div>
                              <div class="card-body">
                                  <div class="form-group">
                                      <label>Nama Bank</label>
                                      <input type="text" class="form-control" name="nama_bank" required value="<?= $data['rekening']['nama'] ?>">
                                  </div>
                                  <div class="form-group">
                                      <label>Atas Nama</label>
                                      <input type="text" class="form-control" name="atas_nama" required value="<?= $data['rekening']['atas_nama'] ?>">
                                  </div>
                                  <div class="form-group">
                                      <label>No. Rekening</label>
                                      <input type="text" class="form-control" name="no_rekening" required value="<?= $data['rekening']['nomor'] ?>">
                                  </div>
                              </div>
                              <div class="card-footer text-right">
                                  <button type="submit" class="btn btn-primary">Simpan</button>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </section>
  </div>