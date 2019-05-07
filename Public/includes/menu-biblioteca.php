<?php
use Carbon\Carbon;
$tb_acervo=new \App\Models\Tb_acervo();
$tb_locacao=new \App\Models\Tb_locacao();
$noti=$tb_locacao->select()->from()->where("data_devolucao BETWEEN '".Carbon::now()->toDateString()."' AND '".Carbon::now()->addDay(1)->toDateString()."' AND (status_devolucao","1)","=",false)->order("data_devolucao")->all();
$anterior=$tb_locacao->select()->from()->where("data_devolucao ","'".Carbon::now()->toDateString()."' AND (status_devolucao = 1)","<",false)->order("data_devolucao",'desc')->all();
$contaNotifica=count($noti)+count($anterior);
//dump($anterior);
//dump($noti);
foreach ($noti as $value):
    if ($value->data_devolucao==Carbon::now()->toDateString()):
        $hoje[]=$value;
    elseif ($value->data_devolucao==Carbon::now()->addDay(1)->toDateString()):
        $amanha[]=$value;
    endif;
endforeach;
if (isset($_GET['renovar'])):
    $locacao=$tb_locacao->select()->from()->where("idtb_locacao",$_GET['renovar'])->first();
    if ($locacao->qtd_renovacao<3):
        $data7=Carbon::parse(strip_tags($locacao->data_devolucao))->addDays(7);
        $tb_locacao->data_devolucao=$data7;
        $tb_locacao->qtd_renovacao=$locacao->qtd_renovacao+1;
        $tb_locacao->update('idtb_locacao',$_GET['renovar']);
    endif;
    echo "<script>document.location='?p=home'</script>";
endif;
if (isset($_GET['devolver'])):
    $tb_locacao->status_lido=0;
    $locacao=$tb_locacao->select()->from()->where("idtb_locacao",$_GET['devolver'])->first();
    $livro=$tb_acervo->select()->from()->where("idtb_acervo",$locacao->tb_acervo_idtb_acervo)->first();
    if ($locacao->status_devolucao!=0):
        $tb_acervo->disponiveis=intval($livro->disponiveis)+1;
        $tb_locacao->status_devolucao=0;
        $tb_acervo->update('idtb_acervo',$locacao->tb_acervo_idtb_acervo);
    endif;
    $tb_locacao->update('idtb_locacao',$_GET['devolver']);
    echo "<script>document.location='?p=home'</script>";
