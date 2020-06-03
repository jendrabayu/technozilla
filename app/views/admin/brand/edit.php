  <!-- Main Content -->
  <div class="main-content">
      <section class="section">
          <div class="section-header">
              <h1>Edit Brand</h1>
          </div>

          <div class="section-body">

              <div class="row">
                  <div class="col-8">
                      <div class="card">
                          <form class="" method="POST" action="<?= url('admin/brand/update/' . $data['brand']['id']) ?>">
                              <div class="card-header">
                                  <h4>Edit Brand <?= $data['brand']['nama']; ?> </h4>
                                  <a href="<?= url('admin/brand') ?>" class="btn btn-primary ml-auto">Lihat Brand</a>
                              </div>
                              <div class="card-body">
                                  <div class="form-group">
                                      <label>Nama Brand</label>
                                      <input type="text" class="form-control" name="nama_brand" required value="<?= $data['brand']['nama'] ?>">
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