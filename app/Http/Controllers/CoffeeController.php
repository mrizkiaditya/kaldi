<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coffee;
use Illuminate\Support\Facades\File;

class CoffeeController extends Controller
{
    public function index()
    {
        $coffee = Coffee::all();

        return view('sub_menu.coffee', ["title" => "Coffee"], compact([
            'coffee'
        ]));
    }
    public function index_admin()
    {
        $coffee = Coffee::all();
        return view('admin.coffee.index', [
            'main' => $coffee,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Coffee();
        return view('admin.coffee.create', compact(
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
        $newName = time() . '_coffee' . '.' . $extension;
        $file->move('coffee/', $newName);

        $link = 'coffee/' . $newName;

        $create = Coffee::create([
            'image' => $link,
            'title' => $request->{'title'},
            'description' => $request->{'description'}
        ]);
        return redirect()->action([CoffeeController::class, 'index_admin']);
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
        $model = Coffee::find($id);
        return view('admin.coffee.edit', compact(
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
        $main_cource = Coffee::where('id', $id)
            ->first();

        $file = $request->image;
        $extension = $file->getClientOriginalExtension();
        $newName = time() . '_coffee' . '.' . $extension;
        $file->move('coffee/', $newName);

        $link = 'coffee/' . $newName;

        $update = Coffee::where('id', $id)
            ->update([
                'image' => $link,
                'title' => $request->{'title'},
                'description' => $request->{'description'}
            ]);
        return redirect()->action([CoffeeController::class, 'index_admin']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Coffee::where('id', $id)->first();
        File::delete($model->image);
        $model->delete();
        return redirect()->action([CoffeeController::class, 'index_admin']);
    }
}
