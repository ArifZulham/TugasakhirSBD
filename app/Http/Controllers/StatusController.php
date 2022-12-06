<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatusController extends Controller
{
    public function index() {
        $datas = DB::select('select * from status');

        return view('status.index')
            ->with('datas', $datas);
    }

    public function create() {
        return view('status.add');
    }

    public function store(Request $request) {
        $request->validate([
            'id_status' => 'required',
            'status' => 'required',
            'waktu_kbm' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO status(id_status, status, waktu_kbm) VALUES (:id_status, :status, :waktu_kbm)',
        [
            'id_status' => $request->id_status,
            'status' => $request->status,
            'waktu_kbm' => $request->waktu_kbm,
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

        return redirect()->route('status.index')->with('success', 'Data status berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('status')->where('id_status', $id)->first();

        return view('status.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_status' => 'required',
            'status' => 'required',
            'waktu_kbm' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE status SET id_status = :id_status, status = :status, waktu_kbm = :waktu_kbm WHERE id_status = :id',
        [
            'id' => $id,
            'id_status' => $request->id_status,
            'status' => $request->status,
            'waktu_kbm' => $request->waktu_kbm,
        ]
        );

        // Menggunakan laravel eloquent
        // Admin::where('id_admin', $id)->update([
        //     'id_admin' => $request->id_admin,
        //     'nama_admin' => $request->nama_admin,
        //     'waktu_kbm' => $request->waktu_kbm,
        //     'username' => $request->username,
        //     'password' => Hash::make($request->password),
        // ]);

        return redirect()->route('status.index')->with('success', 'Data status berhasil diubah');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM status WHERE id_status = :id_status', ['id_status' => $id]);

        // Menggunakan laravel eloquent
        // Admin::where('id_status', $id)->delete();

        return redirect()->route('status.index')->with('success', 'Data Admin berhasil dihapus');
    }


}
