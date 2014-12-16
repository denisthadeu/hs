<?php

class HotelController extends Controller
{
    public $affiliate_list;
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
        $model = Hotel::model()->findByPk($id);
        $is_update = true;
        if (isset($_POST['Hotel'])) {
            $model->attributes = $_POST['Hotel'];
            $model->numero =  $_POST['Hotel']["numero"];
            //remove tudo que nao é alfanumerico
            $model->cnpj = preg_replace("/[^A-Za-z0-9 ]/", '', $model->cnpj);
            $model->cep = preg_replace("/[^A-Za-z0-9 ]/", '', $model->cep);
            $model->telefone = preg_replace("/[^A-Za-z0-9 ]/", '', $model->telefone);
            $model->telefone2 = preg_replace("/[^A-Za-z0-9 ]/", '', $model->telefone2);
            $model->celular = preg_replace("/[^A-Za-z0-9 ]/", '', $model->celular);
            $model->fax = preg_replace("/[^A-Za-z0-9 ]/", '', $model->fax);
            $model->updated_at = date("Y-m-d H:i:s");
            $model->status = "a";
            
            if($model->validate() && $model->save()){
                
                Yii::app()->user->setFlash('success', sprintf('Hotel %s atualizado com sucesso!',
                    $model->nome
                ));
                
                $this->redirect(array('index'));
            }
        }
        $this->affiliate_list = array();
        if(Yii::app()->user->nivel == 1){
            $this->affiliate_list =  Affiliate::model()->findAll(array('order'=>'nome'));
        } else {
            $this->affiliate_list = Affiliate::model()->findAll(
            array(
                'condition' => 'id_empresa = :company AND status = "a")',
                'params' => array(':company' => Yii::app()->user->id_empresa),
                'order'=>'nome',
            ));
        }
        $this->render('update', array(
            'model' => $model, 'is_update'=>$is_update
        ));
    }
    
    public function actionCreate()
    {
        $model = new Hotel();
        $model->scenario = "default";
        $is_update = false;
        if (isset($_POST['Hotel'])) {
            $model->attributes = $_POST['Hotel'];
            
            //remove tudo que nao é alfanumerico
            $model->cnpj = preg_replace("/[^A-Za-z0-9 ]/", '', $model->cnpj);
            $model->cep = preg_replace("/[^A-Za-z0-9 ]/", '', $model->cep);
            $model->telefone = preg_replace("/[^A-Za-z0-9 ]/", '', $model->telefone);
            $model->telefone2 = preg_replace("/[^A-Za-z0-9 ]/", '', $model->telefone2);
            $model->celular = preg_replace("/[^A-Za-z0-9 ]/", '', $model->celular);
            $model->fax = preg_replace("/[^A-Za-z0-9 ]/", '', $model->fax);
            $model->created_at = date("Y-m-d H:i:s");
            $model->status = "a";
            
            if($model->validate() && $model->save()){
                
                Yii::app()->user->setFlash('success', sprintf('Hotel %s cadastrado com sucesso!',
                    $model->nome
                ));
                
                $this->redirect(array('index'));
            }
        }
        if(Yii::app()->user->nivel == 1){
            $this->affiliate_list =  Affiliate::model()->findAll(array('order'=>'nome'));
        } else {
            $this->affiliate_list = Affiliate::model()->findAll(
            array(
                'condition' => 'id_empresa = :company AND status = "a")',
                'params' => array(':company' => Yii::app()->user->id_empresa),
                'order'=>'nome',
            ));
        }
        $this->render('create', array(
            'model' => $model, 'is_update'=>$is_update
        ));
    }
    
    public function actionInactive($id)
    {
        $model = Hotel::model()->findByPk($id);
        $model->status = "i";
        $model->updated_at = date("Y-m-d H:i:s");
        $model->user_inactive = Yii::app()->user->id;
        if($model->validate() && $model->save()){
            Yii::app()->user->setFlash('success', sprintf('Hotel %s foi inativado com sucesso!',
                $model->nome
            ));
        }
        $this->redirect(array('index'));
    }
    
    public function actionActive($id)
    {
        $model = Hotel::model()->findByPk($id);
        $model->status = "a";
        $model->updated_at = date("Y-m-d H:i:s");
        $model->user_inactive = 0;
        if($model->validate() && $model->save()){
            Yii::app()->user->setFlash('success', sprintf('Hotel %s foi ativado com sucesso!',
                $model->nome
            ));
        }
        $this->redirect(array('index'));
    }
}