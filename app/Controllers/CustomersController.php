<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CustomersModel;
use CodeIgniter\HTTP\ResponseInterface;

class CustomersController extends BaseController
{
    private CustomersModel $model;

    public function __construct()
    {
        $this->model = new CustomersModel();
    }

    public function index()
    {
        //
    }

    public function preparePost() :void
    {
        $categoryname = $_POST['categoryname']; 
        $price = $_POST['price'];
        $status = $_POST['status'];
        $data = [
            'categoryname' => $categoryname,
            'price' => $price,
            'status' => $status
        ];
        $this->post($data);
    }

    private function post(array $data) :void
    {
        try {
            $this->model->save($data);
        }
        catch(\Exception $e) {
            $msg = $e->getMessage();
        }
    }

    public function delete() :void
    {
        try {
            $id = $_POST['id'];
            $this->model->delete($id);
        }
        catch(\Exception $e) {
            $msg = $e->getMessage();
        }
    }
}
