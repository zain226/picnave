<?php

namespace Modules\Admin\Http\Controllers;

use App\Traits\Admin\SearchModelTrait;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Category;
use Modules\Admin\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Renderable
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $searchResults = SearchModelTrait::SearchModel('Category', ['name'], $request->table_filter_search ?? '');

            $searchResults = $searchResults->paginate($request->table_length_limit);
            return view('admin::crud.categories.result', get_defined_vars());
        }
        return view('admin::crud.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::crud.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->all());
        if ($request->file('image')) {
            $destinationPath = public_path('/media/categories');
            $imageName = time() . '.' . $request->file('image')->extension();
            $request->file('image')->move($destinationPath, $imageName);

            $category->image = $imageName;
            $category->save();
        }
        return redirect()->route('admin.categories.index');
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
        $category = Category::findOrFail($id);

        return view('admin::crud.categories.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());

        if ($request->file('image')) {
            $destinationPath = public_path('/media/categories');
            $imageName = time() . '.' . $request->file('image')->extension();
            $request->file('image')->move($destinationPath, $imageName);

            $category->image = $imageName;
            $category->save();
        }
        return redirect()->route('admin.categories.index')->with('message', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        Category::findOrFail($id)->delete();

        return redirect()->route('admin.categories.index')->with('message', 'Deleted Successfully');
    }
}
