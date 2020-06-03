  <!-- Main Content -->
  <div class="main-content">
      <section class="section">
          <div class="section-header">
              <h1>Edit Kategori</h1>
          </div>

          <div class="section-body">

              <div class="row">
                  <div class="col-8">
                      <div class="card">
                          <form class="" method="POST" action="<?= url('admin/kategori/update/' . $data['kategori']['id']) ?>">
                              <div class="card-header">
                                  <h4>Edit Kategori : <?= $data['kategori']['nama']; ?> </h4>
                                  <a href="<?= url('admin/kategori') ?>" class="btn btn-primary ml-auto">Lihat Kategeori</a>
                              </div>
                              <div class="card-body">
                                  <div class="form-group">
                                      <label>Nama Kategori</label>
                                      <input type="text" class="form-control" name="nama_kategori" required value="<?= $data['kategori']['nama'] ?>">
                                  </div>
                              </div>
                              <div class="card-footer text-right">
                                  <button type="submit" class="btn btn-primary">Ubah</button>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </section>
  </div>