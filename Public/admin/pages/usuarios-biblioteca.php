<?php
$tb_usuario = new \App\Models\Tb_usuario();
$pass=new \App\Classes\Password();
$user=$tb_usuario->select()->from()->all();
if (isset($_POST['Save'])):
    $tb_usuario->nome_usuario=strip_tags($_POST['nome_usuario']);
    $tb_usuario->email_usuario=trim(strip_tags($_POST['email']));
    $tb_usuario->senha_usuario=$pass->hash(strip_tags($_POST['senha']));
    $tb_usuario->tipo_usuario="Agendamento";
    $id=$tb_usuario->save();
    echo '<script>window.location=\'?p=usuarios-agendamento&user=cadastrado\'</script>';
endif;
if (isset($_POST['atualizar'])):
    $id=strip_tags($_POST['id']);
    $tb_usuario->nome_usuario=strip_tags($_POST['nome_usuario']);
    $tb_usuario->email_usuario=trim(strip_tags($_POST['email']));
    if ($_POST['troca']=="yes"):
        $tb_usuario->senha_usuario=$pass->hash(strip_tags($_POST['senha']));
    endif;
    $id=$tb_usuario->update("idtb_usuario",$id);
    echo '<script>window.location=\'?p=usuarios-agendamento&user=atualizado\'</script>';
endif;
if (isset($_GET['status'])):
    $id=strip_tags($_GET['status']);
    $usuario=$tb_usuario->select()->from()->where('idtb_usuario',$id)->first();
    if ($usuario->status_usuario=="0") {
        $tb_usuario->status_usuario= 1;
        $result = $tb_usuario->update('idtb_usuario', $id);
    }elseif($usuario->status_usuario=="1") {
        $tb_usuario->status_usuario= 0;
        $result = $tb_usuario->update('idtb_usuario', $id);
    }
    echo '<script>window.location=\'?p=usuarios-agendamento&user=status\'</script>';
endif;
if (isset($_GET['delete']) && $_GET['delete']==true):
    $id = strip_tags($_GET['id']);
    $tb_usuario->delete('idtb_usuario', $id);
    echo "<script>document.location='?p=usuarios-agendamento&user=deletado'</script>";
endif;
if (isset($_GET['user']) && $_GET['user'] == 'cadastrado'):
    $retorno="setTimeout(function (){swal(
        {title: \"Usuário Cadastrado Com Sucesso!\",type: \"success\",timer: 2000,showConfirmButton:false}
     )},1250);";
elseif (isset($_GET['user']) && $_GET['user'] == 'atualizado'):
    $retorno="setTimeout(function (){swal(
        {title: \"Usuário Atualizado Com Sucesso!\",type: \"success\",timer: 2000,showConfirmButton:false}
     )},1250);";
elseif (isset($_GET['user']) && $_GET['user'] == 'deletado'):
    $retorno="setTimeout(function (){swal(
        {title: \"Usuário Deletado Com Sucesso!\",type: \"error\",timer: 2000,showConfirmButton:false}
     )},1250);";
elseif (isset($_GET['user']) && $_GET['user'] == 'status'):
    $retorno="setTimeout(function (){swal(
        {title: \"Status do Usuário Alterado!\",type: \"success\",timer: 2000,showConfirmButton:false}
     )},1250);";
