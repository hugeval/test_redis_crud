<?php
$this->breadcrumbs = array(
    'Рейтинг' => array('index', 'key' => 'today', 'size' => 5),
    $model->score => array('view', 'key' => $model->key, 'score' => $model->score, 'username' => $model->username),
    'Обновить',
);

$this->menu = array(
    array('label' => 'Список', 'url' => array('index', 'key' => 'today', 'size' => 5)),
    array('label' => 'Создать', 'url' => array('create')),
    array('label' => 'View Users', 'url' => array('view', 'key' => $model->key, 'score' => $model->score, 'username' => $model->username)),
);
?>

<h1>Обновить рейтинг <?= $model->score; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>