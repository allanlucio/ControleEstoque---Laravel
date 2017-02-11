<?php
/**
 * Created by PhpStorm.
 * User: allan
 * Date: 09/02/17
 * Time: 10:39
 */
namespace Domain\Client;
use Domain\Client\Requests\Store;


class Controller extends \Domain\Core\Http\Controller{
    public function store(Store $request){
        $client = new Client;
        $client->fill($request->all());
        $client->save();
        return $client;
    }
}