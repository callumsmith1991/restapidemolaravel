@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        {{-- <div class="col-md-8"> --}}
            
                   
                    @auth
                    <div class="col-md-6">
                    <div class="card">
                     <div class="card-header">Search Form</div>

                    <div class="card-body">
                     @include('partials.form')
                     <div id="output"></div>
                     </div>
                    </div>
                    </div>

                       
                  @if(count($search_results) > 0)
                    <div class="col-md-6">
                        @foreach ($search_results as $article)

                        <div class="card">
                            <div class="card-header">Search Results for:
                                <ul> 
                                <li>News source: {{ $article->source }}</li>
                                <li>Searched For: {{ $article->q }}</li>
                                <li>Date from: {{ $article->from }}</li>
                                <li>Date to: {{ $article->to }}</li>
                                </ul>
                            </div>
    
                            <div class="card-body">
    

                        <div class="searched-for">

                       
                        </div>

                        @foreach ($article->results['articles'] as $result)

                         <div class="results">

                        <a href="{{$result['url']}}">{{$result['title']}}</a>
                        <p>{{$result['content']}}</p>

                        </div>
                            
                            
                        @endforeach

                    </div>

                </div>
                       
                        @endforeach
            </div>

            @endif
                    

                    @endauth

                    @guest
                    <div class="col-md-6">
                    <div class="card">
                    <div class="card-header">Please log in</div>
                    <div class="card-body">
                    <p>Sign in to access this form</p>
                    </div>
                    </div>
                </div>
                    @endguest


                    
                 

                    
        {{-- </div> --}}
    </div>
</div>
@endsection
