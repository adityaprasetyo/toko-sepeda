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

    <div class="container">
        <div class="row mt-3">
            <h3>Daftar Produk</h3>
        </div>
        <div class="row mt-3">
            <?php foreach ($product as $prd) : ?>
                <div class="col-md-4">
                    <a href="<?= base_url(); ?>home/detail/<?= $prd['id']; ?>">
                        <div class="card mb-3">
                            <img src="<?= $prd['gambar']; ?>" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?= $prd['nama']; ?>
                                </h5>
                                <p>kategori : <?= $prd['name']; ?></p>
                                <h5 class="card-title">Harga : 
                                    Rp.<?= $prd['harga']; ?>
                                </h5>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</div>