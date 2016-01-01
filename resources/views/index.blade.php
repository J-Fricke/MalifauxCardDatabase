@extends('layouts.baselayout')
@section('title')
    Malifaux Card Database
@endsection
@section('content')
    <div class="row">
        <h1>Malifaux Card Database - Models Grouped by Type</h1>
        Faction: {!! Form::select('size', $factionsSelect, 'all') !!}
        @include('partials.table', ['id' => 'factionsTable', 'tableData' => $factions, 'sortable' => 'tablesorter'])
        <br>
        Masters: {!! Form::select('size', $mastersSelect, 'all') !!}
        @include('partials.table', ['id' => 'mastersTable', 'tableData' => $masters, 'sortable' => 'tablesorter'])
        <br>
        Henchmen
        @include('partials.table', ['id' => 'henchmenTable', 'tableData' => $henchmen, 'sortable' => 'tablesorter'])
        <br>
        Totems
        @include('partials.table', ['id' => 'totemsTable', 'tableData' => $totems, 'sortable' => 'tablesorter'])
        <br>
        Enforces
        @include('partials.table', ['id' => 'enforcersTable', 'tableData' => $enforcers, 'sortable' => 'tablesorter'])
        <br>
        Minions
        @include('partials.table', ['id' => 'minionsTable', 'tableData' => $minions, 'sortable' => 'tablesorter'])
        <br>
        Peons
        @include('partials.table', ['id' => 'peonsTable', 'tableData' => $peons, 'sortable' => 'tablesorter'])
    </div>
    <script type="text/javascript">
        function getUserAgentCommandKey() {
            var isMac = navigator.platform.toUpperCase().indexOf('MAC')>=0;
            if (isMac) {
                if (getBrowser() == 'Opera') {
                    return 17;
                }
                if (getBrowser() == 'Chrome' || getBrowser() == 'Safari') {
                    return 91;
//                WebKit (Safari/Chrome): 91 (Left Apple) or 93 (Right Apple);
                } else if (getBrowser() == 'Firefox') {
                    return 224;
                } else {
                    return 91;
                }
            } else {
                return 91;
            }
        }

        function getBrowser()
        {
            var nAgt = navigator.userAgent;
            var browserName  = navigator.appName;
            var nameOffset,verOffset;

            // In Opera, the true version is after "Opera" or after "Version"
            if ((verOffset=nAgt.indexOf("Opera"))!=-1) {
                browserName = "Opera";
            }
            // In MSIE, the true version is after "MSIE" in userAgent
            else if ((verOffset=nAgt.indexOf("MSIE"))!=-1) {
                browserName = "Microsoft Internet Explorer";
            }
            // In Chrome, the true version is after "Chrome"
            else if ((verOffset=nAgt.indexOf("Chrome"))!=-1) {
                browserName = "Chrome";
            }
            // In Safari, the true version is after "Safari" or after "Version"
            else if ((verOffset=nAgt.indexOf("Safari"))!=-1) {
                browserName = "Safari";
            }
            // In Firefox, the true version is after "Firefox"
            else if ((verOffset=nAgt.indexOf("Firefox"))!=-1) {
                browserName = "Firefox";
            }
            // In most other browsers, "name/version" is at the end of userAgent
            else if ( (nameOffset=nAgt.lastIndexOf(' ')+1) <
                    (verOffset=nAgt.lastIndexOf('/')) )
            {
                browserName = nAgt.substring(nameOffset,verOffset);
                if (browserName.toLowerCase()==browserName.toUpperCase()) {
                    browserName = navigator.appName;
                }
            }
            return browserName;
        }
    </script>
@endsection