@if (count($users) > 0)
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-sm table-hover border mb-0">
                <thead class="bg-secondary text-white">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Perfi</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $u)
                    <tr>
                        <td>{{ $u->id }}</td>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->email }}</td>
                        <td>
                            @foreach ($u->roles as $r)
                            <span class="badge badge-info">{{ $r->name }}</span>
                            @endforeach
                        </td>
                        @if (Auth::User()->id != $u->id)
                        <td>
                            <a href="{{ url('/usuarios/editar', ['id' => $u->id]) }}" class="btn btn-sm btn-primary btn-action-table">
                                <i class="fas fa-pen-alt"></i>
                            </a>
                            <a href="{{ url('/usuarios/excluir', ['id' => $u->id]) }}" class="btn btn-sm btn-danger btn-action-table">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body pagination-container">
        <nav aria-label="Page navigation example">
            <ul class="pagination pagination-sm mb-0">

                <li class="page-item {{ $users->onFirstPage() ? ' disabled' : '' }}">
                    <a class="page-link btn-pagination" href="{{ $users->url(1) }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>

                @for ($i = $users->currentPage() - ($users->perPage() + 1); $i <= $users->currentPage() - 1; $i++)
                    @if ($i >= 1)
                        <li class="page-item">
                            <a class="page-link btn-pagination" href="{{ $users->url($i) }}">{{ $i }}</a>
                        </li>
                    @endif
                @endfor


                <li class="page-item active">
                    <a class="page-link btn-pagination" href="{{ $users->url($users->currentPage()) }}">{{ $users->currentPage() }}</a>
                </li>

                @for ($i = $users->currentPage(); $i < $users->currentPage() + 1; $i++)
                    @if ($i < $users->lastPage())
                        <li class="page-item">
                            <a class="page-link btn-pagination" href="{{ $users->url($i + 1) }}">{{ $i + 1 }}</a>
                        </li>
                    @endif
                @endfor

                <li class="page-item {{ $users->currentPage() == $users->lastPage() ? ' disabled' : '' }}">
                    <a class="page-link btn-pagination" href="{{ $users->url($users->lastPage()) }}" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
                
            </ul>
        </nav>
    </div>
</div>

<!--
<div class="mt-2">
    <nav>
        <ul class="pagination justify-content-center pagination-sm">
            @for ($i = 0; $i < $users->lastPage(); $i++)
                <li class="page-item {{ $users->currentPage() == $i + 1 ? 'active' : '' }}">
                    <a class="page-link btn-pagination shadow-none" href="{{ $users->url($i + 1) }}">{{ $i + 1 }}</a>
                </li>
                @endfor
        </ul>
    </nav>
</div>



<div class="text-center my-2">
    <a href="{{ $users->url(1) }}" class="btn btn-sm btn-primary btn-pagination shadow-none {{ $users->currentPage() == 1 ? ' disabled' : '' }}">
        <i class="fas fa-angle-double-left"></i>
    </a>
    <a href="{{ $users->previousPageUrl() }}" class="btn btn-sm btn-primary btn-pagination shadow-none {{ $users->currentPage() == 1 ? ' disabled' : '' }}">
        <i class="fas fa-angle-left"></i>
    </a>
    <a href="{{ $users->nextPageUrl() }}" class="btn btn-sm btn-primary btn-pagination shadow-none {{ $users->currentPage() == $users->lastPage() ? ' disabled' : '' }}">
        <i class="fas fa-angle-right"></i>
    </a>
    <a href="{{ $users->url($users->lastPage()) }}" class="btn btn-sm btn-primary btn-pagination shadow-none {{ $users->currentPage() == $users->lastPage() ? ' disabled' : '' }}">
        <i class="fas fa-angle-double-right"></i>
    </a>
    <br>
    <small>Página {{ $users->currentPage() }} de {{ $users->lastPage() }}</small>
</div>



<div class="text-center my-2">
    <a href="{{ $users->url(1) }}" class="btn btn-sm btn-primary btn-pagination shadow-none {{ $users->onFirstPage() ? ' disabled' : '' }}">
        <i class="fas fa-angle-double-left"></i>
    </a>

    @for ($i = $users->currentPage() - ($users->perPage() + 1); $i <= $users->currentPage() - 1; $i++)
        @if ($i >= 1)
            <a href="{{ $users->url($i) }}" class="btn btn-sm btn-outline-primary btn-pagination shadow-none">
                {{ $i }}
            </a>
        @endif
    @endfor

    <a href="{{ $users->url($users->currentPage()) }}" class="btn btn-sm btn-primary btn-pagination shadow-none">
        {{ $users->currentPage() }}
    </a>

    @for ($i = $users->currentPage(); $i < $users->currentPage() + 1; $i++)
        @if ($i < $users->lastPage())
            <a href="{{ $users->url($i + 1) }}" class="btn btn-sm btn-outline-primary btn-pagination shadow-none">
                {{ $i + 1 }}
            </a>
        @endif
    @endfor

    <a href="{{ $users->url($users->lastPage()) }}" class="btn btn-sm btn-primary btn-pagination shadow-none {{ $users->currentPage() == $users->lastPage() ? ' disabled' : '' }}">
        <i class="fas fa-angle-double-right"></i>
    </a>
    <br>
    <small>Página {{ $users->currentPage() }} de {{ $users->lastPage() }}</small>
</div>
-->

@else
<div class="text-center py-5">
    <h4>Nenhum resultado encontrado</h4>
</div>
@endif