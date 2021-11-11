@if (count($customers) > 0)
    <div class="card">
        <div class="table-responsive">
            <table class="table table-borderless table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Data de nascimento</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $c)
                        <tr>
                            <td>{{ $c->id }}</td>
                            <td>{{ $c->name }}</td>
                            <td>{{ $c->cpf }}</td>
                            <td>{{ date('d/m/Y', strtotime($c->birth_date)) }}</td>
                            <td>{{ $c->phone, 'BR' }}</td>
                            <td>{{ $c->email }}</td>
                            <td>
                                <a href="{{ url('/clientes/editar', ['id' => $c->id]) }}"
                                    class="btn btn-sm btn-primary shadow-none"><i class="fas fa-pen-alt"></i></a>
                                <a href="{{ url('/clientes/excluir', ['id' => $c->id]) }}"
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
                @for ($i = 0; $i < $customers->lastPage(); $i++)
                    <li class="page-item {{ $customers->currentPage() == $i + 1 ? 'active' : '' }}">
                        <a class="page-link btn-pagination shadow-none" href="{{ $customers->url($i + 1) }}">{{ $i + 1 }}</a>
                    </li>
                @endfor
            </ul>
        </nav>
    </div>
    -->

    <div class="text-center my-2">
        <a href="{{ $customers->url(1) }}"
            class="btn btn-sm btn-primary btn-pagination shadow-none {{ $customers->currentPage() == 1 ? ' disabled' : '' }}">
            <i class="fas fa-angle-double-left"></i>
        </a>
        <a href="{{ $customers->previousPageUrl() }}"
            class="btn btn-sm btn-primary btn-pagination shadow-none {{ $customers->currentPage() == 1 ? ' disabled' : '' }}">
            <i class="fas fa-angle-left"></i>
        </a>
        <a href="{{ $customers->nextPageUrl() }}"
            class="btn btn-sm btn-primary btn-pagination shadow-none {{ $customers->currentPage() == $customers->lastPage() ? ' disabled' : '' }}">
            <i class="fas fa-angle-right"></i>
        </a>
        <a href="{{ $customers->url($customers->lastPage()) }}"
            class="btn btn-sm btn-primary btn-pagination shadow-none {{ $customers->currentPage() == $customers->lastPage() ? ' disabled' : '' }}">
            <i class="fas fa-angle-double-right"></i>
        </a>
        <br>
        <small>Página {{ $customers->currentPage() }} de {{ $customers->lastPage() }}</small>
    </div>
@else
    <div class="text-center py-5">
        <h4>Nenhum resultado encontrado</h4>
    </div>
@endif
