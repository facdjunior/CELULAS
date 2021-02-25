@extends('template.painel-admin')
@section('title', 'Edição de Redes')
@section('content')



<form class="form-horizontal" method="POST" action="{{route('redes.editar',$item)}}">
        @csrf
        @method('put')
<fieldset>
<div class="card ">
    <div class="card-header text-white bg-primary mb-3">Alteração cadastro</div>

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
  <input id="nome" name="nome" value="{{$item->nome}}" placeholder="" class="form-control input-md" required="" type="text">
  </div>

  <div class="col-md-3">
  <div class="form-group">
  <label class="control-label" for="Nome">Coordenador<h11>*</h11></label>
    <select required id="coordenador" name="coordenador" class="form-control">

    <?php
        use App\Models\membro;
        $tbmembros = membro::orderby('mem_nome', 'asc')->get();
        $resultado = membro::where('id', '=', $item->id_coordenador)->first();

    ?>
    <option value="{{$item->id_coordenador}}">{{$resultado->mem_nome}} </option>
    @foreach ($tbmembros as $tbitem)
        <?php if($resultado->mem_nome != $tbitem->mem_nome){ ?>
        <option value="{{$tbitem->id}}">{{$tbitem->mem_nome}} </option>
        <?php } ?>
        @endforeach
    </select>
  </div>
  </div>



</div>



<!-- Prepended text-->
<div class="form-group row">
<label class="col-md-1 control-label" for="prependedtext"></label>



  <div class="col-md-2">
    <div class="form-group">
    <label class="control-label" for="prependedtext">Celular <h11>*</h11></label>

      <input id="celular" name="celular" value="{{$item->celular}}" class="form-control" placeholder="XX XXXXX-XXXX" required=""
      type="text" maxlength="13" pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$"
      OnKeyPress="formatar('## #####-####', this)">
    </div>
  </div>


     <div class="col-md-2">
        <div class="form-group">
        <label class="control-label" for="prependedtext">Telefone</label>
            <input id="fone" name="fone" value="{{$item->telefone}}" class="form-control" placeholder="XX XXXXX-XXXX"
      type="text" maxlength="13"  pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$"
      OnKeyPress="formatar('## #####-####', this)">
        </div>
     </div>

     <div class="col-md-2">
  <label class="control-label" for="Nome">Data Cadastro</label>
  <input id="dtcadastro" name="dtcadastro" value="{{$item->dtcadastro}}" placeholder="DD/MM/AAAA" class="form-control input-md" required="" type="date" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
</div>
 </div>

</div>

<!-- Button (Double) -->
<div class="form-group row">
  <label class="control-label" for="Cadastrar"></label>
  <div class="col-md-8">
  <p align="right">

  <input name="oldnome" value="{{$item->nome}}"  type="hidden">



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
