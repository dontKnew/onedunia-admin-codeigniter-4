<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ForwardModel;

class ForwardController extends BaseController
{
    public function index()
    {
        $data = new ForwardModel();
        $data = $data->findAll();
        return view("forwarding-shipment", array("data"=>$data, "forwarding"=>"active"));
    }

    public function editForwarding($id = ''){
        if($id!==''){
            $data = new ForwardModel();
            $data = $data->find($id);
            return view("update-forwarding", array("data"=>$data, "forwarding"=>"active"));
        }else {
            $session->setFlashdata('msg', "Something wrong, please try again later");
            return redirect()->to('forwarding-shipment');
        }

    }

    public function updateForwarding(){
        $session = session();
        if($this->request->getMethod()=="post"){
            $model = new ForwardModel();
            $data = $model->update($_POST['id'], $_POST);
            if($data){
                $session->setFlashdata('msg', 'Forwarding no. data updated successfully');
            }else {
                $session->setFlashdata('msg', 'Data could not update');
            }
            return redirect()->to('forwarding-shipment');
        }else {
            $session->setFlashdata('msg', 'callback method is wrong');
            return redirect()->to('forwarding-shipment');
        }
    }


    public function deleteForwarding($id)
    {
        $model = new ForwardModel();
        $data = $model->delete($id);
        $session = session();
        if($data) {
            $session->setFlashdata('msg', "Forwarding number deleted Successfully");
        }else {
            $session->setFlashdata('msg', "Fowarding number could not delete");
        }
        return redirect()->to("forwarding-shipment");
    }
}
