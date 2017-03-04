<main class="mn-inner">
    <div class="row">
        <div class="col s12">
            <div class="page-title">Nome do Aluno</div>
        </div>
        <div class="col s12 m12 l12">
            <div class="card">
                <div class="card-content">
                    <p>Turma</p>
                    <table class="responsive-table striped bordered">
                        <thead>
                        <tr>
                            <th data-field="id">Livro</th>
                            <th data-field="id">Data da Locacão</th>
                            <th data-field="id">Data da Devolução</th>
                            <th data-field="price" class="right-align">Consultar</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php for ($i=1;$i<=10;$i++): ?>
                            <tr>
                                <td>Nome do Livro</td>
                                <th data-field="id">Data da Locacão</th>
                                <th data-field="id">Data da Devolução</th>
                                <td class="right-align">
                                    <a class="btn-floating btn waves-effect waves-light green" onclick="$('#modal1<?= $i?>').openModal()"><i class="material-icons">mode_edit</i></a>
                                    <a class="btn-floating btn waves-effect waves-light red" href="?p=historico&del=<?= $i?>"><i class="material-icons">delete_forever</i></a>
                                </td>
                            </tr>
                            <div id="modal1<?= $i?>" class="modal modal-fixed-footer modReserva" >
                                <form method="post">
                                    <div class="modal-content">
                                        <h4 class="no-m-b">Locar Livro</h4>

                                        <div class="input-field">
                                            <label class="active" for="basic">Selecionar Livro</label>
                                            <select class="js-states browser-default" tabindex="-1" style="width: 100%" id="basic">
                                                <option value="AK">Alaska</option>
                                                <option value="HI">Hawaii</option>
                                                <option value="CA">California</option>
                                                <option value="NV" selected>Nevada</option>
                                                <option value="OR">Oregon</option>
                                                <option value="WA">Washington</option>
                                                <option value="AZ">Arizona</option>
                                                <option value="CO">Colorado</option>
                                                <option value="ID">Idaho</option>
                                                <option value="MT">Montana</option>
                                                <option value="NE">Nebraska</option>
                                                <option value="NM">New Mexico</option>
                                                <option value="ND">North Dakota</option>
                                                <option value="UT">Utah</option>
                                                <option value="WY">Wyoming</option>
                                                <option value="AL">Alabama</option>
                                                <option value="AR">Arkansas</option>
                                                <option value="IL">Illinois</option>
                                                <option value="IA">Iowa</option>
                                                <option value="KS">Kansas</option>
                                                <option value="KY">Kentucky</option>
                                                <option value="LA">Louisiana</option>
                                                <option value="MN">Minnesota</option>
                                                <option value="MS">Mississippi</option>
                                                <option value="MO">Missouri</option>
                                                <option value="OK">Oklahoma</option>
                                                <option value="SD">South Dakota</option>
                                                <option value="TX">Texas</option>
                                                <option value="TN">Tennessee</option>
                                                <option value="WI">Wisconsin</option>
                                                <option value="CT">Connecticut</option>
                                                <option value="DE">Delaware</option>
                                                <option value="FL">Florida</option>
                                                <option value="GA">Georgia</option>
                                                <option value="IN">Indiana</option>
                                                <option value="ME">Maine</option>
                                                <option value="MD">Maryland</option>
                                                <option value="MA">Massachusetts</option>
                                                <option value="MI">Michigan</option>
                                                <option value="NH">New Hampshire</option>
                                                <option value="NJ">New Jersey</option>
                                                <option value="NY">New York</option>
                                                <option value="NC">North Carolina</option>
                                                <option value="OH">Ohio</option>
                                                <option value="PA">Pennsylvania</option>
                                                <option value="RI">Rhode Island</option>
                                                <option value="SC">South Carolina</option>
                                                <option value="VT">Vermont</option>
                                                <option value="VA">Virginia</option>
                                                <option value="WV">West Virginia</option>
                                            </select>
                                        </div>
                                        <div class="input-field">
                                            <label class="active" for="data">Data da Locação</label>
                                            <input id="data" placeholder="Escolha a Data Desejada" type="date" class="datepicker">
                                        </div>
                                        <div class="input-field">
                                            <label class="active" for="data">Data da Devolução</label>
                                            <input id="data" placeholder="Escolha a Data Desejada" type="date" class="datepicker">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Salvar</a>
                                    </div>
                                </form>
                            </div>
                        <?php endfor ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>