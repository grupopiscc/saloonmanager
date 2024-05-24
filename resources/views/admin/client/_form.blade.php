<div class='input-field'>
    <label for='full_name'>Nome Completo</label>
    <input type='text' id='full_name' class='validate' value="{{isset($registro->full_name) ? $registro->full_name : ''}}"><p>
</div>
<div class="input-field">
    <select>
      <option value="" disabled selected>------</option>
      <option value="1">Masculino</option>
      <option value="2">Feminino</option>
      <option value="3">Não Binário</option>
      <option value="4">Não especificado</option>
    </select>
    <label>Gênero</label>
  </div>
<div class="input-field">
    <input type="text" class="datepicker" id="birthday" value="{{isset($registro->birthday) ? $registro->birthday : ''}}">
    <label for="birthday"> Data de nascimento </label>
</div>
<div class="input-field">
    <input type="tel" id="phone" class="validate" pattern="\([0-9]{2}\)[0-9]{5}-[0-9]{4}" placeholder="(XX)XXXXX-XXXX">
    <label for="phone">Telefone</label>
</div>
<div class="row">
    <div class="col input-field s6">
        <input type="text" id="cep" class="validate" value="{{isset($registro->cep) ? $registro->cep : ''}}">
        <label for="cep">CEP</label>
    </div>
    <div class="col input-field s1">
            <a class="waves-effect waves-light btn">Buscar</a>
    </div>
</div>
<br>

<input type='submit' class="wave-effect waves-light btn">