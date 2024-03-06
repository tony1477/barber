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
            ->select('a.transid, dayofIndo(a.transdate) as transdate, a.transtime, a.customerid, b.fullname as customername, (select fullname from employees c where c.employeeid = a.cashierid) as cashier,(select fullname from employees d where d.employeeid = a.barberid) as barberman, formatRp(total_price) as price')
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

    public function getTodayAmount()
    {
        $today = date('Y-m-d');
        return $this->db->table('trans_barber a')
            ->select('formatRp(ifnull(sum(total_price),0)) as total')
            ->where('transdate',$today)
            ->get()->getRowArray();
    }

    public function getTodayBarber()
    {
        $today = date('Y-m-d');
        return $this->db->table('trans_barber a')
            ->select('concat(ifnull(count(transid),0)," Customer") as total')
            ->where('transdate',$today)
            ->get()->getRowArray();
    }

    public function getYesterdayBarber()
    {
        $yesterday = new \DateTime('yesterday');
        return $this->db->table('trans_barber a')
            ->select('concat(ifnull(count(transid),0)," Customer") as total')
            ->where('transdate',$yesterday->format('Y-m-d'))
            ->get()->getRowArray();
    }

    public function getSalesMonth()
    {
        $lastday = date('Y-m-t');
        $firstday = date('Y-m-01');
        return $this->db->table('trans_barber a')
            ->select('formatRp(ifnull(sum(total_price),0)) as total')
            ->where('transdate >= ',$firstday)
            ->where('transdate <=',$lastday)
            ->get()->getRowArray();
    }

    public function getHistorical()
    {
        return $this->db->table('trans_barber a')
            ->select('b.fullname as customername, group_concat(c.fullname) as barber, ifnull(c.photo,"team-2.jpg") as pic, formatRp(ifnull(sum(total_price),0)) as price, count(a.customerid) as visit')
            ->join('customers b','b.customerid = a.customerid','left')
            ->join('employees c','c.employeeid = a.barberid','left')
            ->groupBy('a.customerid')
            // ->where('transdate',$yesterday->format('Y-m-d'))
            ->get()->getResultArray();
    }
}
