<?php
namespace Tests\Feature\Api\V1;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BlogPostControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function it_stores_a_blog_post()
   {
        $this->post('/api/v1/posts', [
            'title' => 'test TITLE',
            'body' => 'asdfasdfasdfasdfa',
            'source' => 'app',
            'published_at' => now()->toDateTimeString(),
        ])
        ->assertStatus(200);

        $this->assertDatabaseCount('blog_posts', 1);
   }
}

// test('example', function () {
//     $response = $this->get('/');

//     $response->assertStatus(200);
// });



///backups


// class BlogPostControllerTest extends TestCase
// {
//     public function testIndex()
//     {
//         $response = $this->get('/api/v1/blog-posts');

//         $response->assertStatus(200);
//     }

//     public function testShow()
//     {
//         $response = $this->get('/api/v1/blog-posts/1');

//         $response->assertStatus(200);
//     }

//     public function testStore()
//     {
//         $response = $this->post('/api/v1/blog-posts', [
//             'title' => 'Test Title',
//             'content' => 'Test Content',
//         ]);

//         $response->assertStatus(201);
//     }

//     public function testUpdate()
//     {
//         $response = $this->put('/api/v1/blog-posts/1', [
//             'title' => 'Test Title',
//             'content' => 'Test Content',
//         ]);

//         $response->assertStatus(200);
//     }

//     public function testDestroy()
//     {
//         $response = $this->delete('/api/v1/blog-posts/1');

//         $response->assertStatus(204);
//     }
// }

