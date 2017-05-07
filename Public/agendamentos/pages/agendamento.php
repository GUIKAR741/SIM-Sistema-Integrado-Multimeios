<?php
$tb_cursos = new App\Models\SiscoTbCursos();
$tb_recursos = new App\Models\Tb_recursos();
$tb_agendamento = new App\Models\Tb_agendamento();
$id=$_GET['id'];
$agendamento=$tb_agendamento->select()->from()->where('idtb_agendamento',$id)->first();
if (isset($_POST['action']  )):
    $turma=implode(", ",$_POST['turmas']);
    $recurso=implode(", ",$_POST['recurso']);
    $horario=implode(", ",$_POST['horario']);
    $data=$_POST['_submit'];
    $id_user=strip_tags($_POST['professor']);

    $tb_agendamento->tb_usuario_idtb_usuario=$id_user;
    $tb_agendamento->tb_turma_idtb_turma=$turma;
    $tb_agendamento->tb_recurso_idtb_recurso=$recurso;
    $tb_agendamento->tb_horario_idtb_horario=$horario;
    $tb_agendamento->data=$data;
    $row=$tb_agendamento->update('idtb_agendamento',$id);
    echo '<script>window.location=\'?p=home\'</script>';
endif;
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
                                $professor = $tb_cursos->select()->from('sisco.tb_usuario')->where('tipo_usuario','Professor')->all();
                                //dump($cursos);
                                ?>
                                <select name="professor">
                                    <option value="" disabled selected>Selecione um Professor</option>
                                    <?php
                                    foreach ($professor as $value) {
                                        ?>
                                        <option <?php if ($value->idtb_usuario==$agendamento->tb_usuario_idtb_usuario) echo 'selected'; ?>
                                                value="<?= $value->idtb_usuario?>"><?= $value->nome_usuario?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="input-field">
                                <?php
                                $cursos = $tb_cursos->select()->from('sisco.tb_turma,sisco.tb_cursos')->where('sisco.tb_turma.tb_cursos_idtb_cursos','sisco.tb_cursos.idtb_cursos','=',false)->order('ano', 'desc')->all();
                                $turma=explode(', ',$agendamento->tb_turma_idtb_turma);
                                ?>
                                <select name="turmas[]" multiple>
                                    <option value="" disabled selected>Selecione uma Turma</option>
                                    <?php
                                    foreach ($cursos as $value) {
                                        ?>
                                        <option <?php
                                        foreach ($turma as $tur):
                                            if ($tur==$value->idtb_turma):
                                                echo 'selected';
                                            endif;
                                        endforeach;
                                        ?> value="<?= $value->idtb_turma?>"><?= $value->serie.'º '. $value->nome_curso ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="input-field">
                                <label class="active" for="data">Data</label>
                                <input id="data" placeholder="Escolha a Data Desejada" type="date" data-value="<?= $agendamento->data?>" class="datepicker">
                            </div>
                            <div class="row no-m-b">
                                <div class="col m12 l6">
                                    <label class="active" for="">Horarios</label>
                                    <?php
                                    $horario = $tb_recursos->select()->from('tb_horario')->all();
                                    $hora=explode(', ',$agendamento->tb_horario_idtb_horario);
                                    foreach ($horario as $value): ?>
                                        <p>
                                            <input <?php
                                            foreach ($hora as $ho):
                                                if ($ho==$value->idtb_horario):
                                                    echo 'checked';
                                                endif;
                                            endforeach;
                                            ?> type="checkbox" name="horario[]" class="filled-in" id="<?= $value->idtb_horario ?>horario" value="<?= $value->idtb_horario ?>"/>
                                            <label for="<?= $value->idtb_horario ?>horario"><?= $value->nome_horario ?></label>
                                        </p>
                                    <?php endforeach ?>
                                </div>
                                <div class="col m12 l6">
                                    <label class="active" for="">Recursos</label>
                                    <?php
                                    $recurso = $tb_recursos->select()->from()->all();
                                    $recursos=explode(', ',$agendamento->tb_recurso_idtb_recurso);
                                    foreach ($recurso as $value): ?>
                                        <p>
                                            <input <?php
                                            foreach ($recursos as $recur):
                                                if ($recur==$value->idtb_recurso):
                                                    echo 'checked';
                                                endif;
                                            endforeach;
                                            ?> type="checkbox" name="recurso[]" class="filled-in" id="<?= $value->idtb_recurso ?>Recursos" value="<?= $value->idtb_recurso ?>"/>
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