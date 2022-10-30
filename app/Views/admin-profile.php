<?= $this->extend('include/app') ?>

<?= $this->section('contents') ?>
    <!-- Sign In Start -->
    <div class="container-fluid">
        <div class="row h-100 justify-content-center" style="min-height: 100vh; background-color:#f3f0f0 !important;">
            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-6">
                <div class="rounded px-4 py-2 p-sm-5 my-4" style="background-color:#1d70b7 !important; ">
                    <div class="text-center my-2">
                        <h3 class="text-white">
                              <i class="fas fa-user 2x"></i> Admin Profile
                        </h3>
                    </div>
                    <form action="<?= base_url("admin-profile")?>" class="my-4">
                        <div class="row">
                            <div class="col-md-6">
                                 <div class="mb-3">
                            <div>
                                <label for="" class="form-label text-white">Admin Id </label>
                                <input type="text" class="form-control" value="0000<?= $data['id'] ?>" readonly>
                            </div>
                        </div>
                            </div>
                           <div class="col-md-6">
                        <div class="mb-3">
                            <div>
                                <label for="" class="form-label text-white">Your Name</label>
                                <input type="text" class="form-control" value="<?= $data['name'] ?>" readonly>
                            </div>
                        </div>
                        </div>
                        </div>
                          <div class="row">
                            <div class="col-md-6">
                        <div class="mb-3">
                            <div>
                                <label for="" class="form-label text-white">Your Email address</label>
                                <input type="email" class="form-control" value="<?= $data['email'] ?>" readonly>
                            </div>
                        </div>
                        </div>
                            <div class="col-md-6">
                        <div class="mb-3">
                            <div>
                                <label for="" class="form-label text-white">Registration Date</label>
                                <?php $rdate = strtotime($data['created_at']);  ?>
                                <input type="text" class="form-control" value="<?php echo date("d-m-Y",$rdate); ?>" readonly>
                            </div>
                        </div>
                        </div>
                        </div>
                          <div class="row">
                            <div class="col-md-12">
                        <div class="mb-3">
                            <div>
                                <?php $udate = strtotime($data['updated_at']);  ?>
                                <label for="" class="form-label text-white">Last Update Profile</label>
                                <input type="text" class="form-control" value="<?php echo date("d-m-Y",$udate);  ?>" readonly>
                            </div>
                            </div>
                            </div>
                        </div>
                         <div class="row">
                            <div class="col-md-12 text-center">
                               
                       <a  href="https://onedunia.com/admin/change-password" class="btn btn-green">Change Password
                          </a>
                        </div>
                     </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Sign In End -->
<?= $this->endSection() ?>
