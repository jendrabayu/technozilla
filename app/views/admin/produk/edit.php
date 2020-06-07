<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Produk</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-10">
                    <div class="card">
                        <form action="<?= url('admin/produk/update/' . $data['produk']['p_id']) ?>" method="POST" enctype="multipart/form-data">
                            <div class="card-header">
                                <h4>Edit Produk - <?= $data['produk']['m_nama'] ?></h4>
                                <a href="<?= url('admin/produk') ?>" class="btn btn-primary ml-auto">Lihat Produk</a>
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Nama Produk</label>
                                        <input type="text" class="form-control" name="p_nama" value="<?= $data['produk']['p_nama'] ?>" required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Kategori</label>
                                        <select class="form-control" name="k_id" required>
                                            <?php foreach ($data['kategori'] as $kategori) : ?>
                                                <option value="<?= $kategori['id'] ?>" <?= $data['produk']['k_id'] == $kategori['id'] ? 'selected' : '' ?>><?= $kategori['nama']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Merk</label>
                                        <select class="form-control" name="m_id" required>
                                            <?php foreach ($data['merk'] as $merk) : ?>
                                                <option value="<?= $merk['id'] ?>" <?= $data['produk']['m_id'] == $merk['id'] ? 'selected' : '' ?>><?= $merk['nama']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Stok</label>
                                        <input type="number" class="form-control" name="p_stok" value="<?= $data['produk']['p_stok'] ?>" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Harga</label>
                                        <input type="number" class="form-control" name="p_harga" value="<?= $data['produk']['p_harga'] ?>" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea class="form-control" name="deskripsi" required>
                                        <?= $data['produk']['p_desk'] ?>
                                    </textarea>
                                    <script>
                                        CKEDITOR.replace('deskripsi');
                                    </script>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Gambar Thumbnail</label>
                                    <img class="d-block m-2" style="max-width: 200px;" src="<?= url('images/' . $data['produk']['p_gambar']) ?>" alt="">
                                    <input type="file" class="form-control" name="p_gambar">
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a href="<?= url('admin/produk') ?>" class="btn btn-warning mr-2">Kembali</a>
                                <button class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>