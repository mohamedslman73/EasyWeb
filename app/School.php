<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable=['name_ar',
        'name_en',
        'active',
        'student_num',
        'verified',
        'show',
        'logo',
        'phone',
        'email','website','facebook','linkedin','instagram','youtube','google+','admission_url', 'twitter',
        'admission_date',
        'address_ar','address_en',
        'about_ar','about_en',
        'longitude','latitude',
        'slug_ar','slug_en',
        'district_id'];

    public function getLogoAttribute($url)
    {
        return ($url != "")?loadAsset('uploads/'.$url):null;
    }

    public function district(){
        return $this->belongsTo(District::class);
    }

    public function users(){
        return $this->hasMany(User::class);
    }

    public function fees()
    {
        return $this->hasMany(Fee::class,'school_id');
    }

   /* public function reviews(){
        return $this->hasMany(Review::class);
    }*/

    public function school_gallery_images(){
        return $this->hasMany(SchoolGalleryImage::class);
    }
    public function favorites(){
        $this->hasMany(Favorite::class,'school_id');
    }
    public function facility_value_schools(){
        return $this->hasMany(FacilityValueSchool::class,'school_id');
    }
    public function facilities()
    {
        return $this->belongsToMany(FacilityValue::class, 'facility_value_schools', 'school_id', 'facility_value_id');
    }
    public function facilities_types()
    {
        return $this->hasManyThrough(
            'App\FacilityType', 'App\FacilityValueSchool',
            'school_id', 'facility_value_id', 'id'
        );
    }


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function rates()
    {
        return $this->hasMany(SchoolRate::class);
    }

    public function Rate()
    {
        $rating = 0;
        if($this->rates()->count() > 0){
            $rates = $this->rates()->get();
            foreach ($rates as $rate) {
                $rating += $rate->rate;
            }
            $rating = $rating / $this->rates()->count();
            $rating = round($rating, 1);
        }
        return $rating;
    }
}
