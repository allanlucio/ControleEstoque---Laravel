<?php

namespace Tests;
use Domain\User\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;
abstract class TestCase extends BaseTestCase
{

    use DatabaseTransactions;
    use CreatesApplication;

    public function getHeaders($password='password123',User $user = null){
        if (is_null($user)){
            $user = factory(User::class)->create([
                'password'=> bcrypt($password)
            ]);

        }
        $data =[
            'username' => $user->username,
            'password' => $password
        ];

        $response=$this->call('POST','auth/login', $data);
        $data_login=$response->getContent();
        $token = json_decode($data_login)->token;
        return [
            "Authorization"=> "Bearer ".$token
        ];
    }
}
