<?php
$title = 'J.Forteroche | Gestion';
ob_start();
?>

    <section id="management" class="col-lg-12">
        <table class="col-lg-12">
            <tr>
                <th>Id Post</th>
                <th>Auteur Commentaire</th>
                <th>Text Commentaire</th>
                <th>Auteur Signalement</th>
                <th>Text Signalement</th>
                <th>Date Signalement</th>
                <th>Gestion</th>
            </tr>
        <?php
            while ($report = $management_report->fetch())
            {
                ?>
                <tr>
                    <td><a href="?action=post&post=<?=$report['post_id']?>" target="_blank"><?=$report['post_id']?></a></td>
                    <td><?=$report['username']?></td>
                    <td><?=$report['text']?></td>
                    <td><?=$report['author_report']?></td>
                    <td><?=$report['text_report']?></td>
                    <td><?=$report['date_report']?></td>
                    <td class="col-lg-1"><a href="#" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-ok"></span></a><a href="#" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove-sign"></span></a></td>
                </tr>
            <?php
            }
        ?>
        </table>
    </section>

<?php
$management_report->closeCursor();
$content = ob_get_clean();
require(__DIR__ . '/../front/template.php');