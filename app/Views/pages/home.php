<div class="container">
    <div class="card bg-light mx-5 mt-3">
        <div class="card-header">
            <h5>CRUD de Alunos</h5>
        </div>

        <div class="card-body">
            <p class="card-text"><?= $text; ?></p>
        </div>

        <div class="card-footer d-flex justify-content-end">
            <a 
                href="<?= '/alunos/' ?>" 
                class="btn btn-md btn-primary d-flex justify-content-end"
            >
                <?= $link; ?>
            </a>
        </div>
    </div>
</div>