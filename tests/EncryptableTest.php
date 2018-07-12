<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHLAK\Twine\Exceptions\DecryptionFailedException;
use PHLAK\Twine\Exceptions\UnsupportedCipherException;
use PHLAK\Twine\Exceptions\NotAnEncryptedStringException;
use PHPUnit\Framework\TestCase;

class EncryptableTest extends TestCase
{
    public function test_it_can_be_encrypted()
    {
        $string = new Twine\Str('john pinkerton');

        $encrypted = $string->encrypt('secret');

        $this->assertRegExp('/\$([a-zA-Z0-9=+\/]+)\$([a-zA-Z0-9=+\/]+)\$([a-zA-Z0-9=+\/]+)/', (string) $encrypted);

        return $encrypted;
    }

    /** @depends test_it_can_be_encrypted */
    public function test_it_can_be_decrypted($encryptedString)
    {
        $string = new Twine\Str($encryptedString);

        $decrypted = $string->decrypt('secret');

        $this->assertEquals('john pinkerton', $decrypted);
    }

    public function test_it_throws_an_exception_when_encrypting_with_an_invalid_cipher()
    {
        $string = new Twine\Str('john pinkerton');

        $this->expectException(UnsupportedCipherException::class);

        $string->encrypt('secret', 'invalid');
    }

    public function test_it_throws_an_exception_when_decrypting_an_invalid_string()
    {
        $string = new Twine\Str('john pinkerton');

        $this->expectException(NotAnEncryptedStringException::class);

        $string->decrypt('secret');
    }

    /** @depends test_it_can_be_encrypted */
    public function test_it_throws_an_exception_when_decryption_fails($encryptedString)
    {
        $string = new Twine\Str($encryptedString);

        $this->expectException(DecryptionFailedException::class);

        $string->decrypt('shmecret');
    }
}
