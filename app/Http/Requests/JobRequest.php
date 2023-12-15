<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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
        return [
            'job_title' => 'required',
            'job_category_id' => 'required|integer',
            'job_salary' => 'nullable|string',
            'remark' => 'nullable|string',
            'job_status' => 'nullable|boolean',
            'postal_code' => 'nullable|string',
            'address' => 'nullable|string',
            'co_owner_id' => 'required|integer',
            'client_id' => 'required|integer',
            'person_incharge' => 'required|integer',
            'job_type_id' => 'nullable|integer',
            'short_desc' => 'nullable|string',
            'job_added_date' => 'nullable|date',
            'unit_no' => 'nullable|integer',
            'display_address' => 'nullable|string',
            'job_link' => 'nullable|string',
            'description' => 'nullable',
            'meta_title' => 'nullable|string',
            'meta_tag' => 'nullable|string',
            'meta_description' => 'nullable|string',
        ];
    }
}
