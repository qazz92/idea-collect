<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

/**
 * Class User
 *
 * @property int $id
 * @property int $master
 * @property string $nickname
 * @property string $email
 * @property string $pw
 * @property string $remember_token
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @package App\Models
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Memo[] $memo
 * @property-read int|null $memo_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MemoFeedback[] $memoFeedback
 * @property-read int|null $memo_feedback_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MemoSubject[] $memoSubject
 * @property-read int|null $memo_subject_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereMaster($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePw($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use HasApiTokens,Notifiable;

	protected $table = 'users';

	protected $casts = [
		'master' => 'int'
	];

	protected $hidden = [
		'remember_token'
	];

	protected $fillable = [
		'master',
		'nickname',
		'email',
		'pw',
		'remember_token'
	];

	public function getAuthPassword()
    {
        return $this->pw;
    }

    public function memoSubject() {
	    return $this->hasMany(MemoSubject::class,'user_id','id');
    }

    public function memo() {
	    return $this->hasMany(Memo::class,'user_id','id');
    }

    public function memoFeedback() {
	    return $this->hasMany(MemoFeedback::class,'user_id','id');
    }
}
