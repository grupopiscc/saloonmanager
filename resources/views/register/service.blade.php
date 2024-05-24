@extends('layout.site')

@section('titulo','Cadastro')

@section('conteudo')
<script type="text/javascript">
    M.Datepicker.init(elems)
</script>
<br><br>
<div class='container'>
    <div class='row center-align'>
        <h2> Cadastro de serviço </h2>
        <form class="row center-align" action="{{route('site.register.service')}}" method='post' enctype='multipart/form-data'>
            {{ csrf_field() }}
            <div class='input-field'>
                <label for='description'>Descrição do serviço</label>
                <input type='text' name='description' id='full_name' class='validate'><p>
            </div>
            <div class="input-field">
                <input type="number" name="price" id="price" class="validate">
                <label for="price">Preço</label>
            </div>
            <div class="col input-field s6">
                    <input type="text" name="time_spent" id="time_spent" class="validate">
                    <label for="time_spent">Tempo gasto (em minutos)</label>
            </div>
            </div>
            <br>
            <input type='submit' class="wave-effect waves-light btn">
        </form>
    </div>
</div>

@endsection()