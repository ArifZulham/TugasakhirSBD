<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class sekolahController extends Controller
{
    public function index(Request $request) {
        if ($request->has("search")) {
            $datas = DB::select('SELECT S.id_sekolah, S.nama_sekolah, S.jenis_sekolah, S.alamat, S.kode_pos, T.status, T.waktu_kbm, P.provinsi
            FROM sekolah S LEFT JOIN status T ON S.id_status = T.id_status
            LEFT JOIN provinsi P ON S.id_provinsi = P.id_provinsi  WHERE S.nama_sekolah like :search', [
                'search' => '%' . $request->search . '%',
            ]);

            return view('sekolah.index')
                ->with('datas', $datas);
        } else {
            $datas = DB::select('SELECT S.id_sekolah, S.nama_sekolah, S.jenis_sekolah, S.alamat, S.kode_pos, T.status, T.waktu_kbm, P.provinsi
            FROM sekolah S LEFT JOIN status T ON S.id_status = T.id_status
            LEFT JOIN provinsi P ON S.id_provinsi = P.id_provinsi WHERE is_delete is NULL
            ');

        return view('sekolah.index')
        ->with('datas', $datas);
        }  
    }

    public function trash() {
        $datas = DB::select('select S.id_sekolah, S.nama_sekolah, S.jenis_sekolah, S.alamat, S.kode_pos, T.status, T.waktu_kbm, P.provinsi
        FROM sekolah S LEFT JOIN status T ON S.id_status = T.id_status
        LEFT JOIN provinsi P ON S.id_provinsi = P.id_provinsi WHERE is_delete = 1');

        return view('sekolah.trash')
            ->with('datas', $datas);
    }

    public function create() {
        return view('sekolah.add');
    }

    public function store(Request $request) {
        $request->validate([
            'id_sekolah' => 'required',
            'nama_sekolah' => 'required',
            'jenis_sekolah' => 'required',
            'id_provinsi' => 'required',
            'id_status' => 'required',
            'alamat' => 'required',
            'kode_pos' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO sekolah(id_sekolah, nama_sekolah, jenis_sekolah, id_status, id_provinsi,alamat,kode_pos) VALUES (:id_sekolah, :nama_sekolah, :jenis_sekolah, :id_status, :id_provinsi , :alamat,:kode_pos)',
        [
            'id_sekolah' => $request->id_sekolah,
            'nama_sekolah' => $request->nama_sekolah,
            'jenis_sekolah' => $request->jenis_sekolah,
            'id_status' => $request->id_status,
            'id_provinsi' => $request->id_provinsi,
            'alamat' => $request->alamat,
            'kode_pos' => $request->kode_pos,
        ]
        );

        // Menggunakan laravel eloquent
        // Admin::create([
        //     'id_admin' => $request->id_admin,
        //     'nama_admin' => $request->nama_admin,
        //     'alamat' => $request->alamat,
        //     'username' => $request->username,
        //     'password' => Hash::make($request->password),
        // ]);

        return redirect()->route('sekolah.index')->with('success', 'Data sekolah berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('sekolah')->where('id_sekolah', $id)->first();

        return view('sekolah.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_sekolah' => 'required',
            'nama_sekolah' => 'required',
            'jenis_sekolah' => 'required',
            'id_status' => 'required',
            'id_provinsi' => 'required',
            'alamat' => 'required',
            'kode_pos' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE sekolah SET id_sekolah = :id_sekolah, nama_sekolah = :nama_sekolah, jenis_sekolah = :jenis_sekolah, id_status = :id_status, id_provinsi = :id_provinsi, alamat = :alamat ,kode_pos = :kode_pos WHERE id_sekolah = :id',
        [
            'id' => $id,
            'id_sekolah' => $request->id_sekolah,
            'nama_sekolah' => $request->nama_sekolah,
            'jenis_sekolah' => $request->jenis_sekolah,
            'id_status' => $request->id_status,
            'id_provinsi' => $request->id_provinsi,
            'alamat' => $request->alamat,
            'kode_pos' => $request->kode_pos,
            
        ]
        );

        // Menggunakan laravel eloquent
        // Admin::where('id_admin', $id)->update([
        //     'id_admin' => $request->id_admin,
        //     'nama_admin' => $request->nama_admin,
        //     'jenis_sekolah' => $request->jenis_sekolah,
        //     'username' => $request->username,
        //     'password' => Hash::make($request->password),
        // ]);

        return redirect()->route('sekolah.index')->with('success', 'Data sekolah berhasil diubah');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM sekolah WHERE id_sekolah = :id_sekolah', ['id_sekolah' => $id]);

        // Menggunakan laravel eloquent
        // Admin::where('id_sekolah', $id)->delete();

        return redirect()->route('sekolah.index')->with('success', 'Data Admin berhasil dihapus');
    }

    public function softdelete($id){
        DB::update('UPDATE sekolah SET is_delete = 1 where id_sekolah = :id_sekolah', ['id_sekolah' => $id ]);
        return redirect()->route('sekolah.index')->with('success', 'Data sekolah berhasil dihapus');
    }

    public function restore($id){
        DB::update('UPDATE sekolah SET is_delete = NULL where id_sekolah = :id_sekolah', ['id_sekolah' => $id ]);
        return redirect()->route('sekolah.index')->with('success', 'Data sekolah berhasil dikembalikan');
    }
}
