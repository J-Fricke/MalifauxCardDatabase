@extends('layouts.baselayout')
@section('title')
    Malifaux Card Database - Search
@endsection
@section('head')
    <script src="//cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/vue/1.0.13/vue.min.js"></script>
@endsection
@section('content')
    <form id='searchForm' class="form-search">
        <input id="searchFormInput" type="text" class="input-medium search-query">
    </form>
    @include('partials.table', ['id' => 'filteredModelsTable', 'tableData' =>[], 'sortable' => 'tablesorter'])

    <script>
        var client = algoliasearch('{{$searchAppKey}}', '{{$searchApiKey}}');
        var index = client.initIndex('models');
        function getObjectValue(value, k) {
            if (value !== null && typeof value === 'object') {
                var returnValue = '';
                for (var i = 0; i < value.length; i++) {
                    if (returnValue !== '') {
                        returnValue += ', ';
                    }
                    for (var kVal in value[i]) {
                        if (kVal !== 'id') {
                            returnValue += value[i][kVal];
                        }
                    }

                }
                return returnValue;
            } else {
                return value;
            }
        }
        function createTableRow(obj, tField) {
            tableData += "<tr>";
            for (k in obj) {
                if (typeof obj[k] !== 'function' && k !== '_highlightResult' && k !== 'objectID') {
                    if (tField == 'th') {
                        tableData += "<" + tField + ">" + k + "</" + tField + ">";
                    } else {
                        var value = getObjectValue(obj[k], k);
                        if (value === null) {value ='';}
                        tableData += "<" + tField + ">" + value + "</" + tField + ">";
                    }
                }
            }
            tableData += "</tr>";
            return tableData;
        }
        $('#searchForm').submit(function (e) {
            e.preventDefault();
//            index.search($('#searchFormInput').val(), {facetFilters: ['Df:6'],hitsPerPage: 300}, function searchDone(err, results) {//@todo incorporate facetFilters to drill down data further
            index.search($('#searchFormInput').val(), {,hitsPerPage: 300}, function searchDone(err, results) {
                console.log(results);
                for (var i = 0; i < results.hits.length; i++) {
                    console.log(results.hits[i]);
                    if (i == 0) {
                        console.log('start');
                        tableData = "<thead>";
                        tableData = createTableRow(results.hits[i], 'th');
                        tableData += "</thead><tbody>";
                    }
                    tableData = createTableRow(results.hits[i], 'td');
                }
                tableData += "</tbody>";
                $('#filteredModelsTable').html(tableData).tablesorter();
//                $("#filteredModelsTable").tablesorter();
            });
            return false;
        });
        $(function () {
        });
    </script>
@endsection