<?php
 
class City extends CActiveRecord
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
        return 'city';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('uf, nome, estado', 'required'),
            array('uf, estado', 'length', 'max'=>2),
            array('nome', 'length', 'max'=>50),
            array('nome','unique','className' => 'City'),

            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, state_abbrev, name', 'safe', 'on'=>'search'),
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
            'estado' => array(self::BELONGS_TO, 'State', 'estado'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(

            'id' => Yii::t('City', 'city.id'),
            'estado' => Yii::t('City', 'city.estado'),
            'uf' => Yii::t('City', 'city.uf'),
            'nome' => Yii::t('City', 'city.nome'),
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
        $criteria->compare('estado',$this->estado,true);
        $criteria->compare('uf',$this->uf,true);
        $criteria->compare('nome',$this->nome,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
}