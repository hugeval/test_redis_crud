<?php

class RatingController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('index', 'view', 'create', 'update', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $request = Yii::app()->request;
        
        $this->render('index', array(
            'dataProvider' => (new Rating())->getDataProvider($request->getParam('key'), $request->getParam('size')),
        ));
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($key, $username, $score) {
        $this->render('view', array(
            'data' => array(
                'key' => $key,
                'username' => $username,
                'score' => $score,
            ),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $request = Yii::app()->request;

        $model = new RatingForm();

        if ($request->isPostRequest) {
            $model->attributes = $request->getPost('RatingForm');
            if ($model->validate()) {
                $model->submit();
                $this->redirect(array('view', 'key' => $model->key, 'score' => $model->score, 'username' => $model->username));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($key, $username, $score) {
        $request = Yii::app()->request;

        $model = new RatingForm();
        $model->key = $key;
        $model->username = $username;
        $model->score = $score;

        if ($request->isPostRequest) {
            $model->attributes = $request->getPost('RatingForm');
            if ($model->validate()) {
                $model->submit();
                $this->redirect(array('view', 'key' => $model->key, 'score' => $model->score, 'username' => $model->username));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }
    
    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($key, $username) {

        (new Rating())->remove($key, $username);
        
        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index', 'key' => 'today', 'size' => 5));
    }

}