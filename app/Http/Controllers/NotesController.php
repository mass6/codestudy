<?php namespace Codestudy\Http\Controllers;

use Codestudy\Note;
use Codestudy\Http\Requests;
use Codestudy\Http\Requests\CreateNoteRequest;
use Codestudy\Http\Requests\UpdateNoteRequest;
use Codestudy\Services\SearchService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NotesController extends Controller
{

    // Array of possible attributes submitted
    protected $attributes = [
        ['name' => 'platforms', 'class' => 'Codestudy\Platform'],
        ['name' => 'languages', 'class' => 'Codestudy\Language'],
        ['name' => 'frameworks', 'class' => 'Codestudy\Framework'],
        ['name' => 'tags', 'class' => 'Codestudy\Tag'],
    ];

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $notes = Note::latest()->get();

        return view('notes.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        list($categories, $platforms, $languages, $frameworks, $tags) = $this->fetchAttributesDataForSelectFields();

        return view('notes.create', compact('categories', 'platforms', 'languages', 'frameworks', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateNoteRequest $request
     * @return Response
     */
    public function store(CreateNoteRequest $request)
    {
        $note = Note::create($request->all());

        $this->saveNoteAttributes($request, $this->attributes, $note);

        Session::flash('message', 'Note has been successfully created.');

        if ($request->has('continue'))
            return redirect()->route('notes.edit', $note->id);

        return redirect()->route('notes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $note = Note::findOrFail($id);

        return view('notes.show', compact('note'));
    }

    public function search(Request $request, SearchService $searchService)
    {
        $search = $request->get('searchbox');
        $notes = $searchService->find($search);

        return view('notes.search', compact('search', 'notes'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $note = Note::findOrFail($id);

        list($categories, $platforms, $languages, $frameworks, $tags) = $this->fetchAttributesDataForSelectFields();

        return view('notes.edit', compact('note', 'categories', 'platforms', 'languages', 'frameworks', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateNoteRequest $request
     * @param  int $id
     * @return Response
     */
    public function update(UpdateNoteRequest $request, $id)
    {
        $note = Note::findOrFail($id);
        $note->update($request->all());

        $this->saveNoteAttributes($request, $this->attributes, $note);

        Session::flash('message', 'Note has been successfully updated.');

        if ($request->has('continue'))
            return redirect()->route('notes.edit', $note->id);

        return redirect()->route('notes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $note = Note::findOrFail($id);
        $note->delete();

        return redirect()->route('notes.index');
    }

    /**
     * @return array
     */
    private function fetchAttributesDataForSelectFields()
    {
        $categories = $this->getSelectFieldList('Category', 'Code');
        $platforms = $this->getSelectFieldList('Platform');
        $languages = $this->getSelectFieldList('Language');
        $frameworks = $this->getSelectFieldList('Framework');
        $tags = $this->getSelectFieldList('Tag');

        return array($categories, $platforms, $languages, $frameworks, $tags);
    }

    protected function getSelectFieldList($class, $defaultOption = null, $optionName = 'name', $optionId = 'id')
    {
        $class = getAppNamespace() . $class;

        if (class_exists($class))
        {
            // Place the default option at the front of the lists array
            if ($defaultOption)
            {
                return $class::where($optionName, $defaultOption)->lists($optionName, $optionId) +
                    $class::where($optionName, '!=', $defaultOption)->lists($optionName, $optionId);
            }
            return $class::lists($optionName, $optionId);
        }
        return null;
    }

    /**
     * @param UpdateNoteRequest|Request $request
     * @param $attributes
     * @param $note
     */
    private function saveNoteAttributes(Request $request, $attributes, $note)
    {
        // Check if attributes were submitted and create the related records.
        foreach ($attributes as $attribute) {
            $this->syncAttributes($note, $attribute, $request->get($attribute['name']));
        }
    }

    /**
     * @param Note $note
     * @param $attribute
     * @param $attributeValues
     * @return bool
     */
    private function syncAttributes(Note $note, Array $attribute, $attributeValues)
    {
        if (is_null($attributeValues)) {
            // delete any related models
            $note->$attribute['name']()->detach();

            return false;
        }

        // retrieve attribute models
        $attributeIds = $this->getAttributeIds($attribute['class'], $attributeValues);

        // sync related models
        $note->$attribute['name']()->sync($attributeIds);

        return true;
    }

    /**
     * @param $class
     * @param array $attributeValues
     * @return array
     */
    private function getAttributeIds($class, Array $attributeValues)
    {
        $ids = [];

        foreach ($attributeValues as $value) {
            if (!$model = $class::find($value))
                $model = $this->createAttribute($class, $value);

            $ids[] = $model->id;
        }

        return $ids;
    }

    /**
     * @param $class
     * @param $value
     * @return mixed
     */
    private function createAttribute($class, $value)
    {
        return $class::create([
            'name' => $value, 'slug' => str_slug($value)
        ]);
    }

}
