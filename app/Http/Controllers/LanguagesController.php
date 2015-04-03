<?php namespace Codestudy\Http\Controllers;

use Codestudy\Http\Requests\CreateAttributeRequest;
use Codestudy\Http\Requests\UpdateAttributeRequest;
use Codestudy\Language;
use Codestudy\Http\Requests;
use Codestudy\Http\Controllers\Controller;

class LanguagesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $languages = Language::all();

        return view('languages.index', compact('languages'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('languages.create');
    }

    /**
     * @param CreateAttributeRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateAttributeRequest $request)
    {
        Language::create($request->all());

        return redirect()->route('languages.index');


    }

    /**
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $language = Language::findOrFail($id);

        return view('languages.edit', compact('language'));
    }

    /**
     * @param UpdateAttributeRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateAttributeRequest $request, $id)
    {
        $language = Language::findOrFail($id);

        $language->update($request->all());

        return redirect()->route('languages.index');

    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $language = Language::findOrFail($id);
        $language->delete();

        return redirect()->route('languages.index');
    }

}
