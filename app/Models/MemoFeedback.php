<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class MemoFeedback
 *
 * @property int $id
 * @property string $contents
 * @property int $memo_id
 * @property int $user_id
 * @property int $like_count
 * @property string $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @package App\Models
 * @property-read \App\Models\Memo $memo
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MemoFeedbackLike[] $memoFeedbackLike
 * @property-read int|null $memo_feedback_like_count
 * @property-read \App\Models\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemoFeedback newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemoFeedback newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\MemoFeedback onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemoFeedback query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemoFeedback whereContents($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemoFeedback whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemoFeedback whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemoFeedback whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemoFeedback whereLikeCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemoFeedback whereMemoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemoFeedback whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemoFeedback whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\MemoFeedback withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\MemoFeedback withoutTrashed()
 * @mixin \Eloquent
 */
class MemoFeedback extends Model
{
	use SoftDeletes;
	protected $table = 'memo_feedback';

	protected $casts = [
		'memo_id' => 'int',
		'user_id' => 'int',
		'like_count' => 'int'
	];

	protected $fillable = [
		'contents',
		'memo_id',
		'user_id',
		'like_count'
	];

    public function user() {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function memo() {
        return $this->belongsTo(Memo::class,'memo_id','id');
    }

    public function memoFeedbackLike() {
        return $this->hasMany(MemoFeedbackLike::class,'memo_feedback_id','id');
    }
}
