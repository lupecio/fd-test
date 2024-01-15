<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreUserTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_user_successfully(): void
    {
        $response = $this->postJson('/api/users', ['name' => 'Lucas', 'email' => "lucas@email.com", "password" => "123456", "password_confirmation" => "123456"]);

        $response
            ->assertStatus(201)
            ->assertJson([
                'message' => "Registro criado com sucesso.",
            ]);
    }

    public function test_api_returns_error_when_email_already_exists(): void
    {
        $this->postJson('/api/users', ['name' => 'Lucas', 'email' => "lucas@email.com", "password" => "123456", "password_confirmation" => "123456"]);

        $response = $this->postJson('/api/users', ['name' => 'Lucas', 'email' => "lucas@email.com", "password" => "123456", "password_confirmation" => "123456"]);

        $response
            ->assertStatus(422)
            ->assertJson([
                'message' => "Esse email já está sendo utilizado.",
            ]);
    }

    public function test_api_returns_error_when_name_is_missing(): void
    {
        $response = $this->postJson('/api/users', ['email' => "lucas@email.com", "password" => "123456", "password_confirmation" => "123456"]);

        $response
            ->assertStatus(422)
            ->assertJson([
                'message' => "O campo nome é obrigatório.",
            ]);
    }

    public function test_api_returns_error_when_email_is_missing(): void
    {
        $response = $this->postJson('/api/users', ['name' => "Lucas", "password" => "123456", "password_confirmation" => "123456"]);

        $response
            ->assertStatus(422)
            ->assertJson([
                'message' => "O campo email é obrigatório.",
            ]);
    }

    public function test_api_returns_error_when_password_is_missing(): void
    {
        $response = $this->postJson('/api/users', ['name' => "Lucas", 'email' => "lucas@email.com", "password_confirmation" => "123456"]);

        $response
            ->assertStatus(422)
            ->assertJson([
                'message' => "O campo senha é obrigatório.",
            ]);
    }

    public function test_api_returns_error_when_password_does_not_match_with_confirmation(): void
    {
        $response = $this->postJson('/api/users', ['name' => "Lucas", 'email' => "lucas@email.com", "password" => "123456", "password_confirmation" => "654321"]);

        $response
            ->assertStatus(422)
            ->assertJson([
                'message' => "O campo de senha não coincide com a confirmação.",
            ]);
    }
}
