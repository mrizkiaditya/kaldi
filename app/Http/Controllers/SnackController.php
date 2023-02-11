<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Snack;
use Illuminate\Support\Facades\File;

class SnackController extends Controller
{
    public function index()
    {
        $snack = Snack::all();

        return view('sub_menu.snack', ["title" => "Snack"], compact([
            'snack'
        ]));
    }
    public function index_admin()
    {
        $snack = Snack::all();
        return view('admin.snack.index', [
            'main' => $snack,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Snack();
        return view('admin.snack.create', compact(
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
        $newName = time() . '_snack' . '.' . $extension;
        $file->move('snack/', $newName);

        $link = '/snack/' . $newName;

        $create = Snack::create([
            'image' => $link,
            'title' => $request->{'title'},
            'description' => $request->{'description'}
        ]);
        return redirect()->action([SnackController::class, 'index_admin']);
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
        $model = Snack::find($id);
        return view('admin.snack.edit', compact(
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
        $snack = Snack::where('id', $id)
            ->first();

        $file = $request->image;
        $extension = $file->getClientOriginalExtension();
        $newName = time() . '_snack' . '.' . $extension;
        $file->move('snack/', $newName);

        $link = '/snack/' . $newName;

        $update = Snack::where('id', $id)
            ->update([
                'image' => $link,
                'title' => $request->{'title'},
                'description' => $request->{'description'}
            ]);
        return redirect()->action([SnackController::class, 'index_admin']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Snack::where('id', $id)->first();
        File::delete($model->image);
        $model->delete();
        return redirect()->action([SnackController::class, 'index_admin']);
    }
}
