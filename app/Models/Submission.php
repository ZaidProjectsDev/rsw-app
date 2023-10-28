<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $name
 * @property string $hardwareId
 * @property string $description
 * @property int    $gameId
 * @property int    $created_at
 * @property int    $updated_at
 */
class Submission extends Model
{
    use HasFactory;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'submissions';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','user_id', 'game_id', 'configuration_id', 'description', 'visible', 'created_at', 'updated_at'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string','user_id'=>'int', 'game_id' => 'int', 'configuration_id' => 'int', 'description' => 'string', 'visible' => 'boolean', 'created_at' => 'timestamp', 'updated_at' => 'timestamp'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = true;

    public function user()
    {
       return  $this->belongsTo(User::class);
    }
    public function game()
    {
       return  $this->belongsTo(Game::class);
    }
    public function configuration()
    {
        return $this->belongsTo(Configuration::class);
    }

    // Scopes...

    // Functions ...

    // Relations ...
}
