                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="#">Perpustakaan Digital</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="#">PD</a>
                    </div>
                    <ul class="sidebar-menu">
                        @section('sidebar')
                            <li class="nav-item {{ request()->routeIs('buku.index') ? 'active' : '' }}">
                                <a href="{{ route('buku.index') }}" class="nav-link"><i
                                        class="bi bi-book-half"></i><span>Buku</span></a>
                            </li>
                            @auth
                                @if (auth()->user()->role == 'admin')
                                    @section('sidebar')
                                        @parent
                                        <li class="nav-item {{ request()->routeIs('kategori.index') ? 'active' : '' }}">
                                            <a href="{{ route('kategori.index') }}" class="nav-link"><i class="bi bi-tags-fill"></i>
                                                <span>Kategori</span></a>
                                        </li>
                                    @endsection
                                @endif
                            @endauth
                        @show
                    </ul>

                    {{-- <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                        <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                            <i class="fas fa-rocket"></i> Documentation
                        </a>
                    </div> --}}
                </aside>
