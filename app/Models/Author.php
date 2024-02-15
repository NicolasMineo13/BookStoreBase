<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model
{
    use HasFactory; // To habilitate the use of a factory to fill the database. 
    //use HasUuids;   // To activate the generation of automatic UUIDs.
    // ATTENTION : This trait can generate very serious problems with the dependency injection mechanismes in the 
    // controllers.
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
    protected $table = 'authors';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

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
     * They need to be provided to use factories and object authomatic generation.
     *
     * @var array
     */
    protected $fillable = ['id', 'name', 'lastName', 'birth', 'biography'];

    /**
     * Get the books associated to the current author.
     * 
     */
    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}