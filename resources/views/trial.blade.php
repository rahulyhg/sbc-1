@extends('layouts.welcome')

@section('trial')

	@if($number_of_trial_months > 0)
		<h3>Sign up now to receive {{$number_of_trial_months}} Month Free Trial.</h3>
	@endif

@endsection

@section('content')

@endsection
