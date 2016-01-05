Model
@include('partials.table', ['id' => 'modelTable', 'tableData' => $model])
<br>
Keywords
@include('partials.table', ['id' => 'mastersTable', 'tableData' => $keywords])
<br>
Traits
@include('partials.table', ['id' => 'henchmenTable', 'tableData' => $traits])
<br>
Groups
@include('partials.table', ['id' => 'totemsTable', 'tableData' => $groups])
<br>
Triggers
@include('partials.table', ['id' => 'enforcersTable', 'tableData' => $triggers])
<br>
Actions
@include('partials.table', ['id' => 'minionsTable', 'tableData' => $actions])
<br>
Abilities
@include('partials.table', ['id' => 'peonsTable', 'tableData' => $abilities])
<br>
Factions
@include('partials.table', ['id' => 'peonsTable', 'tableData' => $factions])