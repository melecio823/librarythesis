<?php
namespace app\models;
use Yii;
/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $authkey
 * @property int $role
 * @property int $status
 * @property int $department
 *
 * @property Evaluation[] $evaluations
 * @property Evaluation[] $evaluations0
 * @property Head $head
 * @property Student $student
 * @property Teacher $teacher
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    const STATUS_ACTIVE = 10;
    const STATUS_INACTIVE = 0;
    const ROLE_STUDENT = 15;
    // const ROLE_TEACHER = 20;
    // const ROLE_HEAD = 30;
    // const ROLE_SA = 50;
    // const ROLE_GUIDANCE = 60;
    // const ROLE_CASHIER = 70;
    // const ROLE_REGISTRAR = 80;
    const ROLE_ADMIN = 100;
    /**
     * {@inheritdoc}
     */
    public $globalSearch;
    public static function tableName()
    {
        return 'user';
    }
    public static function getRole() {
        return $role = [
            15 => 'Student',
            20 => 'Teacher',
            // 30 => 'Head',
            // 50 => 'Student Affairs',
            // 60 => 'Guidance Counselor',
            // 70 => 'Cashier',
            // 80 => 'Registrar',
            100 => 'System Administrator',
        ];
    }
    public function getRoleName() {
        return static::getRole()[$this->role];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['password', 'username','last_name', 'username',], 'required'],
            [['status', 'role'], 'integer'],
            [['first_name', 'globalSearch','last_name', 'username', 'email', 'password'], 'string', 'max' => 255],
            [['authkey'], 'string', 'max' => 225],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'status' => 'Status',
            'role' => 'Role',
            'authkey' => 'Authkey',
        ];
    }
    public function getId()
    {
        return $this->id;
    }
    public function getRoles()
    {
        return $this->role;
    }
    // public function getHolder(){
    //     if(Teacher::find()->where(['user_id'=>'id'])->one()) {
    //         $gago = Teacher::find()->where(['user_id'=>'id'])->one();
    //         return $gago;
    //     }else if (Teacher::find()->where(['user_id'=>'id'])->one()) {
    //         $gago = Teacher::find()->where(['user_id'=>'id'])->one();
    //         return $gago;
    //      }else if (Yii::$app->user->identity->role==User::ROLE_STUDENT) {
    //         return Yii::$app->user->identity->student->fullName;
    //      }else if (Yii::$app->user->identity->role==User::ROLE_TEACHER) {
    //         return Yii::$app->user->identity->teacher->fullName;
    //      }else{
    //         $gago = Teacher::find()->where(['user_id'=>'id'])->one();
    //         return $gago;
    //      }
    // }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getName(){
        return $this->last_name.",".$this->first_name;    
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
        if(is_null($this->password))
        return false;
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
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }
}