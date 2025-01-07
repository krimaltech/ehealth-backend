<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class UniqueFamilySize implements Rule
{
    public function passes($attribute, $value)
    {
        // Ensure that all values in the "family_size" array are unique
        if(gettype($value) == 'array'){
            return count($value) === count(array_unique($value));
        }else{
            $values = array_values($value);
            return count($values) === count(array_unique($values));
        }
    }

    public function message()
    {
        return 'The family sizes must have unique values.';
    }
}
