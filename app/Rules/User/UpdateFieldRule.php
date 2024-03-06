<?php

namespace App\Rules\User;

use Closure;

use Illuminate\Support\Facades\URL;
use function PHPUnit\Framework\isNull;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Validation\ValidationRule;

class UpdateFieldRule implements ValidationRule
{
    public function __construct(public Model $model) {}
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $id = collect(explode('/', URL::current()))->last();

        $data = $this->model::where($attribute, $value)->first();

        if($data && $id <> $data->id) 
        {
            $fail('The :attribute alreaDy exists.');
        }
    }
}
