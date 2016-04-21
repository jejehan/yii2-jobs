<?php
namespace app\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\base\Security;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

class User extends ActiveRecord implements IdentityInterface
{
    public $passsword_repeat;

    public static function tableName()
    {
        return 'user';
    }

    public function behaviors(){
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_date',
                'updatedAtAttribute' => 'created_date',
                'value' => new Expression('NOW()'),
            ]
        ];
    }

    public function rules(){
        return [
            [[ 'full_name', 'username', 'email', 'password' ], 'required'], // harus diisi
            ['email','email'], //email harus valid
            [['full_name', 'email', 'password'], 'string', 'max' => 255 ],  // maksumum char 255
            [['username'], 'string', 'max' => 30 ], // maksumum char 30
            ['passsword_repeat', 'compare', 'compareAttribute' => 'password'], //password dan passsword_repeat harus sama
        ];
    }

    /**
     * Finds an identity by the given ID.
     *
     * @param string|integer $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @param string $password
     * @return boolean if auth key is valid for current user
     */
    public function validatePassword($password){
        return $this->password === md5($password);
    }

    /**
     * @param string $username
     * @return IdentityInterface|null the identity object that matches the given token
     */
    public static function findByUsername($username){
        return User::findOne(['username' => $username]);
    }

    /**
     * @param string $authKey
     * @return boolean if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    //settup beforeSave
    public function beforeSave( $insert ){

        if( parent::beforeSave($insert) ){
            if ( $this->isNewRecord ) {
                $this->auth_key = \Yii::$app->security->generateRandomString();
            }

            if ( isset( $this->password ) ) {
                $this->password = md5($this->password);
                return parent::beforeSave($insert);
            }
        }
        return true;
    }

    //get relation from job
    public function getUser( ){
        return $this->hasMany( Job::Classname(), [ 'user_id' => 'id'] );
    }

}
