<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\http\Libraries\BaseApi;

class StudentsController extends Controller
{
    public function index(Request $request)
    {
         //memanggil data dari input search
        $search = $request->search;
        // memanggil libararies BAseapi method nya index dengan mengirim prameter1 berupa path data dari API nya, parameter2 data untuk mengisi serach_nama API nya
        $data = (new BaseApi)->index('/api/students', ['search_nama' => $search]);
        //ambil respone json nya
        $students = $data->json();
        return view('index')->with(['students' => $students['data']]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }


    public function store(Request $request)
    {
        $data = [
            'nama' => $request->nama,
            'nis' => $request->nis,
            'rombel' => $request->rombel,
            'rayon' => $request->rayon,
        ];
        $proses =(new BaseApi)->store('/api/students/tambah-data', $data);
        if ($proses->failed()) {
            $errors = $proses->json('data');
            return redirect()->back()->with(['errors' => $errors]);
        }else {
            return redirect('/')->with('succes', 'Berhasil menambahkan data baru ke students API');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource
     */
    public function edit(string $id)
    {
        // proses ambil data api ke route REST API /students/{id}
        $data = (new BaseApi)->edit('/api/students/'.$id);
        if ($data->failed()) {
            //kalau gagal proses $data diatas,ambil deskripsi err dari json property data
            $errors = $data->json(['data']);

            return redirect()->back()->with(['errors' => $errors]);
        }else {
            $students = $data->json(['data']);
            return view('edit')->with(['students' => $students]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $payload = [
            'nama' => $request->nama,
            'nis' => $request->nis,
            'rombel' => $request->rombel,
            'rayon' => $request->rayon,
        ];
        // panggil method update dari BaseApi, kirim endpoint (rout update dari REST APInya) dan data ($payload diatas)
        $proses = (new BaseApi)->update('/api/students/update/'.$id, $payload);
        if ($proses->failed()) {
            $errors = $proses->json('data');
            return redirect()->back()->with(['errors' => $errors]);
        }else {
            return redirect('/')->with('succes', 'Berhasil Mengubah Data Siswa Dari API');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $proses = (new BaseApi)->delete('/api/students/delete/'.$id);
        if ($proses->failed()) {
            $errors = $proses->json('data');
            return redirect()->back()->with(['errors' => $errors]);
        }else {
            return redirect('/')->with('succes', 'Berhasil Menghapus Data Sementara Dari API');
        }
    }

    public function trash()
    {
        $proses = (new BaseApi)->trash('/api/students/show/trash');
        if ($proses->failed()) {
            $errors = $proses->json('data');
            return redirect()->back()->with(['errors' => $errors]);
        }else{
            $StudentsTrash = $proses->json('data');
            return view('trash')->with(['StudentsTrash' => $StudentsTrash]);
        }
    }

    public function permanent($id)
    {
        $proses = (new BaseApi)->trash('/api/students/trash/delete/permanent/'.$id);
        if ($proses->failed()) {
            $errors = $proses->json('data');
            return redirect()->back()->with(['errors' => $errors]);
        }else{
            return redirect()->back()->with('succes', 'berhasil menghapus data secara permanent');
        }
    }


    public function restore($id)
    {
        $proses = (new BaseApi)->trash('/api/students/trash/restore/'.$id);
        if ($proses->failed()) {
            $errors = $proses->json('data');
            return redirect()->back()->with(['errors' => $errors]);
        }else{
            return redirect('/')->with('succes', 'berhasil mengembalikan data dari sampah');
        }
    }
}
