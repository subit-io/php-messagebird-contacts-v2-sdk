<?php


namespace Subit\MessagebirdContactsSdk\Models;


class Profile
{
    protected ?string $channelId = '';
    protected ?string $identifier = '';

    public static function create()
    {
        return new static();
    }

    public function __construct()
    {
        //
    }

    public function channelId(?string $value)
    {
        $this->channelId = $value;

        return $this;
    }

    public function identifier(?string $value)
    {
        $this->identifier = $value;

        return $this;
    }

    public function toArray()
    {
        $data = [
            'channelId' =>  $this->channelId,
            'identifier' =>  $this->identifier,
        ];

        return array_filter($data);
    }
}