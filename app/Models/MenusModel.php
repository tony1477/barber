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

}
