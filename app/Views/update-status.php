
<?= $this->extend('include/app') ?>

<?= $this->section('contents') ?>
<?php
//echo "<pre>";
//print_r($data); echo "</pre>"; exit; ?>
<!--   START STATUS SHIPMENT INFORMATION TABLE -->

    <div class="container-fluid pt-0 px-0">
        <div class="vh-100  text-center rounded p-4" style=" background-color:#f3f0f0 !important;">
            <div class="d-flex align-items-center justify-content-center mb-4">
                <h4 class="mb-0 text-black">All Shipments Status</h4>
            </div>
            <?php if (session()->getFlashdata('msg')) : ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
            <?php endif; ?>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                    <tr class="text-white">
                        <th scope="col" class="btn-blue">AWB No.</th>
                        <th scope="col" class="btn-blue">Status</th>
                        <th scope="col" class="btn-blue">Location</th>
                        <th scope="col" class="btn-blue">Date</th>
                        <th scope="col" class="btn-blue">Time</th>
                        <th scope="col" class="btn-blue">Last Update</th>
                        <th scope="col" class="btn-blue" style="width:200px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($data as $value){ ?>
                        <tr>
                            <td><a href="https://onedunia.com/track.html?awb=<?= $value['awb_no']; ?>" target="_blank"> <strong><u> <?= $value['awb_no']; ?></u></strong></a></td>
                            <td><?= ucwords($value['status']); ?></td>
                            <td><?= ucwords($value['location']); ?></td>
                            <td><?= $value['date']; ?></td>
                            <td><?= $value['time']; ?></td>
                            <?php $udate = strtotime($value['updated_at']);  ?>
                            <td><?php echo date("d-m-Y",$udate);  ?></td>
                            <td>
                                <a href="<?= base_url("update-status/".$value['id'])?>"  class="btn btn-md-square btn-green">Update</a>
                                <a href="<?= base_url("delete-status/".$value['id'])?>"   class="btn btn-md-square btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--   END SHIPMENT STATUS INFORMATION TABLE -->


<?= $this->endSection() ?>
