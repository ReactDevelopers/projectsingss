<?php

use Illuminate\Database\Seeder;

class EmailTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('email_templates')->truncate();

        DB::table('email_templates')->insert([
        [
            'body' 		=> "<h5 style='font-style: italic;'>Message Classification:<span style='color: #0000ff'>Restricted</span></h5><br/>
                            Dear All,<br/>
                            <p style='padding-left: 5px'>Further to the events in end {UPCOMING_EVENT_MONTH} below, MHA has also confirmed the next upcoming major national event on {UPCOMING_EVENT_DATE} as below.</p></br>
                            {INDIVIDUAL_EVENT}</br>
                            <p style='padding:0 5px'>Depts are reminded to prepare and also remind staff to continue to stay alert and maintain/exercise high vigilance accordingly during the period.</p></br>
                            {EVENT_LIST}</br>
                            <p>JOD/PUBOC will continue to coordinate joint ops within PUB while JOD/EPU will serve as the Point-Of-Contact to MHA, SPF, SCDF and other HomeFront Agencies.  JOD/EPU will also follow up with the required procedures/linkages with SCDF’s command elements at their Tactical Command HQ in the event of its deployment.</p></br>
                            <p>Thank You</p>",
            'subject' 	=> "Upcoming Major National Events {YEAR}",
            'type' 		=> "1",
            'created_at'=> date('Y-m-d H:i:s')
        ],
    	[
    		'body'		=> "<h5 style='font-style: italic;'>Message Classification:<span style='color: #0000ff'>Restricted</span></h5><br/>
                            Dear All,<br/>
                            <p style='padding-left: 5px'>Further to the events in end {UPCOMING_EVENT_MONTH} below, MHA has also confirmed the next upcoming major national event on {UPCOMING_EVENT_DATE} as below.</p></br>
                            {GROUP_EVENT}</br>
                            <p style='padding:0 5px'>Depts are reminded to prepare and also remind staff to continue to stay alert and maintain/exercise high vigilance accordingly during the period.</p></br>
                            {EVENT_LIST}</br>
                            <p>JOD/PUBOC will continue to coordinate joint ops within PUB while JOD/EPU will serve as the Point-Of-Contact to MHA, SPF, SCDF and other HomeFront Agencies.  JOD/EPU will also follow up with the required procedures/linkages with SCDF’s command elements at their Tactical Command HQ in the event of its deployment.</p></br>
                            <p>Thank You</p>",
    		'subject'	=> "Upcoming Major National Events {YEAR}",
    		'type'		=> "2",
    		'created_at'=> date('Y-m-d H:i:s')
    	],
    	[
    		'body'		=> "<h5 style='font-style: italic;'>Message Classification:<span style='color: #0000ff'>Restricted</span></h5><br/>
                            Dear All,<br/>
                            <p style='padding-left: 5px'>Do take note of the upcoming major National events for Year {YEAR}, gathered from SCDF and SPF, as shown in the table appended below.</p></br>
                            {EVENT_LIST}</br>
                            <p>On below-mentioned periods, Ops Departments are to exercise due diligence and to stay alert/vigilant.</p></br>
                            <p>PUBOC will continue in coordinating the joint ops within PUB. EPU will serve as the Point-Of-Contact to MHA, SPF, SCDF and other HomeFront Agencies and will follow up with the required procedures/linkages with SCDF’s command elements at their Tactical Command HQ during its deployment.</p></br>
                            <p>Thank You</p>",
    		'subject'	=> "Upcoming Major National Events {YEAR}",
    		'type'		=> "3",
    		'created_at'=> date('Y-m-d H:i:s')
    	]
    	]);	
    }
}
