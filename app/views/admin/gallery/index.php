  <!-- Main Content -->
  <div class="main-content">
      <section class="section">
          <div class="section-header">
              <h1>Galeri Foto Produk</h1>
          </div>

          <div class="section-body">

              <div class="row">
                  <div class="col-10">
                      <div class="card">
                          <div class="card-header">
                              <h4>Data Foto Produk</h4>
                              <a href="<?= url('admin/gallery/create') ?>" class="btn btn-primary ml-auto">Tambah</a>
                          </div>
                          <div class=" card-body">
                              <?= \App\Core\Session::getFlash() ?>
                              <div class="table-responsive">
                                  <table class="table table-striped" id="table-1">
                                      <thead>
                                          <tr>
                                              <th class="text-center">No.</th>
                                              <th>Nama Produk</th>
                                              <th>Foto</th>
                                              <th>Aksi</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <?php foreach ($data['foto'] as $key => $foto) : ?>
                                              <tr>
                                                  <td class="text-center"><?= 1 + $key++; ?></td>
                                                  <td><?= $foto['nama']; ?></td>

                                                  <td><img style="max-width: 150px;" src="<?= url('images/' . $foto['gambar']) ?>" alt=""></td>
                                                  <td>
                                                      <a class="btn btn-icon btn-sm btn-warning mr-1" href="<?= url('admin/gallery/edit/' . $foto['id']) ?>">
                                                          <i class="fa fa-edit" aria-hidden="true"></i>
                                                      </a>

                                                      <form action="<?= url('admin/gallery/destroy') ?>" method="POST" class="d-inline">
                                                          <input type="hidden" name="id" value="<?= $foto['id'] ?>">
                                                          <input type="hidden" name="gambar" value="<?= $foto['gambar'] ?>">
                                                          <button type="submit" class="btn btn-icon btn-sm btn-danger">
                                                              <i class="fa fa-trash" aria-hidden="true"></i>
                                                          </button>
                                                      </form>

                                                  </td>
                                              </tr>
                                          <?php endforeach; ?>
                                      </tbody>
                                  </table>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
  </div>