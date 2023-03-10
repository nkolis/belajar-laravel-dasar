<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Crypt;
use Tests\TestCase;

class EncryptionTest extends TestCase
{
  public function testEncryption()
  {
    $encrypt = Crypt::encrypt("Nurkholis");
    $decrypt = Crypt::decrypt($encrypt);

    $this->assertEquals('Nurkholis', $decrypt);
  }
}
