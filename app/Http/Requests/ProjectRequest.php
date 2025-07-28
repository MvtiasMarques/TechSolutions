<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'nombre' => 'required|max:255',
            'fecha_inicio' => 'required|date|after_or_equal:1900-01-01|before_or_equal:2100-12-31',
            'estado' => 'required|max:50',
            'responsable' => 'required|max:255',
            'monto' => 'required|integer|min:0|max:999999999999',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nombre.required' => 'El nombre del proyecto es obligatorio.',
            'nombre.max' => 'El nombre no puede exceder 255 caracteres.',
            'fecha_inicio.required' => 'La fecha de inicio es obligatoria.',
            'fecha_inicio.date' => 'La fecha de inicio debe ser una fecha válida.',
            'fecha_inicio.after_or_equal' => 'La fecha de inicio no puede ser anterior al año 1900.',
            'fecha_inicio.before_or_equal' => 'La fecha de inicio no puede ser posterior al año 2100.',
            'estado.required' => 'El estado del proyecto es obligatorio.',
            'estado.max' => 'El estado no puede exceder 50 caracteres.',
            'responsable.required' => 'El responsable del proyecto es obligatorio.',
            'responsable.max' => 'El nombre del responsable no puede exceder 255 caracteres.',
            'monto.required' => 'El monto del proyecto es obligatorio.',
            'monto.integer' => 'El monto debe ser un número entero.',
            'monto.min' => 'El monto no puede ser negativo.',
            'monto.max' => 'El monto no puede exceder $999.999.999.999.',
        ];
    }
}
