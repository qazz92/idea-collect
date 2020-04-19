<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MemoFeedbackLike
 *
 * @property int $id
 * @property int $memo_id
 * @property int $user_id
 * @property int $type
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @package App\Models
 * @property int $memo_feedback_id
 * @property-read \App\Models\MemoFeedback $memo
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemoFeedbackLike newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemoFeedbackLike newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemoFeedbackLike query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemoFeedbackLike whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemoFeedbackLike whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemoFeedbackLike whereMemoFeedbackId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemoFeedbackLike whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemoFeedbackLike whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemoFeedbackLike whereUserId($value)
 * @mixin \Eloquent
 */
class MemoFeedbackLike extends Model
{
	protected $table = 'memo_feedback_like';

	protected $casts = [
		'memo_feedback_id' => 'int',
		'user_id' => 'int',
		'type' => 'int'
	];

	protected $fillable = [
		'memo_id',
		'user_id',
		'type'
	];

    public function memo() {
        return $this->belongsTo(MemoFeedback::class,'memo_feedback_id','id');
    }
}
