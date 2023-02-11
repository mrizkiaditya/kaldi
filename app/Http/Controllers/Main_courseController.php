<?php

namespace App\Http\Controllers;

use App\Models\Main_course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class Main_courseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $main_course = Main_course::all();

        return view('sub_menu.mainCourse', ["title" => "Main Course"], compact([
            'main_course'
        ]));
    }
    public function index_admin()
    {
        $main_course = Main_course::all();
        return view('admin.main_course.index', [
            'main' => $main_course,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Main_course;
        return view('admin.main_course.create', compact(
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
        $newName = time() . '_product' . '.' . $extension;
        $file->move('product/', $newName);

        $link = 'product/' . $newName;

        $create = Main_course::create([
            'image' => $link,
            'title' => $request->{'title'},
            'description' => $request->{'description'}
        ]);
        return redirect()->action([Main_courseController::class, 'index_admin']);
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
        $model = Main_course::find($id);
        return view('admin.main_course.edit', compact(
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
        $main_cource = Main_course::where('id', $id)
            ->first();

        $file = $request->image;
        $extension = $file->getClientOriginalExtension();
        $newName = time() . '_product' . '.' . $extension;
        $file->move('product/', $newName);

        $link = 'product/' . $newName;

        $update = Main_course::where('id', $id)
            ->update([
                'image' => $link,
                'title' => $request->title,
                'description' => $request->description
            ]);
        return redirect()->action([Main_courseController::class, 'index_admin']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Main_course::where('id', $id)->first();
        File::delete($model->image);
        $model->delete();
        return redirect()->action([Main_courseController::class, 'index_admin']);
    }
}
