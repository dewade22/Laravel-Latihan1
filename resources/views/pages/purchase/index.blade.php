@extends('layouts.app')

@section('title')
Purchase - Index
@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css"> -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"> -->
@endpush

@section('content')
<div class="animated fadein">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class=card-title>Data Purchase</strong>
                </div>
                <div class="card-body">
                    <table id="tabel_Purchases" class="table table-striped table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Vendor Name</th>
                                <th>Vendor Address</th>
                                <th>Department</th>
                                <th>Doc. Date</th>
                                <th>Req. Date</th>
                                <th>Doc. Status</th>
                                <th>Category</th>
                                <th>Product Group</th>
                                <th>Item No</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('script')
<!-- <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> -->
<!-- <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script> -->
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.js"></script>
<script>
    (function($){
       var s = $('#tabel_Purchases').DataTable({
            "scrollX" : true,
            "processing" : true,
            "serverSide" : true,
            
            "ajax" : {
                url:"{{ route('purchases.index') }}",
                type: "GET",
            },
            "columns":[
                {data:'No', name:'PH.No', searchable:true},
                {data:'PaytoName', name:'PH.PaytoName', searchable:true},
                {data:'PaytoAddress', name:'PL.PaytoAddress', searchable:true},
                {data:'PostingGroup', name:'PL.PostingGroup', searchable:true},
                {data:'PostingGroup', name:'PL.PostingGroup', searchable:true},
                {data:'PostingGroup', name:'PL.PostingGroup', searchable:true},
                {data:'PostingGroup', name:'PL.PostingGroup', searchable:true},
                {data:'PostingGroup', name:'PL.PostingGroup', searchable:true},
                {data:'PostingGroup', name:'PL.PostingGroup', searchable:true},
                {data:'PostingGroup', name:'PL.PostingGroup', searchable:true},
                {data:'PostingGroup', name:'PL.PostingGroup', searchable:true},
            ],
            "order":[[0, 'desc']],

            initComplete: function () {
                this.api().columns().every(function () {
                    var column = this;
                    var input = document.createElement("input");
                    $(input).appendTo($(column.footer()).empty()).on('change', function () {
                        column.search($(this).val(), false, false, true).draw();
                    });
                });
            },
        });
        // s.on('column-sizing.dt', function ( e, settings ){
        //     $(".dataTables_scrollHeadInner").css( "width", "100%" );
        // })
        
        // s.one( 'draw', function () {
        //     $('#tabel_Purchases').DataTable({
        //          destroy: true,
        //          "scrollX": true,
        //          "scroller": true,
        //          "stateSave": true,
        //          "autoWidth": true,
        //     });
        // });
        
    })(jQuery);
</script>
@endpush