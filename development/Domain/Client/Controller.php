<?php
/**
 * Created by PhpStorm.
 * User: allan
 * Date: 09/02/17
 * Time: 10:39
 */
namespace Domain\Client;
use Illuminate\Http\Request;

class Controller extends \Domain\Core\Http\Controller{
    public function store(Request $request){
        $client = new Client;
        $client->name = $request->name;
        $client->save();
        return $client;
    }
}