<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <h3>Daftar Transaksi</h3>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <td>Nama</td>
                <td>Metode Pembayaran</td>
                <td>total</td>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($transaksi as $trs) : ?>
            <tr>
                <td><?= $trs['nama']; ?></td>
                <td><?= $trs['nama_metode']; ?></td>
                <td><?= $trs['total']; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>