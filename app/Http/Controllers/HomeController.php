<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Carbon\Carbon;
use Image;
use Auth;
use App\Models\User;

class HomeController extends Controller 
{

  public function UserInfo()
  {
    $users = User::all();
    return view('admin.users.index', compact('users'));
  }
  // 
  public function HomeSlider(){
      $sliders = Slider::latest()->get();
      return view('admin.slider.index',compact('sliders'));
  }
  // 
  public function AddSlider(){
    return view('admin.slider.create');
  }
  // 
  public function StoreSlider(Request $request){
    $slider_image = $request->file('image');


    $name_gen = hexdec(uniqid()) . '.' . $slider_image->getClientOriginalExtension();
    'Image'::make($slider_image)->resize(1920, 1088)->save('image/slider/' . $name_gen);
    $last_img = 'image/slider/' . $name_gen;

    Slider::insert([
      'title' => $request->title,
      'description' => $request->description,
      'image' => $last_img,
      'created_at' => Carbon::now()
    ]);

    return Redirect()->route('home.slider')->with('success', 'Slider Image Successfilly');
  }
  // 

  public function Edit($id)
  {
    $sliders = Slider::find($id);
    return view('admin.slider.edit', compact('sliders'));
  }

  // 
  public function Update(Request $request, $id)
  {
  
    $image = $request->file('image');
    $old_image = $request->old_image;

    if ($image) {
      $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
      'Image'::make($image)->resize(1920, 1088)->save('image/slider/'.$name_gen);
      $last_img = 'image/slider/'.$name_gen;

      unlink($old_image);

      Slider::find($id)->update([
        'title' => $request->title,
        'description' => $request->description,
        'image' => $last_img,
        'created_at' => Carbon::now()
      ]);

      return Redirect()->back()->with('success', 'Slider Update Successfilly');
    } else {

      Slider::find($id)->update([
        'title' => $request->title,
        'description' => $request->description,
        
        'created_at' => Carbon::now()
      ]);
      return Redirect()->back()->with('success', 'Slider Update Successfilly');
    }
  }
// 

  public function Delete($id)
  {
    $image = Slider::find($id);
    $old_image = $image->image;
    unlink($old_image);

    Slider::find($id)->delete();
    return Redirect()->back()->with('success', 'Slider Delete Successfilly');
  }
























  // end
}
