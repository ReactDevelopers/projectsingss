<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Apply Job</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <div class="container">
        Dear Manager, <br/>
        <p>Please find the details of the employee who has applied for the job <b>{{strtoupper($job['title'])}}<b></p>
        <div>
            <p><b>Name</b> -  {{$user['name']}}</p>
            <p><b>Email</b> -  {{$user['email']}}</p>
            <p><b>Mobile Number</b> - {{$user['mobile_no']}}</p> 
            <p><b>AHPC</b> - {{$user['ahpc']}}</p> 
            <p><b>Profession</b> - {{$user['profession']['name']}} </p> 
        </div>
        @if(count($user['certificates']))
            Please find the all the certificates of the user in below links - 
            <ol>
            @foreach($user['certificates'] as $key => &$value)
                @php
                    $value = json_decode(json_encode($value),true)
                @endphp
                
                <li><a href="{!!asset('storage/'.@$value['documents'][0]['path'])!!}" target="_blank">Open Document</a></li>
            @endforeach
            </ol>
        @endif
    </div>
</body>
</html>