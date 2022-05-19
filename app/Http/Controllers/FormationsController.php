<?php

namespace App\Http\Controllers;

use App\Models\formations;
use App\Models\Image;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class FormationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->filled('search')){
            $formation = formations::search($request->search)->paginate(6);
        }else {
            // $formation = formations::all();
            $formation = formations::paginate(6);
        }
        return view('formations' , compact('formation'));

    }
    public function index2(Request $request)
    {

        $formation = formations::paginate(6);
        return view('showall' , compact('formation'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
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
            'name' => ['required', 'string', 'max:255'],
            'desc' => ['required', 'string', 'max:255'],
            'prof' => ['required', 'string', 'max:255'],
            'price' => ['required', 'string', 'max:255'],
            'details' => ['required', 'string', 'max:510'],
            'datee' => ['required', 'string', 'max:255'],
        ]);

        $name1 = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->store('public/imgs');
        $request->image->move(public_path('imgs'), $name1);

        $save = new formations();
        $save->img_name = $name1;
        $save->path = $path;
        $data = $request->input();

        $save->name = $data['name'];
        $save->desc = $data['desc'];
        $save->prof = $data['prof'];
        $save->price = $data['price'];
        $save->details = $data['details'];
        $save->datee = $data['datee'];

        $save->save();
        return redirect('/formations')->with('completed', 'formation has been saved!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ID = decrypt($id);
        $formation = formations::findOrFail($ID);
        return view('show', compact('formation'));

    }
    public function show2($id)
    {
        $ID = $id;
        $application = formations::findOrFail($ID);
        return view('apply', compact('application'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $formation_e = formations::findOrFail($id);
        return view('edit_formations', compact('formation_e'));
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
            'prof' => ['required', 'string', 'max:255'],
            'price' => ['required', 'string', 'max:255'],
            'details' => ['required', 'string', 'max:510'],
            'datee' => ['required', 'string', 'max:255'],
        ]);
        $save = formations::find($id);
        if($request->file('image') == Null)
        {$save1 = formations::find($id);
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
        $save->prof = $data['prof'];
        $save->price = $data['price'];
        $save->details = $data['details'];
        $save->datee = $data['datee'];

        $save->save();

        return redirect('/formations/list')->with('completed', 'formation has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ID = decrypt($id);

        $formation = formations::findOrFail($ID);
        $formation->delete();
        return redirect('/formations/list')->with('completed', 'formation has been deleted');

    }
}
