<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Ship
 *
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Ship whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Ship whereName($value)
 */
	class Ship extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property int|null $role_id
 * @property string $name
 * @property string $email
 * @property string|null $avatar
 * @property string $password
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \TCG\Voyager\Models\Role|null $role
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\Member
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $guild_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string $href
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Character[] $characters
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Member whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Member whereGuildId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Member whereHref($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Member whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Member whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Member whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Member whereUpdatedAt($value)
 */
	class Member extends \Eloquent {}
}

namespace App{
/**
 * App\Character
 *
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string $slug
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Member[] $members
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Character whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Character whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Character whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Character whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Character whereUpdatedAt($value)
 */
	class Character extends \Eloquent {}
}

namespace App{
/**
 * App\Guild
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Character[] $characters
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Member[] $members
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Guild whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Guild whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Guild whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Guild whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Guild whereUpdatedAt($value)
 */
	class Guild extends \Eloquent {}
}

