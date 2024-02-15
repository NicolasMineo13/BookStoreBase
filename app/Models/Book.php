<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
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
    protected $table = 'books';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'ISBN';

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
    protected $fillable = ['ISBN', 'title', 'year', 'edition', 'editorial', 'description', 
                           'dimensions', 'unitPrice', 'author_id'];

     /**
     * Get the author who wrote this book. 
     * For this application, each book can have only one author.
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

}
