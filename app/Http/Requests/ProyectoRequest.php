<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProyectoRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'client_id' => 'required|exists:clientes,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'status' => [
                'required',
                'string',
                Rule::in(['in_progress', 'completed', 'on_hold']),
                function ($attribute, $value, $fail) {
                    if ($value === 'completed' && !$this->end_date) {
                        $fail('El estado no puede ser completado sin una fecha de finalización.');
                    }
                    if ($value !== 'completed' && $this->end_date) {
                        $fail('El estado debe ser completado si hay una fecha de finalización.');
                    }
                }
            ],
        ];
    }

    /**
     * 
     * 
     * @return array
     */

    public function messages()
    {
        return [
            'client_id.required' => 'How did you do that?',
            'name.required' => 'Creemos que el proyecto nesesita un nombre.',
            'description.required' => 'La descripcion podria ser opcional, pero nadie sabria de lo que estas hablando.',
            'start_date.required' => 'El proyecto necesita una fecha de inicio.',
            'end_date.date' => 'La fecha de finalización debe ser una fecha válida.',
            'end_date.after_or_equal' => 'La fecha de finalización debe ser igual o posterior a la fecha de inicio.',
            'status' => 'How did you do that?'
        ];
    }
}
