<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EmployeesModel;
use App\Services\Menus;


class EmployeesController extends BaseController
{
    private EmployeesModel $model;

    public function __construct()
    {
        $this->model = new EmployeesModel();
    }

    public function index()
    {
        //
    }

    public function list() :string
    {
        $data = [
            'title' => 'List Employee',
            'menu' => Menus::getMenus('admin'),
            'tableProps' => [
                'tableTitle' => 'List Employee',
                'columns' => [
                    'ID','Fullname','KTP Number', 'Address', 'Birthdate', 'Status'
                ],
                'field' => ['employeeid','fullname','ktpno','address','birthdate','status'],
                'data' => $this->model->asArray()->findAll(),
                'confirmDelete' => 'employee'
            ],
            'fieldColumns' => [
                'idModal' => 'employee',
                'action' => base_url().'karyawan/simpan',
                'colModal' => [
                    [
                        'label'=>'Fullname',
                        'name'=>'fullname',
                        'type' => 'text',
                    ],
                    [
                        'label'=>'KTP Number',
                        'name'=>'ktpno',
                        'type' => 'text',
                    ],
                    [
                        'label'=>'Address',
                        'name'=>'address',
                        'type' => 'text',
                    ],
                    [
                        'label'=>'Birthdate',
                        'name'=>'birthdate',
                        'type' => 'date',
                    ],
                    [
                        'label'=>'Status',
                        'name'=>'status',
                        'type' => 'switch',
                    ]
                ],
                // 'categoryname','price','status'
            ],
        ];
        return view('employee/list',$data);
    }

    // public function preparePost() 
    // {
    //     $fullname = $_POST['fullname']; 
    //     $address = $_POST['address'];
    //     $status = $_POST['status'];
    //     $phone = $_POST['phone'];
    //     $isactive = $_POST['isactive'];
    //     $data = [
    //         'fullname' => $fullname,
    //         'address' => $address,
    //         'status_customer' => $status,
    //         'mobile_phone' => $phone,
    //         'status' => ($isactive == 'on' ? 1 : 0),
    //     ];
    //     if($_POST['id']!='') 
    //         $data['employeeid'] = $_POST['id'];
        
    //     $this->post($data);
    // }

    public function post() 
    {
        try {
            $fullname = $_POST['fullname']; 
            $ktpno = $_POST['ktpno'];
            $address = $_POST['address'];
            $birthdate = $_POST['birthdate'];
            $status = $_POST['status'];
            $data = [
                'fullname' => $fullname,
                'ktpno' => $ktpno,
                'address' => $address,
                'birthdate' => $birthdate,
                'status' => ($status == 'on' ? 1 : 0),
            ];
            $message = 'Berhasil di tambahkan';
            if($_POST['id']!='') {
                $data['employeeid'] = $_POST['id'];
                $message = 'Berhasil di update';
            }
            if($this->model->save($data)) return redirect()->to('karyawan')->with('message',$message);
        }
        catch(\Exception $e) {
            $msg = $e->getMessage();
            return redirect()->to('karyawan')->with('message',$msg);
        }
    }

    public function delete() 
    {
         try {
            $id = $this->request->getVar('id');
            $this->model->delete($id);
            return json_encode([
                'status' => 'success'
            ]);
        }
        catch(\Exception $e) {
            $msg = $e->getMessage();
            return json_encode([
                'status' => 'fail',
                'message' => $msg
            ]);
        }
    }
}
