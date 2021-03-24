@extends('template.painel-admin')
@section('title', 'Cadastro Reunião')
@section('content')



<form class="form-horizontal" method="POST" action="{{route('reunioes.editar',$item)}}">
        @csrf
        @method('put')
<fieldset>
<div class="card ">
    <div class="card-header text-white bg-primary mb-3">Cadastro reuniões</div>

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


  <div class="col-md-2">
        <label class="control-label" for="Nome">Data Cadastro</label>
        <input id="datareuniao" name="datareuniao" value="{{$item->datareuniao}}" placeholder="DD/MM/AAAA" class="form-control input-md" required="" type="date" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
    </div>

  <div class="col-md-4">
  <div class="form-group">
  <label class="input-group-addon">Célula<h11>*</h11></label>
    <select name="celula" id="celula" class="custom-select">

    <?php
        use App\Models\celula;
        $tabela = celula::orderby('nome', 'asc')->paginate();
        $resultado = celula::where('id', '=', $item->id_celula)->first();

    ?>
     <option value="{{$item->id_celula}}">{{$resultado->nome}} </option>
        @foreach ($tabela as $tbitem)
        <?php if($resultado->nome != $tbitem->nome){ ?>
        <option value="{{$tbitem->id}}">{{$tbitem->nome}} </option>
        <?php } ?>
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
     <label class="control-label" for="qtdmembro">Qtd Membro</label>
         <input id="qtdmembro" name="qtdmembro" value="{{$item->qtdmembro}}" class="form-control" />
        </div>
    </div>


     <div class="col-md-2">
        <div class="form-group">
        <label class="control-label" for="qtdvisitante">Qtd Visitantes</label>
            <input id="qtdvisitante" name="qtdvisitante" value="{{$item->qtdvisitante}}" class="form-control" onblur="total ()">
        </div>
     </div>

     <div class="col-md-2">
        <div class="form-group">
        <label class="control-label" for="totalpresentes">Total Presentes</label>
            <input id="totaldia" name="totaldia" class="form-control" width="6" value="{{$item->qtdtotal}}" placeholder="" required=""  readonly="readonly" type="text">
        </div>
     </div>
    </div>

    <div class="form-group row">
    <label class="col-md-1 control-label" for="prependedtext"></label>

     <div class="col-md-2">
        <div class="form-group">
        <label class="control-label" for="prependedtext">Ofertas</label>
            <input id="oferta" name="oferta" class="form-control" width="8" value="{{$item->oferta}}" type="text" maxlength="6" pattern="[0-9]+$">
        </div>
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


<input name="igreja" value="{{$i}}"  type="hidden">

</div>
</div>
</div>
</fieldset>
</form>
<script src="{{URL::asset('js/validacao.js')}}"></script>?


@endsection
