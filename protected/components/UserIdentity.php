<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {

    const ERROR_INACTIVE_USER=9;
    const ERROR_INACTIVE_COMPANY=10;
    const ERROR_INACTIVE_DEALER=11;
    const ERROR_INACTIVE_SHOP=12;
    const ERROR_INACTIVE_GROUP=13;
    
    private $_id;

    public function authenticate($id=null) {

        $user = null;
		
        if ($id) {
            $user = User::model()->findByPk($id);
        } else {
            $user = User::findByEmail($this->username);
        }  
        
        if (!$user) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
            
        } else if ($id) {
        	$this->prepareUser($user);
        	
        } else if (md5($this->password) != $user->senha) {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
            
        } else if ($user->status == "i") {
            $this->errorCode = self::ERROR_INACTIVE_USER;
            
        } /*else if ($user->company_id && !$user->company->active) {      
             $this->errorCode = self::ERROR_INACTIVE_COMPANY + $user->company->company_type_id;
             
        } else if ($user->company_id && $user->company->company_id && !$user->company->company->active) {     
             $this->errorCode = self::ERROR_INACTIVE_GROUP;
             
        }*/ else {
            $this->prepareUser($user);
        }

        return !$this->errorCode;
    }

    public function getId() {
        return $this->_id;
    }
    
    protected function prepareUser($user) {
    	$this->setState('nome', $user->nome);
        $this->setState('id_empresa', $user->id_empresa);
        $this->setState('nivel', $user->nivel);
        $this->setState('login', $user->login);
        $this->setState('remember_me', $user->remember_me);
        $user->last_login = new CDbExpression('NOW()');

        $this->_id = $user->id;
        $this->errorCode = self::ERROR_NONE;
    }
}
