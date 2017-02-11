<?php
/**
 * Created by PhpStorm.
 * User: allan
 * Date: 09/02/17
 * Time: 10:30
 */
namespace Feature\Domain\Client;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Domain\User\User;

class ControllerTest extends TestCase {
    public function testCreate(){


        $headers=$this->getHeaders();

        $name="Allan Lucio";
        $data = [
            'name'=>$name
        ];
//        $response=$this->call('POST','client',$data,$headers);
        $response=$this->post('client',$data,$headers);
        $this->assertEquals(200,$response->status());
                $response->assertJson([
            'name' => $name
        ]);

        $this->assertDatabaseHas('clients',[
            'name'=>$name
        ]);
    }

    public function testCreateWithCpf(){


        $headers=$this->getHeaders();

        $name="Allan Lucio";
        $cpf='96638237632';
        $data = [
            'name'=>$name,
            'cpf' => $cpf
        ];
//        $response=$this->call('POST','client',$data,$headers);
        $response=$this->post('client',$data,$headers);

        $this->assertEquals(200,$response->status());
        $response->assertJson([
            'name' => $name,
            'cpf' => $cpf

        ]);

        $this->assertDatabaseHas('clients',[
            'name'=>$name,
            'cpf' => $cpf
        ]);
    }

    public function testCreateWithBirthDate(){


        $headers=$this->getHeaders();

        $name="Allan Lucio";
        $cpf='96638237632';
        $birth_date="2016-02-11";
        $data = [
            'name'=>$name,
            'cpf' => $cpf,
            'birthdate' => $birth_date
        ];
//        $response=$this->call('POST','client',$data,$headers);
        $response=$this->post('client',$data,$headers);

        $this->assertEquals(200,$response->status());
        $response->assertJson([
            'name' => $name,
            'cpf' => $cpf

        ]);

        $this->assertDatabaseHas('clients',[
            'name'=>$name,
            'cpf' => $cpf
        ]);
    }

}