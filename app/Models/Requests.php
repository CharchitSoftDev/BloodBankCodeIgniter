<?php namespace App\Models;

use CodeIgniter\Model;

class Requests extends Model
{
    protected $table = "requests";

    public function saveRequests($data){

        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function getRequests($hospital){
        $query = $this->db->table($this->table)->where('hospital_name',$hospital)->get();
        return $query->getResult();
    }

}