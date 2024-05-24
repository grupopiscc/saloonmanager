<div class="col s12" id="horarios">
    <br>
    <table class="responsive-table centered">
        <thead>
            <tr>
                <th>Horário Início</th>
                <th>Horário Fim</th>
                <th>Nome</th>
                <th>Serviços</th>
                <th>Profissional</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($appointments as $appointment)

            <tr>
                <td>08:00</td>
                <td>08:30</td>
                <td>João</td>
                <td>Corte Masculino</td>
                <td>
                <div class="input-field">
                    <select>
                        @foreach ($employees as $employee)
                      <option value="{{$employee->id}}">$employee->full_name</option>
                        @endforeach
                    </select>
                  </div></td>
                <td><a class="material-icons tooltipped" data-position="top" data-tooltip="Adicionar informação" href="#">add_circle</a><a href="#modal_confirm_app" class="material-icons tooltipped modal-trigger" data-position="top" data-tooltip="Cancelar" >close</a></td>
            </tr>
                            
            @endforeach
        </tbody>
    </table>