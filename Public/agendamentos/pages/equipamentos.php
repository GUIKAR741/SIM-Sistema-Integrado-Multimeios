<?php
$tb_equipamento = new \App\Models\Tb_recursos();
if (isset($_POST['btnSave'])):
    $equipamento = strip_tags($_POST['equipamento']);
    $status = isset($_POST['status'])?$_POST['status']:0;
    $tb_equipamento->nome_recurso=$equipamento;
    $tb_equipamento->status_recurso=$status;
    $id=$tb_equipamento->save();
    echo '<script>window.location=\'?p=equipamentos&equip=cadastrado\'</script>';
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
    echo '<script>window.location=\'?p=equipamentos&equip=status\'</script>';
endif;
if (isset($_GET['excluir']) && $_GET['excluir']==true):
    $id = strip_tags($_GET['idEquipamento']);
    $row = $tb_equipamento->delete('idtb_recurso', $id);
    echo "<script>document.location='?p=equipamentos&equip=deletado'</script>";
endif;
if (isset($_GET['equip']) && $_GET['equip'] == 'cadastrado'):
    $retorno="setTimeout(function (){swal(
        {title: \"Equipamento Cadastrado Com Sucesso!\",type: \"success\",timer: 2000,showConfirmButton:false}
     )},1700);";
elseif (isset($_GET['equip']) && $_GET['equip'] == 'status'):
    $retorno="setTimeout(function (){swal(
        {title: \"Status Atualizado Com Sucesso!\",type: \"success\",timer: 2000,showConfirmButton:false}
     )},1700);";
elseif (isset($_GET['equip']) && $_GET['equip'] == 'deletado'):
    $retorno="setTimeout(function (){swal(
        {title: \"Equipamento Deletado Com Sucesso!\",type: \"error\",timer: 2000,showConfirmButton:false}
     )},1700);";
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
                                <label for="Horario" class="active">Nome do equipamento</label>
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
                            <th class="center">Nome do Equipamento</th>
                            <th class="center">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $equipamento=$tb_equipamento->select()->from()->all();
                        foreach ($equipamento as $value):
                            $id[$value->idtb_recurso]=$value->idtb_recurso;?>
                            <tr>
                                <td class="no-m no-p-h center"><?= $value->nome_recurso?></td>
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
                                    <a class="btn-floating btn waves-effect waves-light red" onclick="swal({
                                            title: 'Você Realmente quer excluir?',
                                            text: 'Não podera recuperar o registro!',
                                            type: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#DD6B55',
                                            confirmButtonText: 'Sim!',
                                            cancelButtonText: 'Não!',
                                            closeOnConfirm: false,
                                            closeOnCancel: false
                                            }, function(isConfirm){
                                            if (isConfirm) {
                                            setTimeout(document.location='?p=equipamentos&excluir=true&idEquipamento=<?= $value->idtb_recurso?>',5000);
                                            } else {
                                            swal({title:'Cancelado', type:'error',timer:2000,showConfirmButton:false});
                                            }
                                            });">
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