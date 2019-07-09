<?php
namespace api\modules\v1\models;

use \yii\db\ActiveRecord;
/**
 * Userappone Model
 *
 */
class Apptwo extends ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'apptwo';
	}

    /**
     * @inheritdoc
     */
    public static function primaryKey()
    {
        return ['apptwo_id'];
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
