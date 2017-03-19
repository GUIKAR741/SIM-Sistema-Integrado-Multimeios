<?php
$tb_cursos = new App\Models\SiscoTbCursos();
$tb_recursos = new App\Models\Tb_recursos();
?>
<main class="mn-inner no-p no-m" style="padding-top: 10px;padding-bottom: -10px">
    <div class="row no-m-b">
        <div class="col s12 m12 l6 offset-l3">
            <div class="card">
                <div class="card-content">
                    <div>
                        <form method="post">
                            <h4 class="card-title no-m-b">Atualizar Reserva</h4>

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
                                </select>
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
                            <div class="input-field" style="padding-bottom: 25px">
                                <button class="col s3 offset-s9 btn waves-effect blue waves-light" type="submit" name="action">Atualizar</button>
                            </div>

                    </div>
                    </form></div>
            </div>
        </div>
    </div>

</main>