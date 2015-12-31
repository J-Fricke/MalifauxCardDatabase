<table id="{{$id}}" class="table tablesorter">
    @foreach ($tableData as $k => $data)
        @if(is_string($data))
            <tr>
                <td>{!!$data!!}</td>
            </tr>
        @else
            @if($k === 0)
                <thead>
                <tr>
                    @foreach ($data as $name => $column)
                        @if($name !== 'id')
                            <th>{{$name}}</th>
                        @endif
                    @endforeach
                </tr>
                </thead>
                <tbody>
            @endif
            <tr>
                @foreach ($data as $name => $column)
                    @if($name !== 'id')
                        <td>{{$column}}</td>
                    @endif
                @endforeach
            </tr>
            @endif
    @endforeach
    </tbody>
</table>
<script type="text/javascript">
    $(function () {
        $("{{"#".$id}}").tablesorter();
    });
</script>