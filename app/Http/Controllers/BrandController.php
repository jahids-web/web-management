<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Multipic;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Image;

class BrandController extends Controller
{
   public function AllBrand()
   {

      $brands = Brand::latest()->paginate();
      return view('admin.brand.index', compact('brands'));
   }

   public function StoreBrand(Request $request)
   {
      $validatedData = $request->validate(
         [
            'brand_name' => 'required|unique:brands|min:4',
            'brand_image' => 'required|mimes:png,jpg',
         ],
         [
            'brand_name.required' => 'Please Input Brand Name',
            'brand_image.min' => 'Brand Longer Then 4 Characters',
         ]
      );


      $brand_image = $request->file('brand_image');

      // $name_gen = hexdec(uniqid());
      // $img_ext = strtolower($brand_image->getClientOriginalExtension());
      // $img_name = $name_gen.'.'.$img_ext;
      // $up_location = 'image/brand/';
      // $last_img = $up_location. $img_name;
      // $brand_image->move($up_location,$img_name);

      $name_gen = hexdec(uniqid()) . '.' . $brand_image->getClientOriginalExtension();
      'Image'::make($brand_image)->resize(500, 400)->save('image/brand/' . $name_gen);
      $last_img = 'image/brand/' . $name_gen;

      Brand::insert([
         'brand_name' => $request->brand_name,
         'brand_image' => $last_img,
         'created_at' => Carbon::now()
      ]);

   
      return Redirect()->back()->with('success', 'Brand Inserted Successfilly');
   }

   public function Edit($id)
   {
      $brands = Brand::find($id);
      return view('admin.brand.edit', compact('brands'));
   }

   
   public function Update(Request $request, $id)
   {
      $validatedData = $request->validate(
         [
            'brand_name' => 'required|min:4',
         ],
         [
            'brand_name.required' => 'Please Input Brand Name',
            'brand_image.min' => 'Brand Longer Then 4 Characters',
         ]
      );
      $brand_image = $request->file('brand_image');
      $old_image = $request->old_image;

      if($brand_image){
         $name_gen = hexdec(uniqid()) . '.' . $brand_image->getClientOriginalExtension();
         'Image'::make($brand_image)->resize(500, 400)->save('image/brand/' . $name_gen);
         $last_img = 'image/brand/' . $name_gen;

         unlink($old_image);

         Brand::find($id)->update([
            'brand_name' => $request->brand_name,
            'brand_image' => $last_img,
            'created_at' => Carbon::now()
         ]);

         return Redirect()->back()->with('success', 'Brand Update Successfilly');
      }
      else{

         Brand::find($id)->update([
            'brand_name' => $request->brand_name,
            'created_at' => Carbon::now()
         ]);
         return Redirect()->back()->with('success', 'Brand Update Successfilly');
      }
   
   }


   public function Delete($id)
   {
      $image = Brand::find($id);
      $old_image = $image->brand_image;
        unlink($old_image);

      Brand::find($id)->delete();
      return Redirect()->back()->with('success', 'Brand Delete Successfilly');
   }

//// This is  for Multi Image all Methods start////
   public function Multpic(){
      $images = Multipic::all();
      return view('admin.multipic.index',compact('images'));
   }


   public function Storeimg(Request $request){

      $image = $request->file('image');

      foreach ($image as $multi_img) {

         $name_gen = hexdec(uniqid()) . '.' . $multi_img->getClientOriginalExtension();
         'Image'::make($multi_img)->resize(500, 500)->save('image/multi/' . $name_gen);
         $last_img = 'image/multi/' . $name_gen;

         Multipic::insert([

            'image' => $last_img,
            'created_at' => Carbon::now()
         ]);

      } ///end of the foreach
  
      return Redirect()->back()->with('success', 'Brand Inserted Successfilly');

   }
//// This is  for Multi Image all Methods end////

   public function logout(){
      Auth::logout();
      return Redirect()->route('login')->with('success', 'User Logout');
   }





















   // end//
}
