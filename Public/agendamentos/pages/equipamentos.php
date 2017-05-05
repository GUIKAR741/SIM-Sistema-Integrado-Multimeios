<?php
$tb_equipamento = new \App\Models\Tb_recursos();
$equip=$tb_equipamento->select()->from()->all();
if (isset($_POST['btnSave'])):
//  Receber as variaveis
    $equipamento = strip_tags($_POST['equipamento']);
    $status = isset($_POST['status'])?$_POST['status']:0;
//    if ($status != 1){$status = 0;}
//  OBJ->CampoTabela=VariáveisCampo
    $tb_equipamento->nome_recurso=$equipamento;
    $tb_equipamento->status_recurso=$status;
    $id=$tb_equipamento->save();
    echo '<script>window.location=\'?p=equipamentos\'</script>';
endif;
if (isset($_GET['status'])):
    $id=strip_tags($_GET['status']);
    $equipamento=$tb_equipamento->select()->from()->where('idtb_recurso',$id)->first();
    if ($equipamento->status_recurso=="0") {
        $tb_equipamento->status_recurso = 1;
        $result = $tb_equipamento->update('idtb_recurso', $id);
    }elseif($equipamento->status_recurso=="1") {
        $tb_equipamento->status_recurso = 0;
        $result = $tb_equipamento->update('idtb_recurso', $id);
    }
    echo '<script>window.location=\'?p=equipamentos\'</script>';
endif;
if (isset($_GET['excluir']) && $_GET['excluir']==true):
    $id = strip_tags($_GET['idEquipamento']);
    $row = $tb_equipamento->delete('idtb_recurso', $id);
    echo "<script>document.location='?p=equipamentos'</script>";
endif;
?>
<main class="mn-inner p-h-xs pad-title">
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
                                <input placeholder="Digite o Nome do Equipamento" id="Horario" type="text" class="validate" name="equipamento">
                            </div>
                            <label for="">Status</label>
                            <div class="switch">
                                <label>
                                    Desativado
                                    <input type="checkbox" name="status" value="1">
                                    <span class="lever"></span>
                                    Ativado
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="modal-action modal-close waves-effect waves-green btn-flat" name="btnSave">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col s12 m12 l12 no-p-h">
            <div class="card">
                <div class="card-content">
                    <table class="table striped bordered">
                        <thead>
                        <tr>
                            <th>Nome do Equipamento</th>
                            <th class="center">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $equipamento=$tb_equipamento->select()->from()->all();
                        foreach ($equipamento as $value):
                            $id[$value->idtb_recurso]=$value->idtb_recurso;?>
                            <tr>
                                <td class="no-m no-p-h"><?= $value->nome_recurso?></td>
                                <td class="center no-m no-p-h">
                                    <div class="switch">
                                        <label>
                                            Desativado
                                            <input type="checkbox" id="check" onclick="setTimeout(function(){document.location='?p=equipamentos&status=<?=$value->idtb_recurso?>'},650);" <?php if ($value->status_recurso==1) echo 'checked';?>>
                                            <span class="lever"></span>
                                            Ativado
                                        </label>
                                    </div>
                                </td>
                                <td class="left no-m no-p-h">
                                    <a class="btn-floating btn waves-effect waves-light red excluir-swal-<?= $value->idtb_recurso?>">
                                        <i class="material-icons">delete_forever</i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>