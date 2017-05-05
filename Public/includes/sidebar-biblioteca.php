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
                    <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">settings</i>Configurações<!--<i class="nav-drop-icon material-icons">keyboard_arrow_right</i>--></a>
                    <!--<div class="collapsible-body">
                        <ul>
                            <li><a href="?p=usuarios">Usuarios</a></li>
                        </ul>
                    </div>-->
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
            <!--<li class="no-padding"><a class="waves-effect waves-grey active" href="?p=acervo"><i class="material-icons">library_books</i>Acervo</a></li>
            <li class="no-padding"><a class="waves-effect waves-grey active" href="?p=circulo"><i class="material-icons">library_books</i>Circulo</a></li>
            <li class="no-padding"><a class="waves-effect waves-grey active" href="?p=cd-dvd"><i class="material-icons">library_books</i>CD e DVD</a></li>
            <li class="no-padding"><a class="waves-effect waves-grey active" href="?p=tves"><i class="material-icons">library_books</i>TV Escola</a></li>
            <li class="no-padding"><a class="waves-effect waves-grey active" href="?p=materiais"><i class="material-icons">library_books</i>Materiais</a></li>
            <li class="no-padding"><a class="waves-effect waves-grey active" href="?p=jmf"><i class="material-icons">library_books</i>JMF</a></li>-->
        </ul>
        <div class="footer">
            <p class="copyright">© 2017 - Informatica 2015</p>
        </div>
    </div>
</aside>