<?php

namespace App\Http\Controllers;

use App\Models\frontpage;
use Illuminate\Http\Request;

class FrontpageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $element = frontpage::paginate(5);
        $coun = frontpage::count();

        return view('/dashboard/view_prof' , compact('element','coun'));

    }
    public function index2()
    {
        $element = frontpage::all();

        return view('/welcome' , compact('element'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $coun = frontpage::count();

        return view('/dashboard/prof' , compact('coun'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'title' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'desc' => ['required', 'string', 'max:255'],
        ]);

        $name1 = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->store('public/imgs');
        $request->image->move(public_path('imgs'), $name1);

        $save = new frontpage();
        $save->img_name = $name1;
        $save->path = $path;
        $data = $request->input();

        $save->title = $data['title'];
        $save->name = $data['name'];
        $save->desc = $data['desc'];

        $save->save();
        return back()->with('success', 'front element has been saved!');

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
        $element = frontpage::findOrFail($id);
        return view('/dashboard/prof_edit', compact('element'));
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
        $validatedData = $request->validate([
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'name' => ['required', 'string', 'max:255'],
            'desc' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
        ]);
        $save = frontpage::find($id);
        if($request->file('image') == Null)
        {$save1 = frontpage::find($id);
            $save->img_name = $save1->img_name;
            $save->path = $save1->path;}
        else {

            $name1 = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->store('public/imgs');
            $request->image->move(public_path('imgs'), $name1);


            $save->img_name = $name1;
            $save->path = $path;

        }
        $data = $request->input();
        $save->name = $data['name'];
        $save->desc = $data['desc'];
        $save->title = $data['title'];
        $save->save();

        return redirect('/front_page/view')->with('completed', 'element has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ID = $id;

        $formation = frontpage::findOrFail($ID);
        $formation->delete();
        return redirect('/front_page/view')->with('completed', 'element has been deleted');

    }
}
