<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyFeatures extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'company_features';
    protected $guarded = ['id'];
    protected $fillable = ['id', 'user_id', 'feature_program_name','feature_tag_line', 'feature_bios', 'feature_testimony', 'feature_testimony_name', 'feature_testimony_designation', 'feature_highlight1', 'feature_highlight2', 'feature_highlight3', 'page_main_picture', 'page_side_picture',
        'home_page_main_picture', 'created_at', 'updated_at', 'status'];

}
