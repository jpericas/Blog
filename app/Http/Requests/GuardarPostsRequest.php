<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuardarPostsRequest extends FormRequest
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

        $id = null;
        if($this->post){
            $id = $this->post->id;
        }
        return [
            'title' => 'required|min:5|max:255|unique:posts,title,'.$id,
            'url_clean' => 'required|min:5|max:255',
            'content' => 'required|min:5',
        ];
    }
}
