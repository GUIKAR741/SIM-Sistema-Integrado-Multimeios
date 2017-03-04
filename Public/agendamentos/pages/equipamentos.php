<main class="mn-inner">
    <div class="row">
        <div class="col s12">
            <div class="page-title">Equipamentos</div>
            <div class="fixed-action-btn horizontal">
                <a class="btn-floating btn-large waves-effect waves-light blue-grey modal-trigger" href="#modal1"><i class="material-icons">add</i></a>
            </div>
            <div id="modal1" class="modal modal-fixed-footer modReserva" >
                <form method="post">
                    <div class="modal-content">
                        <h4 class="no-m-b">Adicionar novo Equipamento</h4>
                        <div class="col m12 l12">
                            <div class="input-field">
                                <label for="Horario">Nome do equipamento</label>
                                <input placeholder="Digite o Nome do Equipamento" id="Horario" type="text" class="validate">
                            </div>
                            <label for="">Status</label>
                            <div class="switch">
                                <label>
                                    Desativado
                                    <input type="checkbox">
                                    <span class="lever"></span>
                                    Ativado
                                </label>
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
                            <th data-field="id">Nome do Equipamento</th>
                            <th data-field="id">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php for ($i=1;$i<=10;$i++): ?>
                            <tr>
                                <td>Nome do Equipamento</td>
                                <td>
                                    <div class="switch">
                                        <label>
                                            Desativado
                                            <input type="checkbox" id="check" onclick="setTimeout(document.location='?p=equipamentos&status=<?= $i?>',2000);">
                                            <span class="lever"></span>
                                            Ativado
                                        </label>
                                    </div>
                                </td>
                            </tr>
                        <?php endfor ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>