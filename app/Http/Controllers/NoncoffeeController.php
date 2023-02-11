<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noncoffee;
use Illuminate\Support\Facades\File;

class NoncoffeeController extends Controller
{
    public function index()
    {
        $non_coffee = Noncoffee::all();

        return view('sub_menu.nonCoffee', ["title" => "Non Coffee"], compact([
            'non_coffee'
        ]));
    }
    public function index_admin()
    {
        $non_coffee = Noncoffee::all();
        return view('admin.non_coffee.index', [
            'main' => $non_coffee,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Noncoffee();
        return view('admin.non_coffee.create', compact(
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
        $newName = time() . '_noncoffee' . '.' . $extension;
        $file->move('noncoffee/', $newName);

        $link = 'noncoffee/' . $newName;

        $create = Noncoffee::create([
            'image' => $link,
            'title' => $request->{'title'},
            'description' => $request->{'description'}
        ]);
        return redirect()->action([NoncoffeeController::class, 'index_admin']);
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
        $model = Noncoffee::find($id);
        return view('admin.non_coffee.edit', compact(
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
        $main_cource = Noncoffee::where('id', $id)
            ->first();

        $file = $request->image;
        $extension = $file->getClientOriginalExtension();
        $newName = time() . '_noncoffee' . '.' . $extension;
        $file->move('noncoffee/', $newName);

        $link = 'noncoffee/' . $newName;

        $update = Noncoffee::where('id', $id)
            ->update([
                'image' => $link,
                'title' => $request->{'title'},
                'description' => $request->{'description'}
            ]);
        return redirect()->action([NoncoffeeController::class, 'index_admin']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Noncoffee::where('id', $id)->first();
        File::delete($model->image);
        $model->delete();
        return redirect()->action([NoncoffeeController::class, 'index_admin']);
    }
}
