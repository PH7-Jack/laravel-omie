<?php

namespace App\Omie;

use App\Helpers\WebHelpers;

class OmiePedidoVendaProduto
{
    // montar url base
    public static function omieBase($method, $params)
    {
        return  $url = 'https://app.omie.com.br/api/v1/produtos/pedido/?JSON={"call":"' . $method . '","app_key":"' . env('OMIE_KEY') . '","app_secret":"' . env('OMIE_SECRET') . '","param":[' . $params . ']}';
    }

    public static function ListarPedidos($page, $rows, $sortBy, $descending)
    {
        $params = '{"pagina":' . $page . ',"registros_por_pagina":"' . $rows . '","ordem_descrescente":"' . $descending . '", "ordenar_por":"' . $sortBy . '","apenas_importado_api":"N"}';
        $url = self::omieBase("ListarPedidos", $params);
        return WebHelpers::getUrlResponse($url);
    }
    public static function ConsultarPedido($params)
    {
        //by can be codigo_pedido,codigo_pedido_integracao,numero_pedido
        $url = self::omieBase("ConsultarPedido", json_encode($params));
        return WebHelpers::getUrlResponse($url);
    }
}
