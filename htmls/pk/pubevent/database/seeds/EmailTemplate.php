<?php

use Illuminate\Database\Seeder;

class EmailTemplateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('email_templates')->insert([
        [
            'body' 		=> "Dear all,

                            Please take note of the upcoming major National events for year {YEAR}, gathered from SCDF and SPF, as shown in the table appended below.

                            The next upcoming major national event is the {EVENT_NAME} on {EVENT_DATE} respectively tobe held at {EVENT_VENUE}.

                            On below mentioned periods, Ops Departments are to exercise due diligence and to stay alert/vigilant. 

                            PUBOC will continue in coordinating the joint ops within PUB. EPU will serve as the Point-of-Contact to MHA, SPF, SCDF and other HomeFront Agencies and will follow up with the required procedures/linkages with SCDF's command elements at their Tactical Command HQ during its deployment.

                            For your early heads' up, please. Thanks

                            {EVENT_LIST}",
            'subject' 	=> "Upcoming Major National Events {YEAR}",
            'type' 		=> "1",
            'created_at'=> date('Y-m-d H:i:s')
        ],
    	[
    		'body'		=> "Dear all,

                            Please take note of the upcoming major National events for year {YEAR}, gathered from SCDF and SPF, as shown in the table appended below.

                            The next upcoming major national event is the {EVENT_NAME} on {EVENT_DATE} respectively tobe held at {EVENT_VENUE}.

                            On below mentioned periods, Ops Departments are to exercise due diligence and to stay alert/vigilant. 

                            PUBOC will continue in coordinating the joint ops within PUB. EPU will serve as the Point-of-Contact to MHA, SPF, SCDF and other HomeFront Agencies and will follow up with the required procedures/linkages with SCDF's command elements at their Tactical Command HQ during its deployment.

                            For your early heads' up, please. Thanks

                            {EVENT_LIST}",
    		'subject'	=> "Upcoming Major National Events {YEAR}",
    		'type'		=> "2",
    		'created_at'=> date('Y-m-d H:i:s')
    	],
    	[
    		'body'		=> "Dear all,

                            Please take note of the upcoming major National events for year {YEAR}, gathered from SCDF and SPF, as shown in the table appended below.

                            On below mentioned periods, Ops Departments are to exercise due diligence and to stay alert/vigilant. 

                            PUBOC will continue in coordinating the joint ops within PUB. EPU will serve as the Point-of-Contact to MHA, SPF, SCDF and other HomeFront Agencies and will follow up with the required procedures/linkages with SCDF's command elements at their Tactical Command HQ during its deployment.

                            For your early heads' up, please. Thanks

                            {EVENT_LIST}",
    		'subject'	=> "Upcoming Major National Events {YEAR}",
    		'type'		=> "3",
    		'created_at'=> date('Y-m-d H:i:s')
    	]
    	]);	
    }
}
