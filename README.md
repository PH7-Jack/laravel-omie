<h1 class="code-line" data-line-start=0 data-line-end=1 ><a id="Classes_para_gerenciamento_das_Apis_do_Omie_com_phpLaravel_0"></a>Classes para gerenciamento das Apis do Omie com php/Laravel</h1>
<p class="has-line-data" data-line-start="2" data-line-end="3">Criei esse projeto para facilitar a criação e gerenciamento das apis do Omie usando php ou laravel, assim torna o desenvolvimento mais rápido e eficiente.</p>
<h1 class="code-line" data-line-start=5 data-line-end=6 ><a id="Prrequisitos_5"></a>Pré-requisitos</h1>
<p class="has-line-data" data-line-start="7" data-line-end="8">Os pré requisitos básicos são:</p>
<ul>
<li class="has-line-data" data-line-start="9" data-line-end="10">PHP</li>
<li class="has-line-data" data-line-start="10" data-line-end="11">Importar a classe <strong>WebHelpers</strong></li>
<li class="has-line-data" data-line-start="11" data-line-end="12">Usar o arquivo <strong>.env</strong></li>
<li class="has-line-data" data-line-start="12" data-line-end="13">Suporte ao <strong>cUrl</strong></li>
<li class="has-line-data" data-line-start="13" data-line-end="14"><a href="http://docs.guzzlephp.org/en/stable/quickstart.html">Guzzle Http</a></li>
<li class="has-line-data" data-line-start="14" data-line-end="15">Suporte a requisições <strong>SOAP</strong></li>
<li class="has-line-data" data-line-start="15" data-line-end="17">Key e Secret do Omie (<a href="https://ajuda.omie.com.br/pt-BR/articles/499061-obtendo-a-chave-de-acesso-para-integracoes-de-api">Criar Keys</a>)</li>
</ul>
<blockquote>
<p class="has-line-data" data-line-start="17" data-line-end="18"><em>Recomendado uso do <strong>Laravel.</strong></em></p>
</blockquote>
<h2 class="code-line" data-line-start=20 data-line-end=21 ><a id="Instalao__Laravel_20"></a>Instalação  Laravel</h2>
<ul>
<li class="has-line-data" data-line-start="21" data-line-end="22">Baixe ou clone o projeto</li>
<li class="has-line-data" data-line-start="22" data-line-end="23">Extrai  o projeto</li>
<li class="has-line-data" data-line-start="23" data-line-end="24">Cole as pastas <strong>Helpers</strong> e <strong>Omie</strong> dentro da pasta <strong>App</strong> na raiz do Laravel.</li>
<li class="has-line-data" data-line-start="24" data-line-end="27">No arquivo env, coloque os dados do omie da seguinte maneira:<br>
<code>OMIE_KEY=SeuOmieKey</code><br>
<code>OMIE_SECRET=SeuOmieSecret</code></li>
</ul>
<h2 class="code-line" data-line-start=29 data-line-end=30 ><a id="Instalao_php_puro_29"></a>Instalação php puro</h2>
<p class="has-line-data" data-line-start="30" data-line-end="31">Nunca testado, se conseguir, avise-me para por na documentação</p>
<h2 class="code-line" data-line-start=32 data-line-end=33 ><a id="Apis_suportadas_32"></a>Apis suportadas</h2>
<ul>
<li class="has-line-data" data-line-start="34" data-line-end="36"><a href="https://app.omie.com.br/api/v1/produtos/op/">Ordem de Produção</a></li>
</ul>
<h2 class="code-line" data-line-start=36 data-line-end=37 ><a id="Ordem_de_Produo_36"></a>Ordem de Produção</h2>
<p class="has-line-data" data-line-start="37" data-line-end="39"><strong>Nome da Classe:</strong> OmieOrdemProducao<br>
<strong>Metodos suportados:</strong></p>
<ul>
<li class="has-line-data" data-line-start="40" data-line-end="50">
<p class="has-line-data" data-line-start="40" data-line-end="49">IncluirOrdemProducao<br>
<code>$OmieOrdemProducao = new OmieOrdemProducao;</code><br>
<code>$OmieOrdemProducao-&gt;nQtde = $nQtde;</code><br>
<code>$OmieOrdemProducao-&gt;nCodProduto = $nCodProduto;</code><br>
<code>$OmieOrdemProducao-&gt;cCodIntOP = $cCodIntOP;</code><br>
<code>$OmieOrdemProducao-&gt;data = $data;</code><br>
<code>$OmieOrdemProducao-&gt;dataFinal = $dataFinal;</code><br>
<code>$OmieOrdemProducao-&gt;cObs = $cObs;</code><br>
<code>$OmieOrdemProducao-&gt;incluir();</code></p>
</li>
<li class="has-line-data" data-line-start="50" data-line-end="53">
<p class="has-line-data" data-line-start="50" data-line-end="53">ExcluirOrdemProducao<br>
<code>$OmieOrdemProducao = new OmieOrdemProducao;</code><br>
<code>$OmieOrdemProducao-&gt;excluir($cCodIntOP);</code></p>
</li>
<li class="has-line-data" data-line-start="53" data-line-end="56">
<p class="has-line-data" data-line-start="53" data-line-end="56">ReverterOrdemProducao<br>
<code>$OmieOrdemProducao = new OmieOrdemProducao;</code><br>
<code>$OmieOrdemProducao-&gt;reverter($cCodIntOP);</code></p>
</li>
<li class="has-line-data" data-line-start="56" data-line-end="62">
<p class="has-line-data" data-line-start="56" data-line-end="62">ConcluirOrdemProducao<br>
<code>$OmieOrdemProducao = new OmieOrdemProducao;</code><br>
<code>$OmieOrdemProducao-&gt;cCodIntOP = $cCodIntOP;</code><br>
<code>$OmieOrdemProducao-&gt;dDtConclusao = $dDtConclusao;</code><br>
<code>$OmieOrdemProducao-&gt;nQtdeProduzida = $nQtdeProduzida;</code><br>
<code>$OmieOrdemProducao-&gt;concluir();</code></p>
</li>
</ul>
