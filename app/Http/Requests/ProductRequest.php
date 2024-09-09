<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        return $this->method() == "POST" ? $this->onStore() : $this->onUpdate();
    }

    public function onStore(): array
    {
        return [
            'section_id' => ['required', 'integer' ,'exists:sections,id'],
            'color' => ['nullable', 'string', 'min:2', 'max:20', 'required_without_all:model,size'],
            'model' => ['nullable', 'string', 'min:2', 'max:20', 'required_without_all:color,size'],
            'size' => ['nullable', 'integer', 'min:1', 'max:100', 'required_without_all:color,model'],
            'image' => ['nullable' , 'file' , 'image' , 'mimes:jpeg,png,gif,bmp,svg,tiff,webp'],
            'quantity' => ['required' , 'integer' , 'min:1', 'max:1000'],
        ];
    }
    public function onUpdate(): array
    {
        return [
            'color' => ['nullable', 'string', 'min:2', 'max:20', 'required_without_all:model,size'],
            'model' => ['nullable', 'string', 'min:2', 'max:20', 'required_without_all:color,size'],
            'size' => ['nullable', 'integer', 'min:1', 'max:100', 'required_without_all:color,model'],
            'image' => ['nullable' , 'file' , 'image' , 'mimes:jpeg,png,gif,bmp,svg,tiff,webp'],
            // 'status' => ['required','string' , 'in:active,pending,inactive'],
            'quantity' => ['required' , 'integer' , 'min:1', 'max:1000'],
        ];
    }
}
