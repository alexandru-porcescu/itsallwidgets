<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFlutterApp extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'title' => 'required|unique:flutter_apps',
            'slug' => 'required|unique:flutter_apps',
            'gif' => 'mimes:gif|dimensions:width=1080,height=1920|max:10000',
            'screenshot' => 'required|image|mimes:png|dimensions:width=1080,height=1920|max:2500',
            'screenshot_1' => 'image|mimes:png|dimensions:width=1080,height=1920|max:2500',
            'screenshot_2' => 'image|mimes:png|dimensions:width=1080,height=1920|max:2500',
            'screenshot_3' => 'image|mimes:png|dimensions:width=1080,height=1920|max:2500',
            'short_description' => 'required|max:250',
            'long_description' => 'required',
        ];

        if (request()->apple_url) {
            $rules['apple_url'] = 'unique:flutter_apps';
        }

        if (request()->google_url) {
            $rules['google_url'] = 'unique:flutter_apps';
        }

        return $rules;
    }
}
