<?php

namespace App\Lib;

use DB;

class DataUpdater
{

	protected $inserted_users = 0;
    protected $blocked_users = 0;
    protected $total_users=0;

    protected $file_url;
    public $error_message;

    protected $data_object;
    protected $eloquents;

    protected $max_id;
    protected $user_model;

    public $joiners;
    public $movers;
    public $leavers;

	public function __construct($file_url)
    {
        
        $this->file_url = $file_url;

        $this->updater();
    }   

    /**
     * This function handles Data update Process 
     **/

    public function updater()
    {
    	try{
            
           DB::beginTransaction();          

           $this->eloquents = [

            'departments'=>\App\Models\Department::class,
            'updated_user_during_hrdu'=>\App\Models\UpdatedUserDuringHrdu::class,
            'users'=>\App\User::class
           ];

           $this->data_object = new GetDataFromXML($this->file_url,$this->eloquents);

           $this->user_model = isset($this->eloquents['users'])?$this->eloquents['users']:null;

           # Check if need to update the departments.           
           $this->departmentUpdator();

           # Set the max primary key value of user table
           $this->setMaxId();

           # Rest table: updated_user_during_hrdu
           $this->resetUpdatedUserDuringHrdu();

           # assign the Leavers list to var {$leavers}
           $this->assignLeaversList();

           # Blocked the users who are not exists in the XML file.
           $this->userDeactivator();

           # Insert and update the users, who are available in XML File.
           $this->userUpdator();
           
           # Rest the auto increment value of user table
           $this->resetAutoIncrements();

            
           # assign the Movers list to var {$movers}
           $this->assignMoversList();

           # assign the Joiners list to var {$joiners}
           $this->assignJoinersList();

          DB::commit();

       }
       // @codeCoverageIgnoreStart
       catch(\Exception $e){

            DB::rollBack();
            $this->error_message = $e->getMessage();            
            
       }
       // @codeCoverageIgnoreEnd
      
    }


    /**
     * We are using this function for updating the department data.
     */
    private function departmentUpdator()
    {
    	if(in_array('departments', array_keys($this->eloquents))){

            $departments = $this->data_object->department_data;
            if(count($departments)){
                $this->eloquents['departments']::insert($departments);
            }
       }
    }

    /**
     * We are using this function to deactivte the user,which are not exist in XML.
     */
    private function userDeactivator()
    {
    	$pubnet_ids = $this->data_object->pubnet_ids;
        $this->blocked_users =  $this->eloquents['users']::whereNotIn('pubnet_id',$pubnet_ids)->where('pubnet_id','<>',env('TESTER_PUBNET_ID'))->delete();
    }
    
    /**
     * We are using this function for updating the user data.
     */
    private function userUpdator()
    {

		$user_data = $this->data_object->user_data;
		$this->total_users = count($user_data);
		if($this->total_users){            

		    $user_data = array_chunk($user_data, 10000);
		    foreach ($user_data as $user_batch) {          
		        $this->eloquents['users']::insertUpdateBulk($user_batch);            
		    }           
		}
    }

    
    /**
     * We are using this function for getting the max primary value 
     * before updating the data
     **/
    public function setMaxId()
    {
        // @codeCoverageIgnoreStart
    	if(!$this->user_model)
    		return null;
        // @codeCoverageIgnoreEnd

    	if(method_exists($this->user_model, 'getMaxId')){

    		$this->max_id = $this->user_model::getMaxId();
    	}
    }

    /**
     * We are using this function for getting the leaver list.
     * @return Illuminate\Database\Eloquent\Collection
     **/
    protected function assignLeaversList()
    {
        // @codeCoverageIgnoreStart
    	if(!$this->user_model)
    		return null;
        // @codeCoverageIgnoreEnd

    	if(method_exists($this->user_model, 'getLeavers')){
    		$pubnet_ids = $this->data_object->pubnet_ids;
    		$this->leavers = $this->user_model::getLeavers($pubnet_ids);
    	}
    	return null;
    }

    /** 
     * We are using this function for getting the mover list.
     * @return Illuminate\Database\Eloquent\Collection
     **/
    protected function assignMoversList()
    {
        // @codeCoverageIgnoreStart
    	if(!$this->user_model)
    		return null;
        // @codeCoverageIgnoreEnd
        
    	if(method_exists($this->user_model, 'getMovers')){

    		$this->movers= $this->user_model::getMovers();
    	}
    	return null;
    }

    /** 
     * We are using this function for getting the Joiner list.
     * @return Illuminate\Database\Eloquent\Collection
     **/
    protected function assignJoinersList()
    {
        // @codeCoverageIgnoreStart
    	if(!$this->user_model || !$this->max_id)
    		return null;
        // @codeCoverageIgnoreEnd

    	if(method_exists($this->user_model, 'getJoiners')){

    		$this->joiners = $this->user_model::getJoiners($this->max_id);
    	}
    	return null;
    }

    /**
     * When we use batch insert process then the "auto_increment value" increases while there is no 
     * data insert into the table. So we are using this function to handle "unnecessary  
     * increment".
     * @param NONE
     * @return NULL
     */

    protected function resetAutoIncrements()
    {
        // @codeCoverageIgnoreStart
    	if(!$this->user_model)
    		return null;
        // @codeCoverageIgnoreEnd

    	if(method_exists($this->user_model, 'updateAutoIncrements')){

    		return $this->user_model::updateAutoIncrements();
    	}
    	return null;
    }

    /**
     * We are using this function to reset the updated_user_during_hrud table
     * for getting the actual result during this execution.
     **/

    protected function resetUpdatedUserDuringHrdu()
    {
         if(in_array('updated_user_during_hrdu', array_keys($this->eloquents))){

            $this->eloquents['updated_user_during_hrdu']::truncate();
        }
    }

}