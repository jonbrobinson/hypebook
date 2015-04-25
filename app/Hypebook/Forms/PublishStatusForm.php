<?php

namespace Hypebook\Forms;

use Laracasts\Validation\FormValidator;

class PublishStatusForm extends FormValidator {

    /**
     * Validation rules for the publish status form
     *
     * @var array
     */
    protected $rules = [
        'body' => 'required',
    ];
}