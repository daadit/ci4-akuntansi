<?php

namespace App\Models;

use CodeIgniter\Model;

class Barang extends Model
{
    public function getBarang()
    {
        $bulder = $this->db->table('tb_barang');
        return $bulder->get();
    }
    public function saveBarang($data)
    {
        $query = $this->db->table('tb_barang')->insert($data);
        return $query;
    }
    public function updateBarang($data, $id)
    {
        $query = $this->db->table('tb_barang')->update($data, array('barangId' => $id));
        return $query;
    }
    public function deleteBarang($id)
    {
        $query = $this->db->table('tb_barang')->delete(array('barangId' => $id));
        return $query;
    }
}
