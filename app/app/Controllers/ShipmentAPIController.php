<?php

namespace App\Controllers;

use App\Models\ForwardModel;
use App\Models\ShipmentModel;
use App\Models\UpdateStatusModel;
use mysql_xdevapi\Exception;

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class ShipmentAPIController extends BaseController
{
    public function index($id)
    {
        $model = new ShipmentModel();
        $status = new UpdateStatusModel();
        try {
            $data = $model->orderBy('id', 'DESC')->where("awb_no", $id)->find();
            $statusData = $status->orderBy('id', 'DESC')->where("awb_no", $id)->find();
            $db = db_connect();

            if ($data && $statusData) {
                $forwarding = $db->table('forwarding_numbers')->where(array("awb_no" => $data[0]['awb_no'], "activation" => 1))->get()->getRowArray();
                $updateStatus = $db->table('update_status')->where("awb_no", $data[0]['awb_no'])->get()->getRowArray();
                echo '
            <div class="container">
                <h3>Your Shipment Detail</h3>
                <div class="row track-m-row">
                  <div class="col-md-6">
                    <div class="row ">
                   <div class="col-6" style="background-color:#1d70b7">
                       <p style="color:white;">AWB NO.</p>
                   </div>
    
                   <div class="col-6">
                       <p>' . $data[0]['awb_no'] . '</p>
                   </div>
               </div>
                <div class="row">
                   <div class="col-6" style="background-color:#1d70b7">
                       <p style="color:white;">BOOKING DATE</p>
                   </div>
    
                   <div class="col-6">
                       <p>' . $data[0]['booking_date'] . '</p>
                   </div>
               </div>
                <div class="row">
                  <div class="col-6" style="background-color:#1d70b7">
                       <p style="color:white;">CONSIGNEE NAME</p>
                   </div>
    
                   <div class="col-6">
                       <p>' . ucwords($data[0]['consignee_name']) . '</p>
                   </div>
               </div>
                <div class="row">
                    <div class="col-6" style="background-color:#1d70b7">
                       <p style="color:white;">DESTINATION</p>
                   </div>
    
                   <div class="col-6">
                       <p>' . ucwords($data[0]['destination']) . '</p>
                   </div>
               </div>
                    </div>
    
                    <div class="col-md-6">
                         <div class="row">
                   <div class="col-6" style="background-color:#1d70b7">
                       <p style="color:white;">STATUS</p>
                   </div>
    
                   <div class="col-6">
                       <p>' . ucwords($updateStatus['status']) . '</p>
                   </div>
               </div>
                 <div class="row">
                   <div class="col-6" style="background-color:#1d70b7">
                       <p style="color:white;">DELIVERY DATE AND TIME</p>
                   </div>
                   <div class="col-6">
                       <p>' . $data[0]['delivery_date'] . ' & ' . $data[0]['delivery_time'] . '</p>
                   </div>
               </div>
                  <div class="row">
                    <div class="col-6" style="background-color:#1d70b7">
                       <p style="color:white;">FORWARDING NO.</p>
                   </div>
                    <div class="col-6">
                       <p>';
                if (is_array($forwarding) && $forwarding !== null) {
                    if($forwarding['network_source']=='dhl'){
                        echo '<a class="text-primary" href="https://www.dhl.com/in-en/home/tracking.html?tracking-id='.$forwarding['forwarding_no'].'&submit=1" target="blank"><u><strong>'.$forwarding['forwarding_no'].'</strong></u></a>';
                    }else {
                        echo '<a href="#">'.$forwarding['forwarding_no'].'</a>';
                    }

                }
                echo '</p>
                   </div>
                </div>
                 <div class="row">
                    <div class="col-6" style="background-color:#1d70b7">
                       <p style="color:white;">NO. OF PIECES</p>
                   </div>
                   <div class="col-6">
                       <p>' . $data[0]['pieces_no'] . '</p>
                   </div>
                 </div>

                    </div>
                </div>

                <div class="container mt-4">
                        <h3>Tracking History</h3>
                <table>
                   <tr>
                       <th>SHIPMENT STATUS</th>
                       <th>LOCATION</th>
                       <th>DATE/TIME</th>
                   </tr>';
                foreach ($statusData as $status) {
                    echo '<tr>
                        <td>' . ucwords($status['status']) . '</td>
                        <td>' . ucwords($status['location']) . '</td>
                       <td>' . $status['date'] . ' & ' . $status['time'] . '</td>
                   </tr>';
                }
                echo '
            </table>
        </div>';

            } else {
                echo "<div class='alert alert-danger text-center' role='alert'>AWB number is incorrect or something wrong</div>";
            }
        } catch (Exception $e) {
            // echo "Error". $e->getMessage();
            echo "<div class='alert alert-danger text-center' role='alert'>Error : " . $e->getMessage() . "</div>";
        }


    }

    public function singleShipment($id)
    {
        $model = new ShipmentModel();
        $data = $model->find($id);
        $forwarding = new ForwardModel();
        $forwarding = $forwarding->where("awb_no", $data['awb_no'])->find();
        $status = new UpdateStatusModel();
        $status = $status->where("awb_no", $data['awb_no'])->orderBy("id", "desc")->findAll();
        if ($data !== null) {
            echo '
                <div class="bg-blue rounded h-100 p-4">
                        <table class="table table-striped text-center">
                         <thead>
                            <tr><th></th><th></th></tr>
                            <tr class="text-white">
                                <th scope="col">AWB No.</th>
                                <th scope="col">' . $data['awb_no'] . '</th>
                            </tr>
                            <tr class="text-white">
                                <th scope="col">Consignee Name.</th>
                                <th scope="col">' . ucwords($data['consignee_name']) . '</th>
                            </tr>
                            <tr class="text-white">
                                <th scope="col">Destination</th>
                                <th scope="col">' . ucwords($data['destination']) . '</th>
                            </tr>
                            <tr class="text-white">
                                <th scope="col">Delivery Date</th>
                                <th scope="col">' . $data['delivery_date'] . '</th>
                            </tr>
                            <tr class="text-white">
                                <th scope="col">Delivery Time</th>
                                <th scope="col">' . $data['delivery_time'] . '</th>
                            </tr>
                            <tr class="text-white">
                                <th scope="col">Forwarding No.</th>
                                <th scope="col">' . $forwarding[0]['forwarding_no'] . '</th>
                            </tr>
                            <tr class="text-white">
                                <th scope="col">Last Status</th>
                                <th scope="col">' . ucwords($status[0]['status']) . '</th>
                            </tr>
                            <tr class="text-white">
                                <th scope="col">Pieces of No.</th>
                                <th scope="col">' . $data['pieces_no'] . '</th>
                            </tr>
                            <tr class="text-white">
                                <th scope="col">Booking Date</th>
                                <th scope="col">' . $data['booking_date'] . '</th>
                            </tr>
                            <tr></tr>
                            </thead>
                              <tbody>
                            </tbody>
                        </table>
                    </div>
                    <!--                        end table -->
                    <div class="d-flex my-2 justify-content-center">
                        <a href="' . base_url("edit-shipment/" . $data['id']) . '" class="btn-sm btn-danger mx-1">Edit</a>
                        <a href="' . base_url("delete-shipment/" . $data['id']) . '" class="btn-sm btn-secondary mx-1">Delete</a>
                    </div>';
        } else {
            echo "<div class='alert alert-danger text-center' role='alert'>Something wrong or please try again later</div>";
        }
    }

    public function searchData($value)
    {
        $model = new ShipmentModel();
        try {
            $data = $model->orLike('id', $value, "both");
            $data = $model->orLike('pieces_no', $value, "both");
            $data = $model->orlike('awb_no', $value, "both");
            $data = $model->orLike('delivery_date', $value, "both");
            $data = $model->orLike('delivery_time', $value, "both");
            $data = $model->orLike('booking_date', $value, "both");
            $data = $model->orLike('consignee_name', $value, "both");
            $data = $data->findAll();
            if ($data) {
                echo '
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                    <tr class="text-white">
                        <th scope="col">AWB No.</th>
                        <th scope="col">Consignee Name</th>
                        <th scope="col">Destination</th>
                        <th scope="col">Delivery Date</th>
                        <th scope="col">Delivery Time</th>
                        <th scope="col">Forwarding No.</th>
                        <th scope="col">Pieces of No.</th>
                        <th scope="col">Booking Date</th>
                    </tr>
                    </thead>
                    <tbody>
                ';
                foreach ($data as $value) {
                    $forward = new ForwardModel();
                    $status = new UpdateStatusModel();
                    $forward = $forward->where("awb_no", $value['awb_no'])->find();
                    $status = $status->where("awb_no", $value['awb_no'])->find();
                    echo '
                    <tr class="bg-primary text-white">
                            <td>' . $value['awb_no'] . ' </td>
                            <td>' . ucwords($value['consignee_name']) . '</td>
                            <td>' . ucwords($value['destination']) . '</td>
                            <td>' . $value['delivery_date'] . '</td>
                            <td>' . $value['delivery_time'] . '</td>
                            <td>' . $forward[0]['forwarding_no'] . '</td>
                            <td>' . ucwords($status[0]['status']) . '</td>
                            <td>' . $value['booking_date'] . '</td>
                        </tr>
                    ';
                }
                echo '
                    </tbody>
            </table>
                ';
            } else {
                echo "<div class='alert alert-danger text-center' role='alert'>Please try different search keyowrds</div>";
            }
        } catch (Exception $e) {
            // echo $e->getMessage();
            echo "<div class='alert alert-warning text-center' role='alert'>Error : " . $e->getMessage() . "</div>";
        }
    }

}
