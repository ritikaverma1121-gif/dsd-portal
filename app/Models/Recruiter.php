<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruiter extends Model
{
    use HasFactory;

    // ✅ Specify the table name
    protected $table = 'recruiters';

    // ✅ Define which fields can be mass-assigned
    protected $fillable = [
        'user_id',
        'company_name',
        'designation',
    ];

    // ✅ Relationship with users table
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}

