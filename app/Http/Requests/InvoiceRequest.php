<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
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
    public function rules(): array
    {
        return $this->method() == "POST" ? $this->onStore() : $this->onUpdate();
    }

    public function onStore(): array
    {
        return [
            'status' => 'required|in:pending,inactive',
            'name' => 'required|string|min:2|max:255',
            'phone' => 'required|string|size:11|regex:/^01[0125]\d{8}$/',
            'city' => 'nullable|string|min:2|max:255|required_without:address',
            'address' => 'nullable|string|min:2|max:255|required_without:city',
            'list-product' => 'nullable|required_without:list-product-1',
            'list-product-1' => 'nullable|required_without:list-product',
            'list-product.*.product_id' => ['required','exists:products,id'],
            'list-product.*.price' => 'required|numeric|min:0|max:1000000|gte:list-product.*.payment',
            'list-product.*.payment' => 'required|numeric|min:0|max:1000000',
            'list-product-1.*.title' => 'required|string|max:255|regex:/^(?!\d+$).+$/',
            'list-product-1.*.data' => 'nullable|string|max:255',
            'list-product-1.*.price' => 'required|numeric|min:0|max:1000000|gte:list-product-1.*.payment',
            'list-product-1.*.payment' => 'required|numeric|min:0|max:1000000',
        ];
    }
    public function onUpdate(): array
    {
        return [
            'invoice_id' => 'required|exists:invoices,id',
            'client_id' => 'required|exists:clients,id',
            'status' => 'required|in:pending,inactive',
            'name' => 'required|string|min:2|max:255',
            'phone' => 'required|string|size:11|regex:/^01[0125]\d{8}$/',
            'address' => 'required|string|min:2|max:255',
            'list-product' => 'nullable|required_without:list-product-1',
            'list-product-1' => 'nullable|required_without:list-product',
            'list-product.*.product_id' => ['required','exists:products,id'],
            'list-product.*.price' => 'required|numeric|min:0|max:1000000|gte:list-product.*.payment',
            'list-product.*.payment' => 'required|numeric|min:0|max:1000000',
            'list-product-1.*.title' => 'required|string|max:255|regex:/^(?!\d+$).+$/',
            'list-product-1.*.data' => 'nullable|string|max:255',
            'list-product-1.*.price' => 'required|numeric|min:0|max:1000000|gte:list-product-1.*.payment',
            'list-product-1.*.payment' => 'required|numeric|min:0|max:1000000',
        ];
    }
}
