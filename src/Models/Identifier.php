<?php


namespace Subit\MessagebirdContactsSdk\Models;


use Subit\MessagebirdContactsSdk\Exceptions\InvalidIdentifierTypeException;

class Identifier
{
    protected ?string $type = '';
    protected ?string $value = '';

    public static function create()
    {
        return new static();
    }

    public function type(string $value)
    {
        if(!in_array($value, IdentifierTypes::TYPES)) {
            throw new InvalidIdentifierTypeException('Invalid type passed to ' . __FUNCTION__ . '. See IdentifierTypes for possibilities.');
        }
        $this->type = $value;

        return $this;
    }

    public function value(?string $value)
    {
        $this->value = $value;

        return $this;
    }

    public function toArray()
    {
        $data = [
            'type' =>  $this->type,
            'value' =>  $this->value,
        ];

        return array_filter($data);
    }
}