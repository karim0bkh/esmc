<?php

namespace App\Http\Controllers;

use App\Models\diplomes;
use Illuminate\Http\Request;
use App\Models\Image;


class DiplomesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->filled('search')){
            $diplome = diplomes::search($request->search)->paginate(6);
        }else {
            // $formation = formations::all();
            $diplome = diplomes::paginate(6);
        }
        return view('diplomes', compact('diplome'));

    }
    public function index2(Request $request)
    {

        $diplome = diplomes::paginate(6);
        return view('showall_dip' , compact('diplome'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_dip');
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

        $save = new diplomes();
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
        return redirect('/diplomes')->with('completed', 'formation has been saved!');

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
        $diplome = diplomes::findOrFail($ID);
        return view('show_dip', compact('diplome'));

    }
    public function show3($id)
    {
        $ID = $id;
        $application = diplomes::findOrFail($ID);
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
        $diplome_e = diplomes::findOrFail($id);
        return view('edit_diplomes', compact('diplome_e'));
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
        $save = diplomes::find($id);
        if($request->file('image') == Null)
        {$save1 = diplomes::find($id);
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

        return redirect('/diplomes/list')->with('completed', 'diplome has been updated');
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

        $diplome = diplomes::findOrFail($ID);
        $diplome->delete();
        return redirect('/diplomes/list')->with('completed', 'diplome has been deleted');

    }
}
