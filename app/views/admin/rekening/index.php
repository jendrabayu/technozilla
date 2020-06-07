<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Rekening Bank</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-10">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Rekening Bank</h4>
                            <a href="<?= url('admin/rekening/create') ?>" class="btn btn-primary ml-auto">Tambah</a>
                        </div>
                        <div class="card-body">
                            <?= \App\Core\Session::getFlash() ?>
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead class="text-center">
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Bank</th>
                                            <th>Atas Nama</th>
                                            <th>No. Rekening</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data['rekening'] as $key => $rekening) : ?>
                                            <tr class="text-center">
                                                <td><?= 1 + $key++ ?></td>
                                                <td><?= $rekening['nama'] ?></td>
                                                <td><?= $rekening['atas_nama'] ?></td>
                                                <td><?= $rekening['nomor'] ?></td>
                                                <td>
                                                    <a class="btn btn-icon btn-sm btn-warning mr-1" href="<?= url('admin/rekening/edit/' . $rekening['slug']) ?>">
                                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                                    </a>
                                                    <form action="<?= url('admin/rekening/destroy') ?>" method="POST" class="d-inline">
                                                        <input type="hidden" name="id" value="<?= $rekening['id'] ?>">
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