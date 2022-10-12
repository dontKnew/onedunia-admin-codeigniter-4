<?= $this->extend('include/app') ?>
<?= $this->section('contents') ?>
<?php
//print_r($data['id']);
//exit;
?>
<!-- START EDIT SHIPMENT FORM -->
<div class="container-fluid pt-0 px-0" >
    <div class="row  rounded  mx-0 d-flex justify-content-center py-4" style=" background-color:#f3f0f0 !important; height:80vh;">
        <div class="col-md-6">
            <h4 class="mb-4 text-center text-black"> Update Shipment Information </h4>
             <form action="<?= base_url("update-status") ?>" method="post">
                 <div class="row">
                 <div class="col-md-6">
                <div class="mb-3">
                    <label for="" class="form-label text-green">AWB No.</label>
                    <input type="text"  value="<?= $data['awb_no'] ?>" name="awb_no" class="form-control form-white "  readonly required>
                </div>
                </div>
                  <div class="col-md-6">
                <div class="mb-3">
                    <label for="" class="form-label text-green">Package Status</label>
                    <input type="text"  value="<?= $data['status'] ?>" name="status" class="form-control form-white "  required>
                </div>
                </div>
                </div>
                 <div class="row">
                 <div class="col-md-6">
                <div class="mb-3">
                    <label for="" class="form-label text-green">Location</label>
                    <input type="text"  value="<?= $data['location'] ?>" name="location" class="form-control form-white "  required>
                </div>
                </div>
                 <div class="col-md-6">
                <div class="mb-3">
                    <label for="" class="form-label text-green">Date</label>
                    <div class="input-group date" id="location_date">
                        <input type="text"  value="<?= $data['date'] ?>" name="date" class="form-control form-white " placeholder="MM/DD/YYYY"  required>
                    </div>
                </div>
                </div>
                </div>
                 <div class="row">
                 <div class="col-md-6">
                <div class="mb-3">
                    <label for="" class="form-label text-green">Time</label>
                    <div class="input-group time" id="location_time">
                        <input type="text"   value="<?= $data['time'] ?>" name="time" class="form-control form-white " required>
                    </div>
                </div>
                </div>
                     <div class="col-md-6">
                <div class="mb-3">
                    <label for="" class="form-label text-green">Last Update</label>
                    <?php $udate = strtotime($data['updated_at']);  ?>
                    <input type="text"  value="<?php echo date("d-m-Y",$udate)?>"  class="form-control form-white " readonly required>
                </div>
                </div>
                </div>
                <!--<div class="row"> -->
                <!--    <div class="col-md-6">-->
                <!--        <div class="mb-3">-->
                <!--            <label for="" class="form-label text-blue">Forwarding No.</label>-->
                <!--            <input type="number" name="forwarding_no" value="<?php //$data['forwarding_no'] ?>" class="form-control form-white " required>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>        -->
                 <div class="row">
                 <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-green">Submit</button>
                </div>
                </div>
            </form>
        
        </div>
    </div>
</div>
<!-- END ADD SHIPMENT -->
<?= $this->endSection(); ?>
