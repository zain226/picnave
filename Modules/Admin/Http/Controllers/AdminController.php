<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Support\Renderable;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class AdminController extends Controller
{

    public function login()
    {
        return view('admin::auth.login');
    }

    public function loginSubmit(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();

        return redirect()->route('admin.index')->with('message', 'You have logged in Successfully.');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('admin.login')->with('message', 'Logout Successfully');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('admin::pages.profile', get_defined_vars());
    }


    public function profileSubmit(Request $request)
    {
//        dd($request->all());
        $user = User::findOrFail(Auth::user()->id);
        $user->name = $request->name;
        $user->user_name = $request->user_name;
        if ($request->image) {
            $destinationPath = public_path('/users/images');
            $imageName = time() . '.' . $request->file('image')->extension();
            $request->file('image')->move($destinationPath, $imageName);

            $user->image = $imageName;
        }
        $user->save();

        return redirect()->route('admin.profile')->with('message', 'Updated Successfully');

    }

    public function changePassword(PasswordRequest $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('admin.profile')->with('message', 'Updated Successfully');
    }

    public function changeLayout(Request $request)
    {
        if ($request->type == 'toggle') {
            if (session('toggle')) {
                $value = \Illuminate\Support\Facades\Session::get('toggle') == 'disc' ? 'circle' : 'disc';
                Session::put('toggle', $value);
            } else {
                Session::put('toggle', 'circle');
            }
            $remove = session('toggle') == 'disc' ? 'menu-collapsed' : 'menu-expanded';
            $add = session('toggle') == 'disc' ? 'menu-expanded' : 'menu-collapsed';

            return response()->json(['toggle' => true, 'type' => session('toggle'), 'remove' => $remove, 'add' => $add]);
        } else {
            if (Session::has('layout')) {
                $value = Session::get('layout') == 'sun' ? 'moon' : 'sun';
                Session::put('layout', $value);
            } else {
                Session::put('layout', 'moon');
            }
            return response()->json(['layout' => true, 'type' => session('layout')]);
        }

    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $user = Auth::user();
        return view('admin::index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
