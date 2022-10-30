<?= $this->extend('include/app') ?>
<?= $this->section('contents') ?>
<!-- START ADD SHIPMENT FORM -->
<div class="container-fluid pt-0 px-0">
    <div class="row rounded  mx-0 d-flex justify-content-center py-4" style=" background-color:#f3f0f0 !important;">
        <div class="col-md-8">
            <h4 class="mb-4 text-center text-black"> Edit Shipment Information  </h4>
            <?php if (session()->getFlashdata('msg')) : ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
            <?php endif; ?>
            <form action="<?= base_url("update-shipment") ?>" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="" class="form-label text-blue">Shipment Id</label>
                            <input type="text" value="<?= $data['id'] ?>" name="id" class="form-control form-white "
                                   readonly required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="" class="form-label text-blue">AWB No.</label>
                            <input type="text" value="<?= $data['awb_no'] ?>" name="awb_no"
                                   class="form-control form-white " readonly required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="" class="form-label text-blue">Consignee Name</label>
                            <input type="text" value="<?= $data['consignee_name'] ?>" name="consignee_name"
                                   class="form-control form-white " required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="" class="form-label text-blue">Destination</label>
                            <input type="text" value="<?= $data['destination'] ?>" name="destination"
                                   class="form-control form-white " required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="" class="form-label text-blue">Delivery Date</label>
                            <div class="input-group date" id="date">
                                <input type="text" name="delivery_date" value="<?= $data['delivery_date'] ?>" class="form-control form-white "
                                       placeholder="MM/DD/YYYY" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="" class="form-label text-blue">Delivery Time</label>
                            <div class="input-group time" id="time">
                                <input type="text" name="delivery_time" value="<?= $data['delivery_time'] ?>"  placeholder="hh:mm PM/AM" class="form-control form-white " required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="" class="form-label text-blue">Pieces of NO.</label>
                            <input type="number" value="<?= $data['pieces_no'] ?>" name="pieces_no"
                                   class="form-control form-white " required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="" class="form-label text-blue"> Location </label>
                            <input type="text" name="booking_location" value="<?= $data['booking_location'] ?>"
                                   class="form-control form-white " required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-green">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END ADD SHIPMENT -->
<?= $this->endSection(); ?>
