<?php

namespace App\Http\Requests;

use App\Rules\DisallowSelfReact;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class ToggleReactionRequest extends FormRequest
{

    protected function createDefaultValidator(ValidationFactory $factory)
    {
        return $factory->make(
            [ 'post' => $this->post ],
            [ 'post' => new DisallowSelfReact() ]
        );
    }
}
