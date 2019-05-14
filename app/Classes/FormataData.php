<?php

namespace App\Classes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class FormataData
{

    private $data;

    public function __construct($data)
    {
        $DataArray = explode('/',$data);
        $novaData = $DataArray[2].'-'.$DataArray[1].'-'.$DataArray[0];
        $this->data = $novaData;
    }

    public function pegarNovaData()
    {
        return $this->data;
    }
}