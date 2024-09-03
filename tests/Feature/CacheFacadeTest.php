<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\DataProvider;

#[Group("facade")]
class CacheFacadeTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $expected = 'expected';

        Cache::shouldReceive('get')
            ->with('name', 'none')
            ->andReturn($expected);

        $response = $this->get('/facade');

        $response->assertStatus(200);
    }
}
