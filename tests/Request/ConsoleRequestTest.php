<?php

declare(strict_types=1);

namespace Tests\Request;

use PHPUnit\Framework\TestCase;
use VendingMachine\Model\Dime;
use VendingMachine\Request\ConsoleRequest;

class ConsoleRequestTest extends TestCase
{
    public function testShouldCorrectCreateRequest(): void
    {
        self::assertInstanceOf(ConsoleRequest::class, new ConsoleRequest('GET-B'));
    }

    public function testShouldReturnAction(): void
    {
        self::assertEquals('GET-B', (new ConsoleRequest('GET-B'))->action());
    }

    public function testShouldThrowInvalidArgumentExceptionWhenActionNameIsInvalid(): void
    {
        self::expectException(\InvalidArgumentException::class);

        new ConsoleRequest('test');
    }

    public function testShouldAddMoneyToRequest(): void
    {
        $consoleRequest = new ConsoleRequest('GET-B');
        $consoleRequest->addMoney(new Dime());

        self::assertEquals([new Dime()], $consoleRequest->money());
    }
}
