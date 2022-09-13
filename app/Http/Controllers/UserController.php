<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate();
        return view('users.index', compact('users'));
    }
    public function create()
    {
        return view('users.add');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        // $request->request->add([ 'akses' => 'admin',]);
        $request->request->add([ 'password' => Hash::make($request->password),]);
        $data=User::create($request->all());
        return redirect()->route('users.index')->with('success', 'Admin Ditambah.');
    }

    public function destroy(User $users,$id)
    {
        $users=$users->find($id);
        $users->delete();
        return redirect()->back()->with('success', 'Admin Berhasil Dihapus.');
    }

    public function show(User $user,$id)
    {
        $user=$user->find($id);
        return view('users.view',compact('user'));
    }

    public function update(Request $request, User $user,$id)
    {
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'string', 'max:255'],
            'password' => ['nullable', 'string', 'confirmed', 'min:8'],
        ]);
        $user = $user->find($id);
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;


        $user->update();
        return redirect()->back()->with('success', 'Admnin di update');
    }

}
