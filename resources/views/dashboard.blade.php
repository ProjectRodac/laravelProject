@extends('layouts.master')

@section('content')
    @include('includes.message-block')
    <section class="row new-post">
        <div class="col-md-10 col-md-offset-1">
            <header><h3>Ažuriraj status</h3></header>
            <form action="{{ route('post.create') }}" method="post">
                <div class="form-group">
                    <textarea class="form-control" name="body" id="new-post" rows="5" placeholder="Što vam je na umu?"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Objavi</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </section>
    <section class="row posts">
        <div class="col-md-10 col-md-offset-1">
            <header><h3>Livefed</h3></header>
            @foreach($posts as $post)
                <article class="post" data-postid="{{ $post->id }}">
                    <p>{{ $post->body }}</p>
                    <div class="info">
                        Objavio {{ $post->user->first_name }}, {{ $post->created_at }}
                    </div>
                    <div class="interaction">
                        <a class="glyphicon glyphicon-thumbs-up" href="#"></a>
                        <a class="glyphicon glyphicon-thumbs-down" href="#"></a>
                        @if(Auth::user() == $post->user)
                        <a class="glyphicon glyphicon-pencil" href="#"></a>
                        <a class="glyphicon glyphicon-remove" href="{{ route('post.delete', ['post_id'=> $post->id]) }}"></a>
                        @endif
                    </div>
                </article>
                @endforeach
        </div>
    </section>
    <div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Uredi status</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="post-body">Uredi status</label>
                            <textarea name="post-body" id="post-body" rows="5" class="form-control"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="modal-save">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script>
        var token = '{{ Session::token() }}';
        var url = '{{ route('edit') }}';
    </script>
@endsection