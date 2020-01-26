<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public static function boot()
    {
        parent::boot();

        static::updating(function($document){
            $document->adjust();
        });
    }

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withTimestamps()
            ->withPivot(['before', 'after'])
            ->latest('pivot_updated_at');
    }

    public function adjust($userId = null, $diff = null)
    {
        $userId = $userId ?: Auth::id();
        $diff = $diff ?: $this->getDiff();

        return $this->users()->attach($userId, $diff);
    }

    public function getDiff()
    {
        $changed = $this->getDirty();

        $before = json_encode(array_intersect_key($this->fresh()->toArray(), $changed));
        $after = json_encode($changed);
        return compact('before', 'after');
    }
}
