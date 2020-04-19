<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Memo
 *
 * @property int $id
 * @property string $contents
 * @property int $user_id
 * @property int $subject_id
 * @property int $is_feedback
 * @property int $like_count
 * @property string $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @package App\Models
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MemoFeedback[] $memoFeedback
 * @property-read int|null $memo_feedback_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MemoLike[] $memoLike
 * @property-read int|null $memo_like_count
 * @property-read \App\Models\MemoSubject $memoSubject
 * @property-read \App\Models\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Memo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Memo newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Memo onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Memo query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Memo whereContents($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Memo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Memo whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Memo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Memo whereIsFeedback($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Memo whereLikeCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Memo whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Memo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Memo whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Memo withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Memo withoutTrashed()
 * @mixin \Eloquent
 */
class Memo extends Model
{
	use SoftDeletes;
	protected $table = 'memo';

	protected $casts = [
		'user_id' => 'int',
		'subject_id' => 'int',
		'is_feedback' => 'int',
		'like_count' => 'int'
	];

	protected $fillable = [
		'contents',
		'user_id',
		'subject_id',
		'is_feedback',
		'like_count'
	];

	public function user() {
	    return $this->belongsTo(User::class,'user_id','id');
    }

    public function memoSubject() {
	    return $this->belongsTo(MemoSubject::class,'subject_id','id');
    }

	public function memoFeedback() {
	    return $this->hasMany(MemoFeedback::class,'memo_id','id');
    }

    public function memoLike() {
	    return $this->hasMany(MemoLike::class,'memo_id','id');
    }
}
