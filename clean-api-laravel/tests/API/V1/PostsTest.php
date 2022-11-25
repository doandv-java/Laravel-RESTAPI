<?php

declare(strict_types=1);

use Domain\Blogging\Models\Post;
use JustSteveKing\StatusCode\Http;
use function Pest\Laravel\get;

beforeEach(fn() => $this->post = Post::factory()->create());
test('it gets the correct status code', function () {
    get(route('api:v1:posts:index'))->assertStatus(Http::OK())
        ->assertJsonPath();
});


