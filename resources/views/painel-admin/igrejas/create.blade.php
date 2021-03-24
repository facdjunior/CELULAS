@extends('template.painel-admin')
@section('title', 'Cadastro de Igrejas')
@section('content')



<form class="form-horizontal" method="POST" action="{{route('igrejas.insert')}}">
        @csrf
<fieldset>
<div class="card ">
    <div class="card-header text-white bg-primary mb-3">Cadastro de Igrejas</div>

<!--
<div class="form-group">
<div class="col-md-4 control-label">
    <img id="logo" src="http://blogdoporao.com.br/wp-content/uploads/2016/12/Faculdade-pitagoras.png"/>
</div>
<div class="col-md-4 control-label">
    <h1>Cadastro de Cliente</h1>

</div>
</div>
    -->


<!-- Text input-->
<div class="form-group ">
<div class="form-group row">
<label class="col-md-1 control-label" for="prependedtext"></label>

  <div class="col-md-5">
  <label class="control-label" for="Nome">Nome <h11>*</h11></label>
  <input id="nome" name="nome" placeholder="" class="form-control input-md" required="" type="text">
  </div>

<div class="col-md-2">
  <label class="control-label" for="Nome">Data Fundação<h11>*</h11></label>
  <input id="dtfudacao" name="dtfudacao" placeholder="DD/MM/AAAA" class="form-control input-md" required="" type="date" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">

</div>
</div>

<!-- Text input-->



<!-- Search input-->
<div class="form-group row">
<label class="col-md-1 control-label" for="prependedtext"></label>
  <div class="col-md-2">
    <div class="form-group">
        <span class="input-group-addon">CEP <h11>*</h11></span>
        <input id="cep" name="cep" placeholder="Apenas números" class="form-control input-md" required="" value="" type="search" maxlength="8" pattern="[0-9]+$">
    </div>
  </div>


<div class="col-md-2">
    <div class="form-group">
      </br>
      <button type="button" class="btn btn-primary" onclick="pesquisacep(cep.value)">Pesquisar</button>
    </div>
  </div>
</div>

<!-- Prepended text-->
<div class="form-group row">
<label class="col-md-1 control-label" for="prependedtext"></label>
  <div class="col-md-3 control-label">
    <div class="form-group">
      <span class="input-group-addon">Rua</span>
      <input id="rua" name="rua" class="form-control"  type="text">
    </div>

  </div>
    <div class="col-md-1">
    <div class="form-group">
      <span class="input-group-addon">Nº <h11>*</h11></span>
      <input id="numero" name="numero" class="form-control"  type="text">
    </div>

  </div>


  <div class="col-md-3">
    <div class="form-group">
      <span class="form-group-addon">Bairro</span>
      <input id="bairro" name="bairro" class="form-control"  type="text">
    </div>

  </div>


</div>

<div class="form-group row">
  <label class="col-md-1 control-label" for="prependedtext"></label>

    <div class="col-md-3">
        <div class="form-group">
            <span class="input-group-addon">Cidade</span>
            <input id="cidade" name="cidade" class="form-control"  type="text">
        </div>

    </div>

   <div class="col-md-1">
    <div class="form-group">
      <span class="input-group-addon">UF</span>
      <input id="estado" name="estado" class="form-control"  type="text">
    </div>

  </div>
</div>
<!-- Button (Double) -->
<div class="form-group row">
  <label class="control-label" for="Cadastrar"></label>
  <div class="col-md-8">
  <p align="right">
    <button id="Cadastrar" name="Cadastrar" class="btn btn-success" type="Submit">Salvar</button>
    <button id="Cancelar" name="Cancelar" class="btn btn-danger" type="Reset">Cancelar</button>
  </p>
  </div>
</div>
</div>





</div>
</div>
</div>
</fieldset>
</form>
<script src="{{URL::asset('../js/validacao.js')}}"></script>?
@endsection
