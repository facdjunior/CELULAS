@extends('template.painel-admin')
@section('title', 'Cadastro de Células')
@section('content')



<form class="form-horizontal" method="POST" action="{{route('celulas.insert')}}">
  @csrf
  <fieldset>
    <div class="content">


    <nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">

    <a class="nav-item nav-link active" id="celulas" data-toggle="tab" href="#tab1" role="tab1" aria-controls="nav-home" aria-selected="true">Célula</a>
    <a class="nav-item nav-link" id="local" data-toggle="tab" href="#tab2" role="tab2" aria-controls="nav-profile" aria-selected="false">Endereço</a>
    <a class="nav-item nav-link" id="lider" data-toggle="tab" href="#tab3" role="tab3" aria-controls="nav-contact" aria-selected="false">Líderes</a>

    </div>

    </nav>
    <div class="tab-content" id="nav-tabContent">

        <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="celulas">
        <label class="col-md-1 control-label" for="prependedtext"></label>

          <div class="form-group row">
            <div class="col-md-3">
              <label class="control-label" for="Nome">Célula <h11>*</h11></label>
              <input id="nome" name="nome" placeholder="" class="form-control input-md" required="" type="text">
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="input-group-addon">Rede<h11>*</h11></label>
                <select name="rede" id="rede" class="custom-select">

                  <?php

                    use App\Models\rede;
                  $tabela = rede::orderby('nome', 'asc')->paginate();
                  ?>
                  <option value="{{0}}">Informe Rede</option>
                  @foreach ($tabela as $tbitem)
                  <option value="{{$tbitem->id}}">{{$tbitem->nome}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            </div>
            <div class="form-group row">
            <div class="col-md-2">
              <div class="form-group">
                <label class="input-group-addon">Frequência<h11>*</h11></label>
                <select name="frequencia" id="frequencia" class="custom-select">

                  <?php
                  use App\Models\frequencia;
                  $tabela = frequencia::orderby('id', 'asc')->paginate();
                  ?>
                  <option value="{{0}}">Informe Frequência</option>
                  @foreach ($tabela as $tbitem)
                  <option value="{{$tbitem->id}}">{{$tbitem->descricao}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="input-group-addon">Dia da Semana<h11>*</h11></label>
                <select name="diasemana" id="diasemana" class="custom-select">

                  <?php
                  use App\Models\diasemana;
                  $tabela = diasemana::orderby('id', 'asc')->paginate();
                  ?>
                  <option value="{{0}}">Informe dia da semana</option>
                  @foreach ($tabela as $tbitem)
                  <option value="{{$tbitem->id}}">{{$tbitem->descricao}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-group">
                <label class="input-group-addon">Horário<h11>*</h11></label>
                <input id="horario" name="horario" class="form-control" placeholder="00:00"
                type="text" maxlength="5"  pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$"
                OnKeyPress="formatar('##:##', this)">
              </div>
            </div>

            </div>

        </div> <!-- .tab1 -->

        <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="local">
        <label class="col-md-1 control-label" for="prependedtext"></label>

        <div class="form-group row">
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
        <div class="form-group row">
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
          <div class="col-md-2">
            <div class="form-group">
              <span class="form-group-addon">Bairro</span>
              <input id="bairro" name="bairro" class="form-control" placeholder="" required="" readonly="readonly" type="text">
            </div>
          </div>
        </div>

        <div class="form-group row">
            <div class="col-md-2">
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

        </div> <!-- .tab2 -->

        <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="lider">

        <label class="col-md-1 control-label" for="prependedtext"></label>

          <div class="form-group row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="input-group-addon">Líder<h11>*</h11></label>
                <select name="lider" id="lider" class="custom-select">

                  <?php

                  use App\Models\membro;
                  $tabela = membro::orderby('mem_nome', 'asc')->paginate();
                  ?>
                  <option value="{{0}}">Informe líder</option>
                  @foreach ($tabela as $tbitem)
                  <option value="{{$tbitem->id}}">{{$tbitem->mem_nome}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            </div>
            <div class="form-group row">

            <div class="col-md-3">
              <div class="form-group">
                <label class="input-group-addon">Vice-líder<h11>*</h11></label>
                <select name="vicelider" id="vicelider" class="custom-select">

                  <option value="{{0}}">Informe vice-lider</option>
                  @foreach ($tabela as $tbitem)
                  <option value="{{$tbitem->id}}">{{$tbitem->mem_nome}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="input-group-addon">Supervisor<h11>*</h11></label>
                <select name="supervisor" id="supervisor" class="custom-select">
                  <option value="{{0}}">Informe supervisor</option>
                  @foreach ($tabela as $tbitem)
                  <option value="{{$tbitem->id}}">{{$tbitem->mem_nome}}</option>
                  @endforeach
                </select>
              </div>
            </div>

      </div> <!-- .tab3 -->
        </div>
    </div> <!-- .tabs -->
  </div> <!-- .content -->

  <!-- Button (Double) -->

  <div class="form-group row">

    <div class="col-md-6">
      <p align="right">
        <button id="Cadastrar" name="Cadastrar" class="btn btn-success" type="Submit">Salvar</button>
        <button id="Cancelar" name="Cancelar" class="btn btn-danger" type="Reset">Cancelar</button>
      </p>
    </div>
  </div>

</div>
</div>
</div>

</fieldset>
</form>
<script src="{{URL::asset('js/validacao.js')}}"></script>
<script src="{{URL::asset('js/mascaras.js')}}"></script>

@endsection
