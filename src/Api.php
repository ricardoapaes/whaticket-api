<?php

namespace RicardoPaes\Whaticket;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Utils;

class Api {

	/**
	 * @var Client
	 */
	private $client;

	/**
	 * @var string
	 */
	private $token;

	const SEND_MESSAGE = 'api/messages/send';

	/**
	 * @param string $url Url do backend.
	 * @param string $token Token da API.
	 */
	public function __construct($url, $token) {
		$this->client = new Client([
			'base_uri' => $url,
		]);
		$this->token = $token;
	}

	public function sendMessage($numberTo, $message, $whatsappId=null) {
		$body = [
			'number' => $numberTo,
			'body' => $message,
		];

		if ($whatsappId) {
			$body['whatsappId'] = $whatsappId;
		}

		return $this->json(self::SEND_MESSAGE, $body);
	}

	public function sendMedia($numberTo, $media, $whatsappId=null) {
		$body = [
			'number' => $numberTo,
		];

		if ($whatsappId) {
			$body['whatsappId'] = $whatsappId;
		}

		return $this->upload(self::SEND_MESSAGE, $body, $media);
	}

	/**
	 * Request json content to api.
	 *
	 * @param string $url
	 * @param array $body
	 *
	 * @throws ApiException
	 *
	 * @return bool
	 */
	private function json($url, array $body) {
		$response = $this->client->request('POST', $url, [
			'body' => json_encode($body),
			'headers' => [
				'Authorization' => 'Bearer ' . $this->token,
				'Content-Type' => 'application/json',
			],
		]);

		if ($response->getStatusCode() !== 200) {
			$errorJson = json_decode($response->getBody()->getContents(), true);
			throw new ApiException($errorJson['error']);
		}

		return $response->getBody()->getContents() === '';
	}

	private function upload($url, array $params, $media) {
		$multipart = [];
		
		foreach ($params as $name => $value) {
			$multipart[] = [
				'name' => $name,
				'contents' => $value,
			];
		}

		$multipart[] = [
			'name' => 'medias',
			'contents' => Utils::tryFopen($media, 'r'),
		];

		$response = $this->client->request('POST', $url, [
			'multipart' => $multipart,
			'headers' => ['Authorization' => 'Bearer ' . $this->token],
		]);
		
		if ($response->getStatusCode() !== 200) {
			$errorJson = json_decode($response->getBody()->getContents(), true);
			throw new ApiException($errorJson['error']);
		}

		return $response->getBody()->getContents() === '';
	}
}
