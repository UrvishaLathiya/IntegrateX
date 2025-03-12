<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'project_name',
        'frontend',
        'backend',
        'database',
        'live_demo',
        'description', // ✅ Add this field
    ];
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }
}
