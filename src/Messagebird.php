<?php

namespace Subit\MessagebirdContactsSdk;


use GuzzleHttp\Client;
use Subit\MessagebirdContactsSdk\Models\Profile;
use Subit\MessagebirdContactsSdk\Models\Contact;
use Subit\MessagebirdContactsSdk\Models\Identifier;
use Subit\MessagebirdContactsSdk\ReceivedModels\ProfileReceived;
use Subit\MessagebirdContactsSdk\ReceivedModels\ContactReceived;
use Subit\MessagebirdContactsSdk\ReceivedModels\IdentifierReceived;

interface Messagebird
{
    public function getContacts($offset = null, $limit = null, $returnContactsOnly = true): array;
    public function getContact($contactId): ContactReceived;
    public function createContact(Contact $contact): ContactReceived;
    public function updateContact(Contact $contact): ContactReceived;
    public function deleteContact($contactId);
    public function createIdentifier($contactId, Identifier $identifier): IdentifierReceived;
    public function deleteIdentifier($contactId, $identifierId);
    public function createProfile($contactId, Profile $profile): ProfileReceived;
    public function deleteProfile($contactId, $profileId);
}