<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ServicesController extends Controller
{
    public function Services(){
        $service = DB::table('services')->first();
        return view('pages.service',compact('service'));
    }

    public function HomeServices()
    {
        $homeservices = Services::latest()->get();
        return view('admin.servicess.index',compact('homeservices'));
    }
    // 
    // 
    public function AddServ()
    {
        return view('admin.servicess.create');
    }
    // 


    // 
    public function StoreServ(Request $request)
    {

        Services::insert([
            'title' => $request->title,
            'short_dis' => $request->short_dis,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->route('home.services')->with('success', 'About Inserted Successfully');
    }
    // 
    // 
    public function ServStore(Request $request)
    {

        Services::insert([
            'title' => $request->title,
            'short_dis' => $request->short_dis,
        
        ]);

        return Redirect()->route('home.about')->with('success', 'About Inserted Successfully');
    }
    // 
    // 
    public function EditServ($id){
        $homeserv = Services::find($id);
        return view('admin.servicess.edit',compact('homeserv'));
    }  
    // 
    // 
    public function UpdateServ(Request $request ,$id){
      $update = Services::find($id)->update([
            'title' => $request->title,
            'short_dis' => $request->short_dis,

        ]);

        return Redirect()->route('home.about')->with('success', 'About Inserted Successfully');
    }

    // 
    public function DeleteServ($id)
    {
        $delete = Services::find($id)->Delete();
        return Redirect()->back()->with('success', 'About Delete Successfully');
    }

    // 






















    // 
}
