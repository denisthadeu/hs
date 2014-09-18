<?php
 
class Company extends CActiveRecord
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
        return 'company';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('nome, cnpj, nome_resp, email_resp', 'required'),
            array('nome, email_resp', 'length', 'max'=>50),
            array('nome_resp', 'length', 'max'=>80),
            array('cnpj', 'length', 'max'=>15),

            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, nome,cnpj,nome_resp,tel_resp,ramal_resp,email_resp,status', 'safe', 'on'=>'search'),
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
            'hotel' => array(self::HAS_MANY, 'Hotel', 'id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(

            'id' => Yii::t('Company', 'company.id'),
            'nome' => Yii::t('Company', 'company.nome'),
            'cnpj' => Yii::t('Company', 'company.cnpj'),
            'nome_resp' => Yii::t('Company', 'company.nome_resp'),
            'tel_resp' => Yii::t('Company', 'company.tel_resp'),
            'ramal_resp' => Yii::t('Company', 'company.ramal_resp'),
            'email_resp' => Yii::t('Company', 'company.email_resp'),
            'status' => Yii::t('Company', 'company.status'),
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
        $criteria->compare('nome_resp',$this->nome_resp,true);
        $criteria->compare('tel_resp',$this->tel_resp,true);
        $criteria->compare('ramal_resp',$this->ramal_resp,true);
        $criteria->compare('email_resp',$this->email_resp,true);
        $criteria->compare('status',$this->status,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
}