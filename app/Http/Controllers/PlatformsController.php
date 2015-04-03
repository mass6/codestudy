<?php namespace Codestudy\Http\Controllers;

use Codestudy\Http\Requests\CreateAttributeRequest;
use Codestudy\Http\Requests\UpdateAttributeRequest;
use Codestudy\Platform;
use Codestudy\Http\Requests;
use Codestudy\Http\Controllers\Controller;


class PlatformsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $platforms = Platform::all();

        return view('platforms.index', compact('platforms'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('platforms.create');
    }

    /**
     * @param CreateAttributeRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateAttributeRequest $request)
    {
        Platform::create($request->all());

        return redirect()->route('platforms.index');


    }

    /**
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $platform = Platform::findOrFail($id);

        return view('platforms.edit', compact('platform'));
    }

    /**
     * @param UpdateAttributeRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateAttributeRequest $request, $id)
    {
        $platform = Platform::findOrFail($id);

        $platform->update($request->all());

        return redirect()->route('platforms.index');

    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $platform = Platform::findOrFail($id);
        $platform->delete();

        return redirect()->route('platforms.index');
    }

}
