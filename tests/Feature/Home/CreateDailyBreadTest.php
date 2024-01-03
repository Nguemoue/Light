<?php

use App\Models\Administrator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\assertDatabaseCount;

uses(RefreshDatabase::class);

test('create daily bread test', function () {
    $storage = Storage::fake("public");
    $data = [
        "poster_url"=>null,
        "title"=>"lucas",
        "description"=>"description"
    ];
    //je me connecte ne tant que admin
    $admin = Administrator::factory()->create();
    $data["admin_id"] = $admin->id;

    assertDatabaseCount(\App\Models\DailyBread::class,0);
    $response = $this->actingAs($admin,"admin")->post(route('admin.dailyBreads.store'),$data);
    $response->assertRedirect(route("admin.dailyBreads.index"))->assertSessionHas("success");
    //je m'assure que il est stocke en base de donnes
    assertDatabaseCount(\App\Models\DailyBread::class,1);
    $response->assertSessionHasNoErrors();
});
