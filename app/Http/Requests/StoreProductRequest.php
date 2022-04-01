<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            "product_name" => "required|min:5|unique:products,name",
            "subCategory" => "required|numeric|min:1",
            "brand" => "required|numeric|min:1",
            "product_quantity" => "required|numeric|min:1",
            "product_price" => "required|numeric|min:1",
            "images" => "required"
        ];
    }
    public function errors()
    {
        return [
            "product_name|required" => "Product Name is required",
            "product_name|min" => "Product Name needs to have at least 5 characters",
            "product_name|unique" => "There is already a product with that name",
            "subCategory|required" => "Category is required",
            "subCategory|min" => "You need to choose a category",
            "brand|required" => "Brand is required",
            "brand|min" => "You need to choose a brand",
            "product_quantity|required" => "Quantity is required",
            "product_quantity|number" => "Quantity needs to be a number",
            "product_quantity|min" => "Quantity needs to be at least 1",
            "product_price|required" => "Price is required",
            "product_price|number" => "Price needs to be a number",
            "product_price|min" => "Price needs to be at least 1",
            "images|required" => "Image is required",
        ];
    }
}
