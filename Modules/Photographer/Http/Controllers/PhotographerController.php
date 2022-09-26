<?php

namespace Modules\Photographer\Http\Controllers;

use App\Models\Images;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Entities\Category;
use Modules\Photographer\Http\Requests\UploadRequest;
use Image;

class PhotographerController extends Controller
{

    public function upload()
    {
        $categories = Category::get();
        return view('photographer::media.upload', get_defined_vars());
    }

    public function uploadSubmit(UploadRequest $request)
    {
        foreach ($request->category_id as $key => $category) {
            $image = $request->image[$key];
            $val = rand(9999, 2);
            $img = $val . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/media/thumb');
            Image::make($image->getRealPath())->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $img);
            $destinationPath = public_path('/media/real');
            $imageName = time() . '.' . $request->image[$key]->extension();
            $request->image[$key]->move($destinationPath, $imageName);

            Images::create([
                'user_id' => 1,
                'category_id' => $category,
                'title' => $request->title[$key],
                'description' => $request->description[$key],
                'main_image' => $imageName,
                'thumbnail' => $img,
                'modal_image' => $img,
            ]);
        }
        return redirect()->route('photographer.upload')->with('message', 'Created Successfully');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('photographer::index');
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
