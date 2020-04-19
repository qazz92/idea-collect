<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class MemoSubject
 *
 * @property int $id
 * @property string $subject
 * @property int $user_id
 * @property string $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @package App\Models
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Memo[] $memo
 * @property-read int|null $memo_count
 * @property-read \App\Models\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemoSubject newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemoSubject newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\MemoSubject onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemoSubject query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemoSubject whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemoSubject whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemoSubject whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemoSubject whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemoSubject whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemoSubject whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\MemoSubject withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\MemoSubject withoutTrashed()
 * @mixin \Eloquent
 */
class MemoSubject extends Model
{
	use SoftDeletes;
	protected $table = 'memo_subject';

	protected $casts = [
		'user_id' => 'int'
	];

	protected $fillable = [
		'subject',
		'user_id'
	];

	public function user() {
	    return $this->belongsTo(User::class,'user_id','id');
    }

    public function memo() {
	    return $this->hasMany(Memo::class,'subject_id','id');
    }
}
