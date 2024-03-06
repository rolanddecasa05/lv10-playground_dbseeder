<?php

namespace App\Http\Requests\User;

use App\Models\User;
use App\Rules\User\UpdateFieldRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'min:6',
            'email' => new UpdateFieldRule(new User()),
            'password' => 'min:9',
            'age' => 'lt:100',
            'gender' => 'in:F,M',
        ];
    }
}
