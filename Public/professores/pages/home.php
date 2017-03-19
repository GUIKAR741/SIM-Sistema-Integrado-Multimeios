<?php
$tb_cursos = new App\Models\SiscoTbCursos();
$tb_recursos = new App\Models\Tb_recursos();
?>
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
                            <?php
                            $cursos = $tb_cursos->select()->from('sisco.tb_turma,sisco.tb_cursos')->where('sisco.tb_turma.tb_cursos_idtb_cursos','sisco.tb_cursos.idtb_cursos','=',false)->order('ano', 'desc')->all();
                            //dump($cursos);
                            ?>
                            <select name="select[]" multiple>
                                <option value="" disabled selected>Selecione uma Turma</option>
                                <?php
                                foreach ($cursos as $value) {
                                    ?>
                                    <option value="<?= $value->idtb_turma?>"><?= $value->serie.'º '. $value->nome_curso ?></option>
                                    <?php
                                }
                                ?>
                        </div>
                        <div class="input-field">
                            <label class="active" for="data">Data</label>
                            <input id="data" placeholder="Escolha a Data Desejada" type="date" data-value="<?= date('Y-m-d')?>" class="datepicker">
                        </div>
                        <div class="row no-m-b">
                            <div class="col m12 l6">
                                <label class="active" for="">Horarios</label>
                                <?php
                                $horario = $tb_recursos->select()->from('tb_horario')->all();
                                foreach ($horario as $value): ?>
                                    <p>
                                        <input type="checkbox" name="horario[]" class="filled-in" id="<?= $value->idtb_horario ?>horario" value="<?= $value->idtb_horario ?>"/>
                                        <label for="<?= $value->idtb_horario ?>horario"><?= $value->nome_horario ?></label>
                                    </p>
                                <?php endforeach ?>
                            </div>
                            <div class="col m12 l6">
                                <label class="active" for="">Recursos</label>
                                <?php
                                $recurso = $tb_recursos->select()->from()->all();
                                foreach ($recurso as $value): ?>
                                    <p>
                                        <input type="checkbox" name="recurso[]" class="filled-in" id="<?= $value->idtb_recurso ?>Recursos" value="<?= $value->idtb_recurso ?>"/>
                                        <label for="<?= $value->idtb_recurso ?>Recursos"><?= $value->nome_recurso ?></label>
                                    </p>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button name="action" type="submit" class="modal-action modal-close waves-effect waves-green btn-flat">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</main>