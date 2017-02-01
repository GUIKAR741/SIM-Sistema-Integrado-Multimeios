<?php
if(!isset($_GET['idT']) || empty($_GET['idT']) || !isset($_GET['idA']) || empty($_GET['idA'])):
    //header('Location: home.php?acao=acervo');
    echo "<script> location='home.php?acao=turma'</script>";
    exit;
endif;
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="home.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active"><a href="home.php?acao=acervo">Turma</a></li>
            <li>Aluno</li>
            <li>Deletar</li>
        </ol>
    </div><!--/.row-->
    <div class="row">
        <hr>
        <div class="col-lg-12">

            <?php
            use App\Models\Alunos;
            if (!empty(filter_input(INPUT_GET, 'idT', FILTER_DEFAULT)) and !empty(filter_input(INPUT_GET, 'idA', FILTER_DEFAULT))):
                $aluno=new Alunos();
                $idT = filter_input(INPUT_GET, 'idT', FILTER_DEFAULT);
                $idA = filter_input(INPUT_GET, 'idA', FILTER_DEFAULT);
                $row=$aluno->delete('id',$idA);
                if ($row > 0):
                    echo '<div class="alert bg-success" role="alert">
                    <svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> <strong>Deletado com sucesso!</strong><a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                </div>';
                    //header("Refresh:1.5 home.php?acao=acervo");
                    echo "<script> setTimeout('document.location = \'home.php?acao=visualizarT&idT={$idT}\'',2000);</script>";
                else:
                    echo '<div class="alert bg-danger" role="alert">
                    <svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> <strong>Erro ao deletar!</strong><a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                </div>';
                    echo "<script> setTimeout('document.location = \'home.php?acao=turma\'',1500);</script>";
                    //header("Refresh:1.5 home.php?acao=update&id={$id}");
                endif;
            endif;
            ?>

        </div>
    </div><!-- /.col-->
</div><!-- /.row -->