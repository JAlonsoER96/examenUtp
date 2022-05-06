<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Examen UTP</title>
    {{-- <link href="{{ asset('icon/favicon.ico') }}" rel="favicon" > --}}
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/w3.css') }}" rel="stylesheet">
    <link href="https://www.w3schools.com/lib/w3-colors-metro.css">
    {{-- <link href="{{ asset('css/bootstrap-theme.min.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/nprogress.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/green.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/bootstrap-progressbar-3.3.4.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/custom.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/maniobra.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/signin.css') }}" rel="stylesheet">

    {{-- <script src="{{ asset('js/jquery-1.9.1.js') }}"></script> --}}
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="{{ asset('js/jquery.autocomplete.js') }}"></script>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/i18n/es.js"></script>
</head>

<body class="nav-md">
    <!-- <div id = "preloaders" class = "preloader"> </div> -->
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col leftMenu">
                <div class="left_col scroll-view">

                    <div class="clearfix"></div>

                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <h2><a class="homeBtn" href="{{ route('home') }}"><i class="fa fa-home"
                                        aria-hidden="true"></i></a> {{ Auth::user()->name }}</h2>
                            <span>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out" aria-hidden="true"></i> Cerrar Sesión
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </span>
                        </div>
                    </div>

                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        @role('admin')
                        <div class="menu_section">
                            <h3>Administración</h3>
                            <ul class="nav side-menu">

                                <li><a
                                    href="{{ route('usuarios.index') }}">Usuarios</a>
                                </li>
                            </ul>
                        </div>
                        @endrole
                        @if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('Compras') || Auth::user()->hasRole('Supervisor Compras'))
                        <div class="menu_section">
                            <h3>Ordenes de Compra</h3>
                            <ul class="nav side-menu">
                                @if (Auth::user()->can('compras'))
                                    <li><a
                                        href="">Crear Orden</a>
                                    </li>
                                @endif
                                @if (Auth::user()->can('reporte compras'))
                                    <li><a
                                        href="">Reporte Ordenes de Compra</a>
                                    </li>
                                @endif

                                {{-- <li><a href="{{route('abandonos.index')}}" class="mainmenu-item"><i class="fa fa-window-close-o"></i> Abandono</a></li> --}}
                            </ul>
                        </div>
                        @endif
                        @if (Auth::user()->can('admin') || Auth::user()->hasRole('Ventas') || Auth::user()->hasRole('Supervisor Ventas'))
                        <div class="menu_section">
                            <h3>Ventas</h3>
                            <ul class="nav side-menu">

                                @if (Auth::user()->can('ventas'))
                                    <li><a
                                        href="">Nueva Venta</a>
                                    </li>
                                @endif
                                @if (Auth::user()->can('reporte ventas'))
                                    <li><a
                                        href="">Reporte Ventas</a>
                                    </li>
                                @endif
                                {{-- <li><a href="{{route('abandonos.index')}}" class="mainmenu-item"><i class="fa fa-window-close-o"></i> Abandono</a></li> --}}
                            </ul>
                        </div>
                        @endif
                        <div class="menu_section">
                            <h3>Facturas</h3>
                            <ul class="nav side-menu">

                                <li><a
                                    href="{{ route('facturas.index') }}">Facturas</a>
                                </li>
                                {{-- <li><a href="{{route('abandonos.index')}}" class="mainmenu-item"><i class="fa fa-window-close-o"></i> Abandono</a></li> --}}
                            </ul>
                        </div>

                    </div><!-- Fin Menu -->
                </div>
            </div>
            <div class="top_nav">
                <div class="nav_menu">
                    <nav>
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>
                    </nav>
                </div>
            </div>
            @yield('content')
            <div class="row">
                <footer>
                    <div class="clearfix"></div>
                </footer>
                {{-- </div> --}}
            </div>
        </div>


        {{-- <link href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css" rel="stylesheet"> --}}
        {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> --}}

        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        {{-- <script src="{{ asset('js/fastclick.js') }}"></script> --}}
        {{-- <script src="{{ asset('js/nprogress.js') }}"></script> --}}
        {{-- <script src="{{ asset('js/Chart.min.js') }}"></script>
        <script src="{{ asset('js/gauge.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap-progressbar.min.js') }}"></script> --}}
        <script src="{{ asset('js/icheck.min.js') }}"></script>
        {{-- <script src="{{ asset('js/skycons.js') }}"></script> --}}
        <script src="{{ asset('js/date.js') }}"></script>
        <script src="{{ asset('js/moment.min.js') }}"></script>
        <script src="{{ asset('js/daterangepicker.js') }}"></script>
        <script src="{{ asset('js/custom.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
        <script src="{{ asset('js/jquery.inputmask.bundle.min.js') }}"></script>
        {{-- <script src="{{ asset('js/maniobra.js') }}"></script> --}}
        <script src="{{ asset('js/jquery.dataTables.js') }}"></script>
        <script src="{{ asset('js/jspdf.min.js') }}"></script>
        <script src="{{ asset('js/html2canvas.js') }}"></script>

        <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
        @yield('scripting')


        <script>
            $(document).ready(inicializar);

            function inicializar() {
                $('#yajra').DataTable({
                    "language": {
                        "url": "{{ asset('js/DataTablesSpanish.json') }}"
                    },
                    "lengthMenu": [
                        [10, 25, 50, 100, -1],
                        [10, 25, 50, 100, "Todas"]
                    ],
                });
                $('#kami').DataTable({
                    "language": {
                        "url": "{{ asset('js/DataTablesSpanish.json') }}",
                    },
                    "lengthMenu": [
                        [10, 25, 50, 100, -1],
                        [10, 25, 50, 100, "Todas"]
                    ],
                    columnDefs: [{
                        orderable: false,
                        className: 'select-checkbox',
                        targets: 0
                    }],
                });
                $('#chris').DataTable({
                    "language": {
                        "url": "{{ asset('js/DataTablesSpanish.json') }}"
                    }
                });
                $("#complementos").DataTable({
                    "language": {
                        "url": "{{ asset('js/DataTablesSpanish.json') }}"
                    }
                })
            }
            $(window).load(function() {
                //$("#preloaders").fadeOut();

                //Redirecciona por inactividad
                setTimeout(function() {
                    Swal.fire({
                        type: 'error',
                        title: 'Lo sentimos!',
                        confirmButtonText: 'Entendido',
                        text: 'Se ha superado el tiempo de inactividad en el sistema.',
                        footer: '',
                        showCloseButton: true
                    }).then(function(result) {
                        //if (result.value) {
                        window.location = "{{ route('login') }}";
                        //}
                    })
                }, 3600000);
            });

            if (window.history.replaceState) { // verificamos disponibilidad
                window.history.replaceState(null, null, window.location.href);
            }
        </script>
</body>

</html>
