<?php
$tb_usuario = new \App\Models\SiscoTbUsuario();
?>
<main class="mn-inner p-h-xs pad-title">
    <div class="row">
        <div class="col s12">
            <div class="page-title">Usuários Professores</div>
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
                        $usuario=$tb_usuario->where("BINARY tipo_usuario","Professor")->all();
                        foreach ($usuario as $value):?>
                            <tr>
                                <td class="no-m no-p-h center"><?= $value->nome_usuario?></td>
                                <td class="center no-m no-p-h">
                                    <div class="switch">
                                        <label>
                                            Desativado
                                            <input type="checkbox" disabled id="check" <?php if ($value->status_usuario==1) echo 'checked';?>>
                                            <span class="lever"></span>
                                            Ativado
                                        </label>
                                    </div>
                                </td>
                                <td class="center no-m no-p-h">
                                    <a class="btn-floating btn waves-effect waves-light blue" onclick="$('#editar<?= $value->idtb_usuario?>').openModal()">
                                        <i class="material-icons">remove_red_eye</i>
                                    </a>
                                </td>
                            </tr>
                            <div id="editar<?= $value->idtb_usuario?>" class="modal modal-fixed-footer modReserva" >
                                <form method="post">
                                    <div class="modal-content">
                                        <h4 class="no-m-b">Usuário Professor</h4>
                                        <div class="col m12 l12">
                                            <input type="hidden" name="id" value="<?= $value->idtb_usuario?>">
                                            <div class="input-field">
                                                <label for="nome_usuario">Nome do Usuario</label>
                                                <input id="nome_usuario" value="<?= $value->nome_usuario?>" type="text" class="validate" name="nome_usuario" disabled>
                                            </div>
                                            <div class="input-field">
                                                <label for="email">Email do Usuario</label>
                                                <input id="email" type="email" value="<?= $value->email_usuario?>" class="validate" name="email" disabled>
                                            </div>
                                            <div class="input-field">
                                                <label for="senha">Senha</label>
                                                <input id="senha" type="text" value="<?= $value->senha_usuario?>" name="senha" disabled>
                                            </div>
                                        </div>
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