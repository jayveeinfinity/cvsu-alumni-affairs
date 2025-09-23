<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;

trait UpdatesProfileTimestamp
{
    protected static function bootUpdatesProfileTimestamp()
    {
        static::created(fn ($model) => $model->updateUserProfileTimestamp());
        static::updated(fn ($model) => $model->updateUserProfileTimestamp());
        static::deleted(fn ($model) => $model->updateUserProfileTimestamp());
    }

    protected function updateUserProfileTimestamp()
    {
        if (isset($this->user_id)) {
            DB::table('user_profiles')->where('user_id', $this->user_id)
                ->update(['last_profile_update' => now()]);
        }
    }
}
