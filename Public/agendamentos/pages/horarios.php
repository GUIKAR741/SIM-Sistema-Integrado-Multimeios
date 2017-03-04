<main class="mn-inner">
    <div class="row">
        <div class="col s12">
            <div class="page-title">Horarios</div>
            <div class="fixed-action-btn horizontal">
                <a class="btn-floating btn-large waves-effect waves-light blue-grey modal-trigger" href="#modal1"><i class="material-icons">add</i></a>
            </div>
            <div id="modal1" class="modal modal-fixed-footer modReserva" >
                <form method="post">
                    <div class="modal-content">
                        <h4 class="no-m-b">Adicionar novo Horario</h4>
                        <div class="col m12 l12">
                            <div class="input-field">
                                <label for="Horario">Horario</label>
                                <input placeholder="Digite o Nome do Horario" id="Horario" type="text" class="validate">
                            </div>
                            <div class="input-field">
                                <label for="Inicio">Inicio</label>
                                <input placeholder="Digite Nome do Autor" id="Inicio" type="time" class="timepicker">
                            </div>
                            <div class="input-field">
                                <label for="Fim">Fim</label>
                                <input placeholder="Digite o Local" id="Fim" type="time" class="timepicker">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Salvar</a>
                    </div>
                </form>
            </div>
        </div>
        <div class="col s12 m12 l12">
            <div class="card">
                <div class="card-content">
                    <table class="responsive-table striped bordered">
                        <thead>
                        <tr>
                            <th data-field="id">Horario</th>
                            <th data-field="price">Inicio</th>
                            <th data-field="price">Fim</th>
                            <th data-field="price" class="right-align">Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php for ($i=1;$i<=10;$i++): ?>
                            <tr>
                                <td>Nome</td>
                                <td>07:10 Am</td>
                                <td>08:00 Am</td>
                                <td class="right-align">
                                    <a class="btn-floating btn waves-effect waves-light green" onclick="$('#modal1<?= $i?>').openModal()"><i class="material-icons">mode_edit</i></a>
                                    <a class="btn-floating btn waves-effect waves-light red" href="?p=acervo&del=<?= $i?>"><i class="material-icons">delete_forever</i></a>
                                </td>
                            </tr>
                            <div id="modal1<?= $i?>" class="modal modal-fixed-footer modReserva" >
                                <form method="post">
                                    <div class="modal-content">
                                        <h4 class="no-m-b">Atualizar Horario</h4>
                                        <div class="col m12 l12">
                                            <div class="input-field">
                                                <label for="Horario">Horario</label>
                                                <input placeholder="Digite o Nome do Horario" id="Horario" type="text" class="validate">
                                            </div>
                                            <div class="input-field">
                                                <label for="Inicio">Inicio</label>
                                                <input placeholder="Digite Nome do Autor" id="Inicio" type="time" class="timepicker">
                                            </div>
                                            <div class="input-field">
                                                <label for="Fim">Fim</label>
                                                <input placeholder="Digite o Local" id="Fim" type="time" class="timepicker">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Salvar</a>
                                    </div>
                                </form>
                            </div>
                        <?php endfor ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>