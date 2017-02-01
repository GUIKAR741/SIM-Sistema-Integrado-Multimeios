
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="home.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Acervo</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Acervo</h1>
        </div>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">

                <div class="panel-body table-responsive">

                    <table id="example" class="table table-striped table-bordered" cellpadding="0" cellspacing="0" border="0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>DATA</th>
                            <th>TITULO</th>
                            <th>AUTOR</th>
                            <th>VOL</th>
                            <th>EX</th>
                            <th>LOCAL</th>
                            <th>EDITORA</th>
                            <th>ANO_PUB</th>
                            <th>FORMA_DE_AQ</th>
                            <th>OBS</th>
                            <th>Atualizar</th>
                            <th>Deletar</th>
                        </tr>
                        <tbody>
                        <?php
                        use App\Models\Acervo;

                        $acervo=new Acervo();
                        $livros=$acervo->select()->from()->all();
                        $cont=1;
                        $ex=0;
                        foreach ($livros as $livro):
                            $ex+=$livro->EX;
                            ?>
                        <tr>
                            <td><?= $cont++?></td>
                            <td><?= date('d/m/Y',strtotime($livro->DATA))?></td>
                            <td><?= $livro->TITULO?></td>
                            <td><?= $livro->AUTOR?></td>
                            <td><?= $livro->VOL?></td>
                            <td><?= $livro->EX?></td>
                            <td><?= $livro->LOCAL?></td>
                            <td><?= $livro->EDITORA?></td>
                            <td><?= $livro->ANO_PUB?></td>
                            <td><?= $livro->FORMA_DE_AQ?></td>
                            <td><?= $livro->OBS?></td>
                            <td><a href="home.php?acao=update&id=<?= $livro->id?>" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span></a></td>
                            <td><a href="home.php?acao=delete&id=<?= $livro->id?>" onclick="confirm('Deseja realmente apagar este registro?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a></td>
                        </tr>
                        <?php endforeach;?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div><!--/.row-->
    </div>

<!--    <script type="text/javascript" language="javascript" src="js/jquery-1.12.4.min.js"></script>-->
