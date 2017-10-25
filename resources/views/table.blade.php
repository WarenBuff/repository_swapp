@extends('index')

@section('content')
    <div class="page-content">
        <table id="dataTable">
            <thead>
            <tr>
                <th>Имя</th>
                @foreach ($characters as $header)
                    <th colspan="2">{{$header->name}}</th>
                @endforeach
            </tr>
            <tr>
                <th></th>
                @foreach ($characters as $header)
                    <th>Stars</th><th>Gear</th>
                @endforeach
            </tr>
            </thead>
            <tbody>
                @foreach($members as $member)
                    <tr><td>{{$member->name}}</td>
                    @foreach ($characters as $index1 => $character)
                        @php
                            $current_char = $member['characters']->keyBy('id')->get($index1);
                        @endphp
                            <td>{{$current_char['pivot']['star']}}</td><td>{{$current_char['pivot']['gear']}}</td>
                    @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/scroller/1.4.3/css/scroller.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/3.2.3/css/fixedColumns.bootstrap.min.css">
@stop

@section('javascript')
    <!-- DataTables -->
    <!--<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>-->
    <!--<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>-->
    <!--<script src="https://cdn.datatables.net/scroller/1.4.3/js/dataTables.scroller.min.js"></script>-->
    <!--<script src="https://cdn.datatables.net/fixedcolumns/3.2.3/js/dataTables.fixedColumns.min.js"></script>-->
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable( {
                "scrollX": true,
                "scrollY": "300px",
                "scrollCollapse": true,
                "paging": false,
                "fixedColumns": true
            } );
        });
    </script>
@stop
