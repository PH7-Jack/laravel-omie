<h1 class="code-line" data-line-start=0 data-line-end=1 ><a id="Classes_para_gerenciamento_das_Apis_do_Omie_com_phpLaravel_0"></a>Classes para gerenciamento das Apis do Omie com php/Laravel</h1>
<p class="has-line-data" data-line-start="2" data-line-end="3">Criei esse projeto para facilitar a criação e gerenciamento das apis do Omie usando php ou laravel, assim torna o desenvolvimento mais rápido e eficiente.</p>
<h2 class="code-line" data-line-start=4 data-line-end=5 ><a id="Colaboradores_4"></a>Colaboradores</h2>
<p class="has-line-data" data-line-start="5" data-line-end="6">@IgorDePaula</p>
<h1 class="code-line" data-line-start=7 data-line-end=8 ><a id="Prrequisitos_7"></a>Pré-requisitos</h1>
<p class="has-line-data" data-line-start="9" data-line-end="10">Os pré requisitos básicos são:</p>
<ul>
<li class="has-line-data" data-line-start="11" data-line-end="12">PHP</li>
<li class="has-line-data" data-line-start="12" data-line-end="13">Importar a classe <strong>WebHelpers</strong></li>
<li class="has-line-data" data-line-start="13" data-line-end="14">Usar o arquivo <strong>.env</strong></li>
<li class="has-line-data" data-line-start="14" data-line-end="15">Suporte ao <strong>cUrl</strong></li>
<li class="has-line-data" data-line-start="15" data-line-end="16"><a href="http://docs.guzzlephp.org/en/stable/quickstart.html">Guzzle Http</a></li>
<li class="has-line-data" data-line-start="16" data-line-end="17">Suporte a requisições <strong>SOAP</strong></li>
<li class="has-line-data" data-line-start="17" data-line-end="19">Key e Secret do Omie (<a href="https://ajuda.omie.com.br/pt-BR/articles/499061-obtendo-a-chave-de-acesso-para-integracoes-de-api">Criar Keys</a>)</li>
</ul>
<blockquote>
<p class="has-line-data" data-line-start="19" data-line-end="20"><em>Recomendado uso do <strong>Laravel.</strong></em></p>
</blockquote>
<h2 class="code-line" data-line-start=22 data-line-end=23 ><a id="Instalao__Laravel_22"></a>Instalação  Laravel</h2>
<ul>
<li class="has-line-data" data-line-start="23" data-line-end="24">Baixe ou clone o projeto</li>
<li class="has-line-data" data-line-start="24" data-line-end="25">Extrai  o projeto</li>
<li class="has-line-data" data-line-start="25" data-line-end="26">Cole as pastas <strong>Helpers</strong> e <strong>Omie</strong> dentro da pasta <strong>App</strong> na raiz do Laravel.</li>
<li class="has-line-data" data-line-start="26" data-line-end="29">No arquivo env, coloque os dados do omie da seguinte maneira:<br>
<code>OMIE_KEY=SeuOmieKey</code><br>
<code>OMIE_SECRET=SeuOmieSecret</code></li>
</ul>
<h2 class="code-line" data-line-start=31 data-line-end=32 ><a id="Instalao_php_puro_31"></a>Instalação php puro</h2>
<p class="has-line-data" data-line-start="32" data-line-end="33">Nunca testado, se conseguir, avise-me para por na documentação</p>
<h2 class="code-line" data-line-start=34 data-line-end=35 ><a id="Apis_suportadas_34"></a>Apis suportadas</h2>
<ul>
<li class="has-line-data" data-line-start="36" data-line-end="38"><a href="https://app.omie.com.br/api/v1/produtos/op/">Ordem de Produção</a></li>
</ul>
<h2 class="code-line" data-line-start=38 data-line-end=39 ><a id="Ordem_de_Produo_38"></a>Ordem de Produção</h2>
<p class="has-line-data" data-line-start="39" data-line-end="41"><strong>Nome da Classe:</strong> OmieOrdemProducao<br>
<strong>Metodos suportados:</strong></p>
<ul>
<li class="has-line-data" data-line-start="42" data-line-end="52">
<p class="has-line-data" data-line-start="42" data-line-end="51">IncluirOrdemProducao<br>
<code>$OmieOrdemProducao = new OmieOrdemProducao;</code><br>
<code>$OmieOrdemProducao-&gt;nQtde = $nQtde;</code><br>
<code>$OmieOrdemProducao-&gt;nCodProduto = $nCodProduto;</code><br>
<code>$OmieOrdemProducao-&gt;cCodIntOP = $cCodIntOP;</code><br>
<code>$OmieOrdemProducao-&gt;data = $data;</code><br>
<code>$OmieOrdemProducao-&gt;dataFinal = $dataFinal;</code><br>
<code>$OmieOrdemProducao-&gt;cObs = $cObs;</code><br>
<code>$OmieOrdemProducao-&gt;incluir();</code></p>
</li>
<li class="has-line-data" data-line-start="52" data-line-end="55">
<p class="has-line-data" data-line-start="52" data-line-end="55">ExcluirOrdemProducao<br>
<code>$OmieOrdemProducao = new OmieOrdemProducao;</code><br>
<code>$OmieOrdemProducao-&gt;excluir($cCodIntOP);</code></p>
</li>
<li class="has-line-data" data-line-start="55" data-line-end="58">
<p class="has-line-data" data-line-start="55" data-line-end="58">ReverterOrdemProducao<br>
<code>$OmieOrdemProducao = new OmieOrdemProducao;</code><br>
<code>$OmieOrdemProducao-&gt;reverter($cCodIntOP);</code></p>
</li>
<li class="has-line-data" data-line-start="58" data-line-end="64">
<p class="has-line-data" data-line-start="58" data-line-end="64">ConcluirOrdemProducao<br>
<code>$OmieOrdemProducao = new OmieOrdemProducao;</code><br>
<code>$OmieOrdemProducao-&gt;cCodIntOP = $cCodIntOP;</code><br>
<code>$OmieOrdemProducao-&gt;dDtConclusao = $dDtConclusao;</code><br>
<code>$OmieOrdemProducao-&gt;nQtdeProduzida = $nQtdeProduzida;</code><br>
<code>$OmieOrdemProducao-&gt;concluir();</code></p>
</li>
</ul>
