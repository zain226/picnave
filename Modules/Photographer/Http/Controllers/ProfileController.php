<?php

namespace Modules\Photographer\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {

        return view('photographer::profile.index');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function profileEdit()
    {
        $user = Auth::user();
        return view('photographer::profile.edit',get_defined_vars());
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function profileEditSubmit(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->bio = $request->bio;
        $user->instagram_link = $request->instagram_link;

        if($request->file('file'))
        {
            $destinationPath = public_path('/media/users');
            $imageName = time() . '.' . $request->file('file')->extension();
            $request->file('file')->move($destinationPath, $imageName);

            $user->image = $imageName;
        }

        $user->save();
        return redirect()->back()->with('success','Updated sUCCESSFULLY');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('photographer::create');
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
        return view('photographer::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('photographer::edit');
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
