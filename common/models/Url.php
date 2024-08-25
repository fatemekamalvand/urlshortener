<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "url".
 *
 * @property int $id
 * @property string $original_url
 * @property string $shortened_url
 * @property string $created_at
 * @property string $user_id
 * @property string $click_count
 */
class Url extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'url';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['click_count', 'user_id'], 'integer'],

            [['original_url'], 'required'],
            [['created_at'], 'safe'],
            [['original_url', 'shortened_url'], 'string', 'max' => 255],
            [['shortened_url'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'شناسه',
            'original_url' => 'لینک اصلی',
            'shortened_url' => 'لینک کوتاه شده',
            'created_at' => 'زمان ایجاد',
            'click_count' => 'تعداد کلیک ها',
            'user_id' => 'نام کاربری',
        ];
    }

    public function generateShortCode()
    {
        // Extract a part of the original URL to use in the short code
        $urlHash = substr(md5($this->original_url), 0, 6); // First 6 characters of md5 hash of the URL

        // Ensure the short code is unique
        while (self::find()->where(['shortened_url' => $urlHash])->exists()) {
            $urlHash = substr(md5($this->original_url . uniqid(rand(), true)), 0, 6);
        }

        return $urlHash;
    }
}
