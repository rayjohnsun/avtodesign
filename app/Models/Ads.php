<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
  use HasFactory;

  const UZS = 'UZS';
  const USD = 'USD';
  const EUR = 'EUR';

  public static $currencies = [
    ['value' => self::UZS, 'text' => 'Узбекский сум', 'title' => 'сум', 'prefix' => ''],
    ['value' => self::USD, 'text' => 'Доллар США', 'title' => 'доллар', 'prefix' => '$'],
    ['value' => self::EUR, 'text' => 'Евро', 'title' => 'Евро', 'prefix' => ''],
  ];

  const StatusNew = 0;
  const StatusApprove = 1;
  const StatusDecline = 2;

  public static $statuses = [
    ['value' => self::StatusNew, 'text' => 'Создан', 'class' => 'text-info'],
    ['value' => self::StatusApprove, 'text' => 'Подтвержден', 'class' => 'text-success'],
    ['value' => self::StatusDecline, 'text' => 'Отклонен', 'class' => 'text-danger'],
  ];

  public static function getStatusText($status, $expire_date) {
    if ($status == self::StatusApprove && strtotime('now') > strtotime($expire_date)) {
      return '<span class="text-warning">Срок действия истек</span>';
    }
    $collect = collect(self::$statuses);
    return '<span class="' . $collect->pluck('class')->get($status) . '">' . $collect->pluck('text')->get($status) . '</span>';
  }

  public static function availableToEdit($status, $expire_date)
  {
    if ($status == self::StatusApprove && strtotime('now') <= strtotime($expire_date)) {
      return false;
    }
    return true;
  }
  
  protected $fillable = [
    'title',
    'description',
    'region_id',
    'city_id',
    'model_id',
    'mark_id',
    'color_id',
    'year',
    'amount',
    'currency',
    'is_credit',
  ];

  public function region() {
    return $this->belongsTo(Regions::class);
  }

  public function city() {
    return $this->belongsTo(Cities::class);
  }

  public function carModel() {
    return $this->belongsTo(CarModels::class, 'model_id');
  }

  public function mark() {
    return $this->belongsTo(Marks::class);
  }

  public function color() {
    return $this->belongsTo(Colors::class);
  }

  public function owner() {
    return $this->belongsTo(User::class, 'user_id');
  }
}
