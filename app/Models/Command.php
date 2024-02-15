<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Command extends Model
{
    use HasFactory; // To habilitate the use of a factory to fill the database. 
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
    protected $table = 'commands';

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
    protected $fillable = ['code', 'date', 'total', 'address', 'description', 
                           'user_id', 'invoice_id', 'cart_id'];

    /**
     * Get the User who passed this command. 
     * For this application, each command can have only one user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the invoice corresponding to this command. 
     * For this application, each invoice correspond to only one 
     * command.
     */
    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }

    /**
     * Get the shopping Cart corresponding to this command. 
     * For this application, each shopping cart correspond 
     * to only one command.
     */
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

     /**
     * Get the items associated to the current command.
     * 
     */
    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}
