<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Kategori</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Kategori</h4>
                            <a href="<?= url('admin/kategori/create') ?>" class="btn btn-primary ml-auto">Tambah</a>
                        </div>
                        <div class=" card-body">
                            <?php
                            \App\Helpers\Flash::getFlash();
                            ?>
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No.</th>
                                            <th>Nama Kategori</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data['kategori'] as $key => $kategori) : ?>
                                            <tr class="text-center">
                                                <td><?= 1 + $key++ ?></td>
                                                <td><?= $kategori['nama'] ?></td>
                                                <td>
                                                    <a class="btn btn-icon btn-sm btn-warning mr-1" href="<?= url('admin/kategori/edit/' . $kategori['id']) ?>">
                                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                                    </a>
                                                    <form action="<?= url('admin/kategori/destroy') ?>" method="POST" class="d-inline">
                                                        <input type="hidden" name="id" value="<?= $kategori['id'] ?>">
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