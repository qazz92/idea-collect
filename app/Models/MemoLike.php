<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MemoLike
 *
 * @property int $id
 * @property int $memo_id
 * @property int $user_id
 * @property int $type
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemoLike newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemoLike newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemoLike query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemoLike whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemoLike whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemoLike whereMemoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemoLike whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemoLike whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MemoLike whereUserId($value)
 * @mixin \Eloquent
 */
class MemoLike extends Model
{
	protected $table = 'memo_like';

	protected $casts = [
		'memo_id' => 'int',
		'user_id' => 'int',
		'type' => 'int'
	];

	protected $fillable = [
		'memo_id',
		'user_id',
		'type'
	];
}
