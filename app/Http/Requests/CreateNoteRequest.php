<?php namespace Codestudy\Http\Requests;

use Codestudy\Http\Requests\Request;

class CreateNoteRequest extends Request
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
            'title'       => 'required|max:120|unique:notes,title',
            'body'        => 'required',
            'type'        => 'required',
            'category_id' => 'required|exists:categories,id',
            'platforms'   => 'array',
            'languages'   => 'array',
            'frameworks'  => 'array',
            'url'         => 'url',
            'tags'        => 'array'
        ];
    }

}
