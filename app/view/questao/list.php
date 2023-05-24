<?php
#Nome do arquivo: usuario/list.php
#Objetivo: interface para listagem dos usuários do sistema

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
?>

<h3 class="text-center">Usuários</h3>

<div class="container">
    <div class="row">
        <div class="col-3">
            <a class="btn btn-success" href="<?= BASEURL ?>/controller/QuestaoController.php?action=create">
                Inserir</a>
        </div>

        <div class="col-9">
            <?php require_once(__DIR__ . "/../include/msg.php"); ?>
        </div>
    </div>

    <div class="row" style="margin-top: 10px;">
        <div class="col-12">
            <table id="tabUsuarios" class='table table-striped table-bordered'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Login</th>
                        <th>Papeis</th>
                        <th>Alterar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dados['lista'] as $q) : ?>
                        <tr>
                            <td><?php echo $q->getIdQuestao(); ?></td>
                            <td><?= $usu->getNome(); ?></td>
                            <td><?= $usu->getLogin(); ?></td>
                            <td><?= $usu->getPapeisStr(); ?></td>
                            <td><a class="btn btn-primary" href="<?= BASEURL ?>/controller/QuestaoController.php?action=edit&id=<?= $q->getIdQuestao() ?>">
                                    Alterar</a>
                            </td>
                            <td><a class="btn btn-danger" onclick="return confirm('Confirma a exclusão do questão?');" href="<?= BASEURL ?>/controller/QuestaoController.php?action=delete&id=<?= $q->getIdQuestao() ?>">
                                    Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
require_once(__DIR__ . "/../include/footer.php");
?>