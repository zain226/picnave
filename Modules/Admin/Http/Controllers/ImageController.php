<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Images;
use App\Traits\Admin\SearchModelTrait;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Category;
use Image;
use Modules\Admin\Http\Requests\ImageRequest;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $searchResults = SearchModelTrait::SearchModel('Images', ['title'], $request->table_filter_search ?? '');

            $searchResults = $searchResults->paginate($request->table_length_limit);
            return view('admin::crud.images.result', get_defined_vars());
        }
        return view('admin::crud.images.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $categories = Category::get();
        return view('admin::crud.images.create', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(ImageRequest $request)
    {
        $image = $request->file('image');
        $image1 = $request->file('image');
        $val = rand(9999, 2);
        $img = $val . time() . '.' . $image->getClientOriginalExtension();
        $val = rand(9999, 2);
        $img1 = $val . time() . '.' . $image1->getClientOriginalExtension();
        $destinationPath = public_path('/media/thumb');
        Image::make($image->getRealPath())->resize(800, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . '/' . $img);
        $destinationPath = public_path('/media/medium');
        Image::make($image1->getRealPath())->resize(1200, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . '/' . $img1);
        $destinationPath = public_path('/media/real');
        $imageName = time() . '.' . $request->file('image')->extension();
        $request->file('image')->move($destinationPath, $imageName);

        Images::create([
            'user_id' => 1,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->descrip,
            'main_image' => $imageName,
            'thumbnail' => $img,
            'modal_image' => $img1,
        ]);

        return redirect()->route('admin.images.index')->with('message', 'Created Successfully');
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
        $categories = Category::get();
        $image = Images::findOrFail($id);
        return view('admin::crud.images.edit',get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(ImageRequest $request, $id)
    {
        $image = Images::findOrFail($id);
        $image->category_id = $request->category_id;
        $image->title = $request->title;
        $image->description = $request->descrip;

        if ($request->file('image')) {
            $image = $request->file('image');
            $image1 = $request->file('image');
            $val = rand(9999, 2);
            $img = $val . time() . '.' . $image->getClientOriginalExtension();
            $val = rand(9999, 2);
            $img1 = $val . time() . '.' . $image1->getClientOriginalExtension();
            $destinationPath = public_path('/media/thumb');
            Image::make($image->getRealPath())->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $img);
            $destinationPath = public_path('/media/medium');
            Image::make($image1->getRealPath())->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $img1);
            $destinationPath = public_path('/media/real');
            $imageName = time() . '.' . $request->file('image')->extension();
            $request->file('image')->move($destinationPath, $imageName);

            $image->main_image = $imageName;
            $image->main_image = $img;
            $image->modal_image = $img1;
        }


        $image->save();

        return redirect()->route('admin.images.index')->with('message', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
       Images::findOrFail($id)->delete();

        return redirect()->route('admin.images.index')->with('message', 'Deleted Successfully');
    }
}
