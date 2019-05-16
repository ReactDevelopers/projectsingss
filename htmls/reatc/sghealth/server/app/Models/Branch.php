<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use EloquentFilter\Filterable;
use Staudenmeir\EloquentJsonRelations\HasJsonRelationships;

class Branch extends Model
{
	use HasJsonRelationships, SoftDeletes, Filterable;

		/**
		* The attributes that are mass assignable.
		*
		* @var array
		*/
		protected $fillable = [
			'name', 'address','institute_id','address','mon_fri_start_time',
			'mon_fri_end_time', 'sun_start_time', 'sun_end_time','sat_start_time',
			'sat_end_time', 'ph_start_time', 'ph_end_time','service_ids','branch_code','deleted_at'
		];

	 /**
		* The attributes that should be cast to native types.
		*
		* @var array
		*/
		protected $casts = [
			'name' => 'string',
			'address' => 'string',
			'institute_id' => 'int',
			'mon_fri_start_time' => 'time',
			'mon_fri_end_time' => 'time',
			'sun_start_time' => 'time',
			'sun_end_time' => 'time',
			'sat_start_time' => 'time',
			'sat_end_time' => 'time',
			'ph_start_time' => 'time',
			'ph_end_time' => 'time',
			'service_ids' => 'json',
			'branch_code' => 'string'
		];

		public $hidden = [
			'mon_fri_start_time',
			'mon_fri_end_time',
			'sun_start_time',
			'sun_end_time',
			'sat_start_time',
			'sat_end_time',
			'ph_start_time',
			'ph_end_time',
		];

		public $appends = [
			'mon_fri_timing',
			'saturday_timing',
			'sunday_timing',
			'ph_timing',
		];
	 	/**
		* Get the services information
		*/
		public function services() {

			return $this->belongsToJson(Service::class,  'service_ids');
		}

		/*get formatted monday to friday start-end time*/
		public function getMonFriTimingAttribute(){
			return $this->mon_fri_start_time ? [$this->mon_fri_start_time,$this->mon_fri_end_time]: null;
		}

		/*get formatted monday to friday start-end time*/
		public function getSundayTimingAttribute(){
			return $this->sun_start_time ? [$this->sun_start_time,$this->sun_end_time] : null;
		}

		public function getSaturdayTimingAttribute(){
			return $this->sat_start_time ? [$this->sat_start_time,$this->sat_end_time] : null;
		}

		public function getPhTimingAttribute(){
			return $this->ph_start_time ? [$this->ph_start_time,$this->ph_end_time] : null;
		}

		public function getMonFriStartTimeAttribute($value){
			return $value ? date('H:i:s',strtotime($value)) : null ;
		}

		public function getMonFriEndTimeAttribute($value){
			return $value ? date('H:i:s',strtotime($value)) : null ;
		}

		public function getSunStartTimeAttribute($value){
			return $value ? date('H:i:s',strtotime($value)) : null ;
		}

		public function getSunEndTimeAttribute($value){
			return $value ? date('H:i:s',strtotime($value)) : null ;
		}

		public function getSatStartTimeAttribute($value){
			return $value ? date('H:i:s',strtotime($value)) : null ;
		}

		public function getSatEndTimeAttribute($value){
			return $value ? date('H:i:s',strtotime($value)) : null ;
		}

		public function getPhEndTimeAttribute($value){
			return $value ? date('H:i:s',strtotime($value)) : null ;
		}

		public function getPhStartTimeAttribute($value){
			return $value ? date('H:i:s',strtotime($value)) : null ;
        }

        /**
         * To convert the String value in integer
         */
        public function getServiceIdsAttribute($val) {

            $val = $val ? json_decode($val) : $val;
            return $val  && is_array($val) ? array_map('intval', $val) : null;
        }
	}
