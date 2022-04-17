<?php

    $message = '';
    $status = $_GET['status'];
    if (isset($status)) {
        switch ($status) {
            case 'success':
                $message = '<div class="alert alert-success">Ação executada com sucesso!</div>';
                break;
            case 'error':
                $message = '<div class="alert alert-danger">Ação não executada!</div>';
                break;
        }
    }

    $result = '';
    foreach ($opportunities as $opportunity) {
        $result .= '<tr>
                        <td>' . $opportunity->id . '</td>
                        <td>' . $opportunity->title . '</td>
                        <td>' . $opportunity->description . '</td>
                        <td>' . ($opportunity->active ? 'Ativo' : 'Inativo') . '</td>
                        <td>' . date('d/m/Y à\s H:i:s', strtotime($opportunity->date)) . '</td>
                        <td>
                            <a href="edit.php?id=' . $opportunity->id . '">
                                <button type="button" class="btn btn-primary">Editar</button>
                            </a>
                            <a href="delete.php?id=' . $opportunity->id . '">
                                <button type="button" class="btn btn-danger">Excluir</button>
                            </a>
                        </td>
                    </tr>';
    }

    $result = strlen($result) ? $result : '<tr>
                                                <td colspan="6" class="text-center">
                                                    Nenhuma vaga encontrada
                                                </td>
                                            </tr>';
?>

<main>
    <?= $message ?>
    <section>

        <a href="register.php">
            <button class="btn btn-success">
                Nova Vaga
            </button>
        </a>

    </section>

    <section>
        <table class="table bg-light mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Status</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?=$result?>
            </tbody>
        </table>
    </section>

</main>