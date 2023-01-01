<?php

namespace App\Http\Requests;

use App\Models\Task;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTaskRequest extends FormRequest
{
  
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|min:3,max:100',
            'content' => 'nullable|string|max:255',
            'status' => [
                'required',
                Rule::in(
                    Task::getAvailableStatuses()
                ),
            ]
        ];
    }
}
