<html lang="en">
<head>
    <title>Cpd</title>
</head>
<body >
    <h1 style="text-align: center">CPD Details</h1>
    <table  width="100%" style="font-family: 'Roboto', sans-serif; font-size: 11pt;">
        <tbody>
            <tr>
                <td >
                    @foreach($data as $k => $v)
                        <table  width="100%" style="page-break-after: always ; text-align:center ">
                            <tr>
                                @if(strtolower($v['document']['type']) == 'application/pdf')
                                    <td><a href="{{asset('storage/'.$v['document']['path'])}}">Open Document</a></td>
                                @else
                                    <td width="30%" style="color: #000000; padding: 10px">
                                        <img height="200px" width="200px" src="{{asset('storage/'.$v['document']['path'])}}"> 
                                    </td>
                                @endif
                                <td width="70%" >
                                    <table cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td width="30%" style="font-size: 11pt">
                                                <span style="font-weight: bold;">Title : </span>
                                            </td>
                                            <td width="70%" style="font-size: 11pt">
    
                                                <p style="width:300px">{!! wordwrap($v['title'], 40, "<br />\n") !!}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="font-size: 11pt;word-break: break-word;">
                                                <span style="font-weight: bold;">Description : </span>
                                            </td>
                                            <td width="70%" style="font-size: 11pt">
    
                                                <p style="width:300px">{{$v['description']}}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="font-size: 11pt">
                                                <span style="font-weight: bold;">Role : </span>
                                            </td>
                                            <td width="70%" style="font-size: 11pt">
    
                                                <p style="width:300px">{{$v['role']}}</p>
                                             </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="font-size: 11pt">
                                                <span style="font-weight: bold;">Code : </span>
                                            </td>
                                            <td width="70%" style="font-size: 11pt">
    
                                                <p style="width:300px">{{$v['code']}}</p>
                                            </td>
                                        </tr>
    
                                        <tr>
                                            <td width="30%" style="font-size: 11pt">
                                                <span style="font-weight: bold;">Date : </span>
                                            </td>
                                            <td width="70%" style="font-size: 11pt">
    
                                                <p style="width:300px">{{date('d-M-Y',strtotime($v['date']))}}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" style="font-size: 11pt">
                                                <span style="font-weight: bold;">CPD Credits : </span>
                                            </td>
                                            <td width="70%" style="font-size: 11pt">
    
                                                <p style="width:300px">{{$v['cpd_credit']}}</p>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    @endforeach
                </td>
            </tr>
        <tbody>
    </table>
</body>
</html>
