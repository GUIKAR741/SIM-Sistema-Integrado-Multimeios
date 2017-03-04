<main class="mn-inner">
    <div class="row">
        <div class="col s12 m12 l12">
            <div class="card">
                <div class="card-content">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
        <div class="fixed-action-btn horizontal">
            <a class="btn-floating btn-large waves-effect waves-light blue-grey modal-trigger" href="#modal1"><i class="material-icons">add</i></a>
        </div>
        <div id="modal1" class="modal modal-fixed-footer modReserva" >
            <form method="post">
                <div class="modal-content">
                    <h4 class="no-m-b">Fazer Reserva</h4>
                    <div class="col m12 l12">
                        <div class="input-field">
                            <select>
                                <option value="" disabled selected>Selecione uma Turma</option>
                                <option value="1">Turma1</option>
                                <option value="2">Turma2</option>
                                <option value="3">Turma3</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label class="active" for="data">Data</label>
                            <input id="data" placeholder="Escolha a Data Desejada" type="date" class="datepicker">
                        </div>
                        <div class="row no-m-b">
                            <div class="col m12 l6">
                                <label class="active" for="">Horarios</label>
                                <p>
                                    <input type="checkbox" class="filled-in" id="1Aula" />
                                    <label for="1Aula">1ª Aula</label>
                                </p>
                                <p>
                                    <input type="checkbox" class="filled-in" id="2Aula" />
                                    <label for="2Aula">2ª Aula</label>
                                </p>
                                <p>
                                    <input type="checkbox" class="filled-in" id="3Aula" />
                                    <label for="3Aula">3ª Aula</label>
                                </p>
                            </div>
                            <div class="col m12 l6">
                                <label class="active" for="">Recursos</label>
                                <p>
                                    <input type="checkbox" class="filled-in" id="Notebook" />
                                    <label for="Notebook">Notebook</label>
                                </p>
                                <p>
                                    <input type="checkbox" class="filled-in" id="DataShow" />
                                    <label for="DataShow">Data Show</label>
                                </p>
                                <p>
                                    <input type="checkbox" class="filled-in" id="TV" />
                                    <label for="TV">TV</label>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Salvar</a>
                </div>
            </form>
        </div>
    </div>
</main>