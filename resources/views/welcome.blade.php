@extends('layouts.welcome')

@section('content')

<div class="jumbotron jumbotron-welcome">
	<div class="container">
	  <h1>Lose weight the healthy way!</h1>
	  <p><a class="btn btn-primary btn-lg" href="{{ url('/home') }}" role="button">START TODAY!</a></p>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-3">
			<h3>Beginner</h3>
            <p>
				Vestibulum ullamcorper sit amet magna ac sagittis.
			<p>
        </div>
        <div class="col-md-3 col-md-offset-1">
			<h3>Intermediate</h3>
            <p>
				Curabitur porta enim enim, non luctus metus volutpat sit amet.
			<p>
        </div>
        <div class="col-md-3 col-md-offset-1">
			<h3>Advanced</h3>
            <p>
				Mauris gravida lacus id ultrices volutpat
			<p>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row row-welcome">
        <div class="col-md-4">

        </div>
        <div class="col-md-7">
            <h2>Our Approach</h2>
            <p class="intro">
				We believe that the best way to lose weight and keep it off is a total well-being approach. Gimmicky machines and fad diets don't work, so we designed the only subscription weight loss program to bring together the mental/behavioral, nutritional and physical components of weight loss, and deliver it right to your inbox every single day! Sign up and find the right planned strategy that fits into your lifestyle!
			<p>
        </div>
    </div>
</div>

<div class="container-fluid">


    <div class="row row-welcome">
        <div class="col-md-7 col-md-offset-1">
            <h2>Meals</h2>
            <p class="intro">
				Mauris gravida lacus id ultrices volutpat. Curabitur porta enim enim, non luctus metus volutpat sit amet. Sed tincidunt et enim nec porttitor. Vestibulum ullamcorper sit amet magna ac sagittis.
			<p>
        </div>
        <div class="col-md-4">

        </div>
    </div>
</div>

<div class="container-fluid">
    

    <div class="row row-welcome">
        <div class="col-md-4">

        </div>
        <div class="col-md-7">
            <h2>Workouts</h2>
            <p class="intro">
				Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc condimentum quis lectus vehicula consequat. Etiam convallis finibus tellus sit amet placerat.
			<p>
        </div>
    </div>
</div>

<div class="container-fluid">


    <div class="row row-welcome">
        <div class="col-md-17 col-md-offset-1">
            <h2>Mental Exercises</h2>
            <p class="intro">
				Etiam rutrum urna ac turpis congue fermentum. Ut quis erat convallis tellus euismod mollis vitae sed lorem. Cras vitae sapien ut mauris rutrum molestie. Suspendisse elit tortor, molestie in fringilla eget, sodales eget neque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
			<p>
        </div>
        <div class="col-md-4">

        </div>
    </div>
</div>

<div class="container-fluid">


    <div class="row row-welcome">
        <div class="col-md-4">

        </div>
        <div class="col-md-7">
            <h2>$12/Month Subscription</h2>
            <p class="intro">
				Etiam rutrum urna ac turpis congue fermentum. Ut quis erat convallis tellus euismod mollis vitae sed lorem. Cras vitae sapien ut mauris rutrum molestie. Suspendisse elit tortor, molestie in fringilla eget, sodales eget neque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
			<p>
			<p><a class="btn btn-primary btn-md" href="{{ url('/home') }}" role="button">START TODAY!</a></p>
        </div>
    </div>
    
    
</div>
@endsection
