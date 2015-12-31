<table id="{{$id}}" class="table {{ $sortable or '' }}">
    @foreach ($tableData as $k => $data)
        @if(is_string($data))
            <tr>
                <td>{!!$data!!}</td>
            </tr>
        @else
            @if($k === 0)
                @if (count($data) > 2)
                    <thead>
                    <tr>
                        @foreach ($data as $name => $column)
                            @if($name !== 'id')
                                <th>{{ $name }}</th>
                            @endif
                        @endforeach
                    </tr>
                    </thead>
                @endif
                <tbody>
            @endif
            <tr>
                @foreach ($data as $name => $column)
                    @if($name !== 'id')
                        @if($name === 'name')
                            @if($id !== 'modelTable')
                            <td>{!! link_to(URL::action('MainController@getModel').'/'.$data->id, $title = $column, $parameters = array(), $attributes = array()) !!}</td>
                            @else
                                <td>{{  $column }}</td>
                            @endif
                        @else
                            <td>{{ $column }}</td>
                        @endif
                    @endif
                @endforeach
            </tr>
            @endif
    @endforeach
    </tbody>
</table>
@if(isset($sortable))
    <script type="text/javascript">
        $(function () {
            $("{{"#".$id}}").tablesorter();
        });
    </script>
@endif