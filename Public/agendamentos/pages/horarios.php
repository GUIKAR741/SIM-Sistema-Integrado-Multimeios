<?php
$tb_horario = new App\Models\Tb_horario();
if (isset($_POST['adicionar'])):
    $nome_horario = strip_tags($_POST['nome_horario']);
    $inicio_horario = strip_tags($_POST['inicio_horario']);
    $fim_horario = strip_tags($_POST['fim_horario']);
    $tb_horario->nome_horario = $nome_horario;
    $tb_horario->inicio_horario = $inicio_horario;
    $tb_horario->fim_horario = $fim_horario;
    //$tb_equipe->nivel="USER";
    $id = $tb_horario->save();
    echo '<script>window.location=\'?p=horarios\'</script>';
endif;
if (isset($_POST['editar'])):
    $id = ($_POST['idtb_horario']);
    $nome_horario = strip_tags($_POST['nome_horario']);
    $inicio_horario = strip_tags($_POST['inicio_horario']);
    $fim_horario = strip_tags($_POST['fim_horario']);
    $tb_horario->nome_horario = $nome_horario;
    $tb_horario->inicio_horario = $inicio_horario;
    $tb_horario->fim_horario = $fim_horario;
    $row = $tb_horario->update('idtb_horario', $id);
    echo '<script>window.location=\'?p=horarios\'</script>';
endif;

if (isset($_GET['excluir']) && $_GET['excluir']==true):
    $id = strip_tags($_GET['idHorario']);
    $row = $tb_horario->delete('idtb_horario', $id);
    echo "<script>document.location='?p=horarios'</script>";
endif;
?>
<main class="mn-inner p-h-xs pad-title">
    <div class="row">
        <div class="col s12">
            <div class="page-title">Horarios</div>
            <div class="fixed-action-btn horizontal">
                <a class="btn-floating btn-large waves-effect waves-light blue-grey modal-trigger" href="#modal1"><i class="material-icons">add</i></a>
            </div>
            <div id="modal1" class="modal modal-fixed-footer modReserva" >
                <form method="POST">
                    <div class="modal-content">
                        <h4 class="no-m-b">Adicionar novo Horario</h4>
                        <div class="col m12 l12">
                            <div class="input-field">
                                <label for="nome_horario">Horario</label>
                                <input placeholder="Ex.: 10° aula " id="nome_horario" name="nome_horario" type="text">
                            </div>
                            <div class="input-field">
                                <label for="inicio_horario">Inicio</label>
                                <input placeholder="Hora de Início" id="inicio_horario" name="inicio_horario" type="time" class="timepicker">
                            </div>
                            <div class="input-field">
                                <label for="fim_horario">Fim</label>
                                <input placeholder="Hora de Fim" id="fim_horario" name="fim_horario" type="time" class="timepicker">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button name="adicionar" type="submit" class="modal-action modal-close waves-effect waves-green btn-flat">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col s12 m12 l12 no-p-h">
            <div class="card">
                <div class="card-content">
                    <table class="responsive-table striped bordered">
                        <thead>
                        <tr>
                            <th class="center" >Horario</th>
                            <th class="center" >Inicio</th>
                            <th class="center" >Fim</th>
                            <th class="center" >Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $horario = $tb_horario->select()->from()->all();

                        foreach ($horario as $value):
                            $id[$value->idtb_horario]=$value->idtb_horario;
                            ?>
                            <tr>
                                <td class="center no-m no-p-h"><?= $value->nome_horario ?></td>
                                <td class="center no-m no-p-h"><?= $value->inicio_horario ?></td>
                                <td class="center no-m no-p-h"><?= $value->fim_horario ?></td>

                                <td class="center no-m no-p-h">
                                    <a class="btn-floating btn waves-effect waves-light green" onclick="$('#editar1<?= $value->idtb_horario ?>').openModal()">
                                        <i class="material-icons">mode_edit</i>
                                    </a>
                                    <button class="btn-floating btn waves-effect waves-light red excluir-swal-<?= $value->idtb_horario?>">
                                        <i class="material-icons">delete_forever</i>
                                    </button>
                                </td>
                            </tr>

                            <div id="editar1<?= $value->idtb_horario ?>" class="modal modal-fixed-footer modReserva" >
                                <form method="post">
                                    <div class="modal-content">
                                        <h4 class="no-m-b">Atualizar Horario</h4>
                                        <div class="col m12 l12">
                                            <input type="hidden" name="idtb_horario" value="<?= $value->idtb_horario ?>">
                                            <div class="input-field">
                                                <label for="nome_horario">Horario</label>
                                                <input placeholder="Digite o Nome do Horario" id="nome_horario" name="nome_horario" type="text" class="validate" value="<?= $value->nome_horario ?>">
                                            </div>
                                            <div class="input-field">
                                                <label class="active" for="inicio_horario">Inicio</label>
                                                <input placeholder="Digite Nome do Autor" id="inicio_horario" name="inicio_horario" type="time" class="timepicker" value="<?= $value->inicio_horario ?>">
                                            </div>
                                            <div class="input-field">
                                                <label class="active" for="fim_horario">Fim</label>
                                                <input placeholder="Digite o Local" id="fim_horario" name="fim_horario" type="time" class="timepicker" value="<?= $value->fim_horario ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button name="editar" type="submit" class="modal-action modal-close waves-effect waves-green btn-flat">Salvar</button>
                                    </div>
                                </form>
                            </div>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>