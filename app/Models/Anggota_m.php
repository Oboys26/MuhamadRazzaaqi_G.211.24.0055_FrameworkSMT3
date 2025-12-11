<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB; 

class Anggota_m extends Model
{
    // Sesuaikan dengan nama tabel di database
    protected $table = 'mst_anggota'; 
    // Sesuaikan dengan primary key
    protected $primaryKey = 'ID_Anggota'; 
    public $timestamps = false; 

    /**
     * Mengambil semua record atau satu record berdasarkan ID Anggota
     * Menggunakan Query Builder
     * @param mixed $criteria ID Anggota (untuk mengambil satu record)
     */
    public function get_records($criteria = null) 
    {
        if ($criteria) {
            // Mengambil satu record
            return DB::table($this->table)->where($this->primaryKey, $criteria); 
        }
        
        // Mengambil semua record
        return DB::table($this->table)->get();
    }

    /**
     * Menyimpan data baru
     */
    public function insert_record($data)
    {
        return DB::table($this->table)->insert($data);
    }

    /**
     * Update data berdasarkan ID
     */
    public function update_by_id($data, $id)
    {
        return DB::table($this->table)
                ->where($this->primaryKey, $id)
                ->update($data);
    }

    /**
     * Menghapus data berdasarkan ID
     */
    public function delete_by_id($id)
    {
        return DB::table($this->table)
                ->where($this->primaryKey, $id)
                ->delete();
    }

    public function get_anggota_for_dropdown()
{
    return \DB::table('mst_anggota')
        ->orderBy('Nama', 'asc')
        ->pluck('Nama', 'ID_Anggota')
        ->toArray();
}


}