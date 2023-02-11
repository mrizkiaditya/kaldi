<?php

namespace App\Http\Controllers;

use App\Models\Pasta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PastaController extends Controller
{
    public function index()
    {
        $pasta = Pasta::all();

        return view('sub_menu.pasta', ["title" => "Pasta"], compact([
            'pasta'
        ]));
    }
    public function index_admin()
    {
        $pasta = Pasta::all();
        return view('admin.pasta.index', [
            'main' => $pasta,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Pasta();
        return view('admin.pasta.create', compact(
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
        $newName = time() . '_pasta' . '.' . $extension;
        $file->move('pasta/', $newName);

        $link = '/pasta/' . $newName;

        $create = Pasta::create([
            'image' => $link,
            'title' => $request->{'title'},
            'description' => $request->{'description'}
        ]);
        return redirect()->action([PastaController::class, 'index_admin']);
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
        $model = Pasta::find($id);
        return view('admin.pasta.edit', compact(
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
        $pasta = Pasta::where('id', $id)
            ->first();

        $file = $request->image;
        $extension = $file->getClientOriginalExtension();
        $newName = time() . '_pasta' . '.' . $extension;
        $file->move('pasta/', $newName);

        $link = '/pasta/' . $newName;

        $update = Pasta::where('id', $id)
            ->update([
                'image' => $link,
                'title' => $request->{'title'},
                'description' => $request->{'description'}
            ]);
        return redirect()->action([PastaController::class, 'index_admin']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Pasta::where('id', $id)->first();
        File::delete($model->image);
        $model->delete();
        return redirect()->action([PastaController::class, 'index_admin']);
    }
}
