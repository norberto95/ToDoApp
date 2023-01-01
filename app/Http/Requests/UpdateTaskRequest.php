<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Task;

class UpdateTaskRequest extends FormRequest
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
