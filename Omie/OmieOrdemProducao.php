<?php

namespace App\Omie;

use App\Helpers\WebHelpers;

class OmieOrdemProducao
{
    public $nQtde;
    public $nCodProduto;
    public $cCodIntOP;
    public $data;
    public $dataFinal;
    public $cObs;
    public $dDtConclusao;
    public $nQtdeProduzida;

    // montar url base
    public function omieBase($method, $params)
    {
        return  $url = 'https://app.omie.com.br/api/v1/produtos/op/?JSON={"call":"' . $method . '","app_key":"' . env('OMIE_KEY') . '","app_secret":"' . env('OMIE_SECRET') . '","param":[' . $params . ']}';
    }

    public function incluir()
    {
        $params = '{"identificacao":{"nQtde":' . $this->nQtde . ', "nCodProduto":' . $this->nCodProduto . ', "cCodIntOP":"' . $this->cCodIntOP . '","dDtPrevisao":"' . $this->dataFinal . '"}, "infAdicionais":{"dDtConclusao":"' . $this->data . '","dDtInicio":"' . $this->data . '"}, "observacoes":{"cObs":"' . $this->cObs . '"},"outrasInf":{"dConclusao":"' . $this->data . '", "dInclusao":"' . $this->data . '"}}';
        $url = $this->omieBase("IncluirOrdemProducao", $params);
        return WebHelpers::getUrlResponse($url);
    }

    public function excluir($cCodIntOP)
    {
        $params = '{"cCodIntOP": "' . $cCodIntOP . '"}';
        $url = $this->omieBase("ExcluirOrdemProducao", $params);
        return WebHelpers::getUrlResponse($url);
    }

    public function concluir()
    {
        $params = '{"cCodIntOP": "' . $this->cCodIntOP . '","dDtConclusao": "' . $this->dDtConclusao . '","nQtdeProduzida":"' . $this->nQtdeProduzida . '"}';
        $url = $this->omieBase("ConcluirOrdemProducao", $params);
        return WebHelpers::getUrlResponse($url);
    }

    public function reverter($cCodIntOP)
    {
        $params = '{"cCodIntOP": "' . $cCodIntOP . '"}';
        $url = $this->omieBase("ReverterOrdemProducao", $params);
        return WebHelpers::getUrlResponse($url);
    }
}
