<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionsModel extends Model
{
    protected $table            = 'trans_barber';
    protected $primaryKey       = 'transid';
    protected $useAutoIncrement = true;
    protected $returnType       = \App\Entities\TransactionsEntity::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['transdate','transtime','customerid','cashierid','barberid'];

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

    public function getData()
    {
        return $this->db->table('trans_barber a')
            ->select('a.transid, dayofIndo(a.transdate) as transdate, a.transtime, a.customerid, b.fullname as customername, (select fullname from employees c where c.employeeid = a.cashierid) as cashier,(select fullname from employees d where d.employeeid = a.barberid) as barberman, total_price as price')
            ->join('customers b','b.customerid = a.customerid','left')
            ->get();
    }

    public function getDetailTrans(int $id)
    {
        return $this->db->table('trans_barber_detail a')
            ->select('b.categoryname, a.qty, a.price, a.sub_total')
            ->join('categories b','b.categoryid = a.categoryid','left')
            ->where('a.transid = '.$id)
            ->get();
    }
}
