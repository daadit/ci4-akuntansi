<?php

namespace App\Models;

use CodeIgniter\Model;

class Supplier extends Model
{
    public function getSupplier()
    {
        $bulder = $this->db->table('tb_supplier');
        return $bulder->get();
    }
    public function saveSupplier($data)
    {
        $query = $this->db->table('tb_supplier')->insert($data);
        return $query;
    }
    public function updateSupplier($data, $id)
    {
        $query = $this->db->table('tb_supplier')->update($data, array('supplierId' => $id));
        return $query;
    }
    public function deleteSupplier($id)
    {
        $query = $this->db->table('tb_supplier')->delete(array('supplierId' => $id));
        return $query;
    }
}
