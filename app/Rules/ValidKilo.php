<?php

namespace Uatfinfra\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidKilo implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $value != "0";
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El kilometraje total no debe ser 0. Vuelva a insertar el adicional.';
    }
}
