<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs = array(
    'Рейтинг' => array('index', 'key' => 'today', 'size' => 5),
    $data['score'],
);

$this->menu = array(
    array('label' => 'Список', 'url' => array('index', 'key' => 'today', 'size' => 5)),
    array('label' => 'Создать', 'url' => array('create')),
    array('label' => 'Обновить', 'url' => array('update', 'key' => $data['key'], 'username' => $data['username'], 'score' => $data['score'])),
    array('label' => 'Удалить', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'key' => $data['key'], 'username' => $data['username']), 'confirm' => 'Удалить?')),
);
?>

<h1>Просмотр рейтинга <?= $data['score']; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => array(
        'key' => $data['key'],
        'username' => $data['username'],
        'score' => $data['score'],
    ),
    'attributes' => array(
        array(
            'label' => 'Рейтинг',
            'value' => $data['score'],
        ),
        array(
            'label' => 'Имя пользователя',
            'value' => $data['username'],
        ),
        array(
            'label' => 'Ключ',
            'value' => $data['key'],
        ),
    ),
));
?>
