@extends('template.painel-admin')
@section('title', 'Cadastro de Membros')
@section('content')



<form class="form-horizontal" method="POST" action="{{route('membros.insert')}}">
        @csrf
<fieldset>
<div class="card ">
    <div class="card-header text-white bg-primary mb-3">Cadastro de Cliente</div>

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

  <div class="col-md-6">
  <label class="control-label" for="Nome">Nome <h11>*</h11></label>
  <input id="nome" name="nome" placeholder="" class="form-control input-md" required="" type="text">
  </div>
</div>

<!-- Text input-->


<div class="form-group row">
<label class="col-md-1 control-label" for="prependedtext"></label>

  <div class="col-md-2">
  <label class="control-label" for="Nome">CPF <h11>*</h11></label>
  <input id="cpf" name="cpf" placeholder="Apenas números" class="form-control input-md" required="" type="text" >
  </div>


  <div class="col-md-2">
  <label class="control-label" for="Nome">Nascimento<h11>*</h11></label>
  <input id="dtnasc" name="dtnasc" placeholder="DD/MM/AAAA" class="form-control input-md" required="" type="date" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
</div>

<!-- Multiple Radios (inline) -->


  <div class="col-md-4">

  <label class="control-label" for="radios">Sexo <h11>*</h11></label></br>
    <label required="" class="radio-inline" for="radios-0" >
      <input name="sexo" id="sexo" value="Feminino" type="radio" required>
      Feminino
    </label>
    <label class="radio-inline" for="radios-1">
      <input name="sexo" id="sexo" value="Masculino" type="radio">
      Masculino
    </label>

  </div>

</div>


<!-- Prepended text-->
<div class="form-group row">
<label class="col-md-1 control-label" for="prependedtext"></label>

  <div class="col-md-2">
  <div class="form-group">
  <span class="input-group-addon">Estado Civil <h11>*</h11></span>
    <select required id="estadocivil" name="estadocivil" class="form-control">
        <option value=""></option>
      <option value="Solteiro(a)">Solteiro(a)</option>
      <option value="Casado(a)">Casado(a)</option>
      <option value="Divorciado(a)">Divorciado(a)</option>
      <option value="Viuvo(a)">Viuvo(a)</option>
    </select>
  </div>
  </div>

  <div class="col-md-2">
    <div class="form-group">
    <span class="control-label" for="prependedtext">Celular <h11>*</h11></span>

      <input id="celular" name="celular" class="form-control" placeholder="XX XXXXX-XXXX" required=""
      type="text" maxlength="13" pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$"
      OnKeyPress="formatar('## #####-####', this)">
    </div>
  </div>


     <div class="col-md-2">
        <div class="form-group">
        <span class="control-label" for="prependedtext">Telefone</span>
            <input id="fone" name="fone" class="form-control" placeholder="XX XXXXX-XXXX"
      type="text" maxlength="13"  pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$"
      OnKeyPress="formatar('## #####-####', this)">
        </div>
     </div>
 </div>

</div>



<!-- Prepended text-->
<div class="form-group row">
<label class="col-md-1 control-label" for="prependedtext"></label>
  <div class="col-md-4">
    <div class="form-group">
    <span class="form-group-addon">Email <h11>*</h11></span>
      <input id="email" name="email" class="form-control" placeholder="email@email.com"
      required="" type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" >
    </div>
  </div>
</div>


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
      <input id="rua" name="rua" class="form-control" placeholder="" required=""  type="text">
    </div>

  </div>
    <div class="col-md-1">
    <div class="form-group">
      <span class="input-group-addon">Nº <h11>*</h11></span>
      <input id="numero" name="numero" class="form-control" placeholder="" required=""  type="text">
    </div>

  </div>


  <div class="col-md-3">
    <div class="form-group">
      <span class="form-group-addon">Bairro</span>
      <input id="bairro" name="bairro" class="form-control" placeholder="" required="" readonly="readonly" type="text">
    </div>

  </div>


</div>

<div class="form-group row">
  <label class="col-md-1 control-label" for="prependedtext"></label>

  <div class="col-md-3">
    <div class="form-group">
      <span class="input-group-addon">Complemento</span>
      <input id="complemento" name="complemento" class="form-control" placeholder="" required=""  type="text">
    </div>
  </div>

  <div class="col-md-3">
    <div class="form-group">
      <span class="input-group-addon">Cidade</span>
      <input id="cidade" name="cidade" class="form-control" placeholder="" required=""  readonly="readonly" type="text">
    </div>

  </div>

   <div class="col-md-1">
    <div class="form-group">
      <span class="input-group-addon">UF</span>
      <input id="estado" name="estado" class="form-control" placeholder="" required=""  readonly="readonly" type="text">
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
<script src="{{URL::asset('js/validacao.js')}}"></script>
@endsection
