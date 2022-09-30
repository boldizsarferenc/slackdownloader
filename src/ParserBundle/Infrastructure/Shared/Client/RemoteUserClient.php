<?php

namespace App\ParserBundle\Infrastructure\Shared\Client;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use JsonException;
use RuntimeException;
use function json_decode;

class RemoteUserClient
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * @throws JsonException
     */
    public function getWorkerByEmail(string $email)
    {
        try {
            $response = $this->client->post('http://nginx/remote_user/user/by_email', [
                'form_params' => [
                    'email' => $email
                ],
                'headers' => [
                    'timeout' => 5
                ]
            ]);
        } catch (GuzzleException $e) {
            throw new RuntimeException($e->getMessage(), $e->getCode());
        }

        return json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     */
    public function authenticate($username, $password): array
    {
        try {
            $response = $this->client->post('http://nginx/remote_user/user/auth', [
                'form_params' => [
                    'email' => $username,
                    'password' => $password
                ],
                'headers' => [
                    'timeout' => 5
                ]
            ]);
        } catch (GuzzleException $e) {
            throw new RuntimeException($e->getMessage(), $e->getCode());
        }

        return json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @throws JsonException
     */
    public function getWorkerById(int $id)
    {
        try {
            $response = $this->client->get('http://nginx/remote_user/user/' . $id, [
                'headers' => [
                    'timeout' => 5
                ]
            ]);
        } catch (GuzzleException $e) {
            throw new RuntimeException($e->getMessage(), $e->getCode());
        }

        return json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);
    }
}
