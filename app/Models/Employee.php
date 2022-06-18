<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Designation;
class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'contact', 'employee_number', 'designation_id'];

    public function getDesignation(){
        return $this->belongsTo(Designation::class,'designation_id','id');
    }

    public function departments(){
        return $this->belongsToMany(Department::class,'employee_departments','employee_id','department_id');
    }
}
