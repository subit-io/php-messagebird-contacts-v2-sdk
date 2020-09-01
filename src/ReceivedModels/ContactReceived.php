<?php


namespace Subit\MessagebirdContactsSdk\ReceivedModels;

class ContactReceived
{
    protected $displayName;
    protected $firstName;
    protected $lastName;
    protected $avatar;
    protected $languages;
    protected $country;
    protected $timezone;
    protected $gender;
    protected $email;
    protected $phone;
    protected $attributes;

    protected $id;
    protected $href;
    protected $profiles;
    protected $identifiers;
    protected $status;
    protected $createdAt;
    protected $updatedAt;

    public static function create()
    {
        return new static();
    }

    public function toArray()
    {
        $data = [
            'id' =>  $this->id,
            'href' =>  $this->href,
            'displayName' =>  $this->displayName,
            'firstName' =>  $this->firstName,
            'lastName' =>  $this->lastName,
            'identifiers' => $this->identifiers,
            'languages' =>  $this->languages,
            'timezone' =>  $this->timezone,
            'country' =>  $this->country,
            'avatar' =>  $this->avatar,
            'gender' =>  $this->gender,
            'profiles' =>  $this->profiles,
            'attributes' =>  $this->attributes,
            'status' =>  $this->status,
            'createdAt' =>  $this->createdAt,
            'updatedAt' =>  $this->updatedAt,
            'email' => $this->email,
            'phone' => $this->phone,
        ];

        return array_filter($data);
    }

    public static function fromArray(array $data): ContactReceived
    {
        $contactReceived = new static();

        foreach ($data as $key => $value) {
            $contactReceived->{$key} = $value;
        }

        return $contactReceived;
    }

    public function getDisplayName()
    {
        return $this->displayName;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getAvatar()
    {
        return $this->avatar;
    }

    public function getLanguages()
    {
        return $this->languages;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function getTimezone()
    {
        return $this->timezone;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getJsonExtraAttributes()
    {
        return $this->attributes;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getHref()
    {
        return $this->href;
    }

   public function getProfiles()
    {
        return $this->profiles;
    }

    public function getIdentifiers()
    {
        return $this->identifiers;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }



}