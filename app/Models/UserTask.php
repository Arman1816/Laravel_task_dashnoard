<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTask extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users_task';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'task_id',
        'status'
    ];


    /**
     * @param $userId
     * @param $taskId
     * @return mixed
     */
    public static function checkTaskStatus($userId, $taskId)
    {
        return self::where('user_id', $userId)->where('task_id', $taskId)
            ->where(function ($query) {
                $query->where('status', '=', Status::INPROGRESS)
                    ->orWhere('status', '=', Status::DONE);
            })->first();
    }

    /**
     * @param $userId
     * @param $taskId
     * @return mixed
     */
    public static function createTask($userId, $taskId)
    {
        return self::create([
            'user_id' => $userId,
            'task_id' => $taskId,
            'status' => Status::INPROGRESS
        ]);
    }

    /**
     * @param $userId
     * @return mixed
     */
    public static function checkInProgressUserTask($userId)
    {
        return self::where('user_id', $userId)->where('status', '=', Status::INPROGRESS)->first();
    }

    /**
     * @param $taskId
     * @param $userId
     * @param $status
     * @return mixed
     */
    public static function updateUserTaskStatus($taskId, $userId, $status)
    {
       return self::where('task_id', '=', $taskId)->where('user_id', $userId)->update(['status' => $status]);
    }
}
