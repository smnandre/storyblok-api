<?php

declare(strict_types=1);

/**
 * This file is part of Storyblok-Api.
 *
 * (c) SensioLabs Deutschland <info@sensiolabs.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SensioLabs\Storyblok\Api\Tests\Unit\Domain\Value;

use PHPUnit\Framework\TestCase;
use SensioLabs\Storyblok\Api\Domain\Value\Id;
use SensioLabs\Storyblok\Api\Tests\Util\FakerTrait;

final class IdTest extends TestCase
{
    use FakerTrait;

    /**
     * @test
     */
    public function value(): void
    {
        $value = self::faker()->numberBetween(1);

        self::assertSame($value, (new Id($value))->value);
    }

    /**
     * @test
     *
     * @dataProvider provideInvalidValues
     */
    public function valueInvalid(int $value): void
    {
        self::expectException(\InvalidArgumentException::class);

        new Id($value);
    }

    /**
     * @return iterable<array{0: int}>
     */
    public static function provideInvalidValues(): iterable
    {
        yield 'zero' => [0];
        yield 'negative_number' => [-1];
    }
}
