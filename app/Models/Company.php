<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name', 'email', 'logo', 'website',
    ];

    public function employees ()
    {
        return $this->hasMany('App\Models\Employee');
    }


    protected $appends = ['full_logo'];

    /**
     * Get the Company's logo.
     *
     * @return string
     */

    public function getFullLogoAttribute()
    {
        $path = env('APP_FILE_URL');
        $filePath = $path.$this->logo;
        return $filePath;
    }
}
