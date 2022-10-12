<?= $this->extend('include/app') ?>

<?= $this->section('contents') ?>
<div class="container-fluid pt-4 px-4">
    <div class="vh-100 bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-center mb-4">
            <h4 class="mb-0">Manage Shipment Status</h4>
        </div>
        <!--   START SHIPMENT INFORMATION TABLE -->
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                <tr class="text-white">
                    <th scope="col">
                        AWB No.
                    </th>
                    <th scope="col">Status</th>
                    <th scope="col">Location</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><a href="#">1234599</a></td>
                    <td>Out for Delivery</td>
                    <td>Delhi</td>
                    <td>25/10/2022</td>
                    <td>10:00pm</td>
                    <td>
                        <a href=""  value="Update" class="btn btn-sm btn-success"> Update </a>
                        <a href=""  value="Update" class="btn btn-sm btn-danger"> Delete </a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <!--   END SHIPMENT INFORMATION TABLE -->
    </div>
</div>
<!--   END SHIPMENT INFORMATION TABLE -->
<?= $this->endSection() ?>
