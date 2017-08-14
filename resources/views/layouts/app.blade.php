<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="{{asset('img/logo-fav.png')}}">
        <title>Sistema</title>
        <link rel="stylesheet" type="text/css" href="{{asset('lib/perfect-scrollbar/css/perfect-scrollbar.min.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{asset('lib/material-design-icons/css/material-design-iconic-font.min.css')}}"/><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="{{asset('lib/jquery.vectormap/jquery-jvectormap-1.2.2.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{asset('lib/jqvmap/jqvmap.min.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{asset('lib/datetimepicker/css/bootstrap-datetimepicker.min.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{asset('lib/datatables/css/dataTables.bootstrap.min.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{asset('lib/dropzone/dist/dropzone.css')}}"/>
        <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css"/>
    </head>
    <body>
        @if (Auth::guest())

        @else
        <div class="be-wrapper be-fixed-sidebar">
            <nav class="navbar navbar-default navbar-fixed-top be-top-header">
                <div class="container-fluid">
                    <div class="navbar-header"><a href="{{ url('/painel') }}" class="navbar-brand"></a></div>
                    <div class="be-right-navbar">
                        <ul class="nav navbar-nav navbar-right be-user-nav">
                            <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"><img src="{{asset('img/avatar.png')}}" alt="Avatar"><span class="user-name">{{ Auth::user()->name }}</span></a>
                                <ul role="menu" class="dropdown-menu">
                                    <li>
                                        <div class="user-info">
                                            <div class="user-name">{{ Auth::user()->name }}</div>
                                            <div class="user-position online">online</div>
                                        </div>
                                    </li>
                                    <li><a href="#"><span class="icon mdi mdi-face"></span> Minha conta</a></li>
                                    <li><a href="#"><span class="icon mdi mdi-settings"></span> Configurações</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><span class="icon mdi mdi-square-right"></span> Sair</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>                  
                    </div>
                </div>
            </nav>

            <div class="be-left-sidebar">
                <div class="left-sidebar-wrapper"><a href="#" class="left-sidebar-toggle">Menu</a>
                    <div class="left-sidebar-spacer">
                        <div class="left-sidebar-scroll">
                            <div class="left-sidebar-content">
                                <ul class="sidebar-elements">
                                    <li class="divider">Menu</li>
                                    <li class="active"><a href="{{ url('/painel') }}"><i class="icon mdi mdi-home"></i><span>Home</span></a>
                                    </li>
                                    <li class="parent"><a href="#"><i class="icon mdi mdi-plus"></i><span>Cadastro</span></a>
                                        <ul class="sub-menu">
                                            <li><a href="{{ url('/cliente/adicionar') }}">Cliente</a>
                                            </li>
                                            <li><a href="{{ url('/fornecedor/adicionar') }}">Fornecedor</a>
                                            </li>
                                            <li><a href="{{ url('/categoria/adicionar') }}">Categoria</a>
                                            </li>
                                            <li><a href="{{ url('/subcategoria/adicionar') }}">Subcategoria</a>
                                            </li>
                                            <li><a href="{{ url('/produto/adicionar') }}">Produto</a>
                                            </li>
                                            <li><a href="{{ url('/marca/adicionar') }}">Marca</a>
                                            </li>                       
                                        </ul>
                                    </li>
                                    <li class="parent"><a href="#"><i class="icon mdi mdi-search"></i><span>Consulta</span></a>
                                        <ul class="sub-menu">
                                            <li><a href="{{ url('/cliente/listar') }}">Cliente</a>
                                            </li>
                                            <li><a href="{{ url('/fornecedor/listar') }}">Fornecedor</a>
                                            </li>
                                            <li><a href="{{ url('/categoria/listar') }}">Categoria</a>
                                            </li>
                                            <li><a href="{{ url('/subcategoria/listar') }}">Subcategoria</a>
                                            </li>
                                            <li><a href="{{ url('/produto/listar') }}">Produto</a>
                                            </li>
                                            <li><a href="{{ url('/marca/listar') }}">Marca</a>
                                            </li>   
                                        </ul>
                                    </li>
                                    <li class="parent"><a href="#"><i class="icon mdi mdi-refresh-sync"></i><span>Movimentação</span></a>
                                        <ul class="sub-menu">
                                            <li><a href="#">Compra</a>
                                            </li>
                                            <li><a href="#">Orçamento</a>
                                            </li>     
                                            <li><a href="#">Venda</a>
                                            </li>                   
                                        </ul>
                                    </li>
                                    <li class="parent"><a href="#"><i class="icon mdi mdi-chart"></i><span>Relatório</span></a>
                                        <ul class="sub-menu">
                                            <li><a href="#">Cliente</a>
                                            </li>
                                            <li><a href="#">Fornecedor</a>
                                            </li>
                                            <li><a href="#">Tipo de Produto</a>
                                            </li>
                                            <li><a href="#">Produto</a>
                                            </li>
                                            <li><a href="#">Marca</a>
                                            </li>
                                            <li><a href="#">Compra</a>
                                            </li>
                                            <li><a href="#">Orçamento</a>
                                            </li>     
                                            <li><a href="#">Venda</a>
                                        </ul>
                                    </li> 
                                </ul>
                            </div>
                        </div>
                    </div>          
                </div>
            </div>
            @endif
            @yield('content')     
        </div>
        <script src="{{asset('lib/jquery/jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/main.js')}}" type="text/javascript"></script>
        <script src="{{asset('lib/bootstrap/dist/js/bootstrap.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('lib/jquery-flot/jquery.flot.js')}}" type="text/javascript"></script>
        <script src="{{asset('lib/jquery-flot/jquery.flot.pie.js')}}" type="text/javascript"></script>
        <script src="{{asset('lib/jquery-flot/jquery.flot.resize.js')}}" type="text/javascript"></script>
        <script src="{{asset('lib/jquery-flot/plugins/jquery.flot.orderBars.js')}}" type="text/javascript"></script>
        <script src="{{asset('lib/jquery-flot/plugins/curvedLines.js')}}" type="text/javascript"></script>
        <script src="{{asset('lib/jquery.sparkline/jquery.sparkline.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('lib/countup/countUp.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('lib/jquery-ui/jquery-ui.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('lib/jqvmap/jquery.vmap.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('lib/jqvmap/maps/jquery.vmap.world.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/app-dashboard.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/dropdown.js')}}" type="text/javascript"></script>
        <script src="{{asset('lib/jquery.maskedinput/jquery.maskedinput.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('lib/datatables/js/jquery.dataTables.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('lib/datatables/js/dataTables.bootstrap.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('lib/datatables/plugins/buttons/js/dataTables.buttons.js')}}" type="text/javascript"></script>
        <script src="{{asset('lib/datatables/plugins/buttons/js/buttons.html5.js')}}" type="text/javascript"></script>
        <script src="{{asset('lib/datatables/plugins/buttons/js/buttons.flash.js')}}" type="text/javascript"></script>
        <script src="{{asset('lib/datatables/plugins/buttons/js/buttons.print.js')}}" type="text/javascript"></script>
        <script src="{{asset('lib/datatables/plugins/buttons/js/buttons.colVis.js')}}" type="text/javascript"></script>
        <script src="{{asset('lib/datatables/plugins/buttons/js/buttons.bootstrap.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/app-tables-datatables.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/app-form-masks.js')}}" type="text/javascript"></script>
        <script src="{{asset('lib/dropzone/dist/dropzone.js')}}" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                //initialize the javascript
                App.init();
                App.dataTables();
                App.masks();
                App.dashboard();
            });
        </script>
        <script>
            window.setTimeout(function () {
                $(".alert-success").fadeTo(300, 0).slideUp(300, function () {
                    $(this).remove();
                });
            }, 3000);            
        </script>
    <!-- Adicionando Javascript -->
    <script type="text/javascript" >

        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#ibge").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");
                        $("#ibge").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });

    </script>
    </body>
</html>