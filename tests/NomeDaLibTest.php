<?php

namespace Like\NomeDaLib\Tests;

use Like\NomeDaLib\NomeDaLib;
use PHPUnit\Framework\TestCase;

class NomeDaLibTest extends TestCase {
	public function testInstance() {
		$this->assertInstanceOf(NomeDaLib::class, new NomeDaLib());
	}
}
