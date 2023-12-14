<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'client_code' => 'nullable',
            'client_name' => 'nullable',
            'industry_types_id' => 'nullable|integer',
            'client_attention_person' => 'nullable',
            'client_attention_designation' => 'nullable',
            'client_attention_phone' => 'nullable',
            'client_contact_person' => 'nullable',
            'client_contact_number' => 'nullable',
            'client_phone' => 'nullable',
            'client_fax' => 'nullable',
            'client_email' => 'nullable',
            'client_street' => 'nullable',
            'client_unit_number' => 'nullable',
            'client_postal_code' => 'nullable',
            'employees_id' => 'nullable|integer',
            'users_id' => 'nullable|integer',
            'payroll_employees_id' => 'nullable|integer',
            'payroll_users_id' => 'nullable|integer',
            'tnc_templates_id' => 'nullable|integer',
            'tnc_renewal_date' => 'nullable|date',
            'client_terms_id' => 'nullable|integer',
            'client_remarks' => 'nullable|string',
            'clients_seqno' => 'nullable|integer',
        ];
    }
}
