<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pinjam_m;
use App\Models\Anggota_m; 
use App\Models\Buku_m; 

class PinjamController extends Controller
{
    /**
     * Menampilkan daftar pinjaman (paginated)
     */
    public function index(Pinjam_m $pinjam)
    {
        $Anggota_m = new Anggota_m();
        $Buku_m = new Buku_m();

        $list_anggota = $Anggota_m->get_anggota_for_dropdown();
        $list_buku = $Buku_m->get_buku_for_dropdown();

        // get_records() tanpa parameter = Query Builder → bisa paginate
        $data = [
            'data' => $pinjam->get_records()->paginate(5),
            'list_anggota' => $list_anggota,
            'list_buku' => $list_buku,
        ];

        return view('pinjam.list_pinjam', $data);
    }

    /**
     * Form tambah
     */
    public function add()
    {
        $Anggota_m = new Anggota_m();
        $Buku_m = new Buku_m();

        return view('pinjam.add_pinjam', [
            'list_anggota' => $Anggota_m->get_anggota_for_dropdown(),
            'list_buku' => $Buku_m->get_buku_for_dropdown(),
        ]);
    }

    /**
     * Simpan data baru
     */
    public function save(Request $request, Pinjam_m $pinjam)
    {
        $validated = $request->validate([
            'ID_Anggota' => 'required',
            'ID_Buku' => 'required',
            'tgl_pinjam' => 'required|date',
            'tgl_kembali' => 'required|date|after_or_equal:tgl_pinjam',
        ]);

        $data = $request->only(['ID_Anggota', 'ID_Buku', 'tgl_pinjam', 'tgl_kembali']);

        $pinjam->insert_record($data);

        return redirect('/pinjam')->with('success', 'Data pinjaman berhasil disimpan.');
    }

    /**
     * Form edit
     */
    public function edit($id)
    {
        $Pinjam_m = new Pinjam_m();
        $Anggota_m = new Anggota_m();
        $Buku_m = new Buku_m();

        $data_pinjam = $Pinjam_m->get_records($id);

        if (!$data_pinjam) {
            return redirect('/pinjam')->with('error', 'Data pinjaman tidak ditemukan.');
        }

        return view('pinjam.edit_pinjam', [
            'data_pinjam' => $data_pinjam,
            'list_anggota' => $Anggota_m->get_anggota_for_dropdown(),
            'list_buku' => $Buku_m->get_buku_for_dropdown(),
        ]);
    }

    /**
     * Update data
     */
    public function update(Request $request, $id, Pinjam_m $pinjam)
    {
        $validated = $request->validate([
            'ID_Anggota' => 'required',
            'ID_Buku' => 'required',
            'tgl_pinjam' => 'required|date',
            'tgl_kembali' => 'required|date|after_or_equal:tgl_pinjam',
        ]);

        $data = $request->only(['ID_Anggota', 'ID_Buku', 'tgl_pinjam', 'tgl_kembali']);

        $pinjam->update_by_id($data, $id);

        return redirect('/pinjam')->with('success', 'Data pinjaman berhasil diperbarui.');
    }

    /**
     * Hapus data
     */
    public function delete($id, Pinjam_m $pinjam)
    {
        $pinjam->delete_by_id($id);
        return redirect('/pinjam')->with('success', 'Data pinjaman berhasil dihapus.');
    }
}