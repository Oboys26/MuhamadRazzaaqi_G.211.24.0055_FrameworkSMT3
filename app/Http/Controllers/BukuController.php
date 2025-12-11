<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku_m; 

class BukuController extends Controller
{
    protected $data; 

    public function __construct()
    {
        $this->data['opt_kategori'] = [
            ''      => '-Pilih salah satu -',
            'novel'   => 'Novel',
            'komik'   => 'Komik',
            'kamus'   => 'Kamus',
            'program' => 'Pemrograman'
        ];
    }

    // MODIFIKASI MODUL 7: Menggunakan paginate(5)
    public function index(Buku_m $buku)
    {
        $data = [
            // BARIS MODIFIKASI: Ganti get_records() dengan paginate(5)
            'query' => $buku->paginate(5), 
            'optkategori' => $this->data['opt_kategori']
        ];
        return view('buku.list', $data);
    }

    public function add_new()
    {
        $data = [
            'is_update' => 0,
            'optkategori' => $this->data['opt_kategori']
        ];
        return view('buku.add', $data);
    }

    public function save(Buku_m $buku, Request $request)
    {
        // START: TAMBAHAN MODUL 6 - FORM VALIDATION
        $validated = $request->validate([
            'Judul' => 'required', 
            'Pengarang' => 'required', 
            'Kategori' => 'required',
        ]);
        // END: TAMBAHAN MODUL 6
        
        $data['Judul']     = $request->input('Judul');
        $data['Pengarang'] = $request->input('Pengarang');
        $data['Kategori']  = $request->input('Kategori');
        $is_update         = $request->input('is_update');

        if ($is_update == 0)
        {
            if ($buku->insert_record($data))
            {
                return redirect('buku');
            }
        }
        else
        {
            $id = $request->input('id');
            if ($buku->update_by_id($data, $id))
            {
                return redirect('buku');
            }
        }
        return redirect('buku'); // Tambahkan fallback redirect
    }

    public function edit($id, Buku_m $buku)
    {
        $query_result = $buku->get_records($id)->first(); 

        if (!$query_result) {
            return redirect('buku')->with('error', 'Data buku tidak ditemukan.');
        }

        $data = [
            'query' => $query_result,
            'is_update' => 1,
            'optkategori' => $this->data['opt_kategori']
        ];
        
        return view('buku.ubah', $data); 
    }

    public function delete($id, Buku_m $buku)
    {
        if($buku->delete_by_id($id))
        {
            return redirect('buku');
        }
        return redirect('buku'); // Tambahkan fallback redirect
    }
}