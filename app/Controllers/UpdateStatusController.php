<?php

namespace App\Controllers;

use App\Models\ShipmentModel;
use App\Models\UpdateStatusModel;
use CodeIgniter\Session\Session;

class UpdateStatusController extends BaseController
{
    public function index()
    {
        $model = new updateStatusModel();
        $data = $model->orderBy('id','DESC')->findAll();
        return view('update-status', ["data"=>$data, "update"=>"active"]);
    }

    public function editStatus($id)
    {
        $model = new UpdateStatusModel();
        $data = $model->find($id);
        if($data!==null) {
            return view('edit-status', ['data'=>$data, "update"=>"active"]);
        }else {
            return redirect()->to("update-status");
        }
    }


    public function updateStatus(){
        $session = session();
        if($this->request->getMethod()=="post"){
            $model = new UpdateStatusModel();
            try {

                 $data = $model->save($_POST);
                if($data){
                    $session->setFlashdata('msg', 'Shipment data updated successfully');
                }else {
                    $session->setFlashdata('msg', 'Data could not update');
                }
                return redirect()->to('update-status');
            }catch (\Exception $e){
                $session->setFlashdata('msg', 'Error :'.$e->getMessage());
                return redirect()->to('update-status');
            }
        }
    }
    
       public function deleteStatus($id)
    {
        $model = new UpdateStatusModel();
        $data = $model->delete($id);
        $session = session();
        if($data) {
            $session->setFlashdata('msg', "Status Deleted Successfully");
        }else {
            $session->setFlashdata('msg', "Status Could not delete");
        }
        return redirect()->to("update-status");
    }



}
