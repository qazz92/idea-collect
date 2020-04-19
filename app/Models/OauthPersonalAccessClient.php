<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OauthPersonalAccessClient
 *
 * @property int $id
 * @property int $client_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OauthPersonalAccessClient newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OauthPersonalAccessClient newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OauthPersonalAccessClient query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OauthPersonalAccessClient whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OauthPersonalAccessClient whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OauthPersonalAccessClient whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OauthPersonalAccessClient whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OauthPersonalAccessClient extends Model
{
	protected $table = 'oauth_personal_access_clients';

	protected $casts = [
		'client_id' => 'int'
	];

	protected $fillable = [
		'client_id'
	];
}
