<?php

namespace App\Omie;

use App\Helpers\WebHelpers;

class OmieContaPagar
{
    public $codigo_lancamento_omie;                          //	integer	Código do Lançamento de Contas a Pagar.+
    public $codigo_lancamento_integracao;                    // string20	Código de Integração do Lançamento de Contas a Pagar.+
    public $codigo_cliente_fornecedor;                       //	integer	Código do Favorecido / Fornecedor.+
    public $codigo_cliente_fornecedor_integracao;            //	string20	Código de Integração do Favorecido / Fornecedor.+
    public $data_vencimento;                                 // string10	Data de Vencimento.+
    public $valor_documento;                                 // decimal	Valor da Conta.+
    public $codigo_categoria;                                //	string20	Código da Categoria.+
    public $data_previsao;                                   // tring10	Data da Previsão de Pagamento.+
    public $id_conta_corrente;                               // integer	Código da Conta Corrente.+
    public $numero_documento_fiscal;                         //	string20	Número da Nota Fiscal associada ao lançamento de Contas a Pagar.+
    public $data_emissao;                                    // string10	Data de Emissão.+
    public $data_entrada;                                    //	string10	Data de Registro.+
    public $codigo_projeto;                                  // integer	Código do Projeto.+
    public $observacao;                                      // text	Observações.+
    public $valor_pis;                                       // decimal	Valor PIS.+
    public $retem_pis;                                       // string1	Reter PIS.+
    public $valor_cofins;                                    // decimal	Valor COFINS.+
    public $retem_cofins;                                    // string1	Reter COFINS.+
    public $valor_csll;                                      // decimal	Valor CSLL.+
    public $retem_csll;                                      // string1	Reter CSLL.+
    public $valor_ir;                                        // decimal	Valor IR.+
    public $retem_ir;                                        // string1	Reter IR.+
    public $valor_iss;                                       //	decimal	Valor ISS.+
    public $retem_iss;                                       // string1	Reter ISS.+
    public $valor_inss;                                      // decimal	Valor INSS.+
    public $retem_inss;                                      // string1	Reter INSS.+
    public $distribuicao;                                    // distribuicaoArray	Distribuição por Departamentos.+
    public $numero_pedido;                                   // string15	Número do Pedido.+
    public $codigo_tipo_documento;                           // string5	Código do Tipo de Documento.+
    public $numero_documento;                                // string20	Número do Documento.+
    public $numero_parcela;                                  // string7	Número da parcela.+
    public $chave_nfe;                                       // string44	Chave da NF.e.+
    public $codigo_barras_ficha_compensacao;                 // string70	Código de Barras+
    public $codigo_vendedor;                                 // integer	Código do Vendedor.+
    public $id_origem;                                       // string4	Código da Origem.+
    public $info;                                            //	info	Informações sobre a criação/alteração do lançamento de Contas a Pagar.+
    public $operacao;                                        // string2	Código da Operação. .+
    public $status_titulo;                                   // string3	Status do Título.+
    public $nsu;                                             // string20	NSU - Número Sequencial Único.+
    public $acao;                                            //	text	DEPRECATED
    public $id_conta_corrente_integracao;                    // string20	DEPRECATED
    public $bloqueado;                                       //	string1	DEPRECATED
    public $baixa_bloqueada;                                 //	string1	DEPRECATED
    public $codigo_cmc7_cheque;                              // string40	DEPRECATED
    public $importado_api;                                   // string1	Importado pela API (S/N).

    // montar url base
    public static function omieBase($method, $params)
    {
        return 'https://app.omie.com.br/api/v1/financas/contapagar/?JSON={"call":"' . $method . '","app_key":"' . env('OMIE_KEY') . '","app_secret":"' . env('OMIE_SECRET') . '","param":[' . $params . ']}';
    }

    public static function incluir($params)
    {
        $url = self::omieBase("IncluirContaPagar", json_encode($params));
        return WebHelpers::getUrlResponse($url);
    }

    public static function excluir($id)
    {
        $url = self::omieBase("ExcluirContaPagar", json_encode(["codigo_lancamento_integracao" => $id]));
        return WebHelpers::getUrlResponse($url);
    }

    public static function alterar($params)
    {
        $url = self::omieBase("AlterarContaPagar", json_encode($params));
        return WebHelpers::getUrlResponse($url);
    }
    
     public static function updateValorDocumento($cIdContaPagar, $value)
    {
        $url = self::omieBase("AlterarContaPagar", json_encode(["codigo_lancamento_integracao" => $cIdContaPagar, "valor_documento" => $value]));
        return WebHelpers::getUrlResponse($url);
    }
    
    public static function updateDate($cIdContaPagar, $column, $value)
    {
        $url = self::omieBase("AlterarContaPagar", json_encode(["codigo_lancamento_integracao" => $cIdContaPagar, $column => $value]));
        return WebHelpers::getUrlResponse($url);
    }
    
    public static function Listar($page = 1, $rows = 500,  $date_from = '', $date_at = '', $status = '', $desc = "S", $api = 'N')
    {
        //status can be "PAGO","LIQUIDADO","ATRASADO","PAGTO_PARCIAL" | CANCELADO,EMABERTO,VENCEHOJE,AVENCER
        $params = [
            'pagina' => $page,
            'registros_por_pagina' => $rows,
            'apenas_importado_api' => $api,
            'ordem_descrescente' => $desc,
            'filtrar_por_status' => $status ? `[$status]` : ''
        ];
        if ($date_from) {
            $date_from = $date_from == 'AUTO' ? WebHelpers::firstMonth() : $date_from;
            $date_at = $date_at == 'AUTO' ? WebHelpers::lastMonth() : $date_at;
            $params['filtrar_por_data_de'] = $date_from;
            $params['filtrar_por_data_ate'] = $date_at;
        }
        $url = self::omieBase("ListarContasPagar", json_encode($params));
        return WebHelpers::getUrlResponse($url);
    }
}
