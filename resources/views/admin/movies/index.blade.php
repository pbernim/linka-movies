@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">                
                    <div class="row">
                        <div class="col-md-6">
                            @if(!$movies->isEmpty())
                                Showing {{$movies->firstItem()}} to {{$movies->lastItem()}} of {{$movies->total()}} {{ str_plural('movie', $movies->total()) }}
                            @else
                            0 records    
                            @endif    
                        </div>
                        <div class="col-md-6 text-right">
                            <div class="btn-group">
                                <a href="{{ route('movies.create') }}" class="btn btn-default btn-xs">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;Add movie
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel-body">
                    @if(!$movies->isEmpty())
                    <table class="table table-hover">
                        <tr>
                            <th colspan = "2">Title</th> 
                            <th class="text-right">Action</th>
                        </tr>
                        @foreach ($movies as $movie)                        
                        <tr>
                            <td>
                                <div class="img-thumbnail">                                    
                                    <img src="{{ Storage::url($movie->poster) }}" alt="" style="max-width: 60px;">                                    
                                </div>
                            <td>
                                {{$movie->title}}
                                <div><small>{!! str_limit($movie->synopsis, 200) !!}</small></div>
                                <div><small><small><span class="glyphicon glyphicon-link" aria-hidden="true"></span>&nbsp;Slug: {{$movie->slug}}</small></small></div>                                
                            </td>
                            <td class="text-right text-nowrap">
                                <div class="btn-group">
                                    <a href="{{ route('movies.edit', [$movie->id]) }}" class="btn btn-default btn-xs">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                    </a>
                                </div>
                                <div class="btn-group">
                                    <a href="javascript:void(0);" class="btn btn-default btn-xs" onclick="deleteMovie({{$movie->id}});">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    </a>
                                </div>                                
                            </td>
                        </tr>                        
                        @endforeach                       
                        
                        <form id="delete-form" action="{{ route('movies.destroy', [':MOVIE-ID']) }}" method="post">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                        </form>

                    </table>
                    <div class="text-center">
                        {{ $movies->links() }}
                    </div>
                    @else
                        <p>There are not movies in the database</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
