<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;
use Team6\AuthWiki\Auth;

class Post extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];

    public function getUserId()
    {
        $user = Auth::getUserById((int)$this->attributes['user_id']);
        unset($user->password_hash);
        unset($user->status);
        return $user;
    }

    public function getLanguageId()
    {
        $languages = new \App\Models\LanguagesModel();
        return $languages->find($this->attributes['language_id']);
    }
}
