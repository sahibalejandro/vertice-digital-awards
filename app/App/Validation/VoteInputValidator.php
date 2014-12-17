<?php namespace App\Validation;

use Sahib\Elegan\Validation\InputValidator;

class VoteInputValidator extends InputValidator
{
    /**
     * Validation rules.
     *
     * @var array
     */
    protected $rules = [
        'participant_uuid' => 'required',
        'category_uuid'    => 'required',
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
        // TODO: Modify validation rules for create mode.

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
