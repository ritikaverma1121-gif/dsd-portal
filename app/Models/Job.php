<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'location',
        'job_type',
        'status',
        'deadline',
        'openings',
    ];

    public function recruiter()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function applications()
{
    return $this->hasMany(Application::class);
}


}
