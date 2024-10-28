<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralInfo extends Model
{
    use HasFactory;

    protected $fillable = ["profile_pic_path", 'email', "phone_no", "whatsapp_no", "location", "facebook", "twitter", "instagram", "github", "linkedin"];
}
