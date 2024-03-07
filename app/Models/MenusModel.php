<?php

namespace App\Models;

use App\Entities\MenusEntity;
use CodeIgniter\Model;

class MenusModel extends Model
{
    protected $table            = 'menus';
    protected $primaryKey       = 'menuid';
    protected $useAutoIncrement = true;
    protected $returnType       = MenusEntity::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['menuname','parentid','status'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    public function getMenubyUserId($id)
    {
        return $this->db->table('menus a')
            ->select('a.*, ')
            ->join('group_menu b','b.menuid = a.menuid','left')
            ->join('auth_groups_users c','c.id = b.groupid','left')
            ->where('a.status',1)
            ->where('c.user_id',$id)
            ->get()
            ->getResult();
    }

}
