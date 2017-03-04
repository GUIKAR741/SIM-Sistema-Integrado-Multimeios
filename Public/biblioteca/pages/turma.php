<main class="mn-inner">
    <div class="row">
        <div class="col s12">
            <div class="page-title">Nome da Turma</div>
        </div>
        <div class="col s12 m12 l12">
            <div class="card">
                <div class="card-content">
                    <table class="responsive-table striped bordered">
                        <thead>
                        <tr>
                            <th data-field="id">Nº</th>
                            <th data-field="id">Nome</th>
                            <th data-field="price" class="right-align">Consultar</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php for ($i=1;$i<=45;$i++): ?>
                            <tr>
                                <td><?= $i?></td>
                                <td>Nome Completo do Aluno</td>
                                <td class="right-align"><a class="waves-effect waves-light green btn" href="?p=historico&idAluno=<?= $i?>">Historico</a></td>
                            </tr>
                        <?php endfor ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>