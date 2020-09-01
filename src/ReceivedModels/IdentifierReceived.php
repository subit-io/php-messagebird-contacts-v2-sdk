<?php


namespace Subit\MessagebirdContactsSdk\ReceivedModels;

class IdentifierReceived
{
    protected $id;
    protected $type;
    protected $value;

    public static function create()
    {
        return new static();
    }

    public static function fromArray(array $data): IdentifierReceived
    {
        $identifierReceived = new static();

        foreach ($data as $key => $value) {
            $identifierReceived->{$key} = $value;
        }

        return $identifierReceived;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getValue()
    {
        return $this->value;
    }
}