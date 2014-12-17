<?php namespace App\Validation;

use Sahib\Elegan\Validation\InputValidator;

class CategoryInputValidator extends InputValidator
{
    /**
     * Validation rules.
     *
     * @var array
     */
    protected $rules = [
        'name' => 'required',
    ];

    /**
     * Validation messages.
     *
     * @var array
     */
    protected $messages = [];

    /**
     * Modify validation rules for create mode.
     *
     * @return $this
     */
    public function createMode()
    {
        $this->rules['image_file'] = 'required';

        return parent::createMode();
    }

    /**
     * Modify validation rules for update mode.
     *
     * @return $this
     */
    public function updateMode(\Eloquent $resource)
    {
        // TODO: Modify validation rules for update mode.

        return parent::updateMode($resource);
    }
}
