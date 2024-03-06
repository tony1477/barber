<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoriesModel;
use App\Services\Menus;
use CodeIgniter\HTTP\ResponseInterface;


class CategoriesController extends BaseController
{
    private CategoriesModel $model;

    public function __construct()
    {
        $this->model = new CategoriesModel();
    }
    
    public function index()
    {
        //
    }

    public function list() :string
    {
        $data = [
            'title' => 'List Category',
            'menu' => Menus::getMenus('admin'),
            'active' => '/kategori',
            'tableProps' => [
                'tableTitle' => 'List Category',
                'columns' => [
                    'ID','Category Name','Price', 'Status'
                ],
                'field' => ['categoryid','categoryname','price','status'],
                'data' => $this->model->asArray()->findAll(),
                'confirmDelete' => 'category'
            ],
            'fieldColumns' => [
                'idModal' => 'category',
                'action' => base_url().'kategori/simpan',
                'colModal' => [
                    [
                        'label'=>'Category Name',
                        'name'=>'categoryname',
                        'type' => 'text',
                    ],
                    [
                        'label'=>'Price',
                        'name'=>'price',
                        'type' => 'number',
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
        return view('category/list',$data);
    }

    public function post() 
    {
        try {
            $categoryname = $_POST['categoryname']; 
            $price = $_POST['price'];
            $status = $_POST['status'];
            $data = [
                'categoryname' => $categoryname,
                'price' => $price,
                'status' => ($status == 'on' ? 1 : 0)
            ];
            $message = 'Berhasil di tambahkan';
            if($_POST['id']!='') {
                $data['categoryid'] = $_POST['id'];
                $message = 'Berhasil di update';
            }
            if($this->model->save($data)) return redirect()->to('kategori')->with('message',$message);
        }
        catch(\Exception $e) {
            $msg = $e->getMessage();
            return redirect()->to('kategori')->with('message',$msg);
        }
    }

    public function delete() :string
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
