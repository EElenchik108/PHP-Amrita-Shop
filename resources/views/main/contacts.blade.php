@extends('mainlayouts.main')
@section('title', $title)
@section('content')

<div class="containerAbout">    
	<h3 class="h3Main">CONTACTS US</h3>
	<hr align="center">
	<div class="containerProduct cotAbout"> 
		<p>Email:  <a href="mailto:EElenchik1@gmail.com" target="_blank" rel="noopener noreferrer">EElenchik1@gmail.com</a> or use form below</p>
		<p>Address:	Devachen, 108.</p>	
		<form action="/contacts" class="" method="POST">
			@csrf
			<h2 class="h3Main">Binder with us</h2>
			<div class="form-group">
				<label for="">Name</label>
				<input type="text" name="name" class="form-control" value="">
			</div>
			<div class="form-group">
				<label for="">Phone</label>
				<input type="text" name="name" class="form-control" value="" placeholder="+38(0__) ___ __ __">
			</div>
			<div class="form-group">
				<label for="">Text</label>
				<textarea name="text" class="form-control"></textarea> 
			</div>	
			<button class="but butAbout">Submit</button>
		</form>
	</div>
	
</div>
		<div class="maps">
			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d125331.48103460103!2d-63.96882668549053!3d10.992873346946242!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2sua!4v1601122194765!5m2!1sru!2sua" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
		</div>
	
@endsection
