<?php
 
class Apartment extends CActiveRecord
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
        return 'apartment';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_hotel, bloco, apartamento, cama_casal, cama_solteiro, banheiro, frigobar', 'required', 'on' => 'default'),
            array('bloco, apartamento', 'length', 'max'=>20),
            array('cama_casal, cama_solteiro, banheiro, frigobar', 'numerical', 'integerOnly'=>true),
            array('id, id_hotel, bloco, apartamento, valor, status, cama_casal, cama_solteiro, banheiro, frigobar, telefone ', 'safe', 'on'=>'search'),
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
            'hotel' => array(self::BELONGS_TO, 'Hotel', 'id_hotel'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(

            'id' => Yii::t('Apartment', 'apartment.id'),
            'id_hotel' => Yii::t('Apartment', 'Hotel'),
            'bloco' => Yii::t('Apartment', 'Bloco'),
            'apartamento' => Yii::t('Apartment', 'Apartamento'),
            'cama_casal' => Yii::t('Apartment', 'Camas de casal'),
            'cama_solteiro' => Yii::t('Apartment', 'Camas de solteiro'),
            'banheiro' => Yii::t('Apartment', 'Banheiro'),
            'frigobar' => Yii::t('Apartment', 'Frigobar'),
            'telefone' => Yii::t('Apartment', 'Telefone'),
            'valor' => Yii::t('Apartment', 'Valor'),
            'status' => Yii::t('Apartment', 'Status'),
        );
    }

    /**
     * @return value of model attribute that names it 
     */
    public function nameAttribute()
    {
        return $this->bloco." ".$this->apartamento;
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
        $criteria->compare('id_hotel',$this->id_hotel,true);
        $criteria->compare('bloco',$this->bloco,true);
        $criteria->compare('apartamento',$this->apartamento,true);
        $criteria->compare('cama_casal',$this->cama_casal,true);
        $criteria->compare('cama_solteiro',$this->cama_solteiro,true);
        $criteria->compare('banheiro',$this->banheiro,true);
        $criteria->compare('frigobar',$this->frigobar,true);
        $criteria->compare('telefone',$this->telefone,true);
        $criteria->compare('valor',$this->valor,true);
        $criteria->compare('status',$this->status,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
}