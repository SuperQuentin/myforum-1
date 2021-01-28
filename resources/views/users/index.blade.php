@extends ('layout')

@section ('content')
    <h1 class="text-center p-5">Utilisateurs</h1>

    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

    @forelse ($users as $user)
        <div class="row text-center divtitle" data-id="{{$user->id}}">
            <div class="col-2 text-right">
                @if ($editAdmin)
                    @if ($user->isAdmin() && Auth::user()->id != $user->id )
                        <form action="{{ route('users.unsetAdmin') }}" method="POST">
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <input type="submit" name="nominated" value="Déstituer" class="btn btn-danger">
                            @csrf
                        </form>
                    @elseif (!$user->isAdmin())
                        <form action="{{ route('users.setAdmin') }}" method="POST">
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <input type="submit" name="nominated" value="Nommer admin" class="btn btn-success">
                            @csrf
                        </form>
                    @endif
                @endif


                
            </div>
            <div class="col-10 text-left">
                {{ $user->pseudo }}
            </div>
        </div>
    @empty
        <div>Aucune</div>
    @endforelse
@endsection