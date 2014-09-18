<?php
 
class Cost extends CActiveRecord
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
        return 'cost';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_agend, id_tipo_custo, texto ', 'required'),
            array('texto', 'length', 'max'=>300, 'min'=>5),

            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id_agend, id_tipo_custo, texto, valor', 'safe', 'on'=>'search'),
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

            'id' => Yii::t('Cost', 'cost.id'),
            'id_agend' => Yii::t('Cost', 'cost.id_agend'),
            'id_tipo_custo' => Yii::t('Cost', 'cost.id_tipo_custo'),
            'valor' => Yii::t('Cost', 'cost.valor'),
            'texto' => Yii::t('Cost', 'cost.texto'),
        );
    }

    /**
     * @return value of model attribute that names it 
     */
    public function nameAttribute()
    {
        return $this->texto;
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
        $criteria->compare('id_agend',$this->id_agend,true);
        $criteria->compare('id_tipo_custo',$this->id_tipo_custo,true);
        $criteria->compare('valor',$this->valor,true);
        $criteria->compare('texto',$this->texto,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
}