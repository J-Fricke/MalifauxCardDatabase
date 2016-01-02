<div class="tab-content">
    @foreach($factions as $factionData)
        <?php $factionData->htmlId = str_replace(' ', '', $factionData->faction); ?>
        <div id="{{ $factionData->htmlId }}" class="tab-pane fade @if($factionData->id === 0)in active @endif ">
            @include('partials.table', ['id' => $factionData->htmlId.'mastersTable', 'tableData' => $factionData->models['masters'], 'sortable' => 'tablesorter'])
            <br>
            Henchmen
            @include('partials.table', ['id' => $factionData->htmlId.'henchmenTable', 'tableData' => $factionData->models['henchmen'], 'sortable' => 'tablesorter'])
            <br>
            Totems
            @include('partials.table', ['id' => $factionData->htmlId.'totemsTable', 'tableData' => $factionData->models['totems'], 'sortable' => 'tablesorter'])
            <br>
            Enforcers
            @include('partials.table', ['id' => $factionData->htmlId.'enforcersTable', 'tableData' => $factionData->models['enforcers'], 'sortable' => 'tablesorter'])
            <br>
            Minions
            @include('partials.table', ['id' => $factionData->htmlId.'minionsTable', 'tableData' => $factionData->models['minions'], 'sortable' => 'tablesorter'])
            <br>
            Peons
            @include('partials.table', ['id' => $factionData->htmlId.'peonsTable', 'tableData' => $factionData->models['peons'], 'sortable' => 'tablesorter'])
        </div>
    @endforeach
</div>