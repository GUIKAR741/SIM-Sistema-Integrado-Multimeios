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
                    <a class="collapsible-header waves-effect waves-grey" onclick="$('#editar').openModal()"><i class="material-icons">settings</i>Configurações</a>
                </li>
                <li class="no-padding">
                    <a class="waves-effect waves-grey"><i class="material-icons">import_contacts</i>Manual</a>
                </li>
                <li class="divider"></li>
                <li class="no-padding">
                    <a class="waves-effect waves-grey" href="?sair"><i class="material-icons">exit_to_app</i>Sair</a>
                </li>
            </ul>
        </div>
        <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">
            <li class="no-padding"><a class="waves-effect waves-grey active" href="?p=home"><i class="material-icons">dashboard</i>Painel</a></li>
            <li class="no-padding">
                <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">library_books</i> Acervos<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                <div class="collapsible-body">
                    <ul>
                        <li><a class="waves-effect waves-grey active" href="?p=acervo">Acervo</a></li>
                        <li><a class="waves-effect waves-grey active" href="?p=circulo">Circulo</a></li>
                        <li><a class="waves-effect waves-grey active" href="?p=cd-dvd">CD e DVD</a></li>
                        <li><a class="waves-effect waves-grey active" href="?p=tves">TV Escola</a></li>
                        <li><a class="waves-effect waves-grey active" href="?p=materiais">Materiais</a></li>
                        <li><a class="waves-effect waves-grey active" href="?p=jmf">JMF</a></li>
                    </ul>
                </div>
            </li>
            <li class="no-padding">
                <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">supervisor_account</i> Turmas<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                <div class="collapsible-body">
                    <ul>
                        <?php
                        use App\Models\SiscoTbTurma;
                        $tb_turma=new SiscoTbTurma();
                        $curso = $tb_turma->select()->from('sisco.tb_turma,sisco.tb_cursos')->where('sisco.tb_turma.tb_cursos_idtb_cursos', 'idtb_cursos','=',false)->order('ano','desc')->all();
                        foreach ($curso as $value):
                        ?>
                        <li><a class="waves-effect waves-grey active" href="?p=turma&id=<?= $value->idtb_turma?>"><?= $value->serie.'º '.$value->nome_curso?></a></li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </li>
            <li class="no-padding">
                <a class="collapsible-header waves-effect waves-grey" href="?p=graficos"><i class="material-icons">equalizer</i> Graficos</a>
            </li>

        </ul>
        <div class="footer">
            <p class="copyright">© 2017 - Informatica 2015</p>
        </div>
    </div>
</aside>
<div id="editar" class="modal modal-fixed-footer modReserva" >
    <form method="post" id="edit">
        <div class="modal-content">
            <h4 class="no-m-b">Atualizar Usuario da Biblioteca</h4>
            <div class="col m12 l12">
                <input type="hidden" name="id" value="<?= $_SESSION['id_usuario']?>">
                <div class="input-field">
                    <label for="nome_usuario" class="active">Nome do Usuario</label>
                    <input placeholder="Digite o Nome do Usuario" id="nome_usuario" value="<?= $_SESSION['nome']?>" type="text" class="validate" name="nome_usuario">
                </div>
                <div class="input-field">
                    <label for="email" class="active">Email do Usuario</label>
                    <input placeholder="Digite o Email do Usuario" id="email" type="email" value="<?= $_SESSION['email']?>" class="validate" name="email">
                </div>
                <div>
                    <input type="checkbox" name="troca" value="yes" id="senha-troca"
                           onclick="document.getElementById('senha').disabled = !document.getElementById('senha').disabled;
                                                       document.getElementById('re_senha').disabled = !document.getElementById('re_senha').disabled">
                    <label for="senha-troca"> Trocar Senha</label>
                </div>
                <div class="input-field">
                    <label for="senha" class="active">Senha</label>
                    <input placeholder="Digite a Senha" id="senha" type="password" class="validate" name="senha" disabled>
                </div>
                <div class="input-field">
                    <label for="re_senha" class="active">Digite a Senha Novamente</label>
                    <input placeholder="Digite a Senha Novamente" id="re_senha" type="password" class="validate" name="re_senha" disabled>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="modal-action waves-effect waves-green btn-flat" name="atualizar">Salvar</button>
        </div>
    </form>
</div>