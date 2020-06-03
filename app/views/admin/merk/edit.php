<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Merk</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <form class="" method="POST" action="<?= url('admin/merk/update/' . $data['merk']['id']) ?>">
                            <div class="card-header">
                                <h4>Edit Merk <?= $data['merk']['nama']; ?> </h4>
                                <a href="<?= url('admin/merk') ?>" class="btn btn-primary ml-auto">Lihat Merk</a>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Merk</label>
                                    <input type="text" class="form-control" name="merk" required value="<?= $data['merk']['nama'] ?>">
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a href="<?= url('admin/merk') ?>" class="btn btn-warning mr-2">Kembali</a>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>