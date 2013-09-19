<?php

class Rating {

    public function getDataProvider($key, $size) {
        $redis = Yii::app()->redis->client();

        $values = array();
        foreach ($redis->zRange($key, 0, -1) as $item) {
            array_unshift($values, array(
                'key' => $key,
                'username' => $item,
                'score' => $redis->zScore($key, $item),
            ));
        }

        return new CArrayDataProvider($values, array(
                    'keyField' => 'score',
                    'pagination' => array(
                        'pageSize' => (int) $size,
                    )
                ));
    }

    public function add($key, $score, $username) {
        $redis = Yii::app()->redis->client();
        $redis->zAdd($key, $score, $username);
    }

    public function remove($key, $username) {
        $redis = Yii::app()->redis->client();
        $redis->zRem($key, $username);
    }

}