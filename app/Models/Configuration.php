<?php

namespace App\Models;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\PartController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Configuration extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $fillable = ['name'];
    public function user()
    {
        return  $this->belongsTo(User::class);
    }
    public function parts()
    {
        return $this->belongsToMany(Part::class, 'configuration_part', 'configuration_id', 'part_id');
    }
    public function submissions()
    {
        return $this->belongsToMany(Submission::class);
    }
    public function cpu()
    {
       return ConfigurationController::class->getCpuPart($this);
    }

    public function getGPU()
    {
        return $this->parts->where('type_id', 2)->first();
    }

    public function getiGPU()
    {
        return $this->parts->where('type_id', 3)->first();
    }

    public function getRAM()
    {
        return $this->parts->where('type_id', 4)->first();
    }

    public function getStorage()
    {
        return $this->parts->where('type_id', 5)->first();
    }

    public function getPCIExpressCard()
    {
        return $this->parts->where('type_id', 6)->first();
    }
    public function getExperienceTierAttribute()
    {
        $experienceTiers = $this->hardwareParts()->pluck('experience_tier');
        $mostCommonTier = $experienceTiers->countBy()->sortDesc()->keys()->first();

        return $mostCommonTier;
    }

}
