<aside id="slide-out" class="side-nav white">
    <div class="side-nav-wrapper">
        <div class="sidebar-profile">
            <div class="sidebar-profile-image">
                <img src="../assets/images/profile-image.png" class="circle" alt="">
            </div>
            <div class="sidebar-profile-info">
                <a href="javascript:void(0);" class="account-settings-link">
                    <p><?= $_SESSION['nome']?></p>
                    <span><?= $_SESSION['email']?><i class="material-icons right">arrow_drop_down</i></span>
                </a>
            </div>
        </div>
        <div class="sidebar-account-settings">
            <ul class="collapsible collapsible-accordion" data-collapsible="accordion">
                <li class="no-padding">
                    <a class="collapsible-header waves-effect waves-grey" onclick="$('#editar').openModal()"><i class="material-icons">settings</i>Configurações<!--<i class="nav-drop-icon material-icons">keyboard_arrow_right</i>--></a>
                </li>
                <li class="no-padding">
                    <a class="waves-effect waves-grey" target="_blank" href="Manual-Professores.pdf"><i class="material-icons">import_contacts</i>Manual</a>
                </li>
                <li class="divider"></li>
                <li class="no-padding">
                    <a class="waves-effect waves-grey" href="?sair"><i class="material-icons">exit_to_app</i>Sair</a>
                </li>
            </ul>
        </div>
        <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">
            <li class="no-padding"><a class="waves-effect waves-grey active" href="?p=home"><i class="material-icons">dashboard</i>Painel</a></li>
        </ul>
        <div class="footer">
            <p class="copyright">© 2017 - Informatica 2015</p>
        </div>
    </div>
</aside>
<div id="editar" class="modal modal-fixed-footer modReserva" >
    <form method="post" id="edit">
        <div class="modal-content">
            <?php $tb_usuario=new \App\Models\SiscoTbUsuario(); $user=$tb_usuario->where('idtb_usuario',$_SESSION['id_usuario'])->first()?>
            <h4 class="no-m-b">Informações Usuario Professor</h4>
            <div class="col m12 l12">
                <div class="input-field">
                    <label for="nome_usuario" class="active">Nome do Usuario</label>
                    <input  id="nome_usuario" value="<?= $user->nome_usuario?>" type="text" disabled>
                </div>
                <div class="input-field">
                    <label for="email" class="active">Email do Usuario</label>
                    <input  id="email" type="email" value="<?= $user->email_usuario?>" disabled>
                </div>
                <div class="input-field">
                    <label for="senha" class="active">Senha</label>
                    <input id="senha" type="text" value="<?= $user->senha_usuario?>" disabled>
                </div>
            </div>
            <?php unset($tb_usuario);unset($user);?>
        </div>
    </form>
</div>