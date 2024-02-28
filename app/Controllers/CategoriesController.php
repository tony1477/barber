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
            'tableProps' => [
                'tableTitle' => 'List Category',
                'columns' => [
                    'Category Name','Price', 'Status'
                ],
                'data' => $this->model->asArray()->findAll(),
                'confirmDelete' => 'category'
            ],
            'fieldColumns' => [
                'idModal' => 'category',
                'action' => 'kategori/simpan',
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
            if($this->model->save($data)) return redirect()->to('kategori');
            return redirect()->to('kategori');
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
