<?php
namespace common\models;

use Yii;
use common\models\User;
use yii\base\Model;
use yii\base\NotSupportedException;

/**
 * Login form
 */
class LoginForm extends Model
{
    /**
     * @var string
     */
    public $username = '';
    /**
     * @var string
     */
    public $password = '';
    /**
     * @var bool
     */
    public $rememberMe = true;
    /**
     * @var User
     */
    private $_user;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * @inheritdoc
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'username' => Yii::t('common', 'Username'),
            'password' => Yii::t('common', 'Password Hash'),
            'signIn' => Yii::t('backend', 'SignIn'),
            'rememberMe' => Yii::t('backend', 'RememberMe'),
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     * @throws NotSupportedException
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
        if (!empty($params)) {
            throw new NotSupportedException("Not support params: {$params}.");
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }
        
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}
