<?php

test('test user can like a daily bread', function () {
    $user = \App\Models\User::factory()->create();
    $dailyBread = \App\Models\DailyBread::factory()->create();
    $response = $this->post(route("api.like.dailyBread",['dailyBread'=>$dailyBread]),[
        'user_id'=>$user->id
    ]);
    $response->json([
        "messages"=>""
    ])
});
