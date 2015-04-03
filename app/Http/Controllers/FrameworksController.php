<?php namespace Codestudy\Http\Controllers;

use Codestudy\Framework;
use Codestudy\Http\Requests;
use Codestudy\Http\Requests\CreateAttributeRequest;
use Codestudy\Http\Requests\UpdateAttributeRequest;
use Codestudy\Http\Controllers\Controller;

class FrameworksController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $frameworks = Framework::all();

        return view('frameworks.index', compact('frameworks'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('frameworks.create');
    }

    /**
     * @param CreateAttributeRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateAttributeRequest $request)
    {
        Framework::create($request->all());

        return redirect()->route('frameworks.index');


    }

    /**
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $framework = Framework::findOrFail($id);

        return view('frameworks.edit', compact('framework'));
    }

    /**
     * @param UpdateAttributeRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateAttributeRequest $request, $id)
    {
        $framework = Framework::findOrFail($id);

        $framework->update($request->all());

        return redirect()->route('frameworks.index');

    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $framework = Framework::findOrFail($id);
        $framework->delete();

        return redirect()->route('frameworks.index');
    }

}
