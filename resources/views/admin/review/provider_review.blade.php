@extends('admin.layout.base')

@section('title', __('admin.review.Provider_Reviews'))

@section('content')

    <div class="content-area py-1">
        <div class="container-fluid">
            
            <div class="box box-block bg-white">
                <div class="table-container">
                    <table class="table is-responsive is-fullwidth is-striped">
                    <thead>
                        <tr>
                            <th>@lang('admin.id')</th>
                            <th>@lang('admin.review.transaction_id')</th>
                            <th>@lang('admin.request.User_Name')</th>
                            <th>@lang('admin.request.Provider_Name')</th>
                            <th>@lang('admin.review.Rating')</th>
                            <th>@lang('admin.request.Date_Time')</th>
                            <th>@lang('admin.review.Comments')</th>
                            <th>@lang('admin.action')</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php($page = ($pagination->currentPage-1)*$pagination->perPage)    
                    @foreach($Reviews as $index => $review)
                    @php($page++)
                        <tr>
                            <td>{{$page}}</td>
                            <td>{{$review->request_id}}</td>
                            <td>{{$review->user?$review->user->first_name:''}} {{$review->user?$review->user->last_name:''}}</td>
                            <td>{{$review->provider?$review->provider->first_name:''}} {{$review->provider?$review->provider->last_name:''}}</td>
                            <td>{{$review->provider_rating}}
                                <div className="rating-outer">
                                    <input type="hidden" value="{{$review->provider_rating}}" name="rating" class="rating" disabled="disabled"/>
                                </div>
                            </td>
                            <td>{{$review->created_at}}</td>
                            <td>{{$review->provider_comment}}</td>
                            <td>
                                <a href="{{ route('admin.requests.show', $review->request_id) }}" class="dropdown-item">
                                    <i class="fa fa-search"></i> Mais detalhes
                                </a>
                        </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>@lang('admin.id')</th>
                            <th>@lang('admin.review.transaction_id')</th>
                            <th>@lang('admin.request.User_Name')</th>
                            <th>@lang('admin.request.Provider_Name')</th>
                            <th>@lang('admin.review.Rating')</th>
                            <th>@lang('admin.request.Date_Time')</th>
                            <th>@lang('admin.review.Comments')</th>
                            <th>@lang('admin.action')</th>
                        </tr>
                    </tfoot>
                </table>
                @include('common.pagination')
            </div>
            </div>
        </div>
    </div>
@endsection