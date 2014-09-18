<?php
 
class Schedule extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return City the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'agendamento';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('data_ini, data_fim, id_func, id_apart, id_cli', 'required'),

            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('data_ini, data_fim, id_func, id_apart, id_cli, valor, status', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()   
    {
        return array(

            'id' => Yii::t('Schedule', 'schedule.id'),
            'data_ini' => Yii::t('Schedule', 'schedule.data_ini'),
            'data_fim' => Yii::t('Schedule', 'schedule.data_fim'),
            'id_func' => Yii::t('Schedule', 'schedule.id_func'),
            'id_apart' => Yii::t('Schedule', 'schedule.id_apart'),
            'id_cli' => Yii::t('Schedule', 'schedule.id_cli'),
            'valor' => Yii::t('Schedule', 'schedule.valor'),
            'status' => Yii::t('Schedule', 'schedule.status'),
        );
    }

    /**
     * @return value of model attribute that names it 
     */
    public function nameAttribute()
    {
        return $this->status;
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('id',$this->id,true);
        $criteria->compare('data_ini',$this->data_ini,true);
        $criteria->compare('data_fim',$this->data_fim,true);
        $criteria->compare('id_func',$this->id_func,true);
        $criteria->compare('id_apart',$this->id_apart,true);
        $criteria->compare('id_cli',$this->id_cli,true);
        $criteria->compare('valor',$this->valor,true);
        $criteria->compare('status',$this->status,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
}