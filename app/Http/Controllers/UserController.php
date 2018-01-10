<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class UserController extends Controller
{
    use SendsPasswordResetEmails;

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['verificationForm', 'verifyUser']]);
    }

    public function dashboard()
    {
        return view('control-panel.dashboard');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role != 'Admin') {
            abort(403);
        }

        $users = User::all();

        return view('control-panel.user.all', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->role != 'Admin') {
            abort(403);
        }

        return view("control-panel.user.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->role != 'Admin') {
            abort(403);
        }

        $request->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:users,email',
            'role'  => 'required|in:Admin,Staff'
        ]);

        $user = User::create($request->all() + ['password' => str_random(60),]);

        DB::table('user_activation')->insert([
            'email' => $user->email,
            'token' => $token = str_random(60)
        ]);

        $user->sendUserCreateNotification($token, $user);

        return response()->json([
            'success'   => "$user->name created successfully. An activation email has been sent to $user->email",
            'location'  => true
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->role != 'Admin') {
            abort(403);
        }


        $user = User::findOrFail($id);

        return view('control-panel.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Auth::user()->role != 'Admin') {
            abort(403);
        }

        $request->validate([
            'id'    => 'required|exists:users,id',
            'name'  => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'role'  => 'required|in:Admin,Staff'
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());

        return response()->json([
            'success'   => "$user->name updated successfully",
            'location'  => true
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editStatus($id)
    {
        if(Auth::user()->role != 'Admin') {
            abort(403);
        }

        $user = User::findOrFail($id);

        return view('control-panel.user.status', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request, $id)
    {
        if(Auth::user()->role != 'Admin') {
            abort(403);
        }

        $request->validate([
            'id'        => 'required|exists:users',
            'active'    => 'required|boolean',
        ]);

        $user = User::findOrFail($id);

        if(!! $request->active) {
            $user->active = FALSE;
        } else {
            $user->active = TRUE;
        }

        $user->save();

        return response()->json([
            'success'   => "$user->name updated successfully.",
            'location'  => true
        ], 200);
    }

    public function delete($id)
    {
        if(Auth::user()->role != 'Admin') {
            abort(403);
        }

        $user = User::findOrFail($id);

        return view('control-panel.user.delete', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if(Auth::user()->role != 'Admin') {
            abort(403);
        }

        $request->validate([
            'id' => 'required|exists:users',
        ]);

        $user = User::findOrFail($id);

        $user->delete();

        return response()->json([
            'warning'   => "$user->name deleted successfully.",
            'location'  => true
        ], 200);
    }

    /**
     * Show form to set password and activate user account
     * for the specified resource.
     *
     * @param $token
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function verificationForm($token)
    {
        $token = DB::table('user_activation')->where('token',$token)->first();

        if(!$token) {
            return redirect('login')
                ->with('warning', 'Invalid Token. <br/> Your link is expired.');
        }

        return view('auth.passwords.user-reset', compact('token'));
    }

    /**
     * Activate the specified user account and
     * remove token from DB.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verifyUser(Request $request)
    {
        $request->validate([
            'email'     => 'required|email|max:191|exists:users,email|exists:user_activation,email',
            'password'  => 'required|string|min:8|confirmed',
            'token'     => 'required|exists:user_activation,token'
        ]);

        $token = DB::table('user_activation')
            ->where('token',$request->token)
            ->where('email',$request->email)
            ->first();

        if(!$token) {
            return back()->with('warning', 'Invalid Email.');
        }

        User::where('email', $request->email)
            ->update([
                'active' => TRUE,
                'password' => bcrypt($request->password)
            ]);

        DB::table('user_activation')->where('email', $request->email)->delete();

        return redirect('login')
            ->with('message', 'Password Updated Successfully. <br/> You can login to portal.');
    }

}