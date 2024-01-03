<?php

it('returns a successful response', function () {
    $auth = \App\Models\User::factory()->create();
    $response = $this->actingAs($auth)->get('/');
    $response->assertStatus(200);
});
