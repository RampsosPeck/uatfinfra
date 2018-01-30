<?php

namespace Uatfinfra\Rules;

use Illuminate\Contracts\Validation\Rule;
use Carbon\Carbon;

class ValidFechaIni implements Rule
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
        $ini = Carbon::parse($value);
        return $ini->year == now()->year;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Está fecha se debe encontrar en el año actual';
    }
}
