<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransactionsModel;
use App\Services\Menus;

class TransactionsController extends BaseController
{

    private TransactionsModel $model;
    public function __construct()
    {
        $this->model = new TransactionsModel();
    }

    public function index()
    {
        //
    }

    public function list() :string
    {
        $data = [
            'title' => 'List Transaction',
            'menu' => Menus::getMenus('admin'),
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
        return view('');
    }

    public function save()
    {

    }

    public function getDetail(int $id) {
        echo json_encode([
            'status' => 'success',
            'message' => 'Data retrived',
            'data' => $this->model->getDetailTrans($id)->getResultArray(),
        ]);
    }
}
