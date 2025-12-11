<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota_m; 

class AnggotaController extends Controller
{
    protected $data; 

    public function __construct()
    {
        // Data untuk dropdown Progdi
        $this->data['opt_progdi'] = [
            ''      => '-Pilih salah satu -',
            'TI'    => 'Teknik Informatika', 
            'SI'    => 'Sistem Informasi',    
            'IK'    => 'Ilmu Komunikasi'     
        ];
    }

    // Tampilkan daftar anggota (READ)
    public function index(Anggota_m $anggota)
    {
        $data = [
            // MODIFIKASI LATIHAN MODUL 7: Ganti get_records() dengan paginate(5)
            'query' => $anggota->paginate(5),
            'optprogdi' => $this->data['opt_progdi']
        ];
        return view('anggota.list', $data);
    }

    // Tampilkan form tambah anggota (CREATE)
    public function add()
    {
        $data = [
            'is_update' => 0,
            'optprogdi' => $this->data['opt_progdi']
        ];
        return view('anggota.add', $data);
    }

    // Simpan atau update data
    public function save(Anggota_m $anggota, Request $request)
    {
        // === START: MODUL 6 (VALIDASI) ===
        $request->validate([
            'nim' => 'required|max:13', 
            'nama' => 'required|max:30', 
            'progdi' => 'required',
        ]);
        // === END: MODUL 6 ===
        
        $data['nim']    = $request->input('nim');
        $data['nama']   = $request->input('nama');
        $data['progdi'] = $request->input('progdi');
        $is_update      = $request->input('is_update');

        if ($is_update == 0)
        {
            if ($anggota->insert_record($data))
            {
                return redirect('anggota')->with('success', 'Data anggota berhasil ditambahkan.');
            }
        }
        else
        {
            $id = $request->input('id');
            if ($anggota->update_by_id($data, $id))
            {
                return redirect('anggota')->with('success', 'Data anggota berhasil diperbarui.');
            }
        }
        return redirect('anggota')->with('error', 'Gagal menyimpan data.'); 
    }

    // Tampilkan form edit (UPDATE)
    public function edit($id, Anggota_m $anggota)
    {
        $query_result = $anggota->get_records($id)->first(); 

        if (!$query_result) {
            return redirect('anggota')->with('error', 'Data anggota tidak ditemukan.');
        }

        $data = [
            'query' => $query_result,
            'is_update' => 1,
            'optprogdi' => $this->data['opt_progdi']
        ];
        
        return view('anggota.edit', $data);
    }

    // Hapus data (DELETE)
    public function delete($id, Anggota_m $anggota)
    {
        if($anggota->delete_by_id($id))
        {
            return redirect('anggota')->with('success', 'Data anggota berhasil dihapus.');
        }
        return redirect('anggota')->with('error', 'Gagal menghapus data.');
    }
}