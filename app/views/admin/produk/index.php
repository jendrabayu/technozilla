<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Produk</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Produk</h4>
                            <a href="<?= url('admin/produk/create') ?>" class="btn btn-primary ml-auto">Tambah</a>
                        </div>
                        <div class=" card-body">
                            <?= \App\Core\Session::getFlash() ?>
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No.</th>
                                            <th>Nama Produk</th>
                                            <th>Kategori</th>
                                            <th>Merk</th>
                                            <th>Harga</th>
                                            <th>Stok</th>
                                            <th>Gambar</th>
                                            <th style="min-width: 50px;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data['produk'] as $key => $produk) : ?>
                                            <tr class="text-center">
                                                <td class="text-center"><?= 1 + $key++ ?></td>
                                                <td><?= $produk['p_nama'] ?></td>
                                                <td><?= $produk['k_nama'] ?></td>
                                                <td><?= $produk['m_nama'] ?></td>
                                                <td><?= number_format($produk['p_harga'], 0, ".", ",") ?></td>
                                                <td><?= $produk['p_stok'] ?></td>
                                                <td>
                                                    <img style="max-width: 70px;" src=" <?= url('images/' . $produk['p_gambar']) ?>" alt="">
                                                </td>
                                                <td>
                                                    <a class="btn btn-icon btn-sm btn-warning mr-1" href="<?= url('admin/produk/edit/' . $produk['p_slug']) ?>">
                                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                                    </a>
                                                    <form action="<?= url('admin/produk/destroy') ?>" method="POST" class="d-inline">
                                                        <input type="hidden" name="id" value="<?= $produk['p_id'] ?>">
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