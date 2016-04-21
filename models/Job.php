<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "job".
 *
 * @property integer $id
 * @property integer $category_id
 * @property integer $user_id
 * @property string $title
 * @property string $description
 * @property string $type
 * @property string $requirements
 * @property string $salary_range
 * @property string $city
 * @property string $state
 * @property string $zipcode
 * @property string $email
 * @property string $phone
 * @property integer $is_publish
 * @property string $created_date
 */
class Job extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'job';
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

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'title', 'description', 'type', 'requirements', 'salary_range', 'city', 'state', 'zipcode', 'email', 'phone', 'is_publish'], 'required'],
            [['category_id', 'is_publish'], 'integer'],
            [['created_date'], 'safe'],
            [['title', 'description', 'type', 'requirements', 'salary_range', 'city', 'state', 'zipcode', 'email', 'phone'], 'string', 'max' => 225],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'user_id' => 'User ID',
            'title' => 'Title',
            'description' => 'Description',
            'type' => 'Type',
            'requirements' => 'Requirements',
            'salary_range' => 'Salary Range',
            'city' => 'City',
            'state' => 'State',
            'zipcode' => 'Zipcode',
            'email' => 'Email',
            'phone' => 'Phone',
            'is_publish' => 'Is Publish',
            'created_date' => 'Created Date',
        ];
    }

    //get relation from category
    public function getCategory( ){
        return $this->hasOne( Category::Classname(), [ 'id' => 'category_id'] );
    }

    //get relation from user
    public function getUser( ){
        return $this->hasOne( User::Classname(), [ 'id' => 'user_id'] );
    }

    //setup before save
    public function beforeSave($insert){
        $this->user_id = Yii::$app->user->identity->id;
        return parent::beforeSave($insert);
    }

}
