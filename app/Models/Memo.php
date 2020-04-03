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
 * @property int $like_count
 * @property string $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @package App\Models
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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Memo whereLikeCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Memo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Memo whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Memo withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Memo withoutTrashed()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MemoFeedback[] $memoFeedback
 * @property-read int|null $memo_feedback_count
 */
class Memo extends Model
{
    use SoftDeletes;
    protected $table = 'memo';

    protected $casts = [
        'user_id' => 'int',
        'like_count' => 'int'
    ];

    protected $fillable = [
        'contents',
        'user_id',
        'like_count'
    ];

    public function memoFeedback()
    {
        return $this->hasMany(MemoFeedback::class, 'memo_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
