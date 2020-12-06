<?php namespace App\Models;

use CodeIgniter\Model;

class BloodBank extends Model
{
    protected $table = "bloodbank";

    public function saveUser($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function getFoodItem($hospital){
        $query = $this->db->table($this->table)->where('hospital_name',$hospital)->get();
        return $query->getResult();
    }

    public function getRestaurant($email){
        $query = $this->db->table('users')->where('email',$email)->get()->getRowArray();
        return $query;
    }

    public function getItems(){
        return $this->findAll();
    }
}