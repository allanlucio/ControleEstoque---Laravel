<?php

namespace Domain\Client\Requests;
use Domain\Core\Http\Request as BaseRequest;

class Store extends BaseRequest{
    public function rules(){
        return [
            'name' => 'required|max:45',
            'cpf'=>'cpf',
            'birthdate'=>'date|date_format:Y-m-d'


        ];
    }

    public function messages()
    {
        return[
            'cpf.cpf'=>'CPF inválido'
        ];
    }
}