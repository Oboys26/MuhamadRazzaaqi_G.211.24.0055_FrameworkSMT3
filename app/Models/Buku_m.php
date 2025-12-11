<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// Import Facade DB karena Anda menggunakan syntax query builder (self::insert, dll.)
use Illuminate\Support\Facades\DB; 

class Buku_m extends Model
{
    // Pastikan properti ini ada dan benar
    protected $table = 'mst_buku'; 
    protected $primaryKey = 'ID_Buku'; 
    public $timestamps = false; 

    /**
     * Mengambil semua record atau satu record berdasarkan ID
     * Menggunakan Query Builder agar konsisten dengan Controller Anda.
     * @param mixed $criteria ID Buku (untuk mengambil satu record)
     */
    public function get_records($criteria = null) 
    {
        // Jika kriteria (ID) diberikan, gunakan Query Builder untuk pencarian.
        if ($criteria) {
            // Gunakan $this->table atau nama tabel secara eksplisit
            return DB::table($this->table)->where($this->primaryKey, $criteria); 
        }
        
        // Jika tidak ada kriteria, ambil semua data
        return DB::table($this->table)->get();
    }

    /**
     * Menyimpan data baru
     * Menggunakan Query Builder
     */
    public function insert_record($data)
    {
        return DB::table($this->table)->insert($data);
    }

    /**
     * Update data berdasarkan ID
     * Menggunakan Query Builder
     */
    public function update_by_id($data, $id)
    {
        return DB::table($this->table)
                ->where($this->primaryKey, $id)
                ->update($data);
    }

    /**
     * Menghapus data berdasarkan ID
     * Menggunakan Query Builder
     */
    public function delete_by_id($id)
    {
        return DB::table($this->table)
                ->where($this->primaryKey, $id)
                ->delete();
    }
        
    public function get_buku_for_dropdown()
{
    return \DB::table('mst_buku')
        ->orderBy('Judul', 'asc')
        ->pluck('Judul', 'ID_Buku')
        ->toArray();
}


}