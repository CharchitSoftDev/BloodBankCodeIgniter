<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = "users";

    public function saveUser($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function getUser($email)
    {
        if ($email == null) {
            return;
        } else {
            return $this->db->table($this->table)->getWhere(['email' => $email]);
        }
    }
}
