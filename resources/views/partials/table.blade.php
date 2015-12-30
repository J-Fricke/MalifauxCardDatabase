<table>
    @foreach ($tableData as $data)
        <tr>
            @if(is_array($data))
                @foreach ($data as $column)
                    <td>{{$column}}</td>
                @endforeach
            @else
                <td>{{$data}}</td>
            @endif
        </tr>
    @endforeach
</table>