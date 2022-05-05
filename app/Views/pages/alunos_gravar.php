<div class="container">
    <?= \Config\Services::validation()->listErrors(); ?>

    <form action="<?= '/alunos/gravar' ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nome">Nome</label>

            <input 
                type="text" 
                class="form-control" 
                name="nome" 
                value="<?= isset($alunos['nome']) ? $alunos['nome'] : set_value('nome') ?>"
            />
        </div>

        <div class="form-group">
            <label for="endereco">Endereço</label>

            <input 
                type="text" 
                class="form-control" 
                name="endereco" 
                value="<?= isset($alunos['endereco']) ? $alunos['endereco'] : set_value('endereco') ?>"
            />    
        </div>

        <div class="form-group">
            <label for="img">Foto</label>
            <input type="file" name="img">
        </div>

        <input 
            type="hidden" 
            name="id" 
            value="<?= isset($alunos['id']) ? $alunos['id'] : set_value('id') ?>"
        />

        <div class="d-flex justify-content-end">
            <a href="javascript:history.back()" class="btn btn-primary mr-2">Voltar</a>
            <input type="submit" name="submit" class="btn btn-success" value="Salvar">
        </div>
    </form>
</div>