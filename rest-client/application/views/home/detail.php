<div class="container">
    <br>
    <div class="card">
        <div class="card-header">
            Detail Produk
        </div>
        <div class="card-body">
            <div class="row">
                <img src="<?= $product['gambar']; ?>" width="500px">
                    <div class="col-md-6 ml-auto">
                        <h5 class="card-title"><?= $product['nama']; ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted">Harga : <?= $product['harga']; ?></h6>
                        <p class="card-text">Kategori : <?= $product['name']; ?></p>
                        <a href="<?= base_url(); ?>cart/tambah/<?= $product['id']; ?>" class="btn btn-primary">Tambah Ke Keranjang</a>
                        <a href="<?= base_url(); ?>" class="btn">Kembali</a>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>