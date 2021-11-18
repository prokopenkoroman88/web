@extends('user.custompanel')

@section('content')
	@parent

<style>
.grid{
	width: 100%;/*
	display: grid;
	grid-template-columns: 30% 40% 30%;
	grid-template-rows:  50px 100px;*/

}
.grid div{
	border:1px solid black;
}
</style>


<div class="contacts">
	<section class="" style="background-color: #fe9;">
		<div class="nazva">
			<p>
				<span>Soft</span> <span>TAXI</span><span>.</span>
			</p>
		</div>
	</section>

	<section class="" style="background-color: lime;">
		<h4 id="geolocation">Наш бывший офис в Запорожье</h4>
		<p>ул. Рекордная 20</p>

		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3183.9314806809734!2d35.1215907047203!3d47.852045457780285!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40dc674a4396dc63%3A0x5d0a41d564bfd91d!2z0JrQvtC80L_RjNGO0YLQtdGA0L3QsNGPINCQ0LrQsNC00LXQvNC40Y8g0KjQkNCTLCDQl9Cw0L_QvtGA0L7QttGM0LU!5e0!3m2!1sru!2sua!4v1588099630018!5m2!1sru!2sua" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" ></iframe>

	</section>
{{-- 
	<section class="" style="background-color: fuchsia;">
		C
	</section>
 --}}	
	<section class="" style="background-color: #9ef;">
		<h4 id="schedule">Режим работы</h4>
		<ul class="list">
			<li class="clock">Отдел консультаций с 10.00 до 17.00
				<ul>
					<li class="phone">8(061) 717-01-12 (многоканальный), </li>
					<li class="phone">067-612-32-85;						
					</li>
				</ul>
			</li>
			<li class="clock">Отдел продаж с 9.00 до 18.00</li>
			<li class="clock">Бухгалтерия с 9.00 до 18.00</li>
			<li class="clock">Обеденный перерыв с 12.00 до 13.00</li>
			<li class="weekend">Выходные дни: суббота, воскресенье</li>
		</ul>


	</section>	
	<section class="" style="background-color: #f9e;">
		<h4 id="question">Написать разработчику</h4>
		{{ view('user.comments.question') }}
		
	</section>
	<section class="" style="background-color: #fe9;">
		<h4>Вакансии</h4>
		<ul class="list">
			<li><strong>Бухгалтер</strong></li>
			<li><strong>Инженер-программист</strong></li>
			<li><strong>Консультант</strong></li>
			<li><strong>Региональный диллер</strong></li>
		</ul>
	</section>


</div>




{{-- 

<p style=" 

	text-shadow:
	  0px -1px 0px black,
	  1px -1px 0px black,	  
	  1px  0px 0px black, 
	  1px  1px 0px black, 	  
	  0px  1px 0px black, 
	 -1px  1px 0px black, 	  
	 -1px  0px 0px black, 
	 -1px -1px 0px black; 

">
	<i class="fas fa-folder"style="color:yellow;"></i>
	<i class="fas fa-folder-open"style="color:yellow;"></i>
	<i class="fas fa-file" style="color:white;"></i>

	<i class="far fa-file"></i>

</p>

<p>
	<i class="fas fa-folder"></i>
<i class="fas fa-folder-open"></i>

<i class="far fa-folder"></i>
<i class="far fa-folder-open"></i>

<i class="fas fa-folder-plus"></i>
<i class="fas fa-folder-minus"></i>


<i class="fas fa-file"></i>
<i class="far fa-file"></i>

<i class="fas fa-file-alt"></i>
<i class="far fa-file-alt"></i>



<i class="fas fa-filter"></i>
<i class="far fa-filter"></i>

sort-numeric-up-alt
<i class="fas fa-sort-numeric-up-alt"></i>


sort-alpha-up-alt
sort-alpha-down


<i class="fas fa-file-word"></i>
<i class="far fa-file-word"></i>

<i class="fas fa-file-download"></i>


</p>
 --}}
{{--
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3183.9314806809734!2d35.1215907047203!3d47.852045457780285!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40dc674a4396dc63%3A0x5d0a41d564bfd91d!2z0JrQvtC80L_RjNGO0YLQtdGA0L3QsNGPINCQ0LrQsNC00LXQvNC40Y8g0KjQkNCTLCDQl9Cw0L_QvtGA0L7QttGM0LU!5e0!3m2!1sru!2sua!4v1588099630018!5m2!1sru!2sua" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
  --}}

{{-- Запорожье
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d342676.323448776!2d34.895167835204816!3d47.85588816103082!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40dc673dfa85bb03%3A0x7e675cd9074d3f4a!2z0JfQsNC_0L7RgNC-0LbRjNC1LCDQl9Cw0L_QvtGA0L7QttGB0LrQsNGPINC-0LHQu9Cw0YHRgtGMLCA2OTAwMA!5e0!3m2!1sru!2sua!4v1588099257733!5m2!1sru!2sua" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

 --}}

@endsection


@section('js')
	@parent
	@include('layouts.js')

    <script src="{{ asset('js/script.js') }}"></script>

@endsection