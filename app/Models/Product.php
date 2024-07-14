<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function addingExpense($price)
    {
        $total_cost = (int) $this->quantity * $price;
        Expense::create([
            'money' => $total_cost,
            'supplier_id' => $this->supplier_id,
            'product_id' => $this->id

        ]);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function buyProduct()
    {
        $user = Auth::user();
        $tax = Tax::currentTax();


        $totalCost = ($this->price - $this->promotion);
        $taxAndTotalCost = ($totalCost * $tax->tax_percent) /  100;


        $this->users()->detach($user->id);
        Income::create([
            'money' => $taxAndTotalCost,
            'user_id' => $user->id,
            'product_id' => $this->id,
            'supplier_id' => $this->supplier_id
        ]);
    }
    public function records()
    {
        return $this->hasMany(Income::class);
    }


    public function TopSellerYearly()
    {
        return $this->records->count();
    }

    public function scopeWithTopSellerYearly(Builder $query)
    {
        $query->withCount(['records' => function ($query) {
            $query->whereYear('created_at', now()->year);
        }]);
    }

    public function getTopSellerYearlyAttribute()
    {
        return $this->records()->whereYear('created_at', now()->year)->count();
    }
}
