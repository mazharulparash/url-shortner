<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

class UrlShortenerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        Cache::flush(); // Clear the cache before each test to ensure no interference
    }

    public function test_encode_url()
    {
        $response = $this->postJson('/api/encode', ['url' => 'https://example.com']);

        $response->assertStatus(200)
                 ->assertJsonStructure(['short_url']);
    }

    public function test_decode_url()
    {
        $encodeResponse = $this->postJson('/api/encode', ['url' => 'https://example.com']);
        $shortUrl = $encodeResponse->json('short_url');

        $decodeResponse = $this->postJson('/api/decode', ['short_url' => $shortUrl]);
        $decodeResponse->assertStatus(200)
                       ->assertJson(['original_url' => 'https://example.com']);
    }
}
