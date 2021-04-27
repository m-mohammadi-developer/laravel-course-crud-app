<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ValidationTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    // public function test_input_missing_a_title_is_tejected()
    // {
    //     $response = $this->post(route('post.store'), ['title' => 'this is the title']); // , 'user_id' => 32
    //     $response->assertRedirect();
    //     $response->assertSessionHasErrors();


    // }

    public function test_valid_input_should_a_post_in_database()
    {
        $this->post(route('post.store'), ['title' => 'title from test', 'user_id' => 32]);
        $this->assertDatabaseHas('posts', ['title' => 'title from test', 'user_id' => 32]);
        
    }
}
