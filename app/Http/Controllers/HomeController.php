<?php

namespace App\Http\Controllers;

use App\Information;
use App\Models\Product;
use App\Utlity;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home',[
            'informations' => Information::all()
        ]);
    }

    public function create(){

        return view('informations.create');
    }

    public function store(Request $request){

        $rules = [
            'name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'skill' => 'required'
        ];
        $this->validate($request,$rules);

        //upload photo
        if ($request->hasFile('img')){
            $path = Utlity::file_upload($request,'img','Image');
        }
        else {
            $path = null;
        }
        $information = new Information();
        $information->name = $request->get('name');
        $information->email = $request->get('email');
        $information->gender = $request->get('gender');
        $information->skills = $request->get('skill');
        $information->image = $path;

        if ($information->save()) {

            return redirect()->route('information.create')->with('success', 'Data Added successfully Done');
        }
        return redirect()->back()->withInput()->with('failed', 'Data failed on create');

    }

    public function edit($id){
        return view('informations.edit',[
            'information' => Information::find($id)
        ]);
    }

    public function update(Request $request, $id){
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
        $this->validate($request,$rules);

        $information = Information::find($id);
        $information->title = $request->get('title');
        $information->price = $request->get('price');
        $information->description = $request->get('description');
        $path = null;
        if($request->hasFile('img')){
            if(file_exists($information->image)){
                unlink($information->image);
            }
            $path = Utlity::file_upload($request,'img','Product_images');
            $information->image = $path;
        }

        if ($information->save()) {

            return redirect()->route('product.edit', $information->id)->with('success', 'Data Updated successfully Done');
        }
        return redirect()->back()->withInput()->with('failed', 'Data failed on update');

    }

    public function destroy($id){

        $information = Information::findOrFail($id);

        if(file_exists($information->image)){
            unlink($information->image);
        }
        if($information->delete()){

            return redirect()->route('home')->with('success', 'Data Delete successfully');
        }
        return redirect()->back()->withInput()->with('failed', 'Data failed on deleting');

    }
}
