@if (count($users) > 0)
    <table class="table table-borderless table-hover">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Perfi</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $u)
                <tr>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->email }}</td>
                    @if (Auth::User()->id != $u->id)
                        <td>
                            @foreach ($u->roles as $r)
                                <span class="badge badge-info">{{ $r->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            <a href="#" class="btn btn-sm btn-primary shadow-none"><i class="fas fa-pen-alt"></i></a>
                            <a href="{{ url('/usuarios/excluir', ['id' => $u->id]) }}"
                                class="btn btn-sm btn-danger shadow-none"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-2">
        <nav>
            <ul class="pagination justify-content-center pagination-sm">
                @for ($i = 0; $i < $users->lastPage(); $i++)
                    <li class="page-item {{ $users->currentPage() == $i + 1 ? 'active' : '' }}">
                        <a class="page-link shadow-none" href="{{ $users->url($i + 1) }}">{{ $i + 1 }}</a>
                    </li>
                @endfor
            </ul>
        </nav>
    </div>
@else
    <div class="text-center py-5">
        <h4>Nenhum resultado encontrado</h4>
    </div>
@endif
