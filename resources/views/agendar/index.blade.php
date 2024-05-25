@extends('layout.site')

@section('titulo','Agendar')

@section('conteudo')
<div class="container">
    <h3 class="center-align"> Agendamento </h3>
<form action="{{route('site.save.appointment')}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="input-field">
        <select name="client_id">
            @foreach ($clients as $client)
            <option value="{{$client->id}}">{{$client->full_name}}</option>
            @endforeach
        </select>
        <label>Cliente</label>
      </div>
    <div class="input-field">
        <select name="service_id">
            @foreach ($services as $service)
            <option value="{{$service->id}}">{{$service->description}}. R$ {{$service->price}} </option>
            @endforeach
        </select>
        <label>Serviço</label>
      </div>
    <div class="input-field">
        <select name="employee_id">
            @foreach ($employees as $employee)
            <option value="{{$employee->id}}">{{$employee->full_name}}</option>
            @endforeach
        </select>
        <label>Empregado</label>
      </div>
    <div class="input-field">
        <input type="text" class="datepicker" name="date" id="date">
        <label for="date"> Dia do serviço </label>
    </div>
    <div class="input-field">
        <input type="text" class="timepicker" name="time" id="time">
        <label for="time"> Horário do serviço </label>
    </div>
    <input type='hidden' name='completed' value='0'>
    <input type='submit' class="wave-effect waves-light btn">
</form>
</div>
@endsection