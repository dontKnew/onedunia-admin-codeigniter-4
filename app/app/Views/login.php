<?= $this->extend('include/app2') ?>

<?= $this->section('contents') ?>
    <!-- Sign In Start -->
    <div class="container-fluid">
        <div class="row h-100 justify-content-center" style="min-height: 100vh;">
            <a href="http://onedunia.com/" class=" pt-3" style="box-shadow:1px 0px 9px 0px #dddada;">
                <img src="https://onedunia.com/img/master/logo.png" alt="onedunialogo2" width="150" height="45">
            </a>
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="bg-blue rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="text-center my-4">
                        <h3><i class="fa fa-user-secret" aria-hidden="true"></i>
                             Admin Area <i class="fa fa-user-secret" aria-hidden="true"></i>
                        </h3>
                    </div>
                    <?php if (session()->getFlashdata('msg')) : ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                    <?php endif; ?>
                    <form action="<?= base_url("login")?>" class="my-4" method="post">
                        <div class="form-floating mb-3">
                            <input type="email"  name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <button type="submit" class="btn btn-green py-3 w-100 mb-4">Sign In</button>
                        <p class="text-center mb-0">having trouble to login ??
                            <a href="https://api.whatsapp.com/send?phone=919315297757&text=%F0%9F%91%8D%F0%9F%91%8D%F0%9F%91%8D" class="" style="color:#93c83c;"> contact us </a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Sign In End -->
<?= $this->endSection() ?>
