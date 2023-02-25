<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class FileStorageTest extends TestCase
{
  public function testStorage()
  {
    $fs = Storage::disk('local');
    $fs->put('content.txt', 'Put your content here');
    $this->assertEquals('Put your content here', $fs->get('content.txt'));
  }

  public function testPublic()
  {
    $fs = Storage::disk('public');
    $fs->put('content.txt', 'Put your content here');
    $this->assertEquals('Put your content here', $fs->get('content.txt'));
  }
}
