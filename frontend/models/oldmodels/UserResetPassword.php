<?php

namespace backend\models;

use yii\base\Model;
use common\models\User;

class UserResetPassword extends Model
{
    public $userId;
    public $password;
    public $confirmPassword;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userId', 'password', 'confirmPassword'], 'required'],
            [['password', 'confirmPassword'], 'string', 'min' => 6],
            ['confirmPassword', 'compare', 'compareAttribute' => 'password'],
        ];
    }

    /**
     * Resets the password.
     *
     * @return bool whether the password was reset
     */
    public function resetPassword()
    {
        if (!$this->validate()) {
            return false;
        }

        $user = User::findOne($this->userId);
        $user->setPassword($this->password);

        return $user->save(false);
    }
}
