<?php

namespace App\Controllers;

use App\Models\MenusModel;
use App\Services\Menus;


class Home extends BaseController
{
    private MenusModel $menu;

    public function __construct()
    {
        $this->menu = new MenusModel();
    }

    public function index(): string
    {
        return view('welcome_message');
    }

    public function home() :string
    {
        $user = 'admin';
        //$menu = $this->menu->whereIn()->findAll();
        $menu = Menus::getMenus($user);
        $data = [
            'menu' => $menu,
            'title' => 'HOME'
        ];
        return view('template/index',$data);
    }
}
