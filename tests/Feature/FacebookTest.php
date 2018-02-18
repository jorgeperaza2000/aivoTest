<?php

namespace Tests\Feature;

use Tests\TestCase;

class FacebookTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    
    public function testReturnProfile()
    {
        $response = $this->get('/api/profile/facebook/4');

        $response
            ->assertStatus(200)
            ->assertJson([
                'name' => true,
            ]);
    }

    public function testReturnExactProfile()
    {
        $response = $this->get('/api/profile/facebook/4');

        $response
            ->assertStatus(200)
            ->assertJson([
                'name' => 'Mark Zuckerberg',
            ]);
    }

    public function testNotFound()
    {
        $response = $this->get('/api/profile/facebook/');

        $response->assertStatus(404);
    }

    public function testNotFoundProfile()
    {
        $response = $this->get('/api/profile/facebook/123456');

        $response->assertStatus(404);
    }

    
}
