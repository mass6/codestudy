<?php namespace Codestudy\Http\Controllers;

use Codestudy\Http\Requests\CreateAttributeRequest;
use Codestudy\Http\Requests\UpdateAttributeRequest;
use Codestudy\Tag;
use Codestudy\Http\Requests;
use Codestudy\Http\Controllers\Controller;


class TagsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $tags = Tag::all();

        return view('tags.index', compact('tags'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * @param CreateAttributeRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateAttributeRequest $request)
    {
        Tag::create($request->all());

        return redirect()->route('tags.index');
    }

    /**
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $tag = Tag::findOrFail($id);

        return view('tags.edit', compact('tag'));
    }

    /**
     * @param UpdateAttributeRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateAttributeRequest $request, $id)
    {
        $tag = Tag::findOrFail($id);

        $tag->update($request->all());

        return redirect()->route('tags.index');

    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();

        return redirect()->route('tags.index');
    }

}
