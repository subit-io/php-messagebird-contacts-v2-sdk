<?php


namespace Subit\MessagebirdContactsSdk\ReceivedModels;

class ProfileReceived
{
    protected $id;
    protected $channelId;
    protected $identifier;

    public static function create()
    {
        return new static();
    }

    public static function fromArray(array $data): ProfileReceived
    {
        $profileReceived = new static();

        foreach ($data as $key => $value) {
            $profileReceived->{$key} = $value;
        }

        return $profileReceived;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getChannelId()
    {
        return $this->channelId;
    }

    public function getIdentifier()
    {
        return $this->identifier;
    }
}