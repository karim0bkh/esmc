@extends('layouts.app')
@section('content')
    <style>
        body {
            background-color: #fbfbfb;
        }
        @media (min-width: 991.98px) {
            main {
                padding-left: 240px;
            }
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 55px;
            bottom: 0;
            left: 0;
            padding: 58px 0 0; /* Height of navbar */
            box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
            width: 240px;
            z-index: 600;
        }

        @media (max-width: 991.98px) {
            .sidebar {
                width: 100%;
            }
        }
        .sidebar .active {
            border-radius: 5px;
            box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
        }

        .sidebar-sticky {
            position: relative;
            top: 0;
            height: calc(100vh - 48px);
            padding-top: 0.5rem;
            overflow-x: hidden;
            overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
        }
    </style>
    <div class="container">
            @yield('cont')
    </div>
    <!--Main Navigation-->
    <header>
        <!-- Sidebar -->
        <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
            <div class="position-sticky">
                <div class="list-group list-group-flush mx-3 mt-4">
                    @if (Route::is('admin'))

                    <a
                        href="/admin"
                        class="list-group-item list-group-item-action py-2 ripple active"
                        aria-current="true"
                    >
                        <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Main dashboard</span>
                    </a>
                    @else
                        <a
                            href="/admin"
                            class="list-group-item list-group-item-action py-2 ripple "
                            aria-current="true"
                        >
                            <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Main dashboard</span>
                        </a>
                    @endif
                        @if (Route::is('addmission'))

                            <a href="/addmission" class="list-group-item list-group-item-action py-2 ripple active">
                                <i class="fas fa-chart-area fa-fw me-3"></i><span>Bureau Addmission</span>
                            </a>


                        @else

                            <a href="/addmission" class="list-group-item list-group-item-action py-2 ripple ">
                                <i class="fas fa-chart-area fa-fw me-3"></i><span>Bureau Addmission</span>
                            </a>


                        @endif
                        @if (Route::is('list'))
                            <a href="/list-users" class="list-group-item list-group-item-action py-2 ripple active"
                            ><i class="fas fa-lock fa-fw me-3"></i><span>liste users</span></a>


                        @else
                            <a href="/list-users" class="list-group-item list-group-item-action py-2 ripple"
                            ><i class="fas fa-lock fa-fw me-3"></i><span>liste users</span></a>


                        @endif
                        @if (Route::is('formations_show2'))

                            <a href="/formations/list" class="list-group-item list-group-item-action py-2 ripple active">
                                <i class="fas fa-chart-pie fa-fw me-3"></i><span>liste formations</span>
                            </a>

                        @else

                            <a href="/formations/list" class="list-group-item list-group-item-action py-2 ripple">
                                <i class="fas fa-chart-pie fa-fw me-3"></i><span>liste formations</span>
                            </a>

                        @endif
                        @if (Route::is('diplomes_show'))

                            <a href="/diplomes/list" class="list-group-item list-group-item-action py-2 ripple active">
                                <i class="fas fa-chart-pie fa-fw me-3"></i><span>liste diplomes</span>
                            </a>

                        @else

                            <a href="/diplomes/list" class="list-group-item list-group-item-action py-2 ripple">
                                <i class="fas fa-chart-pie fa-fw me-3"></i><span>liste diplomes</span>
                            </a>

                        @endif
                        @if (Route::is('formations_new'))

                            <a href="/formations/new" class="list-group-item list-group-item-action py-2 ripple active"
                            ><i class="fas fa-chart-line fa-fw me-3"></i><span>ajouter formations</span></a>

                        @else
                            <a href="/formations/new" class="list-group-item list-group-item-action py-2 ripple"
                            ><i class="fas fa-chart-line fa-fw me-3"></i><span>ajouter formations</span></a>


                        @endif
                        @if (Route::is('diplomes_new'))

                            <a href="/diplomes/new" class="list-group-item list-group-item-action py-2 ripple active"
                            ><i class="fas fa-chart-line fa-fw me-3"></i><span>ajouter diplomes</span></a>

                        @else
                            <a href="/diplomes/new" class="list-group-item list-group-item-action py-2 ripple"
                            ><i class="fas fa-chart-line fa-fw me-3"></i><span>ajouter diplomes</span></a>


                        @endif
                        @if (Route::is('list_accepter'))
                            <a href="/accepter" class="list-group-item list-group-item-action py-2 ripple active"
                            ><i class="fas fa-chart-bar fa-fw me-3"></i><span>liste accepter</span></a>


                        @else
                            <a href="/accepter" class="list-group-item list-group-item-action py-2 ripple"
                            ><i class="fas fa-chart-bar fa-fw me-3"></i><span>liste accepter</span></a>
                        @endif

                        @if (Route::is('list_refuser'))
                            <a href="/list/refuser" class="list-group-item list-group-item-action py-2 ripple active"
                            ><i class="fas fa-chart-bar fa-fw me-3"></i><span>liste refuser</span></a>


                        @else
                            <a href="/refuser" class="list-group-item list-group-item-action py-2 ripple "
                            ><i class="fas fa-chart-bar fa-fw me-3"></i><span>liste refuser</span></a>


                        @endif
                        @if (Route::is('front_view2'))
                            <a href="/front_page/view" class="list-group-item list-group-item-action py-2 ripple active"
                            ><i class="fas fa-chart-bar fa-fw me-3"></i><span>view front</span></a>


                        @else
                            <a href="/front_page/view" class="list-group-item list-group-item-action py-2 ripple"
                            ><i class="fas fa-chart-bar fa-fw me-3"></i><span>view front</span></a>


                        @endif
                        @if (Route::is('front_view'))
                            <a href="/front_page" class="list-group-item list-group-item-action py-2 ripple active"
                            ><i class="fas fa-calendar fa-fw me-3"></i><span>Front page</span></a>


                        @else
                            <a href="/front_page" class="list-group-item list-group-item-action py-2 ripple"
                            ><i class="fas fa-calendar fa-fw me-3"></i><span>front page</span></a>


                        @endif

                </div>
            </div>
        </nav>
        <!-- Sidebar -->

    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main style="margin-top: 58px;">
        <div class="container pt-4">
            @yield('page')
        </div>
    </main>
    <!--Main layout-->
@endsection
