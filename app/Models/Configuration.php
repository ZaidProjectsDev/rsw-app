<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Configuration extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $primaryKey = 'id';

    public function user()
    {
        return  $this->belongsTo(User::class);
    }
    public function parts()
    {
        return $this->belongsToMany(Part::class, 'configuration_part');
    }
    public function submissions()
    {
        return $this->belongsToMany(Submission::class);
    }
    public function getExperienceTierAttribute()
    {
        $experienceTiers = $this->hardwareParts()->pluck('experience_tier');
        $mostCommonTier = $experienceTiers->countBy()->sortDesc()->keys()->first();

        return $mostCommonTier;
    }

}
