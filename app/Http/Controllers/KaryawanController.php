<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawan = Karyawan::all();

        return view('index', compact([
            'karyawan'
        ]));
    }

    public function index_admin()
    {
        $karyawan = Karyawan::all();
        return view('admin.karyawan.index', [
            'main' => $karyawan,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Karyawan;
        return view('admin.karyawan.create', compact(
            'model'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->image;
        $extension = $file->getClientOriginalExtension();
        $newName = time() . '_karyawan' . '.' . $extension;
        $file->move('karyawan/', $newName);

        $link = 'karyawan/' . $newName;

        $create = Karyawan::create([
            'image' => $link,
            'nama' => $request->{'nama'},
            'description' => $request->{'description'}
        ]);
        return redirect()->action([KaryawanController::class, 'index_admin']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Karyawan::find($id);
        return view('admin.karyawan.edit', compact(
            'model'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $main_cource = Karyawan::where('id', $id)
            ->first();

        $file = $request->image;
        $extension = $file->getClientOriginalExtension();
        $newName = time() . '_karyawan' . '.' . $extension;
        $file->move('karyawan/', $newName);

        $link = 'karyawan/' . $newName;

        $update = Karyawan::where('id', $id)
            ->update([
                'image' => $link,
                'nama' => $request->nama,
                'description' => $request->description
            ]);
        return redirect()->action([KaryawanController::class, 'index_admin']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Karyawan::where('id', $id)->first();
        File::delete($model->image);
        $model->delete();
        return redirect()->action([KaryawanController::class, 'index_admin']);
    }
}
