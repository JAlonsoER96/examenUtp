<div class="modal fade bd-example-modal-lg" tabindex="-1" id="editModal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modificar Usuario</h5>
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
                            <input type="text" name="name" class="form-control" id="nameEdit" value="{{$usuario->name}}">
                        </div>
                        <input type="text" hidden value="{{$usuario->id}}" name="user_id" id="user_id">
                    </div>
                    <div class="col-sm-12 col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Fecha nacimiento:</label>
                            <input type="date" name="birthday" class="form-control" id="birthdayEdit" value="{{$usuario->birthday}}">
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">E-mail:</label>
                            <input type="text" name="email" class="form-control" id="emailEdit" value="{{$usuario->email}}">
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Teléfono:</label>
                            <input type="text" name="phone" class="form-control" id="phoneEdit" value="{{$usuario->phone}}">
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Celular:</label>
                            <input type="text" name="cellphone" class="form-control" id="cellphoneEdit" value="{{$usuario->cellphone}}">
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Password:</label>
                            <input type="password" name="password" class="form-control" id="passwordEdit" autocomplete="false">
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Empresa</label>
                            <select name="empresa" class="form-control" id="empresaEdit">
                                <option value="" selected disabled>Selecciona Empresa</option>
                                @foreach ($empresas as $empresa)
                                @if ($empresa->id == $usuario->empresa_id)
                                    <option value="{{$empresa->id}}" selected>{{$empresa->nombre}}</option>
                                @else
                                    <option value="{{$empresa->id}}">{{$empresa->nombre}}</option>
                                @endif

                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Rol</label>
                            <select name="rol" class="form-control" id="rolEdit">
                                <option value="" selected disabled>Selecciona Rol</option>
                                @foreach ($roles as $role)
                                @if ($role->name == $usuario->roles[0]->name)
                                    <option value="{{$role->name}}" selected>{{$role->name}}</option>
                                @else
                                    <option value="{{$role->name}}">{{$role->name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-12 col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Genero:</label><br>
                            @if ($usuario->genere == "H")
                                <input type="radio" name="genereEdit" value="H" checked>H
                                <input type="radio" name="genereEdit" value="M">M
                            @else
                                <input type="radio" name="genereEdit" value="H">H
                                <input type="radio" name="genereEdit" value="M" checked>M
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-12 col-md-12">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Permisos:</label><br>
                            @foreach ($permisos as $permiso)
                                <input type="checkbox"  name="permisosEdit[]" value="{{$permiso->name}}">{{$permiso->name}}<br>
                            @endforeach
                            @foreach ($usuario->permissions as $permisoUsuario)
                                <input type="checkbox"  name="permisosEdit[]" value="{{$permisoUsuario->name}}" checked>{{$permisoUsuario->name}}<br>
                            @endforeach
                        </div>
                    </div>
                </div>
                <p>
                    <button class="btn btn-info btn-sm" id="enviarDatosEdit">Guardar</button>
                </p>
              </form>
          </div>
      </div>
    </div>
</div>
