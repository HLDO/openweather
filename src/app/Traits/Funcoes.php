<?php

namespace App\Traits;

trait Funcoes
{

    /**
     * Convert a string to uppercase and remove all special characters
     * Ex: São josé dos cAmpOs to SAO_JOSE_DOS_CAMPOS
     */
    public static function convert_str($valor)
    {
        $valor = trim($valor);
        $valor = preg_replace('/[`^~\'"]/', null, iconv('UTF-8', 'ASCII//TRANSLIT', mb_strtoupper(trim($valor))));
        $valor = preg_replace("/[][><}{)(:;.,!?*%~^`@]/", "", $valor);
        $valor = preg_replace("/ /", "_", $valor);
        return $valor;
    }
}
