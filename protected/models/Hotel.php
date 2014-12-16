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
            array('nome, cnpj, id_filial, nome_proprietario, email_proprietario, endereco, numero, cep, telefone', 'required', 'on' => 'default'),
            array('nome, nome_proprietario', 'length', 'max'=>70),
            array('cnpj', 'length', 'max'=>15),
            array('email_proprietario, endereco', 'length', 'max'=>100),
            array('complemento', 'length', 'max'=>50),
            array('cep', 'length', 'max'=>9),
            array('telefone, telefone2, celular, fax', 'length', 'max'=>11),

            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, nome,cnpj,id_filial,nome_proprietario,email_proprietario,endereco,numero,complemento,cep,telefone,telefone2,celular,fax,status, created_at, updated_at, user_inactive', 'safe', 'on'=>'search'),
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
            'affiliate' => array(self::BELONGS_TO, 'Affiliate', 'id_filial'),
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
            'nome' => Yii::t('Hotel', 'Nome'),
            'cnpj' => Yii::t('Hotel', 'CNPJ'),
            'id_filial' => Yii::t('Hotel', 'Filial'),
            'nome_proprietario' => Yii::t('Hotel', 'Nome Proprietário'),
            'email_proprietario' => Yii::t('Hotel', 'E-mail Proprietário'),
            'endereco' => Yii::t('Hotel', 'Endereço'),
            'numero' => Yii::t('Hotel', 'Número'),
            'complemento' => Yii::t('Hotel', 'Complemento'),
            'cep' => Yii::t('Hotel', 'CEP'),
            'telefone' => Yii::t('Hotel', 'Telefone'),
            'telefone2' => Yii::t('Hotel', 'Telefone 2'),
            'celular' => Yii::t('Hotel', 'Celular'),
            'fax' => Yii::t('Hotel', 'Fax'),
            'created_at' => Yii::t('Hotel', 'Criando em'),
            'updated_at' => Yii::t('Hotel', 'Atualizado em'),
            'user_inactive' => Yii::t('Hotel', 'Usuario que inativou'),
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
        $criteria->compare('nome_proprietario',$this->nome_proprietario,true);
        $criteria->compare('email_proprietario',$this->email_proprietario,true);
        $criteria->compare('endereco',$this->endereco,true);
        $criteria->compare('numero',$this->numero,true);
        $criteria->compare('complemento',$this->complemento,true);
        $criteria->compare('cep',$this->cep,true);
        $criteria->compare('telefone',$this->telefone,true);
        $criteria->compare('telefone2',$this->telefone2,true);
        $criteria->compare('celular',$this->celular,true);
        $criteria->compare('fax',$this->fax,true);
        $criteria->compare('created_at',$this->created_at,true);
        $criteria->compare('user_inactive',$this->user_inactive,true);
        $criteria->compare('updated_at',$this->updated_at,true);
        
        $criteria->compare('status',$this->status,true);
        
        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
}