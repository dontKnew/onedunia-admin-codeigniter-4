<?php

namespace App\Controllers;

use App\Models\ForwardModel;
use App\Models\ShipmentModel;
use App\Models\UpdateStatusModel;

use CodeIgniter\Session\Session;

class ShipmentController extends BaseController
{
    public function index()
    {

        $model = new ShipmentModel;
        $data = $model->orderBy('id','DESC')->findAll();


        return view('welcome_message', ["data"=>$data,"dashboard"=>"active"]);
    }
    public function addShipment()
    {
        if($this->request->getMethod()=="post"){
            $session =  session();
            $model = new ShipmentModel;
            $status = new UpdateStatusModel;
            $forward = new ForwardModel();

            $awb_no =  mt_rand(100000,999999);
            $_POST['awb_no'] = $awb_no;
            $data = $model->where('awb_no', $awb_no)->first();
            if(!$data){
                try {
                    // add forwarding data
                    $forwardingData = array(
                            "awb_no"=>$_POST['awb_no'],
                            "forwarding_no"=>$_POST["forwarding_no"],
                            "activation"=>1
                            );
                    $forwarding = $forward->save($forwardingData);

                    // add - update status data
                    $statusData = array(
                            "awb_no"=>$_POST['awb_no'],
                            "location"=>$_POST["booking_location"],
                            "date"=>$_POST["booking_date"],
                            "status"=>"Booked"
                            );
                    $status =  $status->save($statusData);

                    unset($_POST['forwarding_no']);
                    // add shipment data
                     $data = $model->save($_POST);

                    if($data && $status && $forwarding){
                        $session->setFlashdata('msg', 'Shipment added successfully');
                    }else {
                        $session->setFlashdata('msg', 'Shipment could not add');
                    }
                    return redirect()->to('dashboard');
                }catch(\Exception $e){
                    $session->setFlashdata('msg', 'Error'.$e->getMessage());
                    return redirect()->to('add-shipment');
                }
            }else {
                $session->setFlashdata('msg', "Please try again");
                return redirect()->to('add-shipment');
            }
        }else {
            return view('add-shipment', ["addshipment"=>"active"]);
        }
    }

    public function editShipment($id)
    {
        $model = new ShipmentModel();
        $data = $model->find($id);
        if($data!==null) {
            return view('edit-shipment', ['data'=>$data]);
        }else {
            return redirect()->to("dashboard");
        }
    }

    public function deleteShipment($id)
    {
        $model = new ShipmentModel();
        $data = $model->delete($id);
        $session = session();
        if($data) {
            $session->setFlashdata('msg', "Shipment Deleted Successfully");
        }else {
            $session->setFlashdata('msg', "Shipment Could not delete");
        }
        return redirect()->to("dashboard");
    }


    public function updateShipment(){
        $session = session();
        if($this->request->getMethod()=="post"){
            $model = new ShipmentModel();
            $data = $model->update($_POST['id'], $_POST);
            if($data){
                $session->setFlashdata('msg', 'Shipment data updated successfully');
            }else {
                $session->setFlashdata('msg', 'Data could not update');
            }
            return redirect()->to('dashboard');
        }else {
            $session->setFlashdata('msg', 'Something wrong');
            return redirect()->to('dashboard');
        }
    }


}
