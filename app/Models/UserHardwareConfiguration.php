<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;


class UserHardwareConfiguration extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $primaryKey = 'id';
    public function user()
    {
        return  $this->belongsTo(User::class);
    }
    public function hardwareParts()
    {
        return $this->belongsToMany(HardwarePart::class);
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
