<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs = array(
    'Рейтинг' => array('index', 'key' => 'today', 'size' => 5),
    'Создать',
);

$this->menu = array(
    array('label' => 'Список', 'url' => array('index', 'key' => 'today', 'size' => 5)),
);
?>

<h1>Создать рейтинг</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>