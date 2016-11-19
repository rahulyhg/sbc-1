@extends('layouts.onboarding')

@section('title')
	{{ $question->question }} - Personality Quiz
@endsection

@section('facebook_event_code')
	fbq('track', 'Question{{ $id ? $id : "" }}');
@endsection

@section('content')

<div class="header_topmid header_topmid_heading col-lg-7">
				
    <div class="row row-quiz">
        <div class="col-md-12 text-left">
			<h1>Personality Quiz</h1>
        </div>
    </div>
    
    <div class="row-quiz">
        <div class="col-md-8 col-md-offset-2">
        	<h2>{{ $id ? $id : '' }}: {{ $question->question }}</h2>
           
				<div class="row">
                    {!! Form::open(array('url' => '/registration/question/'.$id, 'class' => 'form-inline', 'id' => 'question')) !!}
					
							
							  <div class="col-sm-6">
								<input type="submit" name="yes" class="btn btn-primary btn-lg btn-block bkgd-primary" value="Yes">
							  </div>
							
							  <div class="col-sm-6">
								<input type="submit" name="no" class="btn btn-default btn-lg btn-block bkgd-secondary" value="No">
							  </div>
							<input type="hidden" name="_token" value="{{ csrf_token() }}">															
							<input type="hidden" name="question_id" value="{{$question->id}}">
							<input type="hidden" name="question_group" value="{{$question->group}}">
					{!! Form::close() !!}
				</div>	
             
        </div>
    </div>
					
	<div class="clear"></div>
</div>

@endsection
