{{-- 
@extends('layouts.app')
 --}}
@extends('user.custompanel')

@section('content')

<div class="content">

<?php
$product_id=0;
?>


    @foreach($latest_releases as $release)
        @if($release->product_id!=$product_id)
            @if($product_id)
                </table>
                </article>
            @endif

            <article class="updates">

                <h4>
                    <p class="capture capt-2" style="width:calc(99% - 103px); display: inline-block;">
                        <span>
                            <strong>Последние новости проекта <a href="/product/{{$release->product->slug}}">{{$release->product->name}}</a>
                            
                                                
                            
                            </strong>
                        </span>
                    </p>

                    <p style="font-size: 10px; display: inline-block; width:103px; ">
                        {{$release->product->get_starmark()}}
                    </p>
                </h4>
                <table class="new-releases">


    <?php
            $product_id=$release->product_id;
    ?>
        @endif

{{-- 
            @if(!$product_id)
                <section>
                    <h3>релизы без товара, как такое возможно?</h3>
            @endif
--}}

                <tr>            
                    <td>
                        {!!$release->date!!}
                    </td>
                    <td>
                        @if($release->isDistr())
                            Доступен для скачивания дистрибутив
                        @else
                            Выход новой версии
                        @endif
                            программы {{$release->name}}
                    </td>
                    <td>
                        <a href="/product/{{$release->product->slug ?? ''}}/#year{{$release->year}}">Обновления</a>
                    </td>

                </tr>

    @endforeach

            @if($product_id)
                </table>
                </article>
            @endif

</div>
@endsection



