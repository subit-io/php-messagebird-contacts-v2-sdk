<?php

namespace Subit\MessagebirdContactsSdk;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use Subit\MessagebirdContactsSdk\Models\Contact;
use Subit\MessagebirdContactsSdk\Models\Profile;
use Subit\MessagebirdContactsSdk\Models\Identifier;
use Subit\MessagebirdContactsSdk\Exceptions\ApiException;
use Subit\MessagebirdContactsSdk\Exceptions\JsonException;
use Subit\MessagebirdContactsSdk\ReceivedModels\ContactReceived;
use Subit\MessagebirdContactsSdk\ReceivedModels\ProfileReceived;
use Subit\MessagebirdContactsSdk\ReceivedModels\IdentifierReceived;
use Subit\MessagebirdContactsSdk\Exceptions\ContactIdMissingException;
use Subit\MessagebirdContactsSdk\Exceptions\DisplayNameMissingException;

/**
 * Class Messagebird
 * @package Subit\ExpoSdk
 */
class HttpMessagebird implements Messagebird
{
    protected Client $client;
    protected array $requestHeaders = ['Content-Type' => 'application/json'];

    public function __construct($accessKey, Client $client = null)
    {
        $this->client = $client ?? new Client(['base_uri' => 'https://contacts.messagebird.com/v2/']);
        $this->requestHeaders['Authorization'] = 'AccessKey ' . $accessKey;
    }

    public function getContacts($offset = null, $limit = null, $returnContactsOnly = true): array
    {
        $offset = $offset ? 'offset=' . $offset . '&' : null;
        $limit = $limit ? 'limit=' . $limit : null;

        $data = $this->send('GET', 'contacts?' . $offset . $limit);

        if ($returnContactsOnly) {
            $contacts = [];
            foreach ($data['items'] as $item) {
                $contacts[] = ContactReceived::fromArray($item);
            }
            return $contacts;
        }

        return $data;
    }

    private function setRequestOptions($body = null)
    {
        return ['headers' => $this->requestHeaders, 'body' => json_encode($body, JSON_THROW_ON_ERROR)];
    }

    public function getContact($contactId): ContactReceived
    {
        $data = $this->send('GET', 'contacts/' . $contactId);

        return ContactReceived::fromArray($data);
    }

    public function createContact(Contact $contact): ContactReceived
    {
        $contactArray = $contact->toArray();

        if (!isset($contactArray['displayName'])) {
            throw new DisplayNameMissingException('displayName is required');
        }

        $data = $this->send('POST', 'contacts/', $contactArray);

        return ContactReceived::fromArray($data);
    }

    public function updateContact(Contact $contact): ContactReceived
    {
        if (!$contact->getId()) {
            throw new ContactIdMissingException('Contact id is required');
        }

        $data = $this->send('PATCH', 'contacts/' . $contact->getId(), $contact->toArray());

        return ContactReceived::fromArray($data);
    }

    public function deleteContact($contactId)
    {
        return $this->send('DELETE', 'contacts/' . $contactId);
    }

    public function createIdentifier($contactId, Identifier $identifier): IdentifierReceived
    {
        $data = $this->send('POST', 'contacts/' . $contactId . '/identifiers', $identifier->toArray());

        return IdentifierReceived::fromArray($data);
    }

    public function deleteIdentifier($contactId, $identifierId)
    {
        return $this->send('DELETE', 'contacts/' . $contactId . '/identifiers/' . $identifierId);
    }

    public function createProfile($contactId, Profile $profile): ProfileReceived
    {
        $data = $this->send('POST', 'contacts/' . $contactId . '/profiles', $profile->toArray());

        return ProfileReceived::fromArray($data);
    }

    public function deleteProfile($contactId, $profileId)
    {
        return $this->send('DELETE', 'contacts/' . $contactId . '/profiles/' . $profileId);
    }

    private function send($method, $uri, $body = null)
    {
        /** @var Response $response */
        $response = $this->client->request(
            $method,
            $uri,
            $this->setRequestOptions($body)
        );

        $body = $response->getBody()->__toString();

        if (!empty($body)) {
            $body = json_decode($body, true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new JsonException($response->getBody()->__toString(), $response->getStatusCode());
            }

            if (array_key_exists('errors', $body)) {
                throw new ApiException($body->errors, $response->getStatusCode());
            }
        }

        return $body;
    }
}
