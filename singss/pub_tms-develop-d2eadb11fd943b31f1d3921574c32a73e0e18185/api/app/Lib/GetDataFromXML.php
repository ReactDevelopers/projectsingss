<?php

namespace App\Lib;
use DB;

class GetDataFromXML 
{
	# In this varibale , we are storing the user data
	public $user_data = [];

	#public $pubnet_ids = [];

	# In this variable, we are storing the PUBNET ID, which are activated.	
	public $pubnet_ids = [];

	# In this variable, we are storing the new department data	
	public $department_data = [];

	# In this variable, we are storing the new plant data	
	public $plant_data = [];

	# In this variable, we are storing the new organization data
	public $org_data = [];
    

	protected $connection_name;


	# Store the All Data from Database.
	protected $departments;
	protected $plants;
	protected $organization_units;


	protected $only_department_name=[];
	protected $only_org_number=[];
	protected $only_plant_name=[];

    protected $eloquents=[];

	public function __construct($file_url,$eloquents)
    {
        //
        $this->file_url = $file_url;
        $this->eloquents =  $eloquents;  

        $this->walkInXML();      
    }


    public function walkInXML()
    {
    	$this->getAllDataFromDB();

    	$activeUsersArr['EMPLOYEE'] = [];
		$file_url = $this->file_url;
		$doc = new \DOMDocument;
		$doc->preserveWhiteSpace = false;

		$doc->load(trim($file_url));
		$xpath = new \DOMXPath($doc);
		$entries = $xpath->query("//EMPLOYEE");

		$i = 0;

		foreach ($entries as $entry) {

		
			$personal_no = $this->getNumberLabelFromXml($entry,'PERSONNEL_NO');

            // @codeCoverageIgnoreStart
			if(!$personal_no)
				continue;
            // @codeCoverageIgnoreEnd
						

			$name = $this->getLabelFromXml($entry,'NAME');
			$email = $this->getLabelFromXml($entry,'EMAIL_ADDRESS');

			# Getting the Department information
			$department_name = $this->getLabelFromXml($entry,'LEVEL_2_DESC');
			$department = $this->isDepartmentExists($department_name);

			$new_department = $this->prepareNewDepartmentData($department,$department_name);			

            #Gettign the Destination, divisionName, Branch,Unit

            $designation_name = $this->getLabelFromXml($entry,'POSITION_DESC');
            $division_name = $this->getLabelFromXml($entry,'LEVEL_3_DESC');
            $branch_name = $this->getLabelFromXml($entry,'LEVEL_4_DESC');
            $unit_name = $this->getLabelFromXml($entry,'LEVEL_5_DESC');



			$this->prepareUserData(
				$personal_no,
				$name,
				$email,
				['exists'=>$department,'new'=>$department_name],				
                [
                    'designation'=>$designation_name,
                    'branch'=>$branch_name,
                    'unit'=>$unit_name,
                    'division'=>$division_name
                ]
			);

            $this->pubnet_ids[] = $personal_no;


		}
    }

    /**
    * This function fetch all departments data from the database
    * and will store the value in respected varibales
    * @ self instance
    */
    public function getAllDataFromDB(){

		if(in_array('departments', array_keys($this->eloquents) ) ){	
		  $this->departments = $this->eloquents['departments']::withTrashed()->get();
        }
		
    }

    /**
    * This function prepares the user data stracture
    * 
    */
    protected function prepareUserData($pubnet_id,$employee_name,$email,$department,$other=[])
    {
         // @codeCoverageIgnoreStart
        if(in_array($pubnet_id, $this->pubnet_ids)){
            return;
        }
         // @codeCoverageIgnoreEnd
        
    	$existsDepartment = $department['exists'];
    	$new_department = addslashes($department['new']);

    	if($existsDepartment){

    		$department_id = $existsDepartment->id;

    	}elseif($new_department){
    		$department_id = "SELECT id from departments where `name` = '{$new_department}' LIMIT 1;";
    	}else{

    		$department_id = null;
    	}

    	

    	$this->user_data[] = [
    		'pubnet_id'=> $pubnet_id,
    		'name'=> $employee_name,
    		'email'=> $email?$email:null,
    		'department_id'=>$department_id,
    		'deleted_at'=>null,
    		'created_at'=>date('Y-m-d H:i:s'),
    		'updated_at'=>date('Y-m-d H:i:s'),
            'role_id'=>2,
    	];
    }

    /**
    * This function prepares the new department data stracture
    * @param string|NULL - Detail to department, which is already exists into database
    * @param string - department Name, which is in XML File
    * @return array|NUll
    */
    protected function prepareNewDepartmentData($department,$department_name)
    {
    	if(in_array('departments', array_keys($this->eloquents)) && $department == NULL && !empty($department_name)){

    		$data = ['name'=>$department_name];
    		if(!in_array(strtolower($department_name), $this->only_department_name)){
    			$this->department_data[] =$data; 
    			$this->only_department_name[] = strtolower($department_name);  			
    		}
    		return $data;
    	}

    	return NULL;
    }

    /**
    * This function compares the department name form the database, if department is already exists, * then return the department object.
    * @param string
    * @return NULL
    * @return department object.
    **/
    protected function isDepartmentExists($department_name)
    {	
        // @codeCoverageIgnoreStart
    	if(!$this->departments)
    		return NULL;    	
        // @codeCoverageIgnoreEnd

    	return $this->departments->filter(function($value, $key) use($department_name){

			return ( strtolower($value->name) == strtolower($department_name)  );
		})->first();
    }

    
    /**
    * Get the Number from XML .
    */
    protected function getNumberLabelFromXml($entry,$label='PERSONNEL_NO')
    {	
    	try{
    		$data = $entry->getElementsByTagName($label)->item(0);
			$personal_no = trim($data->nodeValue);
			return ltrim($personal_no,0);
		}
        // @codeCoverageIgnoreStart
        catch(\Exception $e){

			\Log::info($e->getMessage());
			return false;
		}
        // @codeCoverageIgnoreEnd
    }

    /**
    * get the label value from XMl File.
    **/
    protected function getLabelFromXml($entry,$label)
    {	
    	try{
    		$data = $entry->getElementsByTagName($label)->item(0);
			return trim($data->nodeValue);

		}
        // @codeCoverageIgnoreStart
        catch(\Exception $e){

			\Log::info($e->getMessage());
			return '';
		}
        // @codeCoverageIgnoreEnd
    }

    /**
    * get the label value which contains the comma separated value 
    * and convert in the array
    * @return array
    **/
    protected function getLabelContainsMultiValueFromXml($entry,$label)
    {	
    	try{

    		$data = $entry->getElementsByTagName($label)->item(0);
			$data = explode(',',trim($data->nodeValue));
			array_walk($data,function(&$v){
				$v = trim($v);
			});
			return $data;

		}
        // @codeCoverageIgnoreStart
        catch(\Exception $e){

			\Log::info($e->getMessage());
			return '';
		}
        // @codeCoverageIgnoreEnd
    }
}