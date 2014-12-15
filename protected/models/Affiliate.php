<?php
 
class Affiliate extends CActiveRecord
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
        return 'affiliate';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('nome, id_cidade, id_empresa', 'required'),
            array('nome', 'length', 'max'=>50),

            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, nome,id_cidade,id_empresa,status', 'safe', 'on'=>'search'),
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
            'company' => array(self::BELONGS_TO, 'Company', 'id_empresa'),
            'city' => array(self::BELONGS_TO, 'City', 'id_cidade'),
            'hotel' => array(self::HAS_MANY, 'Hotel', 'id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(

            'id' => Yii::t('Affiliate', 'hotel.id'),
            'nome' => Yii::t('Affiliate', 'hotel.nome'),
            'id_cidade' => Yii::t('Affiliate', 'hotel.id_cidade'),
            'id_empresa' => Yii::t('Affiliate', 'hotel.id_empresa'),
            'status' => Yii::t('Affiliate', 'hotel.status'),
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
        $criteria->compare('id_cidade',$this->id_cidade,true);
        $criteria->compare('id_empresa',$this->id_empresa,true);
        $criteria->compare('status',$this->status,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
}