<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class FileControllerTest extends TestCase
{

  public function testUpload()
  {
    $picture = UploadedFile::fake()->image('kholis.png');
    $this->post('/input/file', [
      'picture' => $picture
    ])->assertSeeText("OK: kholis.png");
  }
}
