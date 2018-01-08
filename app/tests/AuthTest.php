<?php 
declare(strict_types=1);


use PHPUnit\Framework\TestCase;


final class AuthTest extends TestCase
{
	public function testCanSetToken()
	{
		$this->assertInstanceOf(
			Auth::class,
			Auth::getAuthUrl()
		);
	}
}
