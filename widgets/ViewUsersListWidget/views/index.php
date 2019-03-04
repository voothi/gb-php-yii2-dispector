<?php
/**
 * Created by PhpStorm.
 * User: Talisman
 * Date: 04.03.2019
 * Time: 19:12
 */
?>
<div class="col-md-6">
        <pre>
            <?php foreach ($users as $user):?>

            <?=\yii\helpers\VarDumper::dump($user);?>
            <?php endforeach;?>
        </pre>
</div>
