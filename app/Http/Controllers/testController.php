<?php

namespace App\Http\Controllers;

//use http\Env\Request;
use App\Models\User;
use Illuminate\Http\Request;

class testController extends Controller
{
    public function testMethod()
    {
        $users = User::paginate(4);
        return view('welcome', compact('users'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'password' => 'required '
        ]);
        $user = new User();
        $user->name = $request->fname;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return redirect(route('home'))->with('SuccessMsg', 'User successfully added');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'fname' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'password' => 'required '
        ]);
        $user = User::find($id);
        $user->name = $request->fname;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return redirect(route('home'))->with('SuccessMsg', 'User successfully added');
    }
    public function delete($id)
    {
        User::find($id)->delete();
        return redirect(route('home'))->with('successMsg', 'User Deleted SUccessfully');
    }
}
