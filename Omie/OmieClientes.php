<?php

namespace App\Omie;

use App\Client;
use App\Helpers\WebHelpers;
use Illuminate\Support\Str;

class OmieClientes
{

    public $codigo_cliente_omie;            //	integer   	                Código de Cliente / Fornecedor
    public $codigo_cliente_integracao;      //	string              20	    Código de Integração com sistemas legados.
    public $razao_social;                   //	string              60	    Razão Social - Preenchimento Obrigatório.
    public $cnpj_cpf;                       //	string              20	    CNPJ / CPF - Preenchimento Obrigatório para emissão de NF-e/NFS-e.
    public $nome_fantasia;                  //  string              100	    Nome Fantasia - Preenchimento Obrigatório para emissão de NF-e/NFS-e.
    public $telefone1_ddd;                  //  string              5	    DDD Telefone - Preenchimento Opcional.
    public $telefone1_numero;               //	string              15	    Telefone para Contato - Preenchimento Opcional.
    public $contato;                        //	string              100	    Nome para contato - Preenchimento Opcional.
    public $endereco;                       //	string              60	    Endereço - Preenchimento Opcional | Preenchimento Obrigatório para emissão de NF-e/NFS-e. | Informação localizada na Aba "Endereço" do cadastro do Cliente.
    public $endereco_numero;                //	string              10	    Número do Endereço - Preenchimento Opcional | Preenchimento Obrigatório para emissão de NF-e/NFS-e. | Informação localizada na Aba "Endereço" do cadastro do Cliente.
    public $bairro;                         //  string              60	    Bairro - Preenchimento Opcional | Preenchimento Obrigatório para emissão de NF-e/NFS-e. | Informação localizada na Aba "Endereço" do cadastro do Cliente.
    public $complemento;                    //	string              60	    Complemento para o Número do Endereço - Preenchimento Opcional | Preenchimento Obrigatório para emissão de NF-e/NFS-e. | Informação localizada na Aba "Endereço" do cadastro do Cliente.
    public $estado;                         //  string              2	    Sigla do Estado+
    public $cidade;                         //  string              40	    Código da Cidade+
    public $cep;                            //  string              10	    CEP+
    public $codigo_pais;                    //	string              4	    Código do País+
    public $telefone2_ddd;                  //  string              5	    DDD Telefone 2+
    public $telefone2_numero;               //	string              15	    Telefone 2+
    public $fax_ddd;                        //  string              5	    DDD Fax+
    public $fax_numero;                     //	string              15	    Fax+
    public $email;                          //  string              500	    E-Mail+ 
    public $homepage;                       //	string              100	    WebSite+
    public $inscricao_estadual;             //	string              20	    Inscrição Estadual+
    public $inscricao_municipal;            //  string              20	    Inscrição Municipal+
    public $inscricao_suframa;              //  string              20	    Inscrição Suframa+
    public $optante_simples_nacional;       //	string              1	    Indica se o Cliente / Fornecedor é Optante do Simples Nacional +
    public $tipo_atividade;                 //  string              1	    Tipo da Atividade+
    public $cnae;                           //	string              7	    Código do CNAE - Fiscal+
    public $produtor_rural;                 //	string              1	    Indica se o Cliente / Fornecedor é um Produtor Rural+
    public $contribuinte;                   //  string              1	    Indica se o cliente é contribuinte (S/N).+
    public $observacao;                     //	text	                    Observação+
    public $recomendacao_atraso;            //	string              2	    Código da Instrução de Protesto+
    public $tags;                           //  tagsArray	                Tags do Cliente ou Fornecedor+
    public $info;                           //  info	                    Informações sobre o cadastro do cliente.
    public $pessoa_fisica;                  //	string              1	    Pessoa Física+
    public $exterior;                       //	string              1	    Indica que é um tomador de serviço localizado no exterior+
    // public $logradouro;                     //	string              6	    DEPRECATED
    public $importado_api;                  //  string              1	    Importado pela API (S/N).
    // public $bloqueado;                      //  string              1	    DEPRECATED
    public $cidade_ibge;                    //	string              7	    Código do IBGE para a Cidade.+
    public $valor_limite_credito;           //	decima              l	    Valor do Limite de Crédito Total.+
    public $bloquear_faturamento;           //	string              1	    Bloquear o faturamento para o cliente (S/N).+
    public $recomendacoes;                  //	recomendacoes	            Recomendações do cliente.
    public $enderecoEntrega;                //	enderecoEntrega	            Dados do Endereço de Entrega.
    public $nif;                            //	string              100	    NIF - Número de Identificação Fiscal.+
    public $inativo;                        //  string              1	    Indica se o cliente está inativo [S/N]

    // montar url base
    public static function omieBase($method, $params)
    {
        return  $url = 'https://app.omie.com.br/api/v1/geral/clientes/?JSON={"call":"' . $method . '","app_key":"' . env('OMIE_KEY') . '","app_secret":"' . env('OMIE_SECRET') . '","param":[' . $params . ']}';
    }

    public static function incluir($params)
    { 
        $url = self::omieBase("IncluirCliente", json_encode($params));
        return WebHelpers::getUrlResponse($url); 
    }

    public static function ListarClientes($params)
    { 
        $url = self::omieBase("ListarClientes", json_encode($params));
        return WebHelpers::getUrlResponse($url);
    }
    
    public static function ConsultarCliente($params)
    {
        $url = self::omieBase("ConsultarCliente", json_encode($params));
        return WebHelpers::getUrlResponse($url);
    }

    public static function ListarClientesTags($tags_array)
    {
        $tags = [];
        foreach ($tags_array as $tag) {
            array_push($tags, ['tag' => $tag]);
        }
        $params = [
            'pagina' => 1,
            'registros_por_pagina' => 500,
            'apenas_importado_api' => 'N',
            'clientesFiltro' => [
                'tags' => $tags
            ]
        ];
        $url = self::omieBase("ListarClientes", json_encode($params));
        return WebHelpers::getUrlResponse($url);
    }
}
