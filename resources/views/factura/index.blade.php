@extends('layouts.layout')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div><span style="color: red;"><b>{{$error}}</b></span></div>
                                    @endforeach
                                @endif
                                <div class="title_left">
                                    <h3>Facturas</h3>
                                </div>
                                <div class="x_content">
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table id="yajra" class="table table-striped table-wrapper-scroll-x ">
                                                <thead>
                                                    <tr>
                                                        <th>Factura</th>
                                                        <th>Fecha emisión</th>
                                                        <th>Tipo factura</th>
                                                        <th>Status</th>
                                                        <th>Cliente</th>
                                                        <th>Total</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        getData();
        /*$("body").on("click", ".buscarFactura", function() {
            $("#datosIncidencia").html("");
            var id = $(this).attr("data-id");
            let ruta = '{{ route('facturas.descarga') }}';
            $.ajax({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{ route('facturas.descarga') }};',
                type:'POST',
                data: {
                    'id':id
                },
                success: function (response) {
                 console.log(response)
                }
            })
        });*/
    })
    function getData(){
        let rutaDescarga = '{{ route('facturas.descarga') }}';
        let rutaEnvio = '{{ route('facturas.envio') }}'
        $.ajax({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '{{ route('facturas.list') }}',
            datatType : 'json',
            type: 'GET',
            success: function(response){
                let facturas = response.facturas
                if (facturas.length >0) {
                    let t = $('#yajra').DataTable();
                    t.rows().remove().draw(false);
                    facturas.forEach(factura => {
                        let status = factura.status == "valid" ? 'Activa':'Cancelada'
                        if (factura.type == "I") {
                            tipo = "INGRESO"
                        } else if(factura.type == "E"){
                            tipo = "EGRESO"
                        }else{
                            tipo = 'PAGO'
                        }

                        t.row.add([
                            factura.series+'-'+factura.folio_number,
                            factura.stamp.date,
                            tipo,
                            status,
                            factura.customer.legal_name,
                            "$ "+factura.total,
                            '<a href="'+rutaDescarga+'/'+factura.id+'" target="_blank"><button class="btn btn-sm btn-danger"><i class="fa fa-download" aria-hidden="true"></i></button></a>'+
                            '<a href="'+rutaEnvio+'/'+factura.id+'"><button class="btn btn-sm btn-success"><i class="fa fa-envelope" aria-hidden="true"></button></i></a>'
                        ]).draw(false);
                    });
                }
            }
        })
    }

</script>
@endsection
