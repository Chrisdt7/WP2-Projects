<?= $this->extend('content/index-container') ?>
<?= $this->section('content-index-1') ?>

<div class="slideshow-container w-50">
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?= base_url('assets/') ?>img/slide1.png" class="d-block w-100 cust-img" alt="Slide 1">
            </div>
            <div class="carousel-item">
                <img src="<?= base_url('assets/') ?>img/slide2.png" class="d-block w-100 cust-img" alt="Slide 2">
            </div>
            <div class="carousel-item">
                <img src="<?= base_url('assets/') ?>img/slide3.png" class="d-block w-100 cust-img" alt="Slide 2">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<?= $this->endSection() ?>