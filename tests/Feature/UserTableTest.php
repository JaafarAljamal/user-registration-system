<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class UserTableTest extends TestCase
{
    #[Test]
    public function users_table_has_expected_columns()
    {
        $this -> assertTrue(Schema::hasTable('users'));

        $this -> assertTrue(Schema::hasColumn('users', 'id'));
        $this -> assertTrue(Schema::hasColumn('users', 'username'));
        $this -> assertTrue(Schema::hasColumn('users', 'email'));
        $this -> assertTrue(Schema::hasColumn('users', 'password'));
        $this -> assertTrue(Schema::hasColumn('users', 'created_at'));
        $this -> assertTrue(Schema::hasColumn('users', 'updated_at'));
    }
}
