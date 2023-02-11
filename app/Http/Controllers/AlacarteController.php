<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alacarte;
use Illuminate\Support\Facades\File;

class AlacarteController extends Controller
{
    public function index()
    {
        $ala_carte = Alacarte::all();

        return view('sub_menu.alaCarte', ["title" => "Ala Carte"], compact([
            'ala_carte'
        ]));
    }
    public function index_admin()
    {
        $ala_carte = Alacarte::all();
        return view('admin.ala_carte.index', [
            'main' => $ala_carte,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Alacarte();
        return view('admin.ala_carte.create', compact(
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
        $newName = time() . '_alacarte' . '.' . $extension;
        $file->move('alacarte/', $newName);

        $link = 'alacarte/' . $newName;

        $create = Alacarte::create([
            'image' => $link,
            'title' => $request->{'title'},
            'description' => $request->{'description'}
        ]);
        return redirect()->action([AlacarteController::class, 'index_admin']);
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
        $model = Alacarte::find($id);
        return view('admin.ala_carte.edit', compact(
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
        $ala_carte = Alacarte::where('id', $id)
            ->first();

        $file = $request->image;
        $extension = $file->getClientOriginalExtension();
        $newName = time() . '_alacarte' . '.' . $extension;
        $file->move('alacarte/', $newName);

        $link = 'alacarte/' . $newName;

        $update = Alacarte::where('id', $id)
            ->update([
                'image' => $link,
                'title' => $request->{'title'},
                'description' => $request->{'description'}
            ]);
        return redirect()->action([AlacarteController::class, 'index_admin']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Alacarte::where('id', $id)->first();
        File::delete($model->image);
        $model->delete();
        return redirect()->action([AlacarteController::class, 'index_admin']);
    }
}
