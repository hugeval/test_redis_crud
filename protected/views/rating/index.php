<?php
/* @var $this UsersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Рейтинг',
);

$this->menu = array(
    array('label' => 'Создать', 'url' => array('create')),
);
?>

<h1>Рейтинг</h1>

<h4>
    <?= CHtml::link('За сегодня', $this->createUrl('/rating/index', array('key' => 'today', 'size' => 5))) ?>
</h4>
<h4>
    <?= CHtml::link('За неделю', $this->createUrl('/rating/index', array('key' => 'week', 'size' => 5))) ?>
</h4>
<h4>
    <?= CHtml::link('За месяц', $this->createUrl('/rating/index', array('key' => 'month', 'size' => 5))) ?>
</h4>

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
));
?>
