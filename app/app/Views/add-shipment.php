<?= $this->extend('include/app') ?>
<?= $this->section('contents') ?>
<!-- START ADD SHIPMENT FORM -->
<div class="container-fluid pt-0 px-0">
    <div class="row  rounded  mx-0 d-flex justify-content-center py-4" style=" background-color:#f3f0f0 !important;">
        <div class="col-md-8">
            <h4 class="mb-4 text-center text-black"> Add Shipments </h4>
            <?php if (session()->getFlashdata('msg')) : ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
            <?php endif; ?>
            <form action="<?= base_url("add-shipment") ?>" method="post">


                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="" class="form-label text-blue">Consignee Name</label>
                            <input type="text" name="consignee_name" class="form-control form-white " required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="" class="form-label text-blue">Destination</label>
                            <input type="text" name="destination" class="form-control form-white " required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="" class="form-label text-blue">Delivery Date</label>
                            <div class="input-group date" id="date">
                                <input type="text" name="delivery_date" class="form-control form-white "
                                       placeholder="MM/DD/YYYY" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="" class="form-label text-blue">Delivery Time</label>
                            <div class="input-group time" id="time">
                                <input type="text" name="delivery_time" placeholder="hh:mm PM/AM"
                                       class="form-control form-white " required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="" class="form-label text-blue">Pieces of NO.</label>
                            <input type="number" name="pieces_no" class="form-control form-white  " required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="" class="form-label text-blue">Booking Location </label>
                            <input type="text" name="booking_location" class="form-control form-white  " required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="" class="form-label text-blue">Booking Date</label>
                            <div class="input-group date" id="booking_date">
                                <input type="text" name="booking_date" class="form-control form-white  "
                                       placeholder="MM/DD/YYYY" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="" class="form-label text-blue">Forwarding No.</label>

                            <input type="number" name="forwarding_no" class="form-control form-white">

                        </div>
                    </div>
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
