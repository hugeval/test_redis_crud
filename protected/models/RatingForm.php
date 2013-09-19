<?php

/**
 * RatingForm class.
 */
class RatingForm extends CFormModel {

    public $key;
    public $username;
    public $score;

    /**
     * Declares the validation rules.
     */
    public function rules() {
        return array(
            // name, email, subject and body are required
            array('key, username, score', 'required'),
            array('score', 'numerical', 'integerOnly' => true),
        );
    }

    /**
     * Declares customized attribute labels.
     * If not declared here, an attribute would have a label that is
     * the same as its name with the first letter in upper case.
     */
    public function attributeLabels() {
        return array(
            'key' => 'Ключ',
            'username' => 'Имя пользователя',
            'score' => 'Рейтинг'
        );
    }

    public function submit() {
        (new Rating())->remove($this->key, $this->username);
        (new Rating())->add($this->key, $this->score, $this->username);
        return true;
    }

}