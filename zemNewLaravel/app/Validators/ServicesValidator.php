<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class ServicesValidator.
 *
 * @package namespace App\Validators;
 */
class ServicesValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required', 
            'email' => 'required', 
            'phone', 
            'birth', 
            'marcar', 
            'facul', 
            'salarial', 
            'habilidades',
        ],
        ValidatorInterface::RULE_UPDATE => [],
    ];
}
