<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Customer</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Customer</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Bergabung Pada</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data['customer'] as $key => $cust) : ?>
                                            <tr class="text-center">
                                                <td><?= 1 + $key++; ?></td>
                                                <td><?= $cust['nama']; ?></td>
                                                <td><?= $cust['email']; ?></td>
                                                <td><?= $cust['created_at']; ?></td>
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