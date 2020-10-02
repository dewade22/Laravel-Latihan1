@extends('layouts.custom')

@section('title')
Dashboard
@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
@endpush

@section('content')
<div class="animated fadein">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <strong class=card-title>Data Stock</strong>
                </div>
                <div class="card-body">
                    <table id="tabel_MatAlkohol" class="table table-bordered" style=font-size:20px>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Item No</th>
                                <th>Description</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <strong class=card-title>Data Stock</strong>
                </div>
                <div class="card-body">
                    <table id="tabel_Summary" class="table table-bordered" style=font-size:20px>
                        <thead>
                            <tr>
                                <th id="month"></th>
                                <th colspan="2">Stock</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </dv>
    </div>
</div>

@endsection

@push('script')
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.js"></script>
<script>
    (function($){
       var s = $('#tabel_MatAlkohol').DataTable({
            //"scrollX" : true,
            "processing" : true,
            "serverSide" : true,
            "responsive" : true,
            
            "ajax" : {
                url:"{{ route('ledger.index') }}",
                type: "GET",
            },
            "columns":[
                {data: 'DT_RowIndex', name:'DT_RowIndex', searchable: false},
                {data: 'ItemNo', name:'I.ItemNo', searchable:true },
                {data: 'Description', name:'ILE.Description', searchable:true },
                {data: 'qty', name:'qty', searchable:false },
            ],
            "order":[[1, 'desc']],

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
        setInterval(function() {
            s.ajax.reload();
        }, 60000);       
    })(jQuery);
</script>
@endpush