<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProvinsiController extends Controller
{
    public function index() {
        $datas = DB::select('select * from provinsi');

        return view('provinsi.index')
            ->with('datas', $datas);
    }

    public function create() {
        return view('provinsi.add');
    }

    public function store(Request $request) {
        $request->validate([
            'id_provinsi' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO provinsi(id_provinsi, provinsi, kota, kecamatan) VALUES (:id_provinsi, :provinsi, :kota, :kecamatan)',
        [
            'id_provinsi' => $request->id_provinsi,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'kecamatan' => $request->kecamatan,
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

        return redirect()->route('provinsi.index')->with('success', 'Data provinsi berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('provinsi')->where('id_provinsi', $id)->first();

        return view('provinsi.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_provinsi' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE provinsi SET id_provinsi = :id_provinsi, provinsi = :provinsi, kota = :kota, kecamatan = :kecamatan WHERE id_provinsi = :id',
        [
            'id' => $id,
            'id_provinsi' => $request->id_provinsi,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'kecamatan' => $request->kecamatan,
        ]
        );

        // Menggunakan laravel eloquent
        // Admin::where('id_admin', $id)->update([
        //     'id_admin' => $request->id_admin,
        //     'nama_admin' => $request->nama_admin,
        //     'kota' => $request->kota,
        //     'username' => $request->username,
        //     'password' => Hash::make($request->password),
        // ]);

        return redirect()->route('provinsi.index')->with('success', 'Data provinsi berhasil diubah');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM provinsi WHERE id_provinsi = :id_provinsi', ['id_provinsi' => $id]);

        // Menggunakan laravel eloquent
        // Admin::where('id_provinsi', $id)->delete();

        return redirect()->route('provinsi.index')->with('success', 'Data Admin berhasil dihapus');
    }


}
