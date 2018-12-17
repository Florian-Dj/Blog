<?php
$title = 'J.Forteroche | Gestion';
ob_start();
?>

    <section id="management" class="col-lg-12">
        <table class="col-lg-12">
            <tr>
                <th>Post</th>
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
                    <td><a href="?action=post&post=<?=$report['post_id']?>" target="_blank"><?=$report['title']?></a></td>
                    <td><?=$report['username']?></td>
                    <td><?=$report['text']?></td>
                    <td><?=$report['author_report']?></td>
                    <td><?=$report['text_report']?></td>
                    <td><?=$report['date_report']?></td>

                    <?php
                    if ($report['status_report'] === 'maintenance'){?>
                        <td class="col-lg-1">
                        <a href="?action=report_management&report_id=<?=$report['report_id']?>&comment_id=<?=$report['comment_id']?>&status=valid" title="Validé Commentaire" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-ok"></span></a>
                        <a href="?action=report_management&report_id=<?=$report['report_id']?>&comment_id=<?=$report['comment_id']?>&status=delete" title="Supprimé Commentaire" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove-sign"></span></a>
                    </td>
                    <?php
                    }
                    elseif($report['status_report'] === 'delete'){
                        echo '<td class="col-lg-1"><span class="glyphicon glyphicon-remove-sign" style="color: red" title="Commentaire non affiché"></span></td>';
                    }
                    elseif ($report['status_report'] === 'valid'){
                        echo '<td class="col-lg-1"><span class="glyphicon glyphicon-ok-sign" style="color: darkgreen" title="Commentaire affiché"></span></td>';
                    }
                    ?>
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