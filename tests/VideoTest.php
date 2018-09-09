<?php

use App\Video;
use PHPUnit\Framework\TestCase;

class VideoTest extends TestCase
{
    public function testCanBeCreatedWithAllValues(): void
    {
        $this->assertInstanceOf(
            Video::class,
            new Video('title', 'http://www.url.com', ['tag1', 'tag2'])
        );
    }

    public function testCanBeCreatedWithoutTags(): void
    {
        $this->assertInstanceOf(
            Video::class,
            new Video('title', 'http://www.url.com', NULL)
        );
    }

    public function testCanNotBeCreatedWithoutArguments(): void
    {
        $this->expectException(ArgumentCountError::class);

        new Video();
    }

    public function testCanNotBeCreatedWithEmptyValues(): void
    {
        $this->expectException(Exception::class);

        new Video('', 'http://asdfas', NULL);
    }

    public function testCanNotBeCreatedWithInvalidUrl(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new Video('test', 'asdf', NULL);
    }
}