 @extends('layouts.app') 

{{--@extends('adminlte::page')--}}


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

<div class="content">
    <h3>Latest products:</h3>
{{--         <section>
            <div class="row justify-content-center">            
                @foreach($latest as $p)
                <div class="col-md-3">
                    <h4><a href="/product/{{$p->slug}}">{{$p->name}}</a></h4>
                </div>
                @endforeach

            </div>
        </section> --}}

</div>


<hr>

<main class="container category-list">
    
{{-- @foreach($categories as $item)

    <article class="category-snippet">
        <h2>{{$item->name}} /  </h2> 
        <a href="/admin/categories/{{$item->id}}">
            <img src="{{$item->img}}" alt="{{$item->name}}" class="category-image">
        </a>
        <p>{{$item->products->count()}}</p>
        <p>{{$item->avgPrice()}}</p>
    </article>


@endforeach --}}

</main>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')


    {{-- <script src="{{asset('js/app.js')}}"></script> --}}

@endsection
