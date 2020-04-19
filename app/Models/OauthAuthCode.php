<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OauthAuthCode
 *
 * @property string $id
 * @property int $user_id
 * @property int $client_id
 * @property string $scopes
 * @property bool $revoked
 * @property Carbon $expires_at
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OauthAuthCode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OauthAuthCode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OauthAuthCode query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OauthAuthCode whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OauthAuthCode whereExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OauthAuthCode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OauthAuthCode whereRevoked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OauthAuthCode whereScopes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OauthAuthCode whereUserId($value)
 * @mixin \Eloquent
 */
class OauthAuthCode extends Model
{
	protected $table = 'oauth_auth_codes';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'client_id' => 'int',
		'revoked' => 'bool'
	];

	protected $dates = [
		'expires_at'
	];

	protected $fillable = [
		'user_id',
		'client_id',
		'scopes',
		'revoked',
		'expires_at'
	];
}
