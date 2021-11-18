{{-- для вывода ошибок перед формой ввода --}}


@if ($errors->any()) 
{{-- 18.2.20  ошибка создания в одноразовую сессию:
выведет

The name field is required.
The name must be at least 3 characters.
класс MessageBag $errors ->any() хоть одна ошибка

чтобы в самой форме вывело что заполнить
<input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
и еще
		@error('name')
			<div class="text-danger">{ { message } } </div>
		@enderror


<input type="text" name="name" class="form-control {{$errors->has('name')?'is-invalid':''}} ">

		@if($errors->has('name'))
			<div class="text-danger">{{ $errors->first('name')}}</div>
		@endif

 --}}
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

