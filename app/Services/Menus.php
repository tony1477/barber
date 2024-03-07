<?php
namespace App\Services;

use App\Entities\MenusEntity;
use App\Models\MenusModel;

class Menus {
    
    public static $menus;

    private static function getAllMenus(int $id) :void {
        $model = new MenusModel();
        self::$menus = $model->getMenubyUserId($id);
        // self::$menus = $model->where('status',1)->findAll();
    }

    public static function getMenus(int $id) {
        self::getAllMenus($id);
        return self::$menus;
        // $model = new MenusModel();
        // return $model->findAll();
    }
}