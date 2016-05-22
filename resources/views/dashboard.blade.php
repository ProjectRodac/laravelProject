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
            <article class="post">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad alias, aliquam animi asperiores at cupiditate distinctio ea eligendi excepturi ipsa labore, neque nulla odio porro praesentium suscipit veniam voluptas voluptatibus.</p>
                <div class="info">
                    Objavio Rodac, 22.05.2016.
                </div>
                <div class="interaction">
                    <a class="glyphicon glyphicon-thumbs-up" href="#"></a>
                    <a class="glyphicon glyphicon-thumbs-down" href="#"></a>
                    <a class="glyphicon glyphicon-pencil" href="#"></a>
                    <a class="glyphicon glyphicon-remove" href="#"></a>
                </div>
            </article>
            <article class="post">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad alias, aliquam animi asperiores at cupiditate distinctio ea eligendi excepturi ipsa labore, neque nulla odio porro praesentium suscipit veniam voluptas voluptatibus.</p>
                <div class="info">
                    Objavio Rodac, 22.05.2016.
                </div>
                <div class="interaction">
                    <a class="glyphicon glyphicon-thumbs-up" href="#"></a>
                    <a class="glyphicon glyphicon-thumbs-down" href="#"></a>
                    <a class="glyphicon glyphicon-pencil" href="#"></a>
                    <a class="glyphicon glyphicon-remove" href="#"></a>
                </div>
            </article>
        </div>
    </section>
@endsection