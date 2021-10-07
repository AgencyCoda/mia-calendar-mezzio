<?php

namespace Mia\Calendar\Model;

use Mia\Auth\Model\MIAUser;

/**
 * Description of Model
 * @property int $id ID of item
 * @property mixed $creator_id Description for variable
 * @property mixed $title Description for variable
 * @property mixed $subtitle Description for variable
 * @property mixed $caption Description for variable
 * @property mixed $type Description for variable
 * @property mixed $item_id Description for variable
 * @property mixed $status Description for variable
 * @property mixed $start Description for variable
 * @property mixed $end Description for variable
 * @property mixed $data Description for variable
 * @property mixed $created_at Description for variable
 * @property mixed $updated_at Description for variable
 * @property mixed $deleted Description for variable

 *
 * @OA\Schema()
 * @OA\Property(
 *  property="id",
 *  type="integer",
 *  description=""
 * )
 * @OA\Property(
 *  property="creator_id",
 *  type="integer",
 *  description=""
 * )
 * @OA\Property(
 *  property="title",
 *  type="string",
 *  description=""
 * )
 * @OA\Property(
 *  property="subtitle",
 *  type="string",
 *  description=""
 * )
 * @OA\Property(
 *  property="caption",
 *  type="string",
 *  description=""
 * )
 * @OA\Property(
 *  property="type",
 *  type="integer",
 *  description=""
 * )
 * @OA\Property(
 *  property="item_id",
 *  type="integer",
 *  description=""
 * )
 * @OA\Property(
 *  property="status",
 *  type="integer",
 *  description=""
 * )
 * @OA\Property(
 *  property="start",
 *  type="",
 *  description=""
 * )
 * @OA\Property(
 *  property="end",
 *  type="",
 *  description=""
 * )
 * @OA\Property(
 *  property="data",
 *  type="string",
 *  description=""
 * )
 * @OA\Property(
 *  property="created_at",
 *  type="",
 *  description=""
 * )
 * @OA\Property(
 *  property="updated_at",
 *  type="",
 *  description=""
 * )
 * @OA\Property(
 *  property="deleted",
 *  type="integer",
 *  description=""
 * )

 *
 * @author matiascamiletti
 */
class MiaAppointment extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'mia_appointment';
    
    //protected $casts = ['data' => 'array'];
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    //public $timestamps = false;

    /**
    * 
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function creator()
    {
        return $this->belongsTo(MIAUser::class, 'creator_id');
    }


    /**
    * Configurar un filtro a todas las querys
    * @return void
    */
    protected static function boot(): void
    {
        parent::boot();
        
        static::addGlobalScope('exclude', function (\Illuminate\Database\Eloquent\Builder $builder) {
            $builder->where('mia_appointment.deleted', 0);
        });
    }
}