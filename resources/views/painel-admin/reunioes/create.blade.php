@extends('template.painel-admin')
@section('title', 'Cadastro Reunião')
@section('content')

<?php
session_start();
$r=@$_SESSION['id_membro'];


?>


<form class="form-horizontal" method="POST" action="{{route('reunioes.insert')}}">
        @csrf
<fieldset>
<div class="card ">
    <div class="card-header text-white bg-primary mb-3">Cadastro reuniões</div>

<!-- Text input-->
<div class="form-group ">
<div class="form-group row">
<label class="col-md-1 control-label" for="prependedtext"></label>


  <div class="col-md-2">
        <label class="control-label" for="Nome">Data Cadastro</label>
        <input id="datareuniao" name="datareuniao" placeholder="DD/MM/AAAA" class="form-control input-md" required="" type="date" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
    </div>

  <div class="col-md-5">
  <div class="form-group">
  <label class="input-group-addon">Célula<h11>*</h11></label>
    <select name="celula" id="celula" class="custom-select">

    <?php
        use App\Models\celula;

        $tabela = celula::where('id_lider', '=', $r )->paginate();

    ?>
        @foreach ($tabela as $tbitem)

        <option value="{{$tbitem->id}}">{{$tbitem->nome}} </option>

        @endforeach
    </select>

  </div>
</div>

</div>


<div class="form-group row">
<label class="col-md-1 control-label" for="prependedtext"></label>

    <div class="col-md-2">
        <div class="form-group">
     <label class="control-label" for="qtdmembro">Qtd Membro</label>
         <input id="qtdmembro" name="qtdmembro" class="form-control" />
        </div>
    </div>


     <div class="col-md-2">
        <div class="form-group1">
        <label class="control-label" for="qtdvisitante">Qtd Visitantes</label>
            <input id="qtdvisitante" width="6" name="qtdvisitante" class="form-control" onblur="total ()">
        </div>
     </div>

     <div class="col-md-2">
        <div class="form-group1">
        <label class="control-label" for="totalpresentes">Total Presentes</label>
            <input id="totaldia" name="totaldia" class="form-control" placeholder="" required=""  readonly="readonly" type="text">
        </div>
     </div>

     <div class="col-md-1">
        <div class="form-group">
        <label class="control-label" for="prependedtext">Ofertas</label>
            <input id="oferta" name="oferta" class="form-control" value="0.00" type="text">
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




</div>
</div>
</div>
</fieldset>
</form>
<script src="{{URL::asset('js/validacao.js')}}"></script>


@endsection
