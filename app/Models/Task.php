<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tasks';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'required_images',
        'status'
    ];


    /**
     * Get the images for the task.
     */
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    /**
     * @param $taskId
     * @param $status
     */
    public static function updateTaskStatus($taskId, $status)
    {
        self::where('id', '=', $taskId)->update(['status' => $status]);
    }

}
