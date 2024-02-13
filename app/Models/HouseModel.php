<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HouseModel extends Model

{
    protected $policies = ['App\Models\HouseModel' => 'App\Policies\HousePolicy',];
    protected $fillable = ['user_id', 'ville', 'type_maison', 'quartier', 'loyer','options', 'image'];

    protected $casts = [
        'options' => 'array',
    ];

    public function images()
    {
        return $this->hasMany(HouseImage::class, 'house_id');
    }

    public function addImage($image)
    {
        $imagePath = $image->store('maison_images', 'public');
        $this->image_path = $imagePath;
        $this->save();
    }

    public function scopeFilter($query, $filters)
    {
        if (isset($filters['ville'])) {
            $query->where('ville', $filters['ville']);
        }

        if (isset($filters['type_maison'])) {
            $query->where('type_maison', $filters['type_maison']);
        }

        if (isset($filters['quartier'])) {
            $query->where('quartier', $filters['quartier']);
        }

        if (isset($filters['loyer'])) {
            $loyerRange = explode('-', $filters['loyer']);
            $query->whereBetween('prix', $loyerRange);
        }

        return $query;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
