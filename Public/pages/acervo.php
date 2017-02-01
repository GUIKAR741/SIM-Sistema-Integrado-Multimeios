<?php
use App\Models\Acervo;
use App\Models\Itens;
$acervo=new Acervo();
$items=new Itens();
if (!isset($_GET['pagina'])):
    $_GET['pagina']=0;
endif;
if (intval($_GET['pagina']) < 0):
    echo "<script> location='home.php?acao=acervo'</script>";
endif;
$item = $items->select()->from()->all();
?>
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
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="" method="post" class="form-inline">
                                <div class="form-group">
                                    <label for="itens">Itens por pagina</label>
                                    <select name="itens" class="form-control" id="itens">
                                        <?php foreach ($item as $valor): ?>
                                            <?php
                                            if ($valor->status == 1) {
                                                $itens = $valor->qtd;
                                                echo "<option selected value=\"$valor->qtd\">$valor->qtd</option>";
                                            }else{
                                                echo "<option value=\"$valor->qtd\">$valor->qtd</option>";
                                            }
                                            ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group col-lg-offset-5">
                                    <label for="procurar">Procurar:</label>
                                    <input type="text" id="procurar" class="form-control" name="procurar" >
                                    <button type="submit" name="env" class="btn btn-primary">enviar</button>
                                    <button type="submit" name="reset" value="reset" class="btn btn-primary">resetar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <hr>
                    <table id="example1" class="table table-striped table-bordered" cellpadding="0" cellspacing="0">
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
                        $procura=isset($_SESSION['procura'])?$_SESSION['procura']:"";
                        if (isset($_POST['reset']) && $_POST['reset']=='reset'):
                            $itens=10;
                            $_SESSION['procura']='';
                            $procura=$_SESSION['procura'];
                            $_POST['env']='';
                        else:
                            if (isset($_POST['env'])):
                            $itens=$_POST['itens'];
                            $_SESSION['procura']=strip_tags($_POST['procurar']);
                            $procura=$_SESSION['procura'];
                            endif;
                        endif;
                        if (isset($_POST['env'])):
                            $itempag=$items->select()->from()->where('status',1)->first();
                            if ($itempag->qtd!=$itens):
                                $items->status=0;
                                for ($i=1;$i<=count($item);$i++):
                                    $items->update('id',$i);
                                endfor;
                                $items->status=1;
                                $items->update('qtd',$itens);
                                echo "<script>window.location='home.php?acao=acervo';</script>";
                            endif;
                        endif;
                        $acervo->select()->from()->like(
                            "DATA LIKE '%$procura%' or TITULO LIKE '%$procura%' ".
                            " or AUTOR LIKE '%$procura%' or VOL LIKE '%$procura%' ".
                            " or EX LIKE '%$procura%' or LOCAL LIKE '%$procura%' ".
                            " or EDITORA LIKE '%$procura%' or ANO_PUB LIKE '%$procura%' ".
                            " or FORMA_DE_AQ LIKE '%$procura%' or OBS ","%$procura%"
                        )->all();
                        $pagina=isset($_GET['pagina'])?intval($_GET['pagina'])*$itens:0;
                        $total=$acervo->select()->from()->all();
                        $total=$acervo->count();
                        $livros=$acervo->select()->from()->limite("$pagina,$itens")->all();
                        $livroRow=$acervo->count();
                        $pag=$pagina/$itens;
                        $num_pag=ceil($total/$itens);
                        if (intval($_GET['pagina']) > $num_pag-1):
                            echo "<script> location='home.php?acao=acervo'</script>";
                        endif;
                        $cont=1;
                        foreach ($livros as $livro):
                            ?>
                            <tr>
                                <td><?= $livro->id?></td>
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
                                <td><a href="home.php?acao=updateA&id=<?= $livro->id?>" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span></a></td>
                                <td><a href="home.php?acao=deleteA&id=<?= $livro->id?>" onclick="confirm('Deseja realmente apagar este registro?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a></td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-lg-6">
                            <p class="text-center text-uppercase" style="margin-top: 30px;">
                                <?php
                                echo "mostrando ".($pagina+1)." a ".($pagina+$itens)." de $total registros";
                                ?>
                            </p>
                        </div>
                        <nav aria-label="Page navigation" class="text-center col-lg-offset-<?php if ($pag==0 || $pag==$num_pag-1) echo 7; else echo 6;?>">
                            <ul class="pagination">
                                <li>
                                    <a href="home.php?acao=acervo&pagina=0" aria-label="Previous">
                                        <span aria-hidden="true" class="glyphicon glyphicon-backward"></span>
                                    </a>
                                </li>
                                <?php if ($pag-1>=0): ?>
                                    <li>
                                        <a href="home.php?acao=acervo&pagina=<?= $pag - 1 ?>" aria-label="Previous">
                                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                        </a>
                                    </li>
                                    <li class="disable">
                                        <a><b>...</b></a>
                                    </li>
                                <?php endif;
                                if ($pag-2==-2):
                                    $paglist=$pag+5;
                                    $pagatual=$pag-2;
                                elseif ($pag-2==-1):
                                    $paglist=$pag+4;
                                    $pagatual=$pag-2;
                                elseif ($pag==$num_pag-1):
                                    $paglist=$pag+3;
                                    $pagatual=$pag-4;
                                elseif ($pag==$num_pag-2):
                                    $paglist=$pag+3;
                                    $pagatual=$pag-3;
                                else:
                                    $paglist=$pag+3;
                                    $pagatual=$pag-2;
                                endif;
                                for ($i=$pagatual;$i<($paglist);$i++):
                                    if ($i>=0 && $i<$num_pag):
                                        ?>
                                        <li <?php if ($i == $pag) echo "class='active'";?>>
                                            <a href="home.php?acao=acervo&pagina=<?= $i?>"><b><?= $i+1?></b></a>
                                        </li>
                                        <?php
                                    endif;
                                endfor;
                                if ($pag<$num_pag-1):?>
                                    <li class="disable">
                                        <a><b>...</b></a>
                                    </li>
                                    <li>
                                        <a href="home.php?acao=acervo&pagina=<?= $pag+1?>" aria-label="Previous">
                                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                        </a>
                                    </li>
                                <?php endif ?>
                                <li>
                                    <a href="home.php?acao=acervo&pagina=<?= $num_pag-1?>" aria-label="Next">
                                        <span aria-hidden="true" class="glyphicon glyphicon-forward"></span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.row-->
</div>