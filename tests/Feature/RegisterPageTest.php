<?php

namespace Tests\Feature;

use Tests\TestCase;

class RegisterPageTest extends TestCase
{
    public function test_register_page_is_accessible(): void
    {
        $response = $this->get('/register');
        $response -> assertStatus(200);
        $response -> assertSee('Register');
    }

    public function test_register_page_fields_are_visible(): void
    {
        $response = $this -> get('/register');

        $response -> assertSee('Name');
        $response -> assertSee('Email');
        $response -> assertSee('Password');
        $response -> assertSee('Register');
    }
}
