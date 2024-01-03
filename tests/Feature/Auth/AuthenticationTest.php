<?php

use App\Models\Administrator;
use App\Models\User;
use App\Providers\RouteServiceProvider;

test('login screen can be rendered', function () {
    $response = $this->get('/login');

    $response->assertStatus(200);
});

test('users can authenticate using the login screen', function () {
    $user = User::factory()->create();

    $response = $this->post('/login', [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(RouteServiceProvider::HOME);
});

test('users can not authenticate with invalid password', function () {
    $user = User::factory()->create();

    $this->post('/login', [
        'email' => $user->email,
        'password' => 'wrong-password',
    ]);

    $this->assertGuest();
});

test('users can logout', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/logout');

    $this->assertGuest();
    $response->assertRedirect('/');
});

test("users can authenticate to admin guard", function () {
    //1) cree un administrateur avec des idenfiants précis
    $admin = Administrator::factory()->create([
        'login' => "login",
        "password" => bcrypt("password")
    ]);
    //2) requete de post avec les memes identifiants crée
    $response = $this->post(route('admin.login'),[
        'login'=>"login",
        "password"=>"password"
    ]);
    //3) si il y'a une redircetion
    $response->assertRedirect(RouteServiceProvider::ADMIN_HOME);
    //4) s'assurer que l'administrateur connecte est celui crée
    $this->assertAuthenticatedAs($admin,"admin");

});

