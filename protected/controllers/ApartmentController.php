<?php

class ApartmentController extends Controller
{
    public $hotel_list;

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
        $criteria=new CDbCriteria();
        if(Yii::app()->user->nivel == 2){
            $criteria->join = ' JOIN hotel ON hotel.id = t.id_hotel ';
            $criteria->join .= ' JOIN affiliate ON affiliate.id = hotel.id_filial ';
            $criteria->condition = ' affiliate.id_empresa = :id_empresa ';
            $criteria->params = array(":id_empresa" => Yii::app()->user->id_empresa);
        }
        $count=Apartament::model()->count($criteria);
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
        $model = Apartament::model()->findByPk($id);
        $is_update = true;
        if (isset($_POST['Apartament'])) {
            $model->attributes = $_POST['Apartament'];

            //remove tudo que nao é alfanumerico
            $model->updated_at = date("Y-m-d H:i:s");
            $model->status = "a";
            
            if($model->validate() && $model->save()){
                
                Yii::app()->user->setFlash('success', sprintf('Apartamento %s atualizado com sucesso!',
                    $model->nome
                ));
                
                $this->redirect(array('index'));
            }
        }
        $this->$hotel_list = array();
        if(Yii::app()->user->nivel == 1){
            $this->$hotel_list =  Affiliate::model()->findAll(array('order'=>'nome'));
        } else {
            $this->$hotel_list = Affiliate::model()->findAll(
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
        $model = new Apartament();
        $model->scenario = "default";
        $is_update = false;
        if (isset($_POST['Apartament'])) {
            $model->attributes = $_POST['Apartament'];
            
            //remove tudo que nao é alfanumerico
            $model->created_at = date("Y-m-d H:i:s");
            $model->status = "a";
            
            if($model->validate() && $model->save()){
                
                Yii::app()->user->setFlash('success', sprintf('Apartamento %s cadastrado com sucesso!',
                    $model->nome
                ));
                
                $this->redirect(array('index'));
            }
        }
        if(Yii::app()->user->nivel == 1){
            $this->hotel_list =  Affiliate::model()->findAll(array('order'=>'nome'));
        } else {
            $this->hotel_list = Affiliate::model()->findAll(
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