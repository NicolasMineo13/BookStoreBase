<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use HasFactory; // To habilitate the use of a factory to fill the database. 
    use HasUuids;   // To activate the generation of automatic UUIDs.
    use SoftDeletes;    // To activate the soft deleting feature.

    /**
     * The database connection that should be used by the model.
     *
     * @var string
     */
    protected $connection = 'BookStore';

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'carts';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'code';

    /**
     * Indicates if the model's ID is (or not) auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

     /**
     * The data type of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

     /**
     * Indicates the names of the fields used for the timestamps.
     *
     * @var bool
     */
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    //protected $dateFormat = 'U';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['date', 'total', 'user_id'];

    /**
     * Get the User who passed this command. 
     * For this application, each command can have only one user.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the items associated to the current shopping cart.
     * 
     */
    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

     /**
     * Get the command corresponding to this shopping Cart. 
     * For this application, each shopping cart can correspond 
     * to only one command.
     */
    public function command(): BelongsTo
    {
        return $this->belongsTo(Command::class);
    }
}