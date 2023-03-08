<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'LastName' => 'required|max:255',
            'email' => 'required|unique:users|max:255',
            'address' => 'required|max:255',
            'Cellphone' => 'required|max:15',
            'CC' => 'required|unique:users|max:10'
        ],$rules=[], $messages = [
            'required' => 'The :attribute field is required.',
            'unique' => 'The :attribute field has already been used',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator,'login')->withInput();
        }

        $user=User::Create([
            'name' => $request->name,
            'last_name' => $request->LastName,
            'email' => $request->email,
            'address' => $request-> address,
            'cellphone' => $request->Cellphone,
            'CC' => $request->CC,
            'id_category' => $request->Category,
            'id_country' => $request->Country,
        ]);

        return redirect('users');
        }
    public function index()
    {
        try {
            $user = User::join('countries', 'users.id_country', '=', 'countries.id')->join('categories', 'users.id_category', '=', 'categories.id')->select('*')->get();

            $country = Country::All();
            $category = Category::All();
            return view('Users.index', compact('user','country',"category"));

        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ]);
        }
    }
    public function show($id)
    {
        try{
            $user = User::where('users.id', $id)->join('countries', 'users.id_country', '=', 'countries.id')->join('categories', 'users.id_category', '=', 'categories.id')->select('*')->get()->first();

            $country = Country::All();
            $category = Category::All();
            return view('Users.update', compact('user','country','category'));
        }catch(\Exeption $th){
        return response()->json([
            'message'->$th->getMessage()
        ]);
        }
    }
    public function update(Request $request)
    {
        try{
                $user = User::find($request->id);
                $user->name = $request->name;
                $user->LastName = $request->LastName;
                $user->email = $request->email;
                $user->address = $request->address;
                $user->Cellphone = $request->Cellphone;
                $user->CC = $request->CC;
                $user->id_category = $request->id_category;
                $user->id_category = $request->id_category;
                $user->save();
                return $request->all();
                //return redirect('users');
            }catch(\Exeption $th){
                return response()->json([
                    'message'->$th->getMessage()
                ]);
                }
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json([
            'message'->$request
        ]);
        //return view('users');
    }




    }

