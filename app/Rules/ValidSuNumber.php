<?php
namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidSuNumber implements Rule
{
    public function passes($attribute, $value)
    {
        // Validate the SU number format and other rules here
        // For example, you can check if the SU number starts with "SU" and followed by digits

        // Replace this condition with your validation logic
        return preg_match('/^SU\d+$/', $value);
    }

    public function message()
    {
        return 'The :attribute is not a valid SU number.';
    }
}
