<?= $this->extend('include/app') ?>

<?= $this->section('contents') ?>

<!-- 404 Start -->
<div class="container-fluid pt-0 px-0">
    <div class="row  rounded align-items-center justify-content-center mx-0" style=" background-color:#f3f0f0 !important;">
        <div class=" vh-100 col-md-6 text-center p-4">
            <i class="bi bi-exclamation-triangle display-1 text-blue"></i>
            <h1 class="display-1 fw-bold text-black">404</h1>
            <h1 class="mb-4 text-blue">Page Not Found</h1>
            <p class="mb-4 fw-bold text-black">We’re sorry, the page you have looked for does not exist in our website!
                Maybe go to our home page</p>
            <a  href="<?= base_url("dashboard") ?>" class="btn btn-green rounded-pill py-3 px-5" href="">Go Back To Home</a>
        </div>
    </div>
</div>
<!-- 404 End -->
<?= $this->endSection() ?>
