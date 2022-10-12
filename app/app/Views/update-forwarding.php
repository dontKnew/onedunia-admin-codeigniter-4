<?= $this->extend('include/app') ?>
<?= $this->section('contents') ?>
<!-- START EDIT FORWARDING  NUMBERS FORM -->
<div class="container-fluid pt-0 px-0">
    <div class="row rounded  mx-0 d-flex justify-content-center py-4" style=" background-color:#f3f0f0 !important;">
        <div class="col-md-8">
            <h4 class="mb-4 text-center text-black"> Update Forwarding Numbers </h4>
            <?php if (session()->getFlashdata('msg')) : ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
            <?php endif; ?>
            <form action="<?= base_url()."/update-forwarding" ?>" method="post">
                <input type="hidden" name="id" value="<?= $data["id"] ?>">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="" class="form-label text-blue">AWB No.</label>
                            <input type="text" value="<?= $data['awb_no'] ?>"  class="form-control form-white " readonly required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="" class="form-label text-blue">Forwarding No.</label>
                            <input type="number" value="<?= $data['forwarding_no'] ?>" name="forwarding_no" class="form-control form-white " required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="" class="form-label text-blue">Network Source</label>
                            <select name="network_source" class="form-control form-white" required>
                                <option  value="" <?php if($data['network_source']==''){echo "selected";} ?>> Select Network</option>
                                <option  value="dhl" <?php if($data['network_source']=="dhl"){echo "selected";} ?>>DHL</option>
                                <option  value="fedex"  <?php if($data['network_source']=="fedex"){echo "selected";} ?>>FEDEX</option>
                                <option  value="aramex" <?php if($data['network_source']=="aramex"){echo "selected";} ?>>ARAMEX</option>
                                <option  value="ups" <?php if($data['network_source']=="ups"){echo "selected";} ?>>UPS</option>
                                <option  value="tnt" <?php if($data['network_source']=="tnt"){echo "selected";} ?>>TNT</option>
                                <option  value="yodel" <?php if($data['network_source']=="yodel"){echo "selected";} ?>>YODEL</option>
                                <option  value="dpd-uk" <?php if($data['network_source']=="dpd-uk"){echo "selected";} ?>>DPD ( UK )</option>
                                <option  value="dpd-germany" <?php if($data['network_source']=="dpd-germany"){echo "selected";} ?>>DPD ( Germany )</option>
                                <option  value="gls" <?php if($data['network_source']=="gls"){echo "selected";} ?>>GLS </option>
                                <option  value="city-link" <?php if($data['network_source']=="city-link"){echo "selected";} ?>>CITY-LINK</option>
                                <option  value="dpex" <?php if($data['network_source']=="dpex"){echo "selected";} ?>>DPEX</option>
                                <option  value="skynet" <?php if($data['network_source']=="skynet"){echo "selected";} ?>>SKYNET</option>
                                <option  value="self" <?php if($data['network_source']=="self"){echo "selected";} ?>>SELF</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="" class="form-label text-blue"> Publicity</label>
                            <select name="activation" class="form-control form-white" required>
                                <option value="" <?php if(!$data['network_source']){echo "selected";} ?>>Select Privacy</option>
                                <option value="1" <?php if($data['activation']==1){echo "selected";} ?>>Public</option>
                                <option value="0" <?php if($data['activation']==0){echo "selected";} ?>>Private</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="" class="form-label text-blue">Created at</label>
                                <?php $udate1 = strtotime($data['created_at']);  ?>
                                <input type="text"  value="<?php echo date("d-m-Y",$udate1);  ?>" class="form-control form-white " readonly required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="" class="form-label text-blue">Last Update</label>
                            <div class="input-group">
                                <?php $udate = strtotime($data['updated_at']);  ?>
                                <input type="text"  value="<?php echo date("d-m-Y",$udate);  ?>" class="form-control form-white " readonly required>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-green">Update</button>
                        <a href="<?= base_url().'/forwarding-shipment' ?>" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END EDIT FORWARDING  NUMBERS FORM -->
<?= $this->endSection(); ?>
