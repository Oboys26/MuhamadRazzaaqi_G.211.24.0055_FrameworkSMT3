<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB; 

class Pinjam_m extends Model
{
    protected $table = 'pinjam'; 
    protected $primaryKey = 'ID_Pinjam'; 
    public $timestamps = false;

    /**
     * Ambil data pinjam (JOIN anggota & buku)
     * - Jika tanpa parameter → return Query Builder (bisa paginate)
     * - Jika dengan ID → return 1 record (first)
     */
    public function get_records($criteria = null) 
    {
        $query = DB::table($this->table)
            ->join('mst_anggota', 'pinjam.ID_Anggota', '=', 'mst_anggota.ID_Anggota')
            ->join('mst_buku', 'pinjam.ID_Buku', '=', 'mst_buku.ID_Buku')
            ->select(
                'pinjam.*', 
                'mst_anggota.Nama as NamaAnggota', 
                'mst_buku.Judul as JudulBuku'
            )
            ->orderBy('pinjam.tgl_pinjam', 'desc');

        if ($criteria) {
            return $query->where($this->primaryKey, $criteria)->first();
        }

        return $query; // untuk paginate
    }

    public function insert_record($data)
    {
        return DB::table($this->table)->insert($data);
    }

    public function update_by_id($data, $id)
    {
        return DB::table($this->table)
            ->where($this->primaryKey, $id)
            ->update($data);
    }

    public function delete_by_id($id)
    {
        return DB::table($this->table)
            ->where($this->primaryKey, $id)
            ->delete();
    }
}