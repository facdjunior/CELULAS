@extends('template.painel-admin')
@section('title', 'Cadastro de Redes')
@section('content')
<?php

use App\Models\membro;

@session_start();
if(@$_SESSION['nivel_usuario'] != 'admin'){
  echo "<script language='javascript'> window.location='./' </script>";
}
if(!isset($id)){
  $id = "";

}

?>


<a href="{{route('redes.inserir')}}" type="button" class="mt-4 mb-4 btn btn-primary">Inserir Redes</a>

<!-- DataTales Example -->
<div class="card shadow mb-4 elevation-z4 table-responsive">

<div class="card-body">
  <div class="table-responsive">
    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
      <thead class="thead-primary">
        <tr class="table-primary">
          <th>Nome</th>
          <th>Coordenador</th>
          <th>Celular</th>
          <th>Data Visita</th>
          <th>Ações</th>
        </tr>
      </thead>

      <tbody>
      @foreach($itens as $item)
      <?php
        $data = implode('/', array_reverse(explode('-', $item->dtcadastro)));
        $testes = membro::where('id', '=', $item->id_coordenador)->first();

      ?>
         <tr>
            <td>{{$item->nome}}</td>
            <td>{{$item->mem_nome}}</td>
            <td>{{$item->celular}}</td>
            <td>{{$data}}</td>
            <td>


            <a href="{{route('redes.edit', $item)}}"><i class="fas fa-edit text-info mr-1"></i></a>
            <a href="{{route('redes.modal', $item)}}"><i class="fas fa-trash text-danger mr-1"></i></a>
            </td>
        </tr>
        @endforeach
      </tbody>
  </table>
</div>
</div>
</div>


<script type="text/javascript">
  $(document).ready(function () {
    $('#dataTable').dataTable({
      "ordering": false
    })

  });
</script>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deletar Registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Deseja Realmente Excluir este Registro?

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <form method="POST" action="{{route('redes.delete', $id)}}">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger">Excluir</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
if(@$id != ""){
  echo "<script>$('#exampleModal').modal('show');</script>";
}
?>


@endsection


