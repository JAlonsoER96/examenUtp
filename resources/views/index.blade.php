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
                                    <h3>Clientes</h3>
                                    <button class="btn btn-info btn-sm"><i class="fa fa-plus" aria-hidden="true" data-toggle="modal" data-target=".bd-example-modal-lg"></i></button>
                                    <button class="btn btn-danger btn-sm"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></button>
                                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target=".modalExcel"><i class="fa fa-file-excel-o" aria-hidden="true"></i></button>
                                </div>
                                <div class="x_content">
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table id="yajra" class="table table-striped table-wrapper-scroll-x ">
                                                <thead>
                                                    <tr>
                                                        <th>Nombre</th>
                                                        <th>Fecha nacimiento</th>
                                                        <th>Correo electrónico</th>
                                                        <th>Genero</th>
                                                        <th>Teléfono</th>
                                                        <th>Celular</th>
                                                        <th>Empresa</th>
                                                        <th>Rol</th>
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
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" id="nuevoUser" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Crear usuario</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                  <form action="">
                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                        <div class="col-sm-12 col-lg-4 col-md-4">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Nombre:</label>
                                                <input type="text" name="name" class="form-control" id="name">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-4 col-md-4">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Fecha nacimiento:</label>
                                                <input type="date" name="birthday" class="form-control" id="birthday">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-4 col-md-4">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">E-mail:</label>
                                                <input type="text" name="email" class="form-control" id="email">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-4 col-md-4">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Teléfono:</label>
                                                <input type="text" name="phone" class="form-control" id="phone">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-4 col-md-4">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Celular:</label>
                                                <input type="text" name="cellphone" class="form-control" id="cellphone">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-4 col-md-4">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Password:</label>
                                                <input type="password" name="password" class="form-control" id="password" autocomplete="false">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-4 col-md-4">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Empresa</label>
                                                <select name="empresa" class="form-control" id="empresa">
                                                    <option value="" selected disabled>Selecciona Empresa</option>
                                                    @foreach ($empresas as $empresa)
                                                        <option value="{{$empresa->id}}">{{$empresa->nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-4 col-md-4">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Rol</label>
                                                <select name="rol" class="form-control" id="rol">
                                                    <option value="" selected disabled>Selecciona Rol</option>
                                                    @foreach ($roles as $role)
                                                        <option value="{{$role->name}}">{{$role->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-lg-4 col-md-4">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Genero:</label><br>
                                                <input type="radio" name="genere" value="H">H
                                                <input type="radio" name="genere" value="M">M
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Permisos:</label><br>
                                                @foreach ($permisos as $permiso)
                                                    <input type="checkbox"  name="permisos[]" value="{{$permiso->name}}">{{$permiso->name}}<br>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <p>
                                        <button class="btn btn-info btn-sm" id="enviarDatos">Guardar</button>
                                    </p>
                                  </form>
                              </div>
                          </div>
                        </div>
                    </div>
                    <div class="modal fade modalExcel" tabindex="-1" id="nuevoUser" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Exportar excel</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                  <form action="{{ route('usuarios.excel') }}" method="POST" enctype="multipart/form-data">
                                      @csrf
                                      <div class="col-sm-12 col-lg-4 col-md-4">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Empresa</label>
                                                <select name="empresa" class="form-control" id="empresa">
                                                    <option value="" selected disabled>Selecciona Empresa</option>
                                                    @foreach ($empresas as $empresa)
                                                        <option value="{{$empresa->id}}">{{$empresa->nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <button class="btn btn-info btn-sm" >Exportar</button>
                                            </div>
                                        </div>
                                    </div>
                                  </form>
                              </div>
                          </div>
                        </div>
                    </div>
                    <div id="edit">

                    </div>
                </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        getClientes();

        //Enviar datos formulario
        $('#enviarDatos').click(function(e){
            //Permisos seleccionados
            permisos = []
            e.preventDefault();
            let name = $('#name').val()
            let birthday = $('#birthday').val()
            let email = $('#email').val()
            let phone = $('#phone').val()
            let cellphone = $('#phone').val()
            let genere = $('input:radio[name=genere]:checked').val()
            let password = $('#password').val()
            let empresa_id = $('#empresa option:selected').val()
            let rol = $('#rol option:selected').val()

            $("input[name='permisos[]']:checked").each(function (){
                permisos.push($(this).val())
            })
            $.ajax({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{route('usuarios.save')}}',
                datatType: 'json',
                type: 'POST',
                data: {
                    'name': name,
                    'birthday': birthday,
                    'email': email,
                    'phone': phone,
                    'cellphone': cellphone,
                    'genere': genere,
                    'password': password,
                    'empresa_id': empresa_id,
                    'rol': rol,
                    'permisos': permisos
                },
                success: function(response){
                    let listaErrores = '';
                    if (response.errors.length >0) {
                        response.errors.forEach(element => {
                            listaErrores = listaErrores+'<li>'+element+'</li>'
                        });
                        Swal.fire({
                            type: 'warning',
                            title: 'Datos incompletos',
                            confirmButtonText: 'Entendido',
                            html: '<ul>'+ listaErrores+'</ul>',
                            footer: '',
                            showCloseButton: true
                        })
                    } else if(response.usuario.length>0) {
                        getClientes()
                        $('#name').val("")
                        $('#birthday').val("")
                        $('#email').val("")
                        $('#phone').val("")
                        $('#phone').val("")
                        $('input:radio[name=genere]:checked').prop('checked',false)
                        $('#password').val("")
                        $("input[name='permisos[]']:checked").each(function (){
                            $(this).prop('checked',false)
                        })
                        Swal.fire({
                            icon: 'info',
                            type: 'info',
                            title: 'Usuario Creado',
                            confirmButtonText: 'Entendido',
                            html: '<p>Se creo el usuario: <b>'+ response.usuario[0].name+'</b></p>',
                            footer: '',
                            showCloseButton: true
                        })
                        $('#nuevoUser').modal('hide')
                    }
                }
            })

        })

        //Mostrar usuario
        $("body").on("click", ".editarUsuario", function() {
            let id = $(this).data("id")
            $.ajax({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{ route('usuarios.show') }}'+'/'+id,
                datatType : 'json',
                type: 'GET',
                success: function(response){
                    $("#edit").empty();
                    $('#edit').append(response);
                    $('#editModal').modal('show')
                }
            })
        })

        //Edición Del usuario
        $("body").on("click", "#enviarDatosEdit", function(e) {
            e.preventDefault()
            permisosActivos = []
            permisosNoActivos = [];
            let id = $('#user_id').val()
            let name = $('#nameEdit').val()
            let birthday = $('#birthdayEdit').val()
            let email = $('#emailEdit').val()
            let phone = $('#phoneEdit').val()
            let cellphone = $('#cellphoneEdit').val()
            let genere = $('input:radio[name=genereEdit]:checked').val()
            let password = $('#passwordEdit').val()
            let empresa_id = $('#empresaEdit option:selected').val()
            let rol = $('#rolEdit option:selected').val()
            $("input[name='permisosEdit[]']").each(function (){
                if($(this).prop('checked')){
                    permisosActivos.push($(this).val())
                }else{
                    permisosNoActivos.push($(this).val())
                }
            })
            $.ajax({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{route('usuarios.edit')}}' + '/'+id,
                datatType: 'json',
                type: 'PUT',
                data: {
                    'name': name,
                    'birthday': birthday,
                    'email': email,
                    'phone': phone,
                    'cellphone': cellphone,
                    'genere': genere,
                    'password': password,
                    'empresa_id': empresa_id,
                    'rol': rol,
                    'permisosActivos':permisosActivos,
                    'permisosNoActivos':permisosNoActivos
                },
                success:function(response){
                    let listaErrores = '';
                    if (response.errors.length >0) {
                        response.errors.forEach(element => {
                            listaErrores = listaErrores+'<li>'+element+'</li>'
                        });
                        Swal.fire({
                            type: 'warning',
                            title: 'Datos incompletos',
                            confirmButtonText: 'Entendido',
                            html: '<ul>'+ listaErrores+'</ul>',
                            footer: '',
                            showCloseButton: true
                        })
                    } else if(response.usuario.length>0) {
                        getClientes()
                        $('#editModal').modal('hide')

                        Swal.fire({
                            type: 'info',
                            title: 'Datos Modificados',
                            confirmButtonText: 'Entendido',
                            html: '<b>Se modificaron los datos del usuario</b>',
                            footer: '',
                            showCloseButton: true
                        })
                    }
                }
            })
        })

        //Bloquear
        $("body").on("click", ".softDelete", function(e) {
            e.preventDefault()
            let id = $(this).data("id")
            const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
                buttonsStyling: false
            })
            swalWithBootstrapButtons.fire({
                title: 'Bloquear usuario',
                text: "¿Está seguro que desea bloquear al usuario seleccionado?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, continuar',
                cancelButtonText: 'No, cancelar',
                reverseButtons: true
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                    headers:{
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: '{{ route('usuarios.bloqueo') }}',
                        type: 'POST',
                        datatType : 'json',
                        data: {
                            'id':id,
                        },
                        success:function(response){
                            if(response){
                                Swal.fire({
                                    type: 'info',
                                    title: 'Usuario Bloqueado',
                                    confirmButtonText: 'Entendido',
                                    html: '<b>Se bloqueo el usuario seleccionado</b>',
                                    footer: '',
                                    showCloseButton: true
                                })
                                getClientes()
                            }else{
                                Swal.fire({
                                    type: 'info',
                                    title: 'Usuario no loqueado',
                                    confirmButtonText: 'Entendido',
                                    html: '<b>No se bloqueo el usuario seleccionado</b>',
                                    footer: '',
                                    showCloseButton: true
                                })
                            }
                        }
                    })
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                    'Operación cancelada',
                    'Los datos no fueron modificados',
                    'error'
                    )
                }
            })
            /**/
        })

        //Desbloquear
        $("body").on("click", ".restore", function(e) {
            e.preventDefault()
            let id = $(this).data("id")
            const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
                buttonsStyling: false
            })
            swalWithBootstrapButtons.fire({
                title: 'Desbloquear usuario',
                text: "¿Está seguro que desea desbloquear al usuario seleccionado?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, continuar',
                cancelButtonText: 'No, cancelar',
                reverseButtons: true
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                    headers:{
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: '{{ route('usuarios.restore') }}',
                        type: 'POST',
                        datatType : 'json',
                        data: {
                            'id':id,
                        },
                        success:function(response){
                            console.log(response)
                            if(response){
                                Swal.fire({
                                    type: 'info',
                                    title: 'Usuario Desbloqueado',
                                    confirmButtonText: 'Entendido',
                                    html: '<b>Se desbloqueo el usuario seleccionado</b>',
                                    footer: '',
                                    showCloseButton: true
                                })
                                getClientes()
                            }else{
                                Swal.fire({
                                    type: 'info',
                                    title: 'Usuario no desbloqueado',
                                    confirmButtonText: 'Entendido',
                                    html: '<b>No se desbloqueo el usuario seleccionado</b>',
                                    footer: '',
                                    showCloseButton: true
                                })
                            }
                        }
                    })
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                    'Operación cancelada',
                    'Los datos no fueron modificados',
                    'error'
                    )
                }
            })
            /**/
        })
    })

    function getClientes(){
        $.ajax({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{ route('usuarios.all') }}',
                datatType : 'json',
                type: 'GET',
                success: function(response){
                    console.log(response)
                    let t = $('#yajra').DataTable();
                    t.rows().remove().draw(false);

                    response.usuarios.forEach(usuario => {
                        if(usuario.deleted_at == null){
                            botonAccion = '<a  data-id="'+usuario.id+'" class="softDelete"><button class="btn btn-danger btn-sm"><i class="fa fa-minus" aria-hidden="true"></i></button></a>'
                        }else{
                            botonAccion ='<a  data-id="'+usuario.id+'" class="restore"><button class="btn btn-success btn-sm"><i class="fa fa-check" aria-hidden="true"></i></button></a>'
                        }
                        t.row.add([
                            usuario.name,
                            usuario.birthday,
                            usuario.email,
                            usuario.genere,
                            usuario.phone,
                            usuario.cellphone,
                            usuario.empresa.nombre,
                            usuario.roles[0].name,
                            '<a  data-id="'+usuario.id+'" class="editarUsuario"><button class="btn btn-info btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>'+
                            botonAccion
                        ]).draw(false);
                    });
                }
        })
    }
</script>
@endsection
