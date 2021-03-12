@extends('layouts.layout')

@section('headsection')
<title>Buy Stream</title>
@endsection

@section('content')

<div class="maincontain container">
    <div class="space container" style="min-height: 900px !important;">
            <div class="page-one">
                <div class="top-row row">
                    <div class="col-md-4"><a href="{{ url('stream') }}" class="btn" > <i class="fas fa-shopping-cart"></i>  {{ trans('lang.buy') }} {{ trans('lang.stream') }}</a></div>
                    <div class="col-md-4"><a href="javascript:void(0)" class="btn  active" > <i class="fas fa-user"></i> {{ trans('lang.my') }} {{ trans('lang.stream') }}</a></div>
                    <div class="col-md-4"><a href="{{ route('advertising') }}" class="btn" > <i class="fas fa-shopping-bag"></i> {{ trans('lang.get_more') }} {{ trans('lang.advertising') }}</a></div>
                </div>
            </div>
            <table class="table" style="font-size: 15px !important;">
                <thead> 
                    <tr>
                    <th scope="col"> {{ trans('lang.title') }}  {{ trans('lang.name') }}</th>
                    <th scope="col">{{ trans('lang.start_date') }}</th>
                    <th scope="col">{{ trans('lang.end_date') }}</th>
                    <th scope="col">{{ trans('lang.status') }}</th>
                    </tr>
                </thead>
                <tbody>
                @php
                        $date = \Carbon\Carbon::today();
                @endphp

                @forelse($my_stream as $stream)
                @if($stream->verify == "1" && $stream->user_id == Auth::id() )
                    <tr>
                    <td scope="row">{{ $stream->title }}</td>
                    <td>{{ $stream->created_at }}</td>
                    <td>{{ $stream->expired_date }}</td>
                    <td>
                    @if($stream->expired_date < $date)
                        <a class="btn btn-danger">{{ trans('lang.deactivated') }}</a>    
                    @elseif($stream->status == "1")
                        <a class="btn btn-success">{{ trans('lang.activated') }}</a>
                    @elseif($stream->status == "0")
                        <a class="btn btn-warning">{{ trans('lang.pending') }}</a>
                    
                    @endif
                    </td>

                </tr>
                @endif
                @empty
                <tr>
                    <td colspan="4">{{ trans('lang.no_record_found') }}</td>
                </tr>
                @endforelse
            </tbody>
            </table>
    </div>
</div>


@endsection

