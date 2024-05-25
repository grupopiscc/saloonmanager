@extends('layout.site')

@section('titulo','Admin')

@section('conteudo')
<div class="row">
    <div class="col s12">
        <ul class="tabs">
            <li class="tab col s4"><a class="active" href="#horarios">Horários</a></li>
            <li class="tab col s4"><a href="#funcionarios">Funcionários</a></li>
            <li class="tab col s4"><a href="#servicos">Serviços</a></li>
        </ul>
    </div>

    {{-- Div de Horários --}}
    <div class="col s12" id="horarios">
        <br>
        <table class="responsive-table centered">
            <thead>
                <tr>
                    <th>Horário Início</th>
                    <th>Nome</th>
                    <th>Serviço</th>
                    <th>Profissional</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($appointments as $appointment)
                <tr>
                    <td>{{$appointment->app_date}}</td>
                    <td>{{$appointment->client_name}}</td>
                    <td>{{$service[$appointment->service_id - 1]->description}}</td>
                    <td>{{$appointment->employee_name}}</td>
                    <td><a class="material-icons tooltipped" data-position="top" data-tooltip="Finalizar atendimento" href="/agenda/completed/{{$appointment->id}}">check</a><a class="material-icons tooltipped" data-position="top" data-tooltip="Adicionar informação" href="{{$appointment->id}}">add_circle</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Modal Confirm --}}
        <div id="modal_confirm_app" class="modal">
            <div class="modal-content">
            <h4 class="center-align red">Aviso</h4>
            <p class="center-align">
                Tem certeza que deseja cancelar o horário?
            </p>
            </div>
                <div class="modal-footer">
                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Sim</a>
                    <a href="#!" class="modal-close waves-effeft waves-red btn-flat">Não</a>
                </div>
            </div>

    </div>

    {{-- Div Funcionários --}}
    <div class="col s12" id="funcionarios">
        <br>
        <div class="right-align">
        <a class="btn center-align modal-trigger" href="#modal_add_func"><i class="large material-icons">add_circle_outline</i></a> 
        </div>
        <table class="responsive-table centered">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Especialidade</th>
                    <th>Telefone</th>
                    <th>Ações</th>
                </tr>
            </thead>    

            <tbody>
                @foreach ($employees as $employee)
                <tr>
                    <td>{{$employee->full_name}}</td>
                    <td>{{$employee->specialty}}</td>
                    <td><a href="https://wa.me/55{{$employee->phone}}"><span class="mdi--whatsapp"></span>{{$employee->phone}}</a></td>
                    <td><a class="material-icons tooltipped" data-position="top" data-tooltip="Adicionar informação" href="#">add_circle</a><a href="{{$employee->id}}" class="material-icons tooltipped" data-position="top" data-tooltip="Cancelar" >close</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Modal Add Func --}}
        <div id="modal_add_func" class="modal modal-fixed-footer">
            <div class="modal-content">
            <h4>Novo Funcionário</h4>
            <p>
            <form class="row center-align" action="{{route('site.register.employee')}}" method='post' enctype='multipart/form-data'>
            {{ csrf_field() }}
            <div class='input-field'>
                <label for='full_name'>Nome Completo</label>
                <input type='text' name='full_name' id='full_name' class='validate'><p>
            </div>
            <div class="input-field">
                <select name="gender">
                  <option value="" disabled selected>------</option>
                  <option value="M">Masculino</option>
                  <option value="F">Feminino</option>
                  <option value="NB">Não Binário</option>
                  <option value="NE">Não especificado</option>
                </select>
                <label>Gênero</label>
              </div>
            <div class="input-field">
                <input type="text" class="datepicker" name="birthday" id="birthday">
                <label for="birthday"> Data de nascimento </label>
            </div>
            <div class="input-field">
                <input type="tel" name="phone" id="phone" class="validate" pattern="\([0-9]{2}\)[0-9]{5}-[0-9]{4}" placeholder="(XX)XXXXX-XXXX">
                <label for="phone">Telefone</label>
            </div>
            <div class="row">
                <div class="col input-field s6">
                    <input type="text" name="cep" id="cep" class="validate">
                    <label for="cep">CEP</label>
                </div>
                <div class="col input-field s1">
                        <a class="waves-effect waves-light btn">Buscar</a>
                </div>
            </div>
            <br>
            <input type="hidden" name="description" value="Foo">
            <input type='submit' class="wave-effect waves-light btn">
        </form>
            </p>
            </div>
                <div class="modal-footer">
                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Enviar</a>
                    <a href="#!" class="modal-close waves-effeft waves-red btn-flat">Cancelar</a>
                </div>
            </div>
    </div>


    <div class="col s12" id="servicos">
    <table class="responsive-table centered">
        <thead>
            <tr>
                <th> Descrição </th>
                <th> Tempo gasto </th>
                <th> Preço </th>
            </tr>
        </thead>

        <tbody>
            @foreach ($service as $_service)
            <tr>
                <td>{{$_service->description}}</td>
                <td>{{$_service->time_spent}}</td>
                <td>{{$_service->price}}</td>
            </tr>
            @endforeach
        </tbody>
    </div>
    
</div>



@endsection()