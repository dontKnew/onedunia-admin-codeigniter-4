
<?= $this->extend('include/app') ?>

<?= $this->section('contents') ?>
<?php
//echo "<pre>";
//print_r($data);
//echo "</pre>";
//exit;
?>

    <!--   START SHIPMENT INFORMATION TABLE -->
    <div class="container-fluid pt-0 px-0">
        <div class="vh-100 bg-grey-l text-center rounded p-4" style=" background-color:#f3f0f0 !important;">
            <div class="d-flex align-items-center justify-content-center mb-4">
                <h4 class="mb-0 text-black">Shipments Table</h4>
            </div>
            <?php if (session()->getFlashdata('msg')) : ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
            <?php endif; ?>
            <div class="table-responsive" id="shipmentSearchData">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                    <tr class="text-blue">
                        <th scope="col" class="btn-blue">AWB No.</th>
                        <th scope="col" class="btn-blue">Consignee Name</th>
                        <th scope="col" class="btn-blue">Destination</th>
                        <th scope="col" class="btn-blue">Delivery Date</th>
                        <th scope="col" class="btn-blue">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($data as $value){ ?>
                        <tr class="text-dark bg-white">
                            <td><a href="https://onedunia.com/track.html?awb=<?= $value['awb_no']; ?>" target="_blank"> <strong><u> <?= $value['awb_no']; ?></u></strong></a></td>
                            <td><?= ucwords($value['consignee_name']); ?></td>
                            <td><?= ucwords($value['destination']); ?></td>
                            <td><?= $value['delivery_date']; ?></td>
                            <td>
                                <input type="button" value="Details" data-shipment-id = "<?= $value['id']; ?>" class="btn btn-sm btn-green shipmentDetails" data-bs-toggle="modal" data-bs-target="#staticBackdrop"/>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--   END SHIPMENT INFORMATION TABLE -->

    <!--   MODLE-SHIPMENT INFORMATION DETAILS -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="staticBackdropLabel">Shipment Details </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body singleShipmentDisplay singleShipmentDisplay1">
                    <!--                        table start -->

                    <!--                        end table -->
                    <div class="d-flex my-2 justify-content-center">
                        <button type="button" class="btn-sm btn-green mx-1" data-bs-dismiss="modal">Edit</button>
                        <button type="button" class="btn-sm btn-danger mx-1">Delete</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--   END MODLE-SHIPMENT INFORMATION DETAILS -->

<?= $this->endSection() ?>
