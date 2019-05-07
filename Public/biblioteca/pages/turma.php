<?php
$tb_aluno = new App\Models\SiscoTbAluno();
$id = isset($_GET['id'])?strip_tags($_GET['id']):"";
$nome = $tb_aluno->select()->from('sisco.tb_turma,sisco.tb_cursos')->where('sisco.tb_turma.tb_cursos_idtb_cursos', 'idtb_cursos', '=', false)->e('sisco.tb_turma.idtb_turma', $id)->order('ano', 'desc')->first();
if (!isset($_GET['id']) || $nome==false):
    echo '<script>window.location=\'?p=home\'</script>';
endif;
?>
<main class="mn-inner p-h-xs pad-title">
    <div class="row">
        <div class="col s12">
            <div class="page-title"><?= $nome->serie."º ".$nome->nome_curso?></div>
        </div>
        <div class="col s12 m12 l12 no-p-h" >
            <div class="card">
                <div class="card-content">
                    <table class="responsive-table striped bordered">
                        <thead>
                            <tr>
                                <th class="center">Nº</th>
                                <th class="center">Nome</th>
                                <th class="center">Consultar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            //dump($id);
                            $alunos = $tb_aluno->select()->from('sisco.tb_aluno')->where('sisco.tb_aluno.tb_turma_idtb_turma', $id)->order('diario','asc')->all();
//                            dump($alunos);
                            
                          //$alunos = $tb_aluno->select()->from()->all();
                            foreach ($alunos as $value):
                                ?>
                                <tr>
                                    <td class="center no-m no-p-h"><?= $value->diario ?></td>
                                    <td class="center no-m no-p-h"><?= $value->nome_aluno ?></td>
                                    <td class="center no-m no-p-h"><a class="waves-effect waves-light green btn" href="?p=historico&idAluno=<?= $value->idtb_aluno ?>">Historico</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>