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


class ControllerTest extends TestCase {
    public function testCreate(){
        $name="Allan Lucio";
        $data = [
            'name'=>$name
        ];
        $response=$this->call('POST','client', $data);
        $this->assertEquals(200,$response->status());
                $response->assertJson([
            'name' => $name
        ]);

        $this->assertDatabaseHas('clients',[
            'name'=>$name
        ]);
    }

}