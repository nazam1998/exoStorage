<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreRequestUser;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        return view('welcome',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequestUser $request)
    {
        // $image=$request->file('photo');
        if(empty($request->input('url_photo'))){
            $filename=Storage::put('public',$request->file('file_photo'));
            $image=basename($filename);
        }else{
            $url=$request->input('url_photo');
            $contents = file_get_contents($url);
            $name = substr($url, strrpos($url, '/') + 1);
            $image=Storage::disk('public')->put($name, $contents);
        }
        $user=new User();
        $user->nom=$request->nom;
        $user->age=$request->age;
        $user->email=$request->email;
        $user->photo=$image;
        $user->save();
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::find($id);
        return Storage::disk('public')->download($user->photo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequestUser $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        Storage::disk('public')->delete('storage/'.$user->photo);
        $user->delete();
        return redirect()->route('home');
    }
}
