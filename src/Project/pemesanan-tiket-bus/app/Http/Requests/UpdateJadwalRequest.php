<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateJadwalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'bus' => 'required',
            'kota_asal' => 'required|numeric',
            'terminal_kota_asal' => 'required',
            'kota_tujuan' => 'required|numeric',
            'terminal_kota_tujuan' => 'required',
            'kedatangan' => 'required|date',
            'keberangkatan' => 'required|date',
            'tarif' => 'required|numeric',
        ];
    }
}
