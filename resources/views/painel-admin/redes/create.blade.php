@extends('template.painel-admin')
@section('title', 'Cadastro de Redes')
@section('content')



<form class="form-horizontal" method="POST" action="{{route('redes.insert')}}">
        @csrf
<fieldset>
<div class="card ">
    <div class="card-header text-white bg-primary mb-3">Cadastro de Redes</div>

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

  <div class="col-md-3">
  <label class="control-label" for="Nome">Nome <h11>*</h11></label>
  <input id="nome" name="nome" placeholder="" class="form-control input-md" required="" type="text">
  </div>

  <div class="col-md-4">
  <div class="form-group">
  <label class="input-group-addon">Membro<h11>*</h11></label>
    <select name="coordenador" id="coordenador" class="custom-select">

    <?php
        use App\Models\membro;
        $tabela = membro::orderby('mem_nome', 'asc')->paginate();

    ?>
        @foreach ($tabela as $tbitem)

        <option value="{{$tbitem->id}}">{{$tbitem->mem_nome}} </option>

        @endforeach
    </select>

  </div>
</div>

</div>



<!-- Text input-->


<div class="form-group row">
<label class="col-md-1 control-label" for="prependedtext"></label>

    <div class="col-md-2">
        <div class="form-group">
     <label class="control-label" for="Nome">Celular</label>
         <input id="celular" name="celular" class="form-control" placeholder="XX XXXXX-XXXX" required=""
      type="text" maxlength="13" pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$"
      OnKeyPress="formatar('## #####-####', this)">
        </div>
    </div>


     <div class="col-md-2">
        <div class="form-group">
        <label class="control-label" for="prependedtext">Telefone</label>
            <input id="fone" name="fone" class="form-control" placeholder="XX XXXXX-XXXX"
      type="text" maxlength="13"  pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$"
      OnKeyPress="formatar('## #####-####', this)">
        </div>
     </div>

     <div class="col-md-2">
        <label class="control-label" for="Nome">Data Cadastro</label>
        <input id="dtcadastro" name="dtcadastro" placeholder="DD/MM/AAAA" class="form-control input-md" required="" type="date" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
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
