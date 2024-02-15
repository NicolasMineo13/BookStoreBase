<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
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
    protected $table = 'items';

    /**
     * The primary key associated with the table.
     *
     * @var int
     */
    protected $primaryKey = 'code';

    /**
     * Indicates if the model's ID is (or not) auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

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
    protected $fillable = ['quantity', 'total', 'description', 'book_id', 'cart_id', 'command_id', 'user_id'];

    /**
     * Get the book included in this item. 
     * For this application, each item can make reference only to one book.
     */
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }

    /**
     * Get the Command containing this item. 
     * For this application, each item can have only one command.
     */
    public function command(): BelongsTo
    {
        return $this->belongsTo(Command::class);
    }
}
