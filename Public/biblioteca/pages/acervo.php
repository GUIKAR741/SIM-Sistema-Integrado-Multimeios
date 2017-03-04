<main class="mn-inner">
    <div class="row">
        <div class="col s12">
            <div class="page-title">Acervo de Livros</div>
            <div class="fixed-action-btn horizontal">
                <a class="btn-floating btn-large waves-effect waves-light blue-grey modal-trigger" href="#modal1"><i class="material-icons">add</i></a>
            </div>
            <div id="modal1" class="modal modal-fixed-footer modAcervo" >
                <form method="post">
                    <div class="modal-content">
                        <h4 class="no-m-b">Adicionar novo livro</h4>
                        <div class="col m12 l6">
                            <div class="input-field">
                                <label for="titulo">Titulo</label>
                                <input placeholder="Digite o Titulo do Livro" id="titulo" type="text" class="validate">
                            </div>
                            <div class="input-field">
                                <label for="Autor">Autor</label>
                                <input placeholder="Digite Nome do Autor" id="Autor" type="text" class="validate">
                            </div>
                            <div class="input-field">
                                <label for="Local">Local</label>
                                <input placeholder="Digite o Local" id="Local" type="text" class="validate">
                            </div>
                            <div class="input-field">
                                <label for="Editora">Editora</label>
                                <input placeholder="Digite o Nome da Editora" id="Editora" type="text" class="validate">
                            </div>

                            <div class="input-field">
                                <label for="Sinopse">Sinopse</label>
                                <textarea id="Sinopse" class="materialize-textarea" placeholder="Digite a Sinopse do Livro"></textarea>
                            </div>
                            <!--<div class="input-field">
                                <label for="Sinopse">Sinopse</label>
                                <input placeholder="Digite a Sinopse do Livro" id="Sinopse" type="text" class="validate">
                            </div>-->
                        </div>
                        <div class="col m12 l6">
                            <div class="input-field">
                                <label class="active" for="data">Data</label>
                                <input id="data" placeholder="Escolha a Data Desejada" type="date" class="datepicker">
                            </div>
                            <div>
                                <label for="ano">Ano de Publicação</label>
                                <div class="input-field">
                                    <p class="range-field no-m">
                                        <input type="range" class="no-m" id="ano" min="1975" value="<?= date('Y')?>" max="2025" />
                                    </p>
                                </div>
                            </div>
                            <div>
                                <label for="exemplares">Exemplares</label>
                                <div class="input-field">
                                    <p class="range-field no-m">
                                        <input type="range" class="no-m" id="exemplares" min="1" value="1" max="100" />
                                    </p>
                                </div>
                            </div><div>
                                <label for="volume">Volume</label>
                                <div class="input-field">
                                    <p class="range-field no-m">
                                        <input type="range" class="no-m" id="volume" min="1" value="1" max="50" />
                                    </p>
                                </div>
                            </div>
                            <div class="input-field">
                                <label for="formadeaq">Forma de Aquisição</label>
                                <input placeholder="Digite a Forma de Aquisição" id="formadeaq" type="text" class="validate">
                            </div>
                            <div class="input-field">
                                <label for="OBS">OBS.</label>
                                <input placeholder="Digite Alguma Observação sobre o Livro" id="OBS" type="text" class="validate">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Salvar</a>
                    </div>
                </form>
            </div>
        </div>
        <div class="col s12 m12 l12">
            <div class="card">
                <div class="card-content">
                    <table id="example" class="display responsive-table datatable-example">
                        <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Autor</th>
                            <th>Local</th>
                            <th>Editora</th>
                            <th>Sinopse</th>
                            <th>Observações</th>
                            <th>Data</th>
                            <th>Volume</th>
                            <th>Exemplares</th>
                            <th>Ano de Publicação</th>
                            <th>Forma de Aquisição</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Titulo</th>
                            <th>Autor</th>
                            <th>Local</th>
                            <th>Editora</th>
                            <th>Sinopse</th>
                            <th>Observações</th>
                            <th>Data</th>
                            <th>Volume</th>
                            <th>Exemplares</th>
                            <th>Ano de Publicação</th>
                            <th>Forma de Aquisição</th>
                            <th>Ações</th>
                        </tr>
                        </tfoot>
                        <tbody>

                        <?php for ($i=0;$i<=50;$i++): ?>
                            <tr>
                                <td>Donna Snider</td>
                                <td>Customer Support</td>
                                <td>New York</td>
                                <td>27</td>
                                <td>$112,000</td>
                                <td>Customer Support</td>
                                <td>2011/01/25</td>
                                <td>New York</td>
                                <td>27</td>
                                <td>2011/01/25</td>
                                <td>$112,000</td>
                                <td>
                                    <a class="btn-floating btn waves-effect waves-light green" onclick="$('#modal1<?= $i?>').openModal()"><i class="material-icons">mode_edit</i></a>
                                    <a class="btn-floating btn waves-effect waves-light red" href="?p=acervo&del=<?= $i?>"><i class="material-icons">delete_forever</i></a>
                                    <a class="btn-floating btn waves-effect waves-light cyan" onclick="$('#modal2<?= $i?>').openModal()"><i class="material-icons">book</i></a>
                                </td>
                                <div id="modal1<?= $i?>" class="modal modal-fixed-footer modAcervo" >
                                    <form method="post">
                                        <div class="modal-content">
                                            <h4 class="no-m-b">Adicionar novo livro<?= $i?></h4>
                                            <div class="col m12 l6">
                                                <div class="input-field">
                                                    <label for="titulo">Titulo</label>
                                                    <input placeholder="Digite o Titulo do Livro" id="titulo" type="text" class="validate">
                                                </div>
                                                <div class="input-field">
                                                    <label for="Autor">Autor</label>
                                                    <input placeholder="Digite Nome do Autor" id="Autor" type="text" class="validate">
                                                </div>
                                                <div class="input-field">
                                                    <label for="Local">Local</label>
                                                    <input placeholder="Digite o Local" id="Local" type="text" class="validate">
                                                </div>
                                                <div class="input-field">
                                                    <label for="Editora">Editora</label>
                                                    <input placeholder="Digite o Nome da Editora" id="Editora" type="text" class="validate">
                                                </div>

                                                <div class="input-field">
                                                    <label for="Sinopse">Sinopse</label>
                                                    <textarea id="Sinopse" class="materialize-textarea" placeholder="Digite a Sinopse do Livro"></textarea>
                                                </div>
                                                <!--<div class="input-field">
                                                    <label for="Sinopse">Sinopse</label>
                                                    <input placeholder="Digite a Sinopse do Livro" id="Sinopse" type="text" class="validate">
                                                </div>-->
                                            </div>
                                            <div class="col m12 l6">
                                                <div class="input-field">
                                                    <label class="active" for="data">Data</label>
                                                    <input id="data" placeholder="Escolha a Data Desejada" type="date" class="datepicker">
                                                </div>
                                                <div>
                                                    <label for="ano">Ano de Publicação</label>
                                                    <div class="input-field">
                                                        <p class="range-field no-m">
                                                            <input type="range" class="no-m" id="ano" min="1975" value="<?= date('Y')?>" max="2025" />
                                                        </p>
                                                    </div>
                                                </div>
                                                <div>
                                                    <label for="exemplares">Exemplares</label>
                                                    <div class="input-field">
                                                        <p class="range-field no-m">
                                                            <input type="range" class="no-m" id="exemplares" min="1" value="1" max="100" />
                                                        </p>
                                                    </div>
                                                </div><div>
                                                    <label for="volume">Volume</label>
                                                    <div class="input-field">
                                                        <p class="range-field no-m">
                                                            <input type="range" class="no-m" id="volume" min="1" value="1" max="50" />
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="input-field">
                                                    <label for="formadeaq">Forma de Aquisição</label>
                                                    <input placeholder="Digite a Forma de Aquisição" id="formadeaq" type="text" class="validate">
                                                </div>
                                                <div class="input-field">
                                                    <label for="OBS">OBS.</label>
                                                    <input placeholder="Digite Alguma Observação sobre o Livro" id="OBS" type="text" class="validate">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Salvar</a>
                                        </div>
                                    </form>
                                </div>
                                <div id="modal2<?= $i?>" class="modal modal-fixed-footer modReserva" >
                                    <form method="post">
                                        <div class="modal-content">
                                            <h4 class="no-m-b">Locar Livro</h4>

                                            <div class="input-field">
                                                <select>
                                                    <option value="" disabled selected>Selecione uma Turma</option>
                                                    <option value="1">Turma1</option>
                                                    <option value="2">Turma2</option>
                                                    <option value="3">Turma3</option>
                                                </select>
                                            </div><div class="input-field">
                                                <select disabled>
                                                    <option value="" disabled selected>Selecione um Aluno</option>
                                                </select>
                                            </div>
                                            <div class="input-field">
                                                <label class="active" for="data">Data</label>
                                                <input id="data" placeholder="Escolha a Data Desejada" type="date" class="datepicker">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Salvar</a>
                                        </div>
                                    </form>
                                </div>
                            </tr>
                        <?php endfor ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>