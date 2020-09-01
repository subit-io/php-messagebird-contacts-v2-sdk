<?php


namespace Subit\MessagebirdContactsSdk\Models;

use Subit\MessagebirdContactsSdk\Exceptions\InvalidContactException;

class Contact
{
    protected ?string $id = '';
    protected ?string $displayName = '';
    protected ?string $firstName = '';
    protected ?string $lastName = '';
    protected ?string $avatar = '';
    protected array $languages = []; //ISO 639-1
    protected ?string $country = ''; //ISO 3166-1
    protected ?string $timezone = '';
    protected ?string $gender = '';
    protected $jsonExtraAttributes = '';

    public static function create($displayName = null)
    {
        return new static($displayName);
    }

    public function __construct($displayName = null)
    {
        $this->displayName = $displayName;
    }

    public function idForUpdating(?string $value)
    {
        $this->id = $value;

        return $this;
    }

    public function displayName(?string $value)
    {
        $this->displayName = $value;

        return $this;
    }

    public function firstName(?string $value)
    {
        $this->firstName = $value;

        return $this;
    }

    public function lastName(?string $value)
    {
        $this->lastName = $value;

        return $this;
    }

    public function avatar(?string $value)
    {
        $this->avatar = $value;

        return $this;
    }

    public function addLanguage(?string $value)
    {
        $this->languages[] = $value;

        return $this;
    }

    public function country(?string $value)
    {
        $this->country = $value;

        return $this;
    }

    public function timezone(?string $value)
    {
        $this->timezone = $value;

        return $this;
    }

    public function gender(?string $value)
    {
        $this->gender = $value;

        return $this;
    }

    public function jsonExtraAttributes($data)
    {
        $this->jsonExtraAttributes = $data;

        return $this;
    }

    public function toArray()
    {
        $data = [
            'displayName' =>  $this->displayName,
            'firstName' =>  $this->firstName,
            'lastName' =>  $this->lastName,
            'avatar' =>  $this->avatar,
            'languages' =>  $this->languages,
            'country' =>  $this->country,
            'timezone' =>  $this->timezone,
            'gender' =>  $this->gender,
            'attributes' =>  $this->jsonExtraAttributes
        ];

        return array_filter($data);
    }

    public function getId()
    {
        return $this->id;
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

    public function getLanguages(): array
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

    public function getJsonExtraAttributes()
    {
        return $this->jsonExtraAttributes;
    }


}