endif;
?>
<div class="mn-content">
    <header class="mn-header navbar-fixed">
        <nav class="cyan darken-1">
            <div class="nav-wrapper row">
                <section class="material-design-hamburger navigation-toggle">
                    <a href="javascript:void(0)" data-activates="slide-out" class="button-collapse show-on-large material-design-hamburger__icon">
                        <span class="material-design-hamburger__layer"></span>
                    </a>
                </section>
                <div class="header-title col s3 m3">
                    <a href="?p=home"><span class="chapter-title">SIM</span></a>
                </div>
                <ul class="right col s9 m3 nav-right-menu">
                    <li><a href="javascript:void(0)" data-activates="notification" class="chat-button show-on-large"><i class="material-icons">notifications_none</i><?php if ($contaNotifica>0) echo "<span class=\"badge\"><script> var a=".$contaNotifica.";document.write(a);</script></span>"?></a></li>
                </ul>
            </div>
        </nav>
    </header>
    <aside id="notification" class="side-nav white">
        <div class="side-nav-wrapper">
            <div id="sidebar-chat-tab" class="col s12 sidebar-messages right-sidebar-panel">
                <?php if (count($noti)<=0 && count($anterior)<=0):?>
                    <div class="chat-list">
                        <div class="chat-item">
                            <div class="chat-item-info" style="padding-left: 0">
                                <p class="chat-name">Nenhuma Notificação</p>
                            </div>
                        </div>
                    </div>
                <?php endif;
                if (isset($amanha)):
                    ?>
                    <div class="col l12 notification-drop-title">Amanhã</div>
                    <div class="chat-list">
                        <?php
                        foreach ($amanha as $value):
                            $aluno= $tb_acervo->select()->
                            from('sisco.tb_aluno,sisco.tb_turma')->
                            where('sisco.tb_aluno.tb_turma_idtb_turma','idtb_turma','=',false)->
                            e('idtb_aluno',$value->tb_aluno_idtb_aluno)->
                            first();
                            $curso=$tb_acervo->select()->from('sisco.tb_cursos')->where('idtb_cursos',$aluno->tb_cursos_idtb_cursos,'=',false)->first();
                            $livro=$tb_acervo->select()->from()->where("idtb_acervo",$value->tb_acervo_idtb_acervo)->first();
                            ?>
                            <div class="chat-item">
                                <div class="chat-item-info" style="padding-left: 0">
                                    <a href="?p=historico&idAluno=<?= $aluno->idtb_aluno?>">
                                        <p class="chat-name"><?= $aluno->nome_aluno?></p>
                                        <p class="chat-name"><?= $aluno->serie."º ".$curso->nome_curso?></p>
                                        <p class="chat-name"><?= $livro->titulo?></p>
                                        <p class="chat-name">Devolução:<?= date('d/m/Y',strtotime($value->data_devolucao))?></p>
                                    </a>
                                    <div class="list-inline">
                                        <a class="waves-effect waves-light blue btn" href="?devolver=<?= $value->idtb_locacao?>">Devolver</a>
                                        <?php if ($value->qtd_renovacao<3):?>
                                            <a class="waves-effect waves-light green btn" href="?renovar=<?= $value->idtb_locacao?>">Renovar</a>
                                        <?php endif;?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endforeach;
                        ?>
                    </div>
                    <?php
                endif;
                if (isset($hoje)):?>
                    <div class="col l12 notification-drop-title">Hoje</div>
                    <div class="chat-list">
                        <?php
                        foreach ($hoje as $value):
                            $aluno= $tb_acervo->select()->
                            from('sisco.tb_aluno,sisco.tb_turma')->
                            where('sisco.tb_aluno.tb_turma_idtb_turma','idtb_turma','=',false)->
                            e('idtb_aluno',$value->tb_aluno_idtb_aluno)->
                            first();
                            $curso=$tb_acervo->select()->from('sisco.tb_cursos')->where('idtb_cursos',$aluno->tb_cursos_idtb_cursos,'=',false)->first();
                            $livro=$tb_acervo->select()->from()->where("idtb_acervo",$value->tb_acervo_idtb_acervo)->first();
                            ?>
                            <div class="chat-item">
                                <div class="chat-item-info" style="padding-left: 0">
                                    <a href="?p=historico&idAluno=<?= $aluno->idtb_aluno?>">
                                        <p class="chat-name"><?= $aluno->nome_aluno?></p>
                                        <p class="chat-name"><?= $aluno->serie."º ".$curso->nome_curso?></p>
                                        <p class="chat-name"><?= $livro->titulo?></p>
                                        <p class="chat-name">Devolução:<?= date('d/m/Y',strtotime($value->data_devolucao))?></p>
                                    </a>
                                    <div class="list-inline">
                                        <a class="waves-effect waves-light blue btn" href="?devolver=<?= $value->idtb_locacao?>">Devolver</a>
                                        <?php if ($value->qtd_renovacao<3):?>
                                            <a class="waves-effect waves-light green btn" href="?renovar=<?= $value->idtb_locacao?>">Renovar</a>
                                        <?php endif;?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endforeach;
                        ?>
                    </div>
                    <?php
                endif;
                if (count($anterior)>0):
                    ?>
                    <div class="col l12 notification-drop-title">Pendentes</div>
                    <div class="chat-list">
                        <?php
                        foreach ($anterior as $value):
                            $aluno= $tb_acervo->select()->
                            from('sisco.tb_aluno,sisco.tb_turma')->
                            where('sisco.tb_aluno.tb_turma_idtb_turma','idtb_turma','=',false)->
                            e('idtb_aluno',$value->tb_aluno_idtb_aluno)->
                            first();
                            $curso=$tb_acervo->select()->from('sisco.tb_cursos')->where('idtb_cursos',$aluno->tb_cursos_idtb_cursos,'=',false)->first();
                            $livro=$tb_acervo->select()->from()->where("idtb_acervo",$value->tb_acervo_idtb_acervo)->first();
                            ?>
                            <div class="chat-item">
                                <div class="chat-item-info" style="padding-left: 0">
                                    <a href="?p=historico&idAluno=<?= $aluno->idtb_aluno?>">
                                        <p class="chat-name"><?= $aluno->nome_aluno?></p>
                                        <p class="chat-name"><?= $aluno->serie."º ".$curso->nome_curso?></p>
                                        <p class="chat-name"><?= $livro->titulo?></p>
                                        <p class="chat-name">Devolução:<?= date('d/m/Y',strtotime($value->data_devolucao))?></p>
                                    </a>
                                    <div class="list-inline">
                                        <a class="waves-effect waves-light blue btn" href="?devolver=<?= $value->idtb_locacao?>">Devolver</a>
                                        <?php if ($value->qtd_renovacao<3):?>
                                            <a class="waves-effect waves-light green btn" href="?renovar=<?= $value->idtb_locacao?>">Renovar</a>
                                        <?php endif;?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endforeach;
                        ?>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </aside>