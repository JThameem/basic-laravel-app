<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoginHistory extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'login_histories';
    protected $fillable = [
        'username', 'password', 'ip'
    ];

    public static function insertRecord($insertData)
    {
        $loginHistory = new LoginHistory;
        return LoginHistory::saveRecord($loginHistory, $insertData);
    }

    public static function updateRecord($updateData, $id)
    {
        $loginHistory = LoginHistory::find($id);
        return LoginHistory::saveRecord($loginHistory, $updateData);
    }

    private static function saveRecord($loginHistory, $data)
    {
        $loginHistory->username = @$data['username'] ?? NULL;
        $loginHistory->password = @$data['password'] ?? NULL;
        $loginHistory->ip = @$data['ip'] ?? NULL;
        $loginHistory->save();

        return $loginHistory;
    }
}
