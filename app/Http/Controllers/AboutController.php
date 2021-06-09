<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeAbout;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;


class AboutController extends Controller
{
    public function About()
    {
        $abouts = 'DB'::table('home_abouts')->first();
        return view('pages.about',compact('abouts'));
    }

    public function HomeAbout(){
        $homeabout = HomeAbout::latest()->get();
        return view('admin.about.index',compact('homeabout'));
    }
// 
    public function AddAbout(){
        return view('admin.about.create');
    }
// 
    public function StoreAbout(Request $request){

      HomeAbout::insert([
            'title' => $request->title,
            'short_dis' => $request->short_dis,
            'long_dis' => $request->long_dis,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->route('home.about')->with('success','About Inserted Successfully');

    }
// 
    public function EditAbout($id){
        $homeabout = HomeAbout::find($id);
        return view('admin.about.edit',compact('homeabout'));
    }
// 

    public function UpdateAbout(Request $request, $id){
      $update =  HomeAbout::find($id)->update([
            'title' => $request->title,
            'short_dis' => $request->short_dis,
            'long_dis' => $request->long_dis,
        
        ]);

        return Redirect()->route('home.about')->with('success', 'About Update Successfully');

    }

// 

    public function DeleteAbout($id){
        $delete = HomeAbout::find($id)->Delete();
        return Redirect()->back()->with('success', 'About Delete Successfully');
    }



















    // end
}
