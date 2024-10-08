<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;

class User extends Authenticatable implements MustVerifyEmail, FilamentUser
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'phone_number',
        'address'

    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            // 'password' => 'hashed',
        ];
    }
    public function canAccessPanel(Panel $panel): bool
    {
        return str_ends_with($this->email, 'admin@gmail.com');
    }
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = $password;
    }

    public function Procuts()
    {
        return $this->belongsToMany(Product::class)->withTimestamps();
    }

    public function records()
    {
        return $this->hasMany(Income::class);
    }


    public function TotalExpense()
    {

        return $this->records->sum('money');
    }

    public function ItemsInCart()
    {

        return ProductUser::where('user_id', $this->id)->get();
    }
}
