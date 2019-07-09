<?php
namespace api\modules\v1\models;

use \yii\db\ActiveRecord;
/**
 * Userappone Model
 *
 */
class Appone extends ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'appone';
	}

    /**
     * @inheritdoc
     */
    public static function primaryKey()
    {
        return ['appone_id'];
    }

    /**
     * Define rules for validation
     */
    public function rules()
    {
        return [
            [['username', 'email', 'password', 'phone'], 'required']
        ];
    }
}
