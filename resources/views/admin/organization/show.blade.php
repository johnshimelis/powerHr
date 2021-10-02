@extends('layouts.app')
@section('content')

@include('layouts.top-header', [
    'title' => __('Organization') ,
    'class' => 'col-lg-7'
])



<div class="container-fluid mt--6  mb-5">
    <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
            <div class="card card-profile shadow">
                <div class="row justify-content-center">
                    <div class="col-lg-3 order-lg-2">
                        <div class="card-profile-image">
                            {{-- <img src="{{asset('storage/images/organization logos/'.$organization->image)}}" class="rounded-circle organization_round"> --}}
                        </div>
                    </div>
                </div>
                <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                    <div class="d-flex justify-content-between">
                    </div>
                </div>
                <div class="card-body pt-0 pt-md-4">
                    <div class="row">
                        <div class="col">
                            <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                {{-- <div>
                                    <span class="heading">{{count($services)}}</span>
                                    <span class="description">{{__('Services')}}</span>
                                </div> --}}
                                <div>
                                    <span class="heading">{{count($emps)}}</span>
                                    <span class="description">{{__('Therapist')}}</span>
                                </div>
                                <div>
                                    <span class="heading">{{count($users)}}</span>
                                    <span class="description">{{__('Clients')}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <h3>
                            {{ $organization->name }}<span class="font-weight-light"></span>   
                        </h3>
                        <div>
                            {{__('Phone :')}} {{$organization->phone}}
                            @if ($organization->website != null)
                                <br>{{__('Website :')}} {{$organization->website}}
                            @endif
                        </div>
                        <hr class="my-4" />
                        <p>{{ $organization->desc }}</p>
                        <a class="btn btn-primary text-white" href="{{url('admin/organization/edit')}}"> {{__('Edit Organization')}} </a>

                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-8 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header border-0">
                    <h3>{{__('View Organization')}}</h3>
                </div>
                <div class="card-body">
                    <div class="nav-wrapper">
                        <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="false"><i class="ni ni-time-alarm mr-2"></i>{{__('Timing')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="ni ni-square-pin mr-2"></i>{{__('Contact')}}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card shadow mx-auto my-0">
                        <div class="my-0 mx-auto w-90">
                            <div class="card-body">
                                <div class="tab-content" id="myTabContent">

                                    <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                                        <div class="card border-0">
                                            <!-- Card body -->
                                            <div class="card-body">
                                                <?php 
                                                    $start_time1 = new Carbon\Carbon($organization->sunday['open']);
                                                    $close_time1 = new Carbon\Carbon($organization->sunday['close']);
                                                    
                                                    $start_time2 = new Carbon\Carbon($organization->monday['open']);
                                                    $close_time2 = new Carbon\Carbon($organization->monday['close']);
                                                    
                                                    $start_time3 = new Carbon\Carbon($organization->tuesday['open']);
                                                    $close_time3 = new Carbon\Carbon($organization->tuesday['close']);
                                                    
                                                    $start_time4 = new Carbon\Carbon($organization->wednesday['open']);
                                                    $close_time4 = new Carbon\Carbon($organization->wednesday['close']);
                                                    
                                                    $start_time5 = new Carbon\Carbon($organization->thursday['open']);
                                                    $close_time5 = new Carbon\Carbon($organization->thursday['close']);
                                                    
                                                    $start_time6 = new Carbon\Carbon($organization->friday['open']);
                                                    $close_time6 = new Carbon\Carbon($organization->friday['close']);
                                                    
                                                    $start_time7 = new Carbon\Carbon($organization->saturday['open']);
                                                    $close_time7 = new Carbon\Carbon($organization->saturday['close']);
                                                ?>    
                                                <p class="h3 heading text-muted mb-3">{{__('Timings :')}} </p>
                                                <div class="row align-items-center">
                                                    <span class="font-weight-bold col-3 text-left"> {{__('Sunday :')}}</span>
                                                    <span class="text-muted col">
                                                        @if ($organization->sunday['open'] == null && $organization->sunday['close'] == null)
                                                            {{__('OFF DAY')}}
                                                        @else
                                                            {{$start_time1->format('g:i A')}} To {{$close_time1->format('g:i A')}}
                                                        @endif
                                                    </span><br>
                                                </div>
                                                <div class="row align-items-center">
                                                    <span class="font-weight-bold col-3 text-left"> {{__('Monday :')}}</span>
                                                    <span class="text-muted col">
                                                        @if ($organization->monday['open'] == null && $organization->monday['close'] == null)
                                                            {{__('OFF DAY')}}
                                                        @else
                                                            {{$start_time2->format('g:i A')}} To {{$close_time2->format('g:i A')}}
                                                        @endif
                                                    </span><br>
                                                </div>
                                                <div class="row align-items-center">
                                                    <span class="font-weight-bold col-3 text-left"> {{__('Tuesday :')}}</span>
                                                    <span class="text-muted col">
                                                        @if ($organization->tuesday['open'] == null && $organization->tuesday['close'] == null)
                                                            {{__('OFF DAY')}}
                                                        @else
                                                            {{$start_time3->format('g:i A')}} To {{$close_time3->format('g:i A')}}
                                                        @endif
                                                    </span><br>
                                                </div>
                                                <div class="row align-items-center">        
                                                    <span class="font-weight-bold col-3 text-left"> {{__('Wednesday :')}}</span>
                                                    <span class="text-muted col">
                                                        @if ($organization->wednesday['open'] == null && $organization->wednesday['close'] == null)
                                                            {{__('OFF DAY')}}
                                                        @else
                                                            {{$start_time4->format('g:i A')}} To {{$close_time4->format('g:i A')}}
                                                        @endif
                                                    </span><br>
                                                </div>
                                                <div class="row align-items-center">     
                                                    <span class="font-weight-bold col-3 text-left"> {{__('Thursday :')}}</span>
                                                    <span class="text-muted col">
                                                        @if ($organization->thursday['open'] == null && $organization->thursday['close'] == null)
                                                            {{__('OFF DAY')}}
                                                        @else
                                                            {{$start_time5->format('g:i A')}} To {{$close_time5->format('g:i A')}}
                                                        @endif
                                                    </span><br>
                                                </div>
                                                <div class="row align-items-center">    
                                                    <span class="font-weight-bold col-3 text-left"> {{__('Friday :')}}</span>
                                                    <span class="text-muted col">
                                                        @if ($organization->friday['open'] == null && $organization->friday['close'] == null)
                                                            {{__('OFF DAY')}}
                                                        @else
                                                            {{$start_time6->format('g:i A')}} To {{$close_time6->format('g:i A')}}
                                                        @endif
                                                    </span><br>
                                                </div>
                                                <div class="row align-items-center">   
                                                    <span class="font-weight-bold col-3 text-left"> {{__('Saturday :')}}</span>
                                                    <span class="text-muted col">
                                                        @if ($organization->saturday['open'] == null && $organization->saturday['close'] == null)
                                                            {{__('OFF DAY')}}
                                                        @else
                                                            {{$start_time7->format('g:i A')}} To {{$close_time7->format('g:i A')}}
                                                        @endif
                                                    </span><br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                                        <div class="card">
                                            <!-- Card body -->
                                            <div class="card-body">
                                                <p class="h3 heading text-muted mb-3">{{__('Contact :')}} </p>
                                                @if ($organization->website != NULL)
                                                    <span class="font-weight-bold">{{__('Website :')}} </span><span> &numsp;{{$organization->website}}</span><br>
                                                @endif
                                                <div class="mt-1"><span class="font-weight-bold">{{__('Phone no :')}} </span><span> &numsp;{{$organization->phone}}</span></div>
                                                <div class="mt-1"><span class="font-weight-bold">{{__('Address :')}} </span></div>
                                                <div>{{$organization->address}},</div>
                                                <div>{{$organization->city}} - <span></span>{{$organization->zipcode}},</div>
                                                <div>{{$organization->state}},</div>
                                                <div>{{$organization->country}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection