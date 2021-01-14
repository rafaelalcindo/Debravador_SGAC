
<div class="col-md-2 MenuLateral">
    <nav class="col-md-12 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
            <ul class="nav flex-column">
                <li class="nav-item">
                <a class="nav-link active" href="/">
                    {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg> --}}
                    <i class="fa fa-bar-chart" aria-hidden="true"></i>
                    Dashboard </i> <span class="sr-only">(atual)</span>
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ url('/usuarios') }}">
                    {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg> --}}
                    <i class="fa fa-address-card" aria-hidden="true"></i>
                    Usuários
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ url('/unidades') }}">
                    {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg> --}}
                    <i class="fa fa-users" aria-hidden="true"></i>
                    Unidades
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ url('/ponto-unidades') }}">
                    {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg> --}}
                    <i class="fa fa-money" aria-hidden="true"></i>
                    Pontos de Unidade
                </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/ponto_individuals') }}">
                        {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg> --}}
                        <i class="fa fa-money" aria-hidden="true"></i>
                        Pontos Individuais
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/eventos') }}">

                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        Eventos
                    </a>
                </li>

                <li class="nav-item">
                <a class="nav-link" href="{{ url('/hora_da_entrada') }}">
                    {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg><i class="fa fa-clone" aria-hidden="true"></i> --}}
                    <i class="fa fa-clone" aria-hidden="true"></i>
                    Integrações
                </a>
                </li>
            </ul>

            <!-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>Relatórios salvos</span>
                <a class="d-flex align-items-center text-muted" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                </a>
            </h6> -->
            <!-- <ul class="nav flex-column mb-2">
                <li class="nav-item">
                <a class="nav-link" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                    Neste mês
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                    Último trimestre
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                    Engajamento social
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                    Vendas do final de ano
                </a>
                </li>
            </ul> -->
        </div>
    </nav>

    <!-- <div class="menu_opçoes" >
        <a href="{{ url('/usuarios') }}" style="text-decoration: none;" >
            <div class="escrito" >
                <h5>Desbravador</h5>
            </div>
            <div class="icon d-flex justify-content-center" >
                <img src="{{ asset('assets/icons/form.png') }}" alt="form"  />
            </div>
        </a>
    </div>

    <div class="menu_opçoes" >
        <a href="{{ url('/unidades') }}" style="text-decoration: none;" >
            <div class="escrito" >
                <h5>Unidades</h5>
            </div>
            <div class="icon d-flex justify-content-center" >
                <img src="{{ asset('assets/icons/listar.png') }}" alt="form"  />
            </div>
        </a>
    </div>

    <div class="menu_opçoes" >
        <a href="{{ url('/ponto-unidades') }}" style="text-decoration: none;" >
            <div class="escrito" >
                <h5>Pontos da Unidade</h5>
            </div>
            <div class="icon d-flex justify-content-center" >
                <img src="{{ asset('assets/icons/listar.png') }}" alt="form"  />
            </div>
        </a>
    </div>

    <div class="menu_opçoes" >
        <a href="{{ url('/ponto_individuals') }}" style="text-decoration: none;" >
            <div class="escrito" >
                <h5>Pontos da Desbravador</h5>
            </div>
            <div class="icon d-flex justify-content-center" >
                <img src="{{ asset('assets/icons/listar.png') }}" alt="form"  />
            </div>
        </a>
    </div> -->

</div>


