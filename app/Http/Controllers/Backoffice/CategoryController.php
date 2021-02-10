<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Backoffice\Category\StoreRequest;
use App\Http\Requests\Backoffice\Category\UpdateRequest;
use Schema;
use Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->get();

        return view('backoffice.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backoffice.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Category\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $cover = $request->hasFile('cover')
                    ? $request->file('cover')->store('category')
                    : null;

        $category = Category::create(array_merge(
            $request->only(Schema::getColumnListing('categories')),
            compact('cover')
        ));

        $category->featuredCourses()->attach($request->courses);

        return back()->with('success', 'Category has been created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('backoffice.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Category\UpdateRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Category $category)
    {
        if ($request->hasFile('cover')) {
            $cover = $request->file('cover')->store('category');
            Storage::delete($category->cover);
        }
        else $cover = $category->cover;

        $category->update(array_merge(
            $request->only(Schema::getColumnListing('categories')),
            compact('cover')
        ));

        $category->featuredCourses()->sync($request->courses);

        return back()->with('success', 'Category has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return back()->with('success', 'Category has been deleted');
    }
}
