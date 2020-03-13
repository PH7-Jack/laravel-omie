<?php

namespace App\Omie;
 
use App\Helpers\WebHelpers;
use Illuminate\Support\Str;

class OmieProdutos
{
    // montar url base
    public static function omieBase($method, $params)
    {
        return  $url = 'https://app.omie.com.br/api/v1/geral/produtos/?JSON={"call":"' . $method . '","app_key":"' . env('OMIE_KEY') . '","app_secret":"' . env('OMIE_SECRET') . '","param":[' . $params . ']}';
    }

    public static function ListarProdutos($page, $rows, $sortBy, $descending, $filter)
    {
        $params = new \stdClass();
        $params->pagina = $page;
        $params->registros_por_pagina = $rows;
        $params->apenas_importado_api = 'N';
        $params->filtrar_apenas_omiepdv = 'N';
        $params->ordenar_por = $sortBy;
        $params->ordem_decrescente = $descending ? 'S' : 'N';
        if ($filter) {
            $params->filtrar_apenas_descricao = "%$filter%";
        }
        $url = self::omieBase("ListarProdutos", json_encode($params));
        return WebHelpers::getUrlResponse($url);
    }

    public static function ConsultarProduto($params)
    {
        //codigo,codigo_produto,codigo_produto_integracao
        $url = self::omieBase("ConsultarProduto", json_encode($params));
        return WebHelpers::getUrlResponse($url);
    }

    public static function AlterarProduto($params)
    {
        $url = self::omieBase("AlterarProduto", json_encode($params));
        return WebHelpers::getUrlResponse($url);
    }
}
