<?php

namespace Feature\App\Http\Controller;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthControllerTest extends TestCase{
    use DatabaseTransactions;
    public function testLogin(){

        $data = [
            'email' => 'a@a.com',
            'username' => 'allan',
            'password' => bcrypt('emtudo123')
        ];
        factory(User::class)->create($data);

        $data = [
            'email' => 'a@a.com',
            'password' => 'emtudo123'
        ];
        $response=$this->call('POST','auth/login', $data);
        $this->assertEquals(200,$response->status());
        $response->assertJson([
            'username' => 'emtudo'
        ]);


    }

    public function testLoginWithUsername(){

        $data = [
            'email' => 'a@a.com',
            'username' => 'allan',
            'password' => bcrypt('emtudo123')
        ];
        factory(User::class)->create($data);

        $data = [
            'username' => 'allan',
            'password' => 'emtudo123'
        ];
        $response=$this->call('POST','auth/login', $data);
        $this->assertEquals(200,$response->status());
        $response->assertJson([
            'username' => 'emtudo'
        ]);


    }
}





















