<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeasurieRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'is_master' => 'required',
            'last_exchange' => 'required|numeric|min:0',
            'last_collect' => 'required|numeric|min:0',
            'active' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'اسم الشركة مطلوب',
            'is_master.required' => 'يجب تحديد نوع الخزنة',
            'last_exchange.required' => 'إدخال آخر مدخول مطلوب',
            'last_collect.required' => 'إدخال آخر مصروف مطلوب',
            'last_exchange.numeric' => 'مسموح فقط بإدخال الأرقام',
            'last_collect.numeric' => 'مسموح فقط بإدخال الأرقام',
            'last_exchange.min' => 'مسموح فقط بإدخال الأرقام الموجبة',
            'last_collect.min' => 'مسموح فقط بإدخال الأرقام الموجبة',
            'active.required' => 'حالة الخزانة مطلوبة',
        ];
    }
}
