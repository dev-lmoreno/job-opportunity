<main>

    <section>

        <a href="index.php">
            <button class="btn btn-success">
                Voltar 
            </button>
        </a>

        <h2 class="mt-3">
            <?=TITLE?>
        </h2>

        <form method="POST">

            <div class="form-group">
                <label>Título</label>
                <input type="text" class="form-control" name="title" value="<?= $opportunity->title ?>">
            </div>

            <div class="form-group">
                <label>Descrição</label>
                <textarea class="form-control" name="description" rows="5"><?= $opportunity->description ?></textarea>
            </div>

            <div class="form-group">
                <label>Status</label>

                <div>
                    <div class="form-check form-check-inline">
                        <label class="form-control">
                            <input type="radio" name="active" value="1" checked> Ativo
                        </label>
                    </div>

                    <div class="form-check form-check-inline">
                        <label class="form-control">
                            <input type="radio" name="active" value="0" <?= !$opportunity->active ? 'checked' : '' ?>> Inativo
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">
                    Enviar
                </button>
            </div>
        </form>

    </section>

</main>