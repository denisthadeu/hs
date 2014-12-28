<?php

class ApartmentController extends Controller
{
    public $Apartment_list;

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
            $criteria->join = ' JOIN Apartment ON Apartment.id = t.id_Apartment ';
            $criteria->join .= ' JOIN affiliate ON affiliate.id = Apartment.id_filial ';
            $criteria->condition = ' affiliate.id_empresa = :id_empresa ';
            $criteria->params = array(":id_empresa" => Yii::app()->user->id_empresa);
        }
        $count=Apartment::model()->count($criteria);
        $pages=new CPagination($count);

        // results per page
        $pages->pageSize=10;
        $pages->applyLimit($criteria);
        $models=Apartment::model()->findAll($criteria);

        $this->render('index', array(
            'models' => $models,
            'pages' => $pages
        ));
    }

    public function actionUpdate($id)
    {
        $model = Apartment::model()->findByPk($id);
        $is_update = true;
        if (isset($_POST['Apartment'])) {
            $model->attributes = $_POST['Apartment'];
            $model->telefone = preg_replace("/[^A-Za-z0-9 ]/", '', $model->telefone);
            //remove tudo que nao é alfanumerico
            $model->updated_at = date("Y-m-d H:i:s");
            $model->status = "a";
            
            if($model->validate() && $model->save()){
                
                Yii::app()->user->setFlash('success', sprintf('Apartmento %s atualizado com sucesso!',
                    $model->apartamento
                ));
                
                $this->redirect(array('index'));
            }
        }
        $criteria=new CDbCriteria();
        if(Yii::app()->user->nivel == 2){
            $criteria->join = ' JOIN affiliate ON affiliate.id = t.id_filial ';
            $criteria->condition = ' affiliate.id_empresa = :id_empresa ';
            $criteria->params = array(":id_empresa" => Yii::app()->user->id_empresa);
        }
        $this->Apartment_list =  Hotel::model()->findAll($criteria);
        $this->render('update', array(
            'model' => $model, 'is_update'=>$is_update
        ));
    }
    
    public function actionCreate()
    {
        $model = new Apartment();
        $model->scenario = "default";
        $model->cama_casal = 0;
        $model->cama_solteiro = 0;
        $model->banheiro = 0;
        $model->frigobar = 0;
        $is_update = false;
        if (isset($_POST['Apartment'])) {
            $model->attributes = $_POST['Apartment'];
            $model->telefone = preg_replace("/[^A-Za-z0-9 ]/", '', $model->telefone);
            //remove tudo que nao é alfanumerico
            $model->created_at = date("Y-m-d H:i:s");
            $model->status = "a";
            
            if($model->validate() && $model->save()){
                
                Yii::app()->user->setFlash('success', sprintf('Apartmento %s cadastrado com sucesso!',
                    $model->apartamento
                ));
                
                $this->redirect(array('index'));
            }
        }
        $criteria=new CDbCriteria();
        if(Yii::app()->user->nivel == 2){
            $criteria->join = ' JOIN affiliate ON affiliate.id = t.id_filial ';
            $criteria->condition = ' affiliate.id_empresa = :id_empresa ';
            $criteria->params = array(":id_empresa" => Yii::app()->user->id_empresa);
        }
        $this->Apartment_list =  Hotel::model()->findAll($criteria);

        $this->render('create', array(
            'model' => $model, 'is_update'=>$is_update
        ));
    }
    
    public function actionInactive($id)
    {
        $model = Apartment::model()->findByPk($id);
        $model->status = "i";
        $model->updated_at = date("Y-m-d H:i:s");
        $model->user_inactive = Yii::app()->user->id;
        if($model->validate() && $model->save()){
            Yii::app()->user->setFlash('success', sprintf('Apartamento %s foi inativado com sucesso!',
                $model->apartamento
            ));
        }
        $this->redirect(array('index'));
    }
    
    public function actionActive($id)
    {
        $model = Apartment::model()->findByPk($id);
        $model->status = "a";
        $model->updated_at = date("Y-m-d H:i:s");
        $model->user_inactive = 0;
        if($model->validate() && $model->save()){
            Yii::app()->user->setFlash('success', sprintf('Apartamento %s foi ativado com sucesso!',
                $model->apartamento
            ));
        }
        $this->redirect(array('index'));
    }
}