<?php

namespace App\Http\Controllers;
use App\Models\diplomes;
use App\Models\formations;
use auth ;
use App\Models\application;
use Illuminate\Http\Request;
use PDF;
use App\Models\User;

class ApplicationController extends Controller
{
    public function index(Request $request)
    {

        $formation = application::paginate(10);
        return view('/dashboard/addmission' , compact('formation'));

    }
    public function index1(Request $request)
    {

        $formation = application::paginate(100);
        return view('/dashboard/accepter' , compact('formation'));

    }
    public function index2(Request $request)
    {

        $formation = application::paginate(100);
        return view('/dashboard/refuser' , compact('formation'));

    }
    public function store(Request $request , $id)
    {
        $request->validate([
            'addMoreInputFields1.*.acd' => 'required',
            'addMoreInputFields2.*.pro' => 'required',
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'bdate' => ['required', 'date', 'max:255'],
            'phone' => ['required', 'string' , 'max:25'],
            'status' => ['string' , 'max:255'],


        ]);
        $save = new application();
        $save2 = formations::find($id);
        $save->applied = $save2->name;
        $valu1 = [];
        $valu2 = [];
        $save->acd = "";
        $save->pro = "";
        foreach ($request->addMoreInputFields1 as $key => $value) {
            $save->acd = $save->acd.' // '.implode(" ",$value);
        }
        foreach ($request->addMoreInputFields2 as $key => $value) {
            $save->pro = $save->pro.' // '.implode(" ",$value);

           // $valu2 = $valu2 + $value;


        }
       // $vals1 = implode(" ",$valu1);

       // $vals2 = implode(" ",$valu2);

        $data = $request->input();
       // $save->acd = $vals1;
        //$save->pro = $vals2;
        $save->email = Auth::user()->email ;
        $save->name = $data['name'] ;
        $save->bdate = $data['bdate'] ;
        $save->address = $data['address'] ;
        $save->city = $data['city'] ;
        $save->phone = $data['phone'] ;
        $save->save();

        return back()->with('success', 'New application has been added.');
    }
    public function store2(Request $request , $id)
    {
        $request->validate([
            'addMoreInputFields1.*.acd' => 'required',
            'addMoreInputFields2.*.pro' => 'required',
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'bdate' => ['required', 'date', 'max:255'],
            'phone' => ['required', 'string' , 'max:25'],
            'status' => ['string' , 'max:255'],


        ]);
        $save = new application();
        $save2 = diplomes::find($id);
        $save->applied = $save2->name;
        $valu1 = [];
        $valu2 = [];
        $save->acd = "";
        $save->pro = "";
        foreach ($request->addMoreInputFields1 as $key => $value) {
            $save->acd = $save->acd.' // '.implode(" ",$value);
        }
        foreach ($request->addMoreInputFields2 as $key => $value) {
            $save->pro = $save->pro.' // '.implode(" ",$value);

            // $valu2 = $valu2 + $value;


        }
        // $vals1 = implode(" ",$valu1);

        // $vals2 = implode(" ",$valu2);

        $data = $request->input();
        // $save->acd = $vals1;
        //$save->pro = $vals2;
        $save->email = Auth::user()->email ;
        $save->name = $data['name'] ;
        $save->bdate = $data['bdate'] ;
        $save->address = $data['address'] ;
        $save->city = $data['city'] ;
        $save->phone = $data['phone'] ;
        $save->save();

        return back()->with('success', 'New application has been added.');
    }
    public function show($id)
    {
        $ID = $id;
        $application = application::findOrFail($ID);
        return view('/dashboard/application_view', compact('application'));

    }
    public function show3($id)
    {
        $ID = $id;
        $application = application::findOrFail($ID);
        return view('application_view', compact('application'));

    }
    public function show2($id)
    {
        $ID = decrypt($id);
        $user1 = User::find($ID);
        $applications = application::where('email' , $user1->email)->paginate(6);
        return view('my-applications', compact('applications'));

    }
    public function accept($id)
    {

        $save = application::find($id);
        $save->status = 1 ;
        $save->save();

        return redirect('/addmission')->with('completed', 'accept has been updated');
    }
    public function reject( $id)
    {
        $save = application::find($id);
        $save->status = -1 ;
        $save->save();

        return redirect('/addmission')->with('completed', 'reject has been updated');
    }
    public function downloadPDF($id){
        $application = application::find($id);

        $pdf = PDF::loadView('pdf', compact('application'));
        return $pdf->download('application_'.$application->name.'.pdf');

    }


}
