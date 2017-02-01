
<?php
use App\Models\Acervo;
use App\Models\Alunos;
use App\Models\Turma;
$acervo=new Acervo();
$alunos=new Alunos();
$turmaOBJ=new Turma();
$livro=$acervo->select('count(id) as id, sum(EX) as ex')->from()->first();
$user=$alunos->select('count(id) as id')->from()->first();
$sala=$turmaOBJ->select()->from()->all();
foreach ($sala as $item):
    $turma[]=$alunos->select("count(id) as id")->from()->where('turma',$item->id)->first();
endforeach;
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="home.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Painel</h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-xs-12 col-md-4 col-lg-4">
            <div class="panel panel-blue panel-widget ">
                <div class="row no-padding">
                    <div class="col-sm-3 col-lg-5 widget-left">
                        <svg class="glyph stroked folder"><use xlink:href="#stroked-folder"/></svg>
                    </div>
                    <div class="col-sm-9 col-lg-7 widget-right">
                        <div class="large"><?= $livro->id;?></div>
                        <div class="text-muted">Livros</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-4 col-lg-4">
            <div class="panel panel-orange panel-widget">
                <div class="row no-padding">
                    <div class="col-sm-3 col-lg-5 widget-left">
                        <svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg>
                    </div>
                    <div class="col-sm-9 col-lg-7 widget-right">
                        <div class="large"><?= $livro->ex?></div>
                        <div class="text-muted">Exemplares</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-4 col-lg-4">
            <div class="panel panel-teal panel-widget">
                <div class="row no-padding">
                    <div class="col-sm-3 col-lg-5 widget-left">
                        <svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
                    </div>
                    <div class="col-sm-9 col-lg-7 widget-right">
                        <div class="large"><?= $user->id?></div>
                        <div class="text-muted">Alunos</div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.row-->

    <div class="row">
        <?php
        foreach ($turma as $key=>$item) {
            ?>
            <div class="col-xs-12 col-md-4 col-lg-4">
                <a href="?acao=visualizarT&idT=<?= $sala[$key]->id?>">
                    <div class="panel panel-red panel-widget">
                        <div class="row no-padding">
                            <div class="col-sm-3 col-lg-5 widget-left">
                                <svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
                            </div>
                            <div class="col-sm-9 col-lg-7 widget-right">
                                <div class="large"><?= $item->id?></div>
                                <div class="text-muted"><?= $sala[$key]->turma?></div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        <?php };?>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Site Traffic Overview</div>
                <div class="panel-body">
                    <div class="canvas-wrapper">
                        <canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-xs-6 col-md-3">
            <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                    <h4>New Orders</h4>
                    <div class="easypiechart" id="easypiechart-blue" data-percent="92" ><span class="percent">92%</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3">
            <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                    <h4>Comments</h4>
                    <div class="easypiechart" id="easypiechart-orange" data-percent="65" ><span class="percent">65%</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3">
            <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                    <h4>New Users</h4>
                    <div class="easypiechart" id="easypiechart-teal" data-percent="56" ><span class="percent">56%</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3">
            <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                    <h4>Visitors</h4>
                    <div class="easypiechart" id="easypiechart-red" data-percent="27" ><span class="percent">27%</span>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.row-->
</div>	<!--/.main-->
