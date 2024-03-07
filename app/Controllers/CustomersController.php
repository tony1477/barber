<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CustomersModel;
use App\Services\Menus;
use CodeIgniter\Files\File;
use CodeIgniter\HTTP\Files\UploadedFile;


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

    public function list() :string
    {
        $data = [
            'title' => 'List Customer',
            'active' => '/pelanggan',
            'menu' => Menus::getMenus(auth()->id()),
            'tableProps' => [
                'tableTitle' => 'List Customer',
                'columns' => [
                    'ID','Fullname','Address', 'Status' , 'Phone', 'Active?'
                ],
                // 'additionalCol' => [
                //     'photo' => 
                //         '<td>
                //             <div class="avatar mt-2">
                //                 <a href="javascript:;" class="avatar avatar rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="" data-bs-original-title="">
                //                     <img src="#" alt="team1">
                //                 </a>
                //             </div>
                //         </td>'
                // ],
                'field' => ['customerid','fullname','address','status_customer','mobile_phone','status'],
                'data' => $this->model->asArray()->findAll(),
                'confirmDelete' => 'customer'
            ],
            'fieldColumns' => [
                'idModal' => 'customer',
                'action' => base_url().'pelanggan/simpan',
                'colModal' => [
                    [
                        'label'=>'Fullname',
                        'name'=>'fullname',
                        'type' => 'text',
                    ],
                    [
                        'label'=>'Address',
                        'name'=>'address',
                        'type' => 'text',
                    ],
                    [
                        'label'=>'Photo',
                        'name'=>'photo',
                        'type' => 'file',
                    ],
                    [
                        'label'=>'Status',
                        'name'=>'status',
                        'type' => 'text',
                    ],
                    [
                        'label'=>'Phone',
                        'name'=>'phone',
                        'type' => 'text',
                    ],
                    [
                        'label'=>'Isactive?',
                        'name'=>'isactive',
                        'type' => 'switch',
                    ]
                ],
                // 'categoryname','price','status'
            ],
        ];
        return view('customer/list',$data);
    }

    public function preparePost() 
    {
        $fullname = $_POST['fullname']; 
        $address = $_POST['address'];
        $status = $_POST['status'];
        $phone = $_POST['phone'];
        $isactive = $_POST['isactive'];
        $data = [
            'fullname' => $fullname,
            'address' => $address,
            'status_customer' => $status,
            'mobile_phone' => $phone,
            'status' => ($isactive == 'on' ? 1 : 0),
        ];
        if($_POST['id']!='') 
            $data['customerid'] = $_POST['id'];
        
        $this->post($data);
    }

    public function post() 
    {
        try {
            $fullname = $_POST['fullname']; 
            $address = $_POST['address'];
            $status = $_POST['status'];
            $phone = $_POST['phone'];
            $photo = $_FILES['photo'];
            $isactive = $_POST['isactive'];

            $img = $this->request->getFile('photo');
            $uploaded = $this->uploadImg($img);
            $data = [
                'fullname' => $fullname,
                'address' => $address,
                'photo' => $uploaded['uploaded_filename'],
                'status_customer' => $status,
                'mobile_phone' => $phone,
                'status' => ($isactive == 'on' ? 1 : 0),
            ];
            $message = 'Berhasil di tambahkan';
            if($_POST['id']!='') {
                $data['customerid'] = $_POST['id'];
                $message = 'Berhasil di update';
            }
            if($this->model->save($data)) return redirect()->to('pelanggan')->with('message',$message);
            // var_dump($data);
        }
        catch(\Exception $e) {
            $msg = $e->getMessage();
            return redirect()->to('pelanggan')->with('message',$msg);
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

    private function uploadImg($files)
    {

        if (! $files->hasMoved()) {
            $filepath = WRITEPATH . 'uploads/' . $files->store();
            $filename = basename($filepath);

            // Path folder public
            $publicFolder = FCPATH . 'public/uploads/';

            // Memindahkan file ke folder public
            rename($filepath,$publicFolder.$filename);
            // $files->move($publicFolder, $filename);
            // move_uploaded_file()

            $data = [
                'uploaded_fileinfo' => new File($filepath),
                'uploaded_filename' => $filename
            ];
        }

        // $data = ['errors' => 'The file has already been moved.'];

        // return view('upload_form', $data);
        return $data;
    }
}
