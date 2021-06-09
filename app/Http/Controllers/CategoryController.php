<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\Category;
use Carbon\Carbon;


class CategoryController extends Controller
{
    public function AllCat()
    {
        $categories = Category::latest()->paginate(4);
        $trachCat = Category::onlyTrashed()->latest()->paginate(4);
        return view('admin.category.index', compact('categories', 'trachCat'));
    }
 
   public function AddCat(Request $request){
        $validatedData  = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ],
        [
            'category_name.required' => 'Please Input Category Name',
            'category_name.max' => 'Category Less Then 255Chars',
        ]);

        // Category::insert([
        //     'category_name' => $request->category_name,
        //     'user_id' => Auth::user()->id,
        //     'created_at' => Carbon::now()
        // ]);

        $category = new Category;
        $category->category_name = $request->category_name;
        $category->user_id = Auth::user()->id;
        $category->save();

        // $data = array();
        // $data['category_name'] = $request->category_name;
        // $data['user_id'] = Auth::user()->id;
        // DB::table('categories')->insert($data);
        return Redirect()->back()->with('success','Category Inserted SuccessFull');

   }

   public function Edit($id){
    // $categories  = Category::find($id);
    $categories = DB::table('categories')->where('id', $id)->first();
    return view('admin.category.edit',compact('categories'));
   }

   public function Update(Request $request,$id){
    // $update = Category::find($id)->update([
    //         'category_name' => $request->category_name,
    //         'user_id' => Auth::user()->id

    // ]);
    $data = array();
    $data['category_name'] = $request->category_name;
    $data['user_id'] = Auth::user()->id;
    DB::table('categories')->where('id', $id)->update($data);
        return Redirect()->route('all.catagory')->with('success', 'Category Update SuccessFull');
   }

   public function SoftDelete($id){
       $delete = Category::find($id)->delete();
        return Redirect()->back()->with('success', 'Category SoftDelete SuccessFull');
   }

   public function Restore($id){
       $delete = Category::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('success', 'Category Restore SuccessFull');
   }

   public function Pdelete($id){
       $delete = Category::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success', 'Category Permanent Delete SuccessFull');
   }



    // CategoryController end  
}
