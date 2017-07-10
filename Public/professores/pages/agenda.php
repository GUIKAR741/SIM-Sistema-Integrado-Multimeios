<?php
$tb_cursos = new App\Models\SiscoTbCursos();
$tb_recursos = new App\Models\Tb_recursos();
$tb_agendamento = new App\Models\Tb_agendamento();
$id=isset($_GET['id'])?$_GET['id']:'';
$agendamento=$tb_agendamento->select()->from()->where('idtb_agendamento',$id)->first();
if (!isset($_GET['id']) || $agendamento==false):
    echo '<script>window.location=\'?p=home\'</script>';
endif;
if($agendamento->tb_usuario_idtb_usuario==$_SESSION['id_usuario']):
    echo '<script>window.location=\'?p=home\'</script>';
endif;
?>
<main class="mn-inner no-p no-m" style="padding-top: 10px;padding-bottom: -10px">
    <div class="row no-m-b">
        <div class="col s12 m12 l6 offset-l3">
            <div class="card">
                <div class="card-content">
                    <div>
                        <h4 class="card-title no-m-b no-m-t">Agendamento</h4>
                        <div>
                            <label for="prof" class="active">Professor: </label>
                            <?php
                            $professor = $tb_cursos->select()->from('sisco.tb_usuario')->where('tipo_usuario','Professor')->all();
                            foreach ($professor as $value) {
                                if ($value->idtb_usuario==$agendamento->tb_usuario_idtb_usuario){
                                    ?>
                                    <p style="text-transform: uppercase"><?= $value->nome_usuario?></p>
                                    <?php
                                } 
                            }
                            ?>
                        </div>
                        <div>
                            <label for="tur" class="active">Turmas: </label>
                            <?php
                            $cursos = $tb_cursos->select()->from('sisco.tb_turma,sisco.tb_cursos')->where('sisco.tb_turma.tb_cursos_idtb_cursos','sisco.tb_cursos.idtb_cursos','=',false)->order('ano', 'desc')->all();
                            $turma=explode(', ',$agendamento->tb_turma_idtb_turma);
                            foreach ($cursos as $value) {
                                foreach ($turma as $tur):
                                    if ($tur==$value->idtb_turma):
                                        ?>
                                        <p><?= $value->serie.'º '. $value->nome_curso ?></p>
                                        <?php
                                    endif;
                                endforeach;

                            }
                            ?>
                        </div>
                        <div class="input-field">
                            <label class="active" for="data">Data</label>
                            <input id="data" placeholder="Escolha a Data Desejada" type="date" disabled data-value="<?= $agendamento->data?>" class="datepicker">
                        </div>
                        <div class="row no-m-b">
                            <div class="col s12 m12 l6 center">
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
                                        ?> type="checkbox" disabled name="horario[]" id="<?= $value->idtb_horario ?>horario" value="<?= $value->idtb_horario ?>"/>
                                        <label for="<?= $value->idtb_horario ?>horario"><?= $value->nome_horario ?></label>
                                    </p>
                                <?php endforeach ?>
                            </div>
                            <div class="col s12 m12 l6 center">
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
                                        ?> type="checkbox" disabled name="recurso[]" id="<?= $value->idtb_recurso ?>Recursos" value="<?= $value->idtb_recurso ?>"/>
                                        <label for="<?= $value->idtb_recurso ?>Recursos"><?= $value->nome_recurso ?></label>
                                    </p>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>