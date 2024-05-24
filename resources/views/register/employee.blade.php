@extends('layout.site')

@section('titulo','Cadastro')

@section('conteudo')
<script type="text/javascript">
    M.Datepicker.init(elems)
</script>
<br><br>
<div class='container'>
    <div class='row center-align'>
        <h2> Cadastro de funcionário </h2>
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
    </div>
</div>

@endsection()