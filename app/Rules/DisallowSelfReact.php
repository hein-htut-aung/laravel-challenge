<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class DisallowSelfReact implements Rule
{

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $value->author_id !== auth()->user()->id;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'You cannot like your post';
    }
}
