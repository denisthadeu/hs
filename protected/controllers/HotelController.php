<?php

class HotelController extends Controller
{
    /**
     * Declares class-based actions.
     */
    public function actions()
    {
            return array(
                    // captcha action renders the CAPTCHA image displayed on the contact page
                    'captcha'=>array(
                            'class'=>'CCaptchaAction',
                            'backColor'=>0xFFFFFF,
                    ),
                    // page action renders "static" pages stored under 'protected/views/site/pages'
                    // They can be accessed via: index.php?r=site/page&view=FileName
                    'page'=>array(
                            'class'=>'CViewAction',
                    ),
            );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex()
    {
        
        /*$filter = array();
        
        if(Yii::app()->user->nivel == 2){
            $filter["condition"] = "id_filial in (SELECT id FROM affiliate a WHERE a.id_empresa = :company and a.status = 'a') AND status = 'a'";
            $filter["params"] = array(":company"=>Yii::app()->user->id_empresa);
        }
        //order by
        $filter["order"] = "nome ASC";
        */
        
        $criteria=new CDbCriteria();
        $count=Hotel::model()->count($criteria);
        $pages=new CPagination($count);

        // results per page
        $pages->pageSize=10;
        $pages->applyLimit($criteria);
        $models=Hotel::model()->findAll($criteria);

        $this->render('index', array(
            'models' => $models,
            'pages' => $pages
        ));
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);
        $is_update = true;
        if (isset($_POST['Hotel'])) {
            die("Salva hotel");
            $model->attributes = $_POST['Hotel'];
            $model->status = "a";
        }
        $this->render('update', array(
            'model' => $model, 'is_update'=>$is_update
        ));
    }
    
    public function actionCreate()
    {
        $model = new Hotel();
        $is_update = false;
        if (isset($_POST['Hotel'])) {
            die("Salva hotel");
            $model->attributes = $_POST['Hotel'];
            $model->status = "a";
        }
        $this->render('create', array(
            'model' => $model, 'is_update'=>$is_update
        ));
    }
}