endif;
?>
<main class="mn-inner p-h-xs pad-title">
    <div class="row">
        <div class="col s12">
            <div class="page-title">Usuarios da Biblioteca</div>
            <div class="fixed-action-btn horizontal">
                <a class="btn-floating btn-large waves-effect waves-light blue-grey modal-trigger" href="#modal1"><i class="material-icons">add</i></a>
            </div>
            <div id="modal1" class="modal modal-fixed-footer modReserva" >
                <form method="post" id="cadastro-form">
                    <div class="modal-content">
                        <h4 class="no-m-b">Adicionar novo Usuario da Biblioteca</h4>
                        <div class="col m12 l12">
                            <div class="input-field">
                                <label for="nome_usuario">Nome do Usuario</label>
                                <input placeholder="Digite o Nome do Usuario" id="nome_usuario" type="text" class="validate" name="nome_usuario">
                            </div>
                            <div class="input-field">
                                <label for="email">Email do Usuario</label>
                                <input placeholder="Digite o Email do Usuario" id="email" type="email" class="validate" name="email">
                            </div>
                            <div class="input-field">
                                <label for="senha">Senha</label>
                                <input placeholder="Digite a Senha" id="senha" type="password" class="validate" name="senha">
                            </div>
                            <div class="input-field">
                                <label for="re-senha">Digite a Senha Novamente</label>
                                <input placeholder="Digite a Senha Novamente" id="re-senha" type="password" class="validate" name="re-senha">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="modal-action waves-effect waves-green btn-flat" name="Save">Salvar</button>
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
                            <th class="center">Nome do usuario</th>
                            <th class="center">Status</th>
                            <th class="center" >Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $usuario=$tb_usuario->where("BINARY tipo_usuario","Agendamento")->all();
                        foreach ($usuario as $value):?>
                            <tr>
                                <td class="no-m no-p-h center"><?= $value->nome_usuario?></td>
                                <td class="center no-m no-p-h">
                                    <div class="switch">
                                        <label>
                                            Desativado
                                            <input type="checkbox" id="check" onclick="setTimeout(function(){document.location='?p=usuarios-agendamento&status=<?=$value->idtb_usuario?>'},500);" <?php if ($value->status_usuario==0) echo 'checked';?>>
                                            <span class="lever"></span>
                                            Ativado
                                        </label>
                                    </div>
                                </td>
                                <td class="center no-m no-p-h">
                                    <a class="btn-floating btn waves-effect waves-light green" onclick="$('#editar<?= $value->idtb_usuario?>').openModal()">
                                        <i class="material-icons">mode_edit</i>
                                    </a>
                                    <a class="btn-floating btn waves-effect waves-light red" onclick="swal({
                                        title: 'Você tem Certeza?',
                                        text: 'não sera possivel recuperar as informações do usuario',
                                        type: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#DD6B55',
                                        confirmButtonText: 'SIM',
                                        cancelButtonText: 'NÃO',
                                        closeOnConfirm: false,
                                        closeOnCancel: false
                                        },
                                        function(isConfirm){
                                        if (isConfirm) {
                                        location.href='?p=usuarios-biblioteca&delete=true&id=<?= $value->idtb_usuario?>';
                                        } else {
                                        swal({title:'Cancelado', type:'error',timer: 2000,showConfirmButton:false});
                                        }
                                        })"><i class="material-icons">delete_forever</i></a>

                                </td>
                            </tr>

                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php foreach ($usuario as $value): $ids[]=$value->idtb_usuario;?>
                        <div id="editar<?= $value->idtb_usuario?>" class="modal modal-fixed-footer modReserva" >
                            <form method="post" id="edit<?= $value->idtb_usuario?>">
                                <div class="modal-content">
                                    <h4 class="no-m-b">Atualizar Usuario da Biblioteca</h4>
                                    <div class="col m12 l12">
                                        <input type="hidden" name="id" value="<?= $value->idtb_usuario?>">
                                        <div class="input-field">
                                            <label for="nome_usuario<?= $value->idtb_usuario?>">Nome do Usuario</label>
                                            <input placeholder="Digite o Nome do Usuario" id="nome_usuario<?= $value->idtb_usuario?>" value="<?= $value->nome_usuario?>" type="text" class="validate" name="nome_usuario">
                                        </div>
                                        <div class="input-field">
                                            <label for="email<?= $value->idtb_usuario?>">Email do Usuario</label>
                                            <input placeholder="Digite o Email do Usuario" id="email<?= $value->idtb_usuario?>" type="email" value="<?= $value->email_usuario?>" class="validate" name="email">
                                        </div>
                                        <div>
                                            <input type="checkbox" name="troca" value="yes" id="senha-troca<?= $value->idtb_usuario?>"
                                                   onclick="document.getElementById('senha<?= $value->idtb_usuario?>').disabled = !document.getElementById('senha<?= $value->idtb_usuario?>').disabled;
                                                           document.getElementById('re_senha<?= $value->idtb_usuario?>').disabled = !document.getElementById('re_senha<?= $value->idtb_usuario?>').disabled">
                                            <label for="senha-troca<?= $value->idtb_usuario?>"> Trocar Senha</label>
                                        </div>
                                        <div class="input-field">
                                            <label for="senha<?= $value->idtb_usuario?>">Senha</label>
                                            <input placeholder="Digite a Senha" id="senha<?= $value->idtb_usuario?>" type="password" class="validate" name="senha" disabled>
                                        </div>
                                        <div class="input-field">
                                            <label for="re_senha<?= $value->idtb_usuario?>">Digite a Senha Novamente</label>
                                            <input placeholder="Digite a Senha Novamente" id="re_senha<?= $value->idtb_usuario?>" type="password" class="validate" name="re_senha" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="modal-action modal-close waves-effect waves-green btn-flat" name="atualizar">Salvar</button>
                                </div>
                            </form>
                        </div>
                    <?php  endforeach;?>
                </div>
            </div>
        </div>
    </div>
</main>