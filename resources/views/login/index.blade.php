@extends('layout.site')

@section('titulo','Login')

@section('conteudo')
<br><br>
<script>
M.toast({html: 'Realizando Login'})
</script>
<div class="row center-align">
<div class='col s3 offset-s4 container'>
    <div class='row center-align'>
        <form class="center-align">
            <div class='input-field'>
                <label for='email'>Usuário</label>
                <input type='email' id='email' placeholder='nome.sobrenome' required><p>
            </div>
            <div class='input-field'>
                <label for='password'>Senha</label>
                <input type='password' id='password' class='validate' required><p>
            </div>
            <br>
            <input type='submit' class="wave-effect waves-light btn" onclick="M.toast({html: 'Realizando Login'})">
        </form>
    </div>
</div>
</div>
@endsection()