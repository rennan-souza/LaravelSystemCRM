@if (count($products) > 0)
    <div class="card">
        <div class="table-responsive">
            <table class="table table-borderless table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Foto</th>
                        <th>Nome</th>
                        <th>Qtd</th>
                        <th>Categoria</th>
                        <th>Preço</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $p)
                        <tr>
                            <td>{{ $p->id }}</td>
                            <td>
                                <img src="{{ asset('http://localhost:8000/assets/productsImages/' . $p->image) }}"
                                    alt="Foto" width="50">
                            </td>
                            <td>{{ $p->name }}</td>
                            <td>{{ $p->amount }}</td>
                            <td>
                                <span class="badge badge-info">{{ $p->category->name }}</span>
                            </td>
                            <td>{{ 'R$ ' . number_format($p->price, 2, ',', '.') }}</td>
                            <td>
                                <a href="{{ url('/produtos/editar', ['id' => $p->id]) }}"
                                    class="btn btn-sm btn-primary shadow-none"><i class="fas fa-pen-alt"></i></a>
                                <a href="{{ url('/produtos/excluir', ['id' => $p->id]) }}"
                                    class="btn btn-sm btn-danger shadow-none"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <!--
    <div class="mt-2">
        <nav>
            <ul class="pagination justify-content-center pagination-sm">
                @for ($i = 0; $i < $products->lastPage(); $i++)
                    <li class="page-item {{ $products->currentPage() == $i + 1 ? 'active' : '' }}">
                        <a class="page-link btn-pagination shadow-none" href="{{ $products->url($i + 1) }}">{{ $i + 1 }}</a>
                    </li>
                @endfor
            </ul>
        </nav>
    </div>
    -->

    <div class="text-center my-2">
        <a href="{{ $products->url(1) }}"
            class="btn btn-sm btn-primary btn-pagination shadow-none {{ $products->currentPage() == 1 ? ' disabled' : '' }}">
            <i class="fas fa-angle-double-left"></i>
        </a>
        <a href="{{ $products->previousPageUrl() }}"
            class="btn btn-sm btn-primary btn-pagination shadow-none {{ $products->currentPage() == 1 ? ' disabled' : '' }}">
            <i class="fas fa-angle-left"></i>
        </a>
        <a href="{{ $products->nextPageUrl() }}"
            class="btn btn-sm btn-primary btn-pagination shadow-none {{ $products->currentPage() == $products->lastPage() ? ' disabled' : '' }}">
            <i class="fas fa-angle-right"></i>
        </a>
        <a href="{{ $products->url($products->lastPage()) }}"
            class="btn btn-sm btn-primary btn-pagination shadow-none {{ $products->currentPage() == $products->lastPage() ? ' disabled' : '' }}">
            <i class="fas fa-angle-double-right"></i>
        </a>
        <br>
        <small>Página {{ $products->currentPage() }} de {{ $products->lastPage() }}</small>
    </div>
@else
    <div class="text-center py-5">
        <h4>Nenhum resultado encontrado</h4>
    </div>
@endif
