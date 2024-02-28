<?php
namespace App\Services;

use App\Entities\MenusEntity;
use App\Models\MenusModel;

class Menus {
    
    public static $menus;

    private static function getAllMenus() :void {
        $model = new MenusModel();
        self::$menus = $model->where('status',1)->findAll();
    }

    public static function getMenus(string $user) {
        $menu = self::getAllMenus();
        return self::$menus;
        // $model = new MenusModel();
        // return $model->findAll();
    }
}