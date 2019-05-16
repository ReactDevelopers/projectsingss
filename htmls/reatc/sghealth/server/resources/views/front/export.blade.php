<table>
    <thead>
    <tr>
        <th style="width:200px">Certificate Type</th>
        <th style="width:200px">Certificate Info</th>
        <th style="width:200px">Certified On</th>
        <th style="width:200px">Expiry Date</th>
        <th style="width:200px">Document</th>
        <th style="width:200px">Valid</th>
    </tr>
    </thead>
    <tbody>
    @foreach($certs as $key => $value)

        <tr>
            <td>{{ $value['certificate'] ? '' : 'Other' }}</td>
            <td>{{ $value['cert_info'] }}</td>
            <td>{{ $value['certified_on'] }}</td>
            <td>{{ $value['expiry_date'] }}</td>
            @if($value['documents'])
                <td>ddsf<img src="{{asset('storage/'.$value['documents'][0]['path'])}}" /></td>
            @else
                <td>No Document Uploaded</td>
            @endif
            <td>{{ $value['is_valid'] == 'true' ? 'Yes' : 'No' }}</td>
        </tr>
    @endforeach
    </tbody>
</table>