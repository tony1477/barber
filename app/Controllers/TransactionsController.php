<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Database\Migrations\TransBarberDetail;
use App\Models\CategoriesModel;
use App\Models\CustomersModel;
use App\Models\EmployeesModel;
use App\Models\TransactionsModel;
use App\Services\Menus;

class TransactionsController extends BaseController
{

    private TransactionsModel $model;
    private EmployeesModel $employeeModel;
    private CustomersModel $customerModel;
    private CategoriesModel $categoryModel;
    public function __construct()
    {
        $this->model = new TransactionsModel();
        $this->employeeModel = new EmployeesModel();
        $this->customerModel = new CustomersModel();
    }

    public function index()
    {
        //
    }

    public function list() :string
    {
        $data = [
            'title' => 'List Transaction',
            'menu' => Menus::getMenus(auth()->id()),
            'active' => '/transaksi',
            'tableProps' => [
                'tableTitle' => 'List Transaction',
                'columns' => [
                    'ID','Date','Time', 'Customer', 'Barberman', 'Price'
                ],
                'additionalCol' => [
                    'detail' => 
                        '<td class="align-middle text-center detailBtn">
                        <button class="btn btn-sm btn-icon badge btn-primary" type="button">
                            <span class="btn-inner--icon"><i class="material-icons">info</i></span>
                            <span class="btn-inner--text">Detail</span>
                        </button>
                    </td>'
                ],
                'field' => ['transid','transdate','transtime','customername','barberman','price'],
                'data' => $this->model->getData()->getResultArray(),
                'confirmDelete' => 'transaction'
            ],
            'fieldColumns' => [
                'idModal' => 'transaction',
                'action' => base_url().'transaksi/simpan',
                'colModal' => [
                    [
                        'label'=>'Date',
                        'name'=>'transdate',
                        'type' => 'text',
                    ],
                    [
                        'label'=>'Time',
                        'name'=>'transdate',
                        'type' => 'text',
                    ],
                    [
                        'label'=>'Customer',
                        'name'=>'customerid',
                        'type' => 'select',
                    ],
                    [
                        'label' => 'New Customer',
                        'name' => '',
                        'type' => 'info-link'
                    ],
                    [
                        'label'=>'Barber-Man',
                        'name'=>'barberid',
                        'type' => 'select',
                    ],
                ],
                // 'categoryname','price','status'
            ],
        ];
        return view('transaction/list',$data);
    }

    public function create() :string
    {
        $data = [
            'title' => 'List Transaction',
            'menu' => Menus::getMenus(auth()->id()),
            'cashier' => [],
            'active' => '/transaksi',
            'barber' => $this->employeeModel->where('position','barberman')->findAll(),
            'customer' => $this->customerModel->findAll(),
        ];
        return view('transaction/add',$data);
    }

    public function postHeader()
    {
        try {
            $transdate = $this->request->getPost('transdate');
            $transtime = $this->request->getPost('transtime');
            $customerid = $this->request->getPost('customerid');
            $barberid = $this->request->getPost('barberid');

            $data = [
                'transdate' => date('Y-m-d',strtotime($transdate)),
                'transtime' => $transtime,
                'customerid' => $customerid,
                // 'cashierid' => $cashierid,
                'barberid' => $barberid
            ];

            if($this->model->save($data)) {
                $idheader = $this->model->getInsertID();
                return $this->createDetail($idheader);
            }
                // return redirect()->to('transaksi/tambah2')->withInput();
        }
        catch(\Exception $e) {
            $msg = $e->getMessage();
            return redirect()->to('transaksi/tambah')->with('message',$msg);
        }
    }

    public function createDetail($id)
    {
        $this->categoryModel = new CategoriesModel();
        helper('form');
        $data = [
            'title' => 'List Transaction',
            'menu' => Menus::getMenus(auth()->id()),
            'cashier' => [],
            'active' => '/transaksi',
            // 'idheader' => $id,
            // 'barber' => $this->employeeModel->where('position','barberman')->findAll(),
            // 'customer' => $this->customerModel->findAll(),
            'data' => $this->model->getHeaderData($id),
            'category' => $this->categoryModel->where('status',1)->findAll(),
        ];
        return view('transaction/adddetail',$data);
        
    }
    
    public function postDetail()
    {
        try {
            $id = $this->request->getVar('transid');
            $categoryid = $this->request->getVar('categoryid');
            $qty = $this->request->getVar('qty');

            $data = [
                'transid' => $id,
                'categoryid' => $categoryid,
                'qty' => $qty,
            ];
            if(!$this->model->saveDetail($data)) throw new \Exception('failed');
            return json_encode([
                'status' => 'success',
                'message' => 'save success',
                'data'=> $data,
            ]);
        }
        catch(\Exception $e) {
            $msg = $e->getMessage();
            return json_encode([
                'status' => 'failed',
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function post()
    {
        // update total in header
        $id = $this->request->getVar('id');
        $this->model->postBarber($id);
        return json_encode([
            'status' => 'success',
            'message' => 'Data was post'
        ]);
    }

    public function getDetail(int $id) {
        echo json_encode([
            'status' => 'success',
            'message' => 'Data retrived',
            'data' => $this->model->getDetailTrans($id)->getResultArray(),
        ]);
    }
}