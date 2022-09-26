<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Images;
use App\Models\User;
use App\Traits\Admin\SearchModelTrait;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PhotographerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $searchResults = SearchModelTrait::SearchModel('User', ['name'], $request->table_filter_search ?? '','contributor');

            $searchResults = $searchResults->paginate($request->table_length_limit);
            return view('admin::photographer.result', get_defined_vars());
        }
        return view('admin::photographer.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $images = Images::take(6)->get();
        $user = User::with('images')->findOrFail($id);
        return view('admin::photographer.show',get_defined_vars());
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function photographerImages(Request $request , $type = null)
    {
        if ($request->ajax()) {
            $searchResults = SearchModelTrait::SearchModel('Images', ['title'], $request->table_filter_search ?? '',$type);

            $searchResults = $searchResults->paginate($request->table_length_limit);
            return view('admin::photographer.images.result', get_defined_vars());
        }
        return view('admin::photographer.images.index');
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


    public function toggleStatus($id)
    {
        $user = User::findOrFail($id);
        $user->status = $user->status == 1 ? 0 : 1;
        $user->save();
        return redirect()->back()->with('message','Status Changed Successfully');
    }
    public function photographerImagesStatus($id)
    {
        $image = Images::findOrFail($id);
        $image->status = $image->status == null ? 1 : null;
        $image->save();
        return redirect()->back()->with('message','Status Changed Successfully');
    }
}
