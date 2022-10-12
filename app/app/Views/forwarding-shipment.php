
<?= $this->extend('include/app') ?>

<?= $this->section('contents') ?>

<!--   START  FORWARDING NUMBERS INFORMATION TABLE -->
    <div class="container-fluid pt-0 px-0">
        <div class="vh-100 bg-grey-l text-center rounded p-4" style=" background-color:#f3f0f0 !important;">
            <div class="d-flex align-items-center justify-content-center mb-4">
                <h4 class="mb-0 text-black">Manage Forwarding Numbers </h4>
            </div>
            <?php if (session()->getFlashdata('msg')) : ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
            <?php endif; ?>
            <div class="table-responsive" id="shipmentSearchData">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                    <tr class="text-blue">
                        <th scope="col" class="btn-blue">AWB No. </th>
                        <th scope="col" class="btn-blue">Forwarding No.</th>
                        <th scope="col" class="btn-blue">Publicity</th>
                        <th scope="col" class="btn-blue">Network</th>
                        <th scope="col" class="btn-blue">Created at</th>
                        <th scope="col" class="btn-blue">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($data as $f){ ?>
                        <tr class="text-dark bg-white">
                            <td><a href="https://onedunia.com/track.html?awb=<?= $f['awb_no']; ?>" target="_blank"> <strong><u> <?= $f['awb_no']; ?></u></strong></a></td>
                            <td><?php
                                if($f['network_source']=='dhl'){
                                    echo '<a class="text-primary" href="https://www.dhl.com/in-en/home/tracking.html?tracking-id='.$f['forwarding_no'].'&submit=1" target="blank"><u><strong>'.$f['forwarding_no'].'</strong></u></a>';
                                }else {
                                    echo '<a href="#" class="text-dark">'.$f['forwarding_no'].'</a>';
                                }
                                ?>
                            </td>
                            <td><?php if($f['activation']==1){ echo "Public"; }else { echo "Private";} ?></td>
                            <td><?= strtoupper($f['network_source']) ?></td>
                            <?php $udate = strtotime($f['created_at']);  ?>
                            <td><?php echo date("d-m-Y",$udate);  ?></td>
                            <td>
                                <a href="<?= base_url()."/update-forwarding/".$f['id'] ?>"  class="btn btn-sm btn-success"> Update </a>
                                <a href="<?= base_url()."/forwarding-shipment/delete/".$f['id'] ?>"  class="btn btn-sm btn-danger"> Delete </a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--   END  FORWARDING NUMBERS INFORMATION TABLE -->
<?= $this->endSection() ?>
