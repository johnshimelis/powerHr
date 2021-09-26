<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SurveyResponse
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SurveyResponse newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SurveyResponse newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SurveyResponse query()
 * @method static \Illuminate\Database\Eloquent\Builder|SurveyResponse whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SurveyResponse whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SurveyResponse whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SurveyResponse extends Model
{
    use HasFactory;
}
