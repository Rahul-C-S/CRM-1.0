<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserSaveRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Http\Request;

class Users extends Controller
{
    public function index()
    {

        if ($this->hasPermission()) {
            $users = User::paginate();
            return view('user.list', compact('users'));
        } else {

            return redirect()->route('dashboard')->with('error_message', 'Invalid request!');
        }
    }

    public function create()
    {
        if ($this->hasPermission()) {
        $user_groups = UserGroup::where('status', '=', 1)->get();

        return view('user.create', compact('user_groups'));
        }
        return redirect()->route('dashboard')->with('error_message', 'Invalid request!');
    }

    public function save(UserSaveRequest $request)
    {
        if ($this->hasPermission()) {
            $input = $request->validated();

            User::create($input);

            return redirect()->route('users.list')->with('success_message', 'User created Successfully!');
        } else {

            return redirect()->route('dashboard')->with('error_message', 'Invalid request!');
        }
    }

    public function edit($id)
    {
        if ($this->hasPermission()) {

            $user = User::find(decrypt($id));

            if($user != null){
                $user_groups = UserGroup::where('status', '=', 1)->get();
                return view('user.edit', compact('user', 'user_groups'));
            }
            return redirect()->route('users.list')->with('error_message', 'Invalid User!');


           
         }

        return redirect()->route('dashboard')->with('error_message', 'Invalid request!');
    }

    public function update(UserUpdateRequest $request)
    {
        if ($this->hasPermission()) { 
            $input = $request->validated();
            User::find(decrypt($request->id))->update($input);
            return redirect()->route('users.list')->with('success_message', 'User has been Updated!');

        }

        return redirect()->route('dashboard')->with('error_message', 'Invalid request!');
    }

    public function delete($id)
    {
        if ($this->hasPermission()) { 

            $user = User::find(decrypt($id));

            $this->printr($user);
            if ($user != null) {
                $user->delete();
                return redirect()->route('users.list')->with('success_message', 'User has been Deleted!');
            }

            return redirect()->route('users.list')->with('error_message', 'Unable to delete!');
        }

        return redirect()->route('dashboard')->with('error_message', 'Invalid request!');
    }
}
