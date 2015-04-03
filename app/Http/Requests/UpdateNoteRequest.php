<?php namespace Codestudy\Http\Requests;

class UpdateNoteRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'       => 'required|max:120|unique:notes,title,' . $this->route('notes'),
            'body'        => 'required',
            'type'        => 'required',
            'category_id' => 'required',
            'platforms'   => 'array',
            'languages'   => 'array',
            'frameworks'  => 'array',
            'url'         => 'url',
            'tags'        => 'array'
        ];
    }

}
