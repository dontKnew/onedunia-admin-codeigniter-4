<?= $this->extend('include/app') ?>

<?= $this->section('contents') ?>
    <!-- Sign In Start -->
    <div class="container-fluid">
        <div class="row h-100 justify-content-center" style="min-height: 100vh; background-color:#f3f0f0 !important;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-6 col-xl-6">
                <div class=" rounded p-4 p-sm-5 my-4" style="background-color:#1d70b7 !important; ">
                    <div class="text-center my-4">
                        <h3>
                              <i class="fas fa-user-shield"></i> <br>Change Your Password
                        </h3>
                    </div>
                    <?php if (session()->getFlashdata('msg')) : ?>
                        <div class="alert alert-warning" role="alert"><?= session()->getFlashdata('msg') ?></div>
                    <?php endif; ?>
                    <form action="<?= base_url("change-password")?>" class="my-4" method="post">
                        <div class="mb-3">
                            <div>
                                <label for="" class="form-label text-white">Email address</label>
                                <input type="email" class="form-control form-white" name="email"  value="<?= session('email') ?>" readonly required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div>
                                <label for="" class="form-label text-white">New Password</label>
                                <input type="password" class="form-control form-white" name="password" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div>
                                <label for="" class="form-label text-white">Confirm Password</label>
                                <input type="password" class="form-control form-white" name="cpassword" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-green py-3 w-100 mb-4">Submit</button>
                        <p class="text-center mb-0 text-white">having trouble to change password ??
                            <a href="https://api.whatsapp.com/send?phone=919315297757&text=%F0%9F%91%8D%F0%9F%91%8D%F0%9F%91%8D" class="text-primary"> contact us </a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Sign In End -->
<?= $this->endSection() ?>
