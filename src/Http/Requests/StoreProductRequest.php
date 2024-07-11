<?php

namespace Apydevs\Products\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|integer|exists:categories,id', // Assuming you have a categories table
            'status' => 'required|string|in:active,inactive,draft',
            'file-upload.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation for each image file
            'quickcode' => 'nullable|string|max:100',
            'sku' => 'nullable|string|max:100',
            'baseprice' => 'required|numeric|min:0',
            'tier1' => 'required|numeric|min:0',
            'tier2' => 'required|numeric|min:0',
            'tier3' => 'required|numeric|min:0',
            'main.*' => 'image|mimes:jpeg,png,jpg,jpeg|max:12048', // Validation for each image file
        ];
    }

    public function messages()
    {
        return [
            'file-upload.*.required' => 'Please upload at least one image.',
            'file-upload.*.image' => 'Each file must be an image.',
            'file-upload.*.mimes' => 'Each image must be a file of type: jpeg, png, jpg, gif, svg.',
            'file-upload.*.max' => 'Each image may not be greater than 2048 kilobytes.',
            'main.*.required' => 'Please upload at least one image.',
            'main.*.image' => 'Each file must be an image.',
            'main.*.mimes' => 'Each image must be a file of type: jpeg, png, jpg.',
            'main.*.max' => 'Each image may not be greater than 12048 kilobytes.',
        ];
    }
}
