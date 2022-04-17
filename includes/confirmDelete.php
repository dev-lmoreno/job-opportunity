<main>

    <section>

        <h2 class="mt-3">
            Excluir Vaga
        </h2>

        <form method="POST">

            <div class="form-group">
                <p>Deseja realmente excluír a Vaga <strong><?=  $opportunity->title ?></strong></p>
            </div>

            <div class="form-group">
                <a href="index.php">
                    <button type="button" class="btn btn-success">
                        Voltar 
                    </button>
                </a>

                <button type="submit" name="delete" class="btn btn-danger">
                    Excluír
                </button>
            </div>
        </form>

    </section>

</main>