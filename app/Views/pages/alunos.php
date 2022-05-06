<div class="container"> 
    <?php if (!empty($alunos) && is_array($alunos)) : ?>
        <table class="table table-lg table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            
            <?php foreach($alunos as $aluno) : ?>

            <a href="<?= '/alunos/inserir' ?>" class="btn btn-primary mb-3">Adicionar Aluno</a>

            <tbody>
                <tr>
                    <th><?= $aluno['id'] ?></th>
                    <td><?= $aluno['nome'] ?></td>
                    <td><?= $aluno['endereco'] ?></td>
                    <td>
                        <a href="<?= '/alunos/' . $aluno['id'] ?>" class="btn btn-success mr-2">Visualizar</a>
                        <a href="<?= '/alunos/editar/' . $aluno['id'] ?>" class="btn btn-warning mr-2">Editar</a>
                        <a href="<?= '/alunos/excluir/' . $aluno['id'] ?>" class="btn btn-danger">Excluir</a>
                    </td>
                </tr>
            </tbody>

            <?php endforeach; ?>
        </table>
    <?php else : ?>
        Não existe nenhum aluno cadastrado no Sistema!

        <div class="d-flex justify-content-end">
            <a href="javascript:history.back()" class="btn btn-primary mr-2">Voltar</a>
            <a href="<?= '/alunos/inserir' ?>" class="btn btn-primary">Adicionar Aluno</a>
        </div>
    <?php endif ?>
</div>