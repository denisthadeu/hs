<?php
 
class User extends CActiveRecord
{
    private $_identity;
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
        return 'user';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('nome, login, senha, status, nivel', 'required'),
            array('remember_me', 'boolean'),
            array('password', 'authenticate'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('nome, login, senha, status, nivel, id_empresa, remember_me, deactivated_by_id, deactivated_at, last_login', 'safe', 'on'=>'search'),
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

            'id' => Yii::t('User', 'user.id'),
            'nome' => Yii::t('User', 'user.nome'),
            'login' => Yii::t('User', 'user.login'),
            'senha' => Yii::t('User', 'user.senha'),
            'status' => Yii::t('User', 'user.status'),
            'nivel' => Yii::t('User', 'user.nivel'),
            'id_empresa' => Yii::t('User', 'user.id_empresa'),
            'remember_me' => Yii::t('User', 'user.remember_me'),
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
        $criteria->compare('login',$this->login,true);
        $criteria->compare('senha',$this->senha,true);
        $criteria->compare('status',$this->status,true);
        $criteria->compare('nivel',$this->id_nivel,true);
        $criteria->compare('id_empresa',$this->id_empresa,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
    
    /**
    * Authenticates the password.
    * This is the 'authenticate' validator as declared in rules().
    */
    public function authenticate($attribute,$params)
    {
        if(!$this->hasErrors())
        {
            $this->_identity=new UserIdentity($this->nome,$this->senha);
            if(!$this->_identity->authenticate())
                $this->addError('password','Usuário e senha incorretos.');
        }
    }
    
    /**
    * Logs in the user using the given name and password in the model.
    * @return boolean whether login is successful
    */
    public function login()
    {
        if($this->_identity===null)
        {
            $this->_identity=new UserIdentity($this->nome,$this->senha);
            $this->_identity->authenticate();
        }
        if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
        {
            $duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
            Yii::app()->user->login($this->_identity,$duration);
            return true;
        }
        else
            return false;
    }
    
    public function preparePasswordChange($newPassword) {
    	$this->password = self::passwordHash($newPassword);
    	$this->password_change_token = null;
        $this->password_token_expiration = null;
        $this->login_failures_account = 0;
        $this->last_password_change = new CDbExpression('NOW()');
    }
    
    public function matchToken($token) {
    	$hasher = new PasswordHash(8, false);
    	return $hasher->CheckPassword($token, $this->password_change_token);
    }
    
    public function matchPassword($pass) {
    	//$hasher = new PasswordHash(8, false);
        $hasher = md5($pass);
    	return $hasher->CheckPassword($pass, $this->password);
    }
    
    public static function passwordHash($text) {
    
    	$hasher = new PasswordHash(8, false);
        $hash   = $hasher->HashPassword($text);
        if (strlen($hash) >= 20) { 
                return $hash;
        }

        return null;	
    
    }
    
    public static function findByEmail($userEmail) {
    	$user = User::model()->find(array('condition' => 'login = :userEmail AND status = "a"', 'params' => array(':userEmail' => $userEmail)));
        if (!isset($user)) {
            $user = User::model()->find(array('condition' => 'login = :userEmail', 'params' => array(':userEmail' => $userEmail)));
        }
        return $user;
    }
    
    public function activate() {
        $this->status = "a";
        $this->deactivated_by_id = NULL;
        $this->deactivated_at = NULL;
    }
    
    public function deactivate() {
        $this->status = "i";
        $this->deactivated_by_id = Yii::app()->user->id;
        $this->deactivated_at = new CDbExpression('NOW()');
    }
    
    public function lastLoginDate() {
        return Yii::app()->dateFormatter->formatDateTime($this->last_login,'long',null);
    }
    
    public function lastLoginTime() {
        return Yii::app()->dateFormatter->formatDateTime($this->last_login,null,'medium');
    }
}