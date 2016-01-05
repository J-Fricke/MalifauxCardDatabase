<a id="{{'modelModalLink'.$data->id}}" href="{!! URL::action('MainController@getModelModal').'/'.$data->id !!}" data-target="{{'#modelModal'.$data->id}}">{{ $column }}</a>
{{--data-toggle="modal"--}}
<!-- Modal -->
<div class="modal" id="modelModal{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <br>
                <div class="te"></div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script type="text/javascript">
    $(document).keydown(function(event){
        if(event.which==getUserAgentCommandKey())
            cntrlIsPressed = true;
    });

    $(document).keyup(function(){
        cntrlIsPressed = false;
    });

    var cntrlIsPressed = false;

    $('<?='#modelModalLink'.$data->id?>').click(function (ev) {
        ev.preventDefault();
            if (cntrlIsPressed) {
                    //Ctrl+Click (win) Cmd+Click (mac): Disable Modal, load new URL instead
                    document.location.href = '{!! URL::action('MainController@getModel').'/'.$data->id !!}';

            } else {
                //Click: Load Modal
                $('<?='#modelModal'.$data->id?>').modal({remote: '{!! URL::action('MainController@getModelModal').'/'.$data->id !!}'});
                $('<?='#modelModal'.$data->id?>').modal('show');
            }

        return false;
    });
</script>