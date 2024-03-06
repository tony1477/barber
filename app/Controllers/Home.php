<?php

namespace App\Controllers;

use App\Models\MenusModel;
use App\Models\TransactionsModel;
use App\Services\Menus;


class Home extends BaseController
{
    private MenusModel $menu;
    private TransactionsModel $transaction;

    public function __construct()
    {
        $this->menu = new MenusModel();
        $this->transaction = new TransactionsModel();
    }

    public function index(): string
    {
        return view('welcome_message');
    }

    public function home() :string
    {
        // $user = 'admin';
        // //$menu = $this->menu->whereIn()->findAll();
        // $menu = Menus::getMenus($user);
        // $data = [
        //     'menu' => $menu,
        //     'title' => 'HOME'
        // ];
        // return view('template/index',$data);
        return $this->dashboard();
    }

    public function dashboard() :string
    {
        $data=[
            'title' => 'Dashboard',
            'data' => [
                // 'today_amount' => 'Rp. 525.000',
                'today_amount' => $this->transaction->getTodayAmount()['total'],
                'today_barber' => $this->transaction->getTodayBarber()['total'],
                'yesterday_cut' => $this->transaction->getYesterdayBarber()['total'],
                'sales_month' => $this->transaction->getSalesMonth()['total'],
                'historycal' => $this->transaction->getHistorical(),
                // [
                //     [
                //         'customername' => 'Ade Riza',
                //         'barber' => 'Barber 2',
                //         'pic' => 'team-2.jpg',
                //         'price' => 'Rp. 450.000',
                //         'visit' => 5
                //     ],
                //     [
                //         'customername' => 'Mhd Ridho',
                //         'barber' => 'Barber 1',
                //         'pic' => 'team-4.jpg',
                //         'price' => 'Rp. 200.000',
                //         'visit' => 4
                //     ],
                //     [
                //         'customername' => 'Afdhal S',
                //         'barber' => 'Barber 1',
                //         'pic' => 'team-4.jpg',
                //         'price' => 'Rp. 100.000',
                //         'visit' => 3
                //     ],
                //     [
                //         'customername' => 'Customer Name',
                //         'barber' => 'Barber 2',
                //         'pic' => 'team-2.jpg',
                //         'price' => 'Rp. 70.000',
                //         'visit' => 2
                //     ],
                // ],
            ],
            'active' => '/dashboard',
            'menu' => Menus::getMenus('admin'),
        ];
        return view('dashboard',$data);
    }
}
