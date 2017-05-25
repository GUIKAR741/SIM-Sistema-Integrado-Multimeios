<?php
$tb_cursos = new App\Models\SiscoTbCursos();
$tb_recursos = new App\Models\Tb_recursos();
$tb_agendamento = new App\Models\Tb_agendamento();
$id=isset($_GET['id'])?$_GET['id']:'';
$agendamento=$tb_agendamento->select()->from()->where('idtb_agendamento',$id)->first();
if (!isset($_GET['id']) || $agendamento==false):
    echo '<script>window.location=\'?p=home\'</script>';
endif;
if($agendamento->tb_usuario_idtb_usuario!=$_SESSION['id_usuario']):
    echo '<script>window.location=\'?p=home\'</script>';
endif;
if (isset($_POST['action']  )):
    $turma=implode(", ",$_POST['turmas']);
    $recurso=implode(", ",$_POST['recurso']);
    $horario=implode(", ",$_POST['horario']);
    $data=$_POST['_submit'];
    $id_user=$_SESSION['id_usuario'];
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
                            <h4 class="card-title no-m-b no-m-t">Atualizar Reserva</h4>
                            <div class="input-field">
                                <input type="hidden" id="idAgenda" value="<?= $id?>">
                                <label for="tur" class="active">Turmas: </label>
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
                                <label class="active" for="data">Data: </label>
                                <input id="data" placeholder="Escolha a Data Desejada" name="data" type="date" data-value="<?= $agendamento->data?>" class="datepicker">
                            </div>
                            <div class="row no-m-b">
                                <div class="col m12 l6">
                                    <label class="active" for="hora">Horarios</label>
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
                                            <label style="text-transform: uppercase" for="<?= $value->idtb_horario ?>horario"><?= $value->nome_horario ?></label>
                                        </p>
                                    <?php endforeach ?>
                                </div>
                                <div class="col m12 l6">
                                    <label class="active" for="recur">Recursos</label>
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
                                            <label style="text-transform: uppercase" for="<?= $value->idtb_recurso ?>Recursos"><?= $value->nome_recurso ?></label>
                                        </p>
                                    <?php endforeach ?>
                                </div>
                            </div>
                            <div class="input-field" style="padding-bottom: 25px">
                                <button class="col s3 offset-s9 btn waves-effect blue waves-light" type="button" id="enviar-ajax" name="action">Atualizar</button>
                            </div>

                    </div>
                    </form></div>
            </div>
        </div>
    </div>

</main>