<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model{
    protected $table = 'scm';
    protected $primaryKey = 'id_order';
    protected $allowedFields = ['pelanggan', 'date', 'approved', 'order_status'];

    public function getOrder($idorder=false){
        if($idorder==false){
            return $this->paginate(4, 'order');
        }
        return $this->where(['id_order'=>$idorder])->first();
    }

    public function findOrder($cari){
        return $this->table('scm')->like('pelanggan', $cari);
    }
}

?>