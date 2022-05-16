<?php

namespace RicardoPaes\Whaticket\Tests;

use PHPUnit\Framework\TestCase;
use RicardoPaes\Whaticket\Api;

class WhaticketTest extends TestCase {
	public function testInstance() {
		$this->assertTrue(class_exists(Api::class));
	}

	public function testSendMessage() {
		$api = new Api(getenv('WHATICKET_BASEURL'), getenv('WHATICKET_TOKEN'));
		$this->assertTrue($api->sendMessage(getenv('WHATICKET_NUMBER'), 'Whaticket api test in ' . phpversion() . '.', getenv('WHATICKET_ID')));
	}

	public function testSendMedia() {
		$api = new Api(getenv('WHATICKET_BASEURL'), getenv('WHATICKET_TOKEN'));
		$this->assertTrue($api->sendMedia(getenv('WHATICKET_NUMBER'), __DIR__ . '/./logo.png', getenv('WHATICKET_ID')));
	}
}
