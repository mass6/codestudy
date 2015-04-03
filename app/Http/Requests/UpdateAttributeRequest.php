<?php namespace Codestudy\Http\Requests;

use Illuminate\Support\Facades\Log;

class UpdateAttributeRequest extends Request
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
        $resource = $this->segment(1);

        return [
            'name' => 'required|unique:' . $resource . ',name,' . $this->route($resource),
            'slug' => 'required|unique:' . $resource . ',slug,' . $this->route($resource),
        ];
    }

}
