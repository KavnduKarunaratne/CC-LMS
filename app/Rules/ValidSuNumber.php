<?php
namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidSuNumber implements Rule
{
    public function passes($attribute, $value)
    {

        return preg_match('/^SU\d+$/', $value);
    }

    public function message()
    {
        return 'The :attribute is not a valid SU number.';
    }
}
