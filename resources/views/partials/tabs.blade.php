<ul class="nav nav-tabs nav-justified">
@foreach($factions as $faction)
    <li @if($faction->id === 0)class="active" @endif role="presentation"><a data-toggle="tab" href="#{!! str_replace(' ', '', $faction->faction) !!}">{{$faction->faction}}</a></li>
@endforeach
</ul>