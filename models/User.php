<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property int $role
 * @property string $authkey
 * @property int $status
 * @property string $email
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    const STATUS_ACTIVE = 10;
    const STATUS_INACTIVE = 0;
    const ROLE_ADMIN = 100;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username'],'unique'],
            [['username', 'password', 'role', 'status'], 'required'],
            [['role', 'status'], 'integer'],
            [['username', 'password', 'authkey'], 'string', 'max' => 255],
            [['email'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'role' => 'Role',
            'authkey' => 'Authkey',
            'status' => 'Status',
            'email' => 'Email',
        ];
    }
   

    /**
     * {@inheritdoc}
     */
    public static function getRoles() {
        return $roles = [
            100 => 'System Administrator',
        ];
    }
    public function getRoleName() {
        return static::getRoles()[$this->role];
    }

     public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }


    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }
    public function getRole()
    {
        return $this->role;
    }
    public static function findIdentity($id)
    {
        return static::findOne(['id'=>$id]);
    }
    public static function findRole($role)
    {
        return static::findOne(['role'=>$role]);
    }
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }
    public function validateUsername($username)
    {
        return Yii::$app->security->validateUsername($username, $this->username);
    }
    public function setPassword($password)
    {
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }
    public function getAuthKey()
    {
        return $this->authkey;
    }
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
    public function generateAuthKey()
    {
        $this->authkey = Yii::$app->security->generateRandomString();
    }
}