<?php
/* @var $this UsersController */
/* @var $data Users */
?>

<div class="view">

    <b>Рейтинг:</b>
    <?php echo CHtml::link(CHtml::encode($data['score']), array('view', 'key' => $data['key'], 'score' => $data['score'], 'username' => $data['username'])); ?>
    <br />

    <b>Имя пользователя:</b>
    <?php echo CHtml::encode($data['username']); ?>
    <br />
    
    <b>Ключ:</b>
    <?php echo CHtml::encode($data['key']); ?>
    <br />
</div>