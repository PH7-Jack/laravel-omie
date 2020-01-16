# Classes para gerenciamento das Apis do Omie com php/Laravel

Criei esse projeto para facilitar a criação e gerenciamento das apis do Omie usando php ou laravel, assim torna o desenvolvimento mais rápido e eficiente. 


# Pré-requisitos

Os pré requisitos básicos são:

 - PHP
 - Importar a classe **WebHelpers**
 - Usar o arquivo **.env**
 - Suporte ao **cUrl**
 - Suporte a requisições **SOAP**
 - Key e Secret do Omie ([Criar Keys](https://ajuda.omie.com.br/pt-BR/articles/499061-obtendo-a-chave-de-acesso-para-integracoes-de-api))
 
 > *Recomendado uso do **Laravel.***
 

## Instalação  Laravel
 - Baixe ou clone o projeto
 - Extrai  o projeto
 - Cole as pastas **Helpers** e **Omie** dentro da pasta **App** na raiz do Laravel.  
 - No arquivo env, coloque os dados do omie da seguinte maneira:
 `OMIE_KEY=SeuOmieKey`
`OMIE_SECRET=SeuOmieSecret`
 

## Instalação php puro
Nunca testado, se conseguir, avise-me para por na documentação

## Apis suportadas

 - [Ordem de Produção](https://app.omie.com.br/api/v1/produtos/op/) 

##  Ordem de Produção 
**Nome da Classe:** OmieOrdemProducao
**Metodos suportados:** 

 - IncluirOrdemProducao
		`$OmieOrdemProducao = new  OmieOrdemProducao;`
		`$OmieOrdemProducao->nQtde = $nQtde;`
		`$OmieOrdemProducao->nCodProduto = $nCodProduto;`
		`$OmieOrdemProducao->cCodIntOP = $cCodIntOP;`
		`$OmieOrdemProducao->data = $data;`
		`$OmieOrdemProducao->dataFinal = $dataFinal;`
		`$OmieOrdemProducao->cObs = $cObs;`
		`$OmieOrdemProducao->incluir();`
		
 - ExcluirOrdemProducao
		`$OmieOrdemProducao = new  OmieOrdemProducao;`
		`$OmieOrdemProducao->excluir($cCodIntOP);`
 - ReverterOrdemProducao
		`$OmieOrdemProducao = new  OmieOrdemProducao;`
		`$OmieOrdemProducao->reverter($cCodIntOP);`
 -  ConcluirOrdemProducao
		 `$OmieOrdemProducao = new  OmieOrdemProducao;`
		 `$OmieOrdemProducao->cCodIntOP = $cCodIntOP;`
		 `$OmieOrdemProducao->dDtConclusao = $dDtConclusao;`
		 `$OmieOrdemProducao->nQtdeProduzida = $nQtdeProduzida;`
		 `$OmieOrdemProducao->concluir();`
