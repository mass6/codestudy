<?php namespace Codestudy\Http\Controllers;

use Codestudy\Category;
use Codestudy\Http\Requests;
use Codestudy\Http\Controllers\Controller;

use Codestudy\Http\Requests\CreateAttributeRequest;
use Codestudy\Http\Requests\UpdateAttributeRequest;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(CreateAttributeRequest $request)
    {
        Category::create($request->all());

        return redirect()->route('categories.index');


    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('categories.edit', compact('category'));
    }

    /**
     * @param UpdateAttributeRequest $request
     * @param $id
     * @internal param $slug
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateAttributeRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('categories.index');

    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index');
    }

}
