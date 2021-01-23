<div class="container">
  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
  <?php if ($this->session->flashdata('flash')) : ?>
    <!-- <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data mahasiswa <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div> -->
  <?php endif; ?>
  <div class="row mt-3">
    <div class="col-md-6">
      <h3>Keranjang</h3>
    </div>
  </div>
  <?php if (empty($cart)) { ?>
    <div class="alert alert-danger" role="alert">
      Keranjang Kosong.
    </div>
  <?php } else { ?>
    <table class="table table-striped">
      <thead>
        <tr>
          <td>Preview</td>
          <td>Nama</td>
          <td>Jumlah</td>
          <td>Menu</td>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($cart as $cr) : ?>
          <tr>
            <td><img src="<?= $cr['gambar']; ?>" width="100px"></td>
            <td><?= $cr['nama']; ?></td>
            <td><?= $cr['count']; ?></td>
            <td><a href="<?= base_url(); ?>cart/hapus/<?= $cr['id_produk']; ?>" class="btn btn-danger">hapus</a></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php } ?>
  <form action="" method="post">
    <div class="form-group">
      <label for="nama">Name</label>
      <input type="text" class="form-control" id="nama" name="nama" />
      <small class="form-text text-danger"><?= form_error('name'); ?></small>
    </div>
    <?php
    $total;
    if (!$cart) {
      $total = '';
    } else {
      $total = 0;
      for ($i = 0; $i < count($cart); $i++) {
        $total += ($cart[$i]['count'] * $cart[$i]['harga']);
      }
    }
    ?>
    <div class="form-group">
      <label for="total">Total</label>
      <input type="text" class="form-control text-success" id="total" name="total" value="<?= $total ?>" readonly />
      <small class="form-text text-danger"><?= form_error('total'); ?></small>
    </div>
    <div class="form-group">
      <label for="metode">Pilih Metode :</label>
      <select name="metode" id="metode">
        <?php foreach ($transaksi as $trs) : ?>
          <option value="<?= $trs['id']; ?>"><?= $trs['nama_metode']; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <button type="submit" name="tambah" class="btn btn-success mt-4 px-4 btn-block">
      Checkout Now
    </button>
    <br>
</div>
</form>
</div>