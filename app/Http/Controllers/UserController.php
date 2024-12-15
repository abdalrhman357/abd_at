<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(Request $request)
    {
    $data =  $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'location' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);


        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $dest = 'image/';

            $imagew = time() . '.' . $image->getClientOriginalExtension();
            $image->move($dest,$image);
        }

        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->location = $request->location;
        $user->image = '/image/' . $imagew ?? '';
        $user->save();

        return response()->json([
            'Status' => 200,
            'Message' => 'User registered successfuly',
        ]);
    }


}
