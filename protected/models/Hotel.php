<?php
 
class Hotel extends CActiveRecord
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
        return 'hotel';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('nome, cnpj, id_filial', 'required'),
            array('nome', 'length', 'max'=>50),
            array('cnpj', 'length', 'max'=>15),

            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, nome,cnpj,id_filial,status', 'safe', 'on'=>'search'),
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
            'affilial' => array(self::BELONGS_TO, 'Filial', 'id_filial'),
            'apartment' => array(self::HAS_MANY, 'Apartment', 'apartment'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(

            'id' => Yii::t('Hotel', 'hotel.id'),
            'nome' => Yii::t('Hotel', 'hotel.nome'),
            'cnpj' => Yii::t('Hotel', 'hotel.cnpj'),
            'id_filial' => Yii::t('Hotel', 'hotel.id_filial'),
            'status' => Yii::t('Hotel', 'hotel.status'),
        );
    }

    /**
     * @return value of model attribute that names it 
     */
    public function nameAttribute()
    {
        return $this->nome;
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
        $criteria->compare('nome',$this->nome,true);
        $criteria->compare('cnpj',$this->cnpj,true);
        $criteria->compare('id_filial',$this->id_filial,true);
        $criteria->compare('status',$this->status,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
}