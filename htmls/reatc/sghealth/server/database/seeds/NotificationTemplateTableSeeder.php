<?php

use Illuminate\Database\Seeder;

class NotificationTemplateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $model = config('lq.notification_template_class');

        $model::updateOrCreate(['name' => 'FORGET_PASSWORD_EMAIL'],[
            'name' => 'FORGET_PASSWORD_EMAIL',
            'subject' => 'Reset Password Link',
            'body' => 'Dear {user.name} <br> Please <a href="{link}"> click here </a> to reset the password',
            'options' => [
                'variables' => [
                    'user.name',
                    'link',
                    'user.email',
                    'user.mobile_no',
                    'user_verification.token'
                ]
            ]
        ]);

        $model::updateOrCreate(['name' => 'FORGET_PASSWORD_SMS'],[
            'name' => 'FORGET_PASSWORD_SMS',
            'type' => 'sms',
            'subject' => 'Reset Password Link',
            'body' => 'Dear {user.name}, Your token is {user_verification.token} to reset the password.',
            'options' => [
                'variables' => [
                    'user.name',
                    'link',
                    'user.email',
                    'user.mobile_no',
                    'user_verification.token'
                ]
            ]
        ]);

        $model::updateOrCreate(['name' => 'DATA_VERFICATION_EMAIL'],[
            'name' => 'DATA_VERFICATION_EMAIL',
            'subject' => 'Email Verification Link',
            'body' => 'Dear {user.name} <br> Please <a href="{link}"> click here </a> to verify the email.',
            'options' => [
                'variables' => [
                    'user.name',
                    'link',
                    'user.email',
                    'user.mobile_no',
                    'user_verification.token'
                ]
            ]
        ]);

        $model::updateOrCreate(['name' => 'DATA_VERFICATION_SMS'],[
            'name' => 'DATA_VERFICATION_SMS',
            'type' => 'sms',
            'subject' => 'Email Verification Link',
            'body' => 'Dear {user.name}, Your OTP is {user_verification.token} to verify the mobile numnber.',
            'options' => [
                'variables' => [
                    'user.name',
                    'link',
                    'user.email',
                    'user.mobile_no',
                    'user_verification.token'
                ]
            ]
        ]);

        $model::updateOrCreate(['name' => 'MOBILE_NUMBER_VERIFICATION_SMS'],[
            'name' => 'MOBILE_NUMBER_VERIFICATION_SMS',
            'type' => 'sms',
            'subject' => 'Mobile Number Verifcation',
            'body' => 'Your OTP is {user_verification.token} to verify the mobile numnber.',
            'options' => [
                'variables' => [
                    'user_verification.token'
                ]
            ]
        ]);

        $model::updateOrCreate(['name' => 'WELCOME_MAIL'],[
            'name' => 'WELCOME_MAIL',
            'subject' => 'Welcome',
            'body' => 'Dear {user.name}, Thanks.',
            'options' => [
                'variables' => [
                    'user.name',
                    'user.email',
                    'user.mobile_no'
                ]
            ]
        ]);

        $model::updateOrCreate(['name' => 'INVITE_EVENT_MANAGER'],[
            'name' => 'INVITE_EVENT_MANAGER',
            'subject' => 'Invitation for Event Manager
            ',
            'body' => '<p>Hello,</p>
            <p>You are invited by admin as a manager for an event.</p>
            <p>Click on the below link to signup as manager.</p>
            <p><a href="{link}" target="_blank" rel="noopener">Signup</a></p>',
            'options' => [
                'variables' => [
                    'link',
                ]
            ]
        ]);

        $model::updateOrCreate(['name' => 'CPD_PDF_EXPORT'],[
            'name' => 'CPD_PDF_EXPORT',
            'subject' => 'CPD Export PDF | {date}
            ',
            'body' => '<p>Hello {user.name}</p>
            <p>Please find your pdf in the attachment below.</p>
            <p>Thank You</p>',
            'options' => [
                'variables' => [
                    'user.name',
                    'date'
                ]
            ]
        ]);
        $model::updateOrCreate(['name' => 'USER_CERTIFICATE_EXPORT'],[
            'name' => 'USER_CERTIFICATE_EXPORT',
            'subject' => 'User Certificate Export Excel | {date}
            ',
            'body' => '<p>Hello {user.name}</p>
            <p>Please find you exported excel in the attachment below.</p>
            <p>Thank You</p>',
            'options' => [
                'variables' => [
                    'user.name',
                    'date'
                ]
            ]
        ]);
        $model::updateOrCreate(['name' => 'EMPLOYEE_REGISTER_EMAIL'],[
            'name' => 'EMPLOYEE_REGISTER_EMAIL',
            'subject' => 'Welcome to SG Healthcare',
            'body' => '<p>Dear {user.name},</p>
            <p>Welcome to SG Health care.</p>
            <p>Use these credentials to login into the system -&nbsp;</p>
            <p>Email - {user.email}</p>
            <p>Password - {pass}</p>
            <p>Link - {link}</p>',
            'options' => [
                'variables' => [
                    'user.name',
                    'user.email',
                    'pass',
                    'link'
                ]
            ]
        ]);
    }
}
