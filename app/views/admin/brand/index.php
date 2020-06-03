  <!-- Main Content -->
  <div class="main-content">
      <section class="section">
          <div class="section-header">
              <h1>Brand</h1>
          </div>

          <div class="section-body">

              <div class="row">
                  <div class="col-8">
                      <div class="card">
                          <div class="card-header">
                              <h4>Data Brand</h4>
                              <a href="<?= url('admin/brand/create') ?>" class="btn btn-primary ml-auto">Tambah</a>
                          </div>
                          <div class=" card-body">
                              <?php
                                \App\Helpers\Flash::getFlash();
                                ?>
                              <div class="table-responsive">
                                  <table class="table table-striped" id="table-1">
                                      <thead>
                                          <tr>
                                              <th class="text-center">
                                                  No.
                                              </th>
                                              <th>Nama Brand</th>
                                              <th>Aksi</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <?php $no = 1;
                                            foreach ($data['brand'] as $brand) : ?>
                                              <tr>
                                                  <td class="text-center"><?= $no++ ?></td>
                                                  <td><?= $brand['nama'] ?></td>
                                                  <td>
                                                      <a class="btn btn-icon btn-sm btn-warning mr-1" href="<?= url('admin/brand/edit/' . $brand['id']) ?>">
                                                          <i class="fa fa-edit" aria-hidden="true"></i>
                                                      </a>

                                                      <form action="<?= url('admin/brand/destroy') ?>" method="POST" class="d-inline">
                                                          <input type="hidden" name="id" value="<?= $brand['id'] ?>">
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