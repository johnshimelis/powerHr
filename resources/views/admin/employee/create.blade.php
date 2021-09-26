@extends('layouts.app')
@section('content')

@include('layouts.top-header', [
    'title' => __('Create') ,
    'headerData' => __('Employee') ,
    'url' => 'admin/employee' ,
    'class' => 'col-lg-7'
])

<div class="container-fluid mt--5">
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0 text-center">
                    <span class="h3">{{__('Add Employee')}}</span>
                </div>
                <div class="mx-4 ">
                    <div class="nav-wrapper">
                        <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0 " id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-single-02 mr-2"></i>{{__('Employee')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="ni ni-time-alarm mr-2"></i>{{__('Timing')}}</a>
                            </li>
                        </ul>
                    </div>
                    <form class="form-horizontal form" action="{{url('/admin/employee')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="card shadow">
                            <div class="my-0 mx-auto w-75">
                                <div class="card-body">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                                            <div class="p-20">

                                                {{-- Image --}}
                                                {{-- <div class="form-group">
                                                    <label class="form-control-label">{{__('Image')}}</label><br>
                                                    <input type="file" id="image" name="image" accept="image/*" onchange="loadFile(event)" ><br>
                                                    <img id="output" class="h-25 w-25 mt-3"/>
                                                    @error('image')                                    
                                                        <div class="invalid-div">{{ $message }}</div>
                                                    @enderror
                                                </div>
                         --}}
                                                {{-- name --}}
                                                <div class="form-group">
                                                    <label class="form-control-label" for="name">{{__('Name')}}</label>
                                                    <input type="text" value="{{old('name')}}" name="name" id="name" class="form-control" placeholder="{{__('Employee Name')}}"  autofocus>
                                                    @error('name')                                    
                                                        <div class="invalid-div">{{ $message }}</div>
                                                    @enderror
                                                </div>
                        
                                                {{-- email --}}
                                                <div class="form-group">
                                                    <label for="email" class="form-control-label">{{__('Email')}} </label>
                                                    <input type="text" value="{{old('email')}}" class="form-control" name="email" id="email" placeholder="{{__('Employee Email')}}" >
                                                    @error('email')                                    
                                                        <div class="invalid-div">{{ $message }}</div>
                                                    @enderror
                                                </div>
                        
                                                {{-- Services --}}
                                                {{-- <div class="form-group">
                                                    <label class="form-control-label">{{__('Services')}}</label>
                                                    <select class="form-control select2"  dir="{{ session()->has('direction')&& session('direction') == 'rtl'? 'rtl':''}}" multiple="multiple" name="services[]" id="services" data-placeholder='{{ __("-- Select Service --")}}' placeholder='{{ __("-- Select Service --")}}' >
                                                        @foreach ($services as $service)
                                                            <option  value="{{$service->service_id}}" {{ (collect(old('services'))->contains($service->service_id)) ? 'selected':'' }}>{{$service->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('services')                                    
                                                        <div class="invalid-div">{{ $message }}</div>
                                                    @enderror
                                                </div>
                         --}}
                                                {{-- Phone no --}}
                                                <div class="form-group">
                                                    <label for="phone" class="form-control-label">{{__('Phone no')}}</label>
                                                    <input type="text" value="{{old('phone')}}" class="form-control" name="phone" id="phone" placeholder="{{__('Phone no')}}" >
                                                    @error('phone')                                    
                                                        <div class="invalid-div">{{ $message }}</div>
                                                    @enderror
                                                </div>
                        
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                                            <div class="p-20">
                                                {{-- Sunday --}}
                                                <label for="phone" class="form-control-label">{{__('Sunday')}}</label>
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" value="{{$organization->sunday['open'] == NULL ? 'Day Off':old('sunopen',Carbon\Carbon::parse($organization->sunday['open'])->format('h:i A'))}}"
                                                                    onclick="organizationTimeSunOpen('sun','{{ Carbon\Carbon::parse($organization->sunday['open'])->format('h:i A')}}','{{ Carbon\Carbon::parse($organization->sunday['close'])->format('h:i A')}}')" 
                                                                    class="form-control w-75 day-section-sunopen-emp" name="sunopen" id="open"
                                                                    {{$organization->sunday['open'] == NULL && $organization->sunday['close'] == NULL ? 'disabled':''}} 
                                                                    {{$organization->sunday['open'] != NULL && $organization->sunday['close'] != NULL ? 'required':''}}
                                                                 />
                                                            </div>
                                                            @error('sunopen')                                    
                                                                <div class="invalid-div">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" value="{{$organization->sunday['close'] == NULL ? 'Day Off':old('sunclose',Carbon\Carbon::parse($organization->sunday['close'])->format('h:i A'))}}" 
                                                                onclick="organizationTimeSunClose('sun','{{ Carbon\Carbon::parse($organization->sunday['open'])->format('h:i A')}}','{{ Carbon\Carbon::parse($organization->sunday['close'])->format('h:i A')}}')" 
                                                                    class="form-control w-75 day-section-sunclose-emp" name="sunclose" id="close"
                                                                    {{$organization->sunday['open'] == NULL && $organization->sunday['close'] == NULL ? 'disabled':''}} 
                                                                    {{$organization->sunday['open'] != NULL && $organization->sunday['close'] != NULL ? 'required':''}}
                                                                />
                                                            </div>
                                                            @error('sunclose')                                    
                                                                <div class="invalid-div">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                    
                                                {{-- Monday --}}
                                                <label for="phone" class="form-control-label">{{__('Monday')}}</label>
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" value="{{$organization->monday['open'] == NULL ? 'Day Off':old('monopen',Carbon\Carbon::parse($organization->monday['open'])->format('h:i A'))}}" 
                                                                    onclick="organizationTimeMonOpen('mon','{{ Carbon\Carbon::parse($organization->monday['open'])->format('h:i A')}}','{{ Carbon\Carbon::parse($organization->monday['close'])->format('h:i A')}}')" 
                                                                    class="form-control w-75 day-section-monopen-emp" name="monopen" id="open" placeholder="{{__('Opening Time')}}" 
                                                                    {{$organization->monday['open'] == NULL && $organization->monday['close'] == NULL ? 'disabled':''}} 
                                                                    {{$organization->monday['open'] != NULL && $organization->monday['close'] != NULL ? 'required':''}}
                                                                />
                                                            </div>
                                                            @error('monopen')                                    
                                                                <div class="invalid-div">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" value="{{$organization->monday['close'] == NULL ? 'Day Off':old('monclose',Carbon\Carbon::parse($organization->monday['close'])->format('h:i A'))}}" 
                                                                onclick="organizationTimeMonClose('mon','{{ Carbon\Carbon::parse($organization->monday['open'])->format('h:i A')}}','{{ Carbon\Carbon::parse($organization->monday['close'])->format('h:i A')}}')" 
                                                                    class="form-control w-75 day-section-monclose-emp" name="monclose" id="close" placeholder="{{__('Closing Time')}}" 
                                                                    {{$organization->monday['open'] == NULL && $organization->monday['close'] == NULL ? 'disabled':''}} 
                                                                    {{$organization->monday['open'] != NULL && $organization->monday['close'] != NULL ? 'required':''}}
                                                                />
                                                            </div>
                                                            @error('monclose')                                    
                                                                <div class="invalid-div">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            

                                                {{-- Tuesday --}}
                                                <label for="phone" class="form-control-label">{{__('Tuesday')}}</label>
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" value="{{$organization->tuesday['open'] == NULL ? 'Day Off':old('tueopen',Carbon\Carbon::parse($organization->tuesday['open'])->format('h:i A'))}}" 
                                                                onclick="organizationTimeTueOpen('tue','{{ Carbon\Carbon::parse($organization->tuesday['open'])->format('h:i A')}}','{{ Carbon\Carbon::parse($organization->tuesday['close'])->format('h:i A')}}')" 
                                                                    class="form-control w-75 day-section-tueopen-emp" name="tueopen" id="open" placeholder="{{__('Opening Time')}}" 
                                                                    {{$organization->tuesday['open'] == NULL && $organization->tuesday['close'] == NULL ? 'disabled':''}} 
                                                                    {{$organization->tuesday['open'] != NULL && $organization->tuesday['close'] != NULL ? 'required':''}}
                                                                />
                                                            </div>
                                                            @error('tueopen')                                    
                                                                <div class="invalid-div">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" value="{{$organization->tuesday['close'] == NULL ? 'Day Off':old('tueclose',Carbon\Carbon::parse($organization->tuesday['close'])->format('h:i A'))}}" 
                                                                onclick="organizationTimeTueClose('tue','{{ Carbon\Carbon::parse($organization->tuesday['open'])->format('h:i A')}}','{{ Carbon\Carbon::parse($organization->tuesday['close'])->format('h:i A')}}')" 
                                                                    class="form-control w-75 day-section-tueclose-emp" name="tueclose" id="close" placeholder="{{__('Closing Time')}}" 
                                                                    {{$organization->tuesday['open'] == NULL && $organization->tuesday['close'] == NULL ? 'disabled':''}} 
                                                                    {{$organization->tuesday['open'] != NULL && $organization->tuesday['close'] != NULL ? 'required':''}}
                                                                />
                                                            </div>
                                                            @error('tueclose')                                    
                                                                <div class="invalid-div">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- Wednesday --}}
                                                <label for="phone" class="form-control-label">{{__('Wednesday')}}</label>
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" value="{{$organization->wednesday['open'] == NULL ? 'Day Off':old('wedopen',Carbon\Carbon::parse($organization->wednesday['open'])->format('h:i A'))}}" 
                                                                    onclick="organizationTimeWedOpen('wed','{{ Carbon\Carbon::parse($organization->wednesday['open'])->format('h:i A')}}','{{ Carbon\Carbon::parse($organization->wednesday['close'])->format('h:i A')}}')" 
                                                                    class="form-control w-75 day-section-wedopen-emp" name="wedopen" id="open" placeholder="{{__('Opening Time')}}" 
                                                                    {{$organization->wednesday['open'] == NULL && $organization->wednesday['close'] == NULL ? 'disabled':''}} 
                                                                    {{$organization->wednesday['open'] != NULL && $organization->wednesday['close'] != NULL ? 'required':''}}
                                                                />
                                                            </div>
                                                            @error('wedopen')                                    
                                                                <div class="invalid-div">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" value="{{$organization->wednesday['close'] == NULL ? 'Day Off':old('wedclose',Carbon\Carbon::parse($organization->wednesday['close'])->format('h:i A'))}}"
                                                                onclick="organizationTimeWedClose('wed','{{ Carbon\Carbon::parse($organization->wednesday['open'])->format('h:i A')}}','{{ Carbon\Carbon::parse($organization->wednesday['close'])->format('h:i A')}}')" 
                                                                    class="form-control w-75 day-section-wedclose-emp" name="wedclose" id="close" placeholder="{{__('Closing Time')}}" 
                                                                    {{$organization->wednesday['open'] == NULL && $organization->wednesday['close'] == NULL ? 'disabled':''}} 
                                                                    {{$organization->wednesday['open'] != NULL && $organization->wednesday['close'] != NULL ? 'required':''}}
                                                                />
                                                            </div>
                                                            @error('wedclose')                                    
                                                                <div class="invalid-div">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                    
                                                {{-- Thursday --}}
                                                <label for="phone" class="form-control-label">{{__('Thursday')}}</label>
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" value="{{$organization->thursday['open'] == NULL ? 'Day Off':old('thuopen',Carbon\Carbon::parse($organization->thursday['open'])->format('h:i A'))}}" 
                                                                onclick="organizationTimeThuOpen('thu','{{ Carbon\Carbon::parse($organization->thursday['open'])->format('h:i A')}}','{{ Carbon\Carbon::parse($organization->thursday['close'])->format('h:i A')}}')" 
                                                                    class="form-control w-75 day-section-thuopen-emp" name="thuopen" id="open" placeholder="{{__('Opening Time')}}" 
                                                                    {{$organization->thursday['open'] == NULL && $organization->thursday['close'] == NULL ? 'disabled':''}} 
                                                                    {{$organization->thursday['open'] != NULL && $organization->thursday['close'] != NULL ? 'required':''}}
                                                                />
                                                            </div>
                                                            @error('thuopen')                                    
                                                                <div class="invalid-div">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" value="{{$organization->thursday['close'] == NULL ? 'Day Off':old('thuclose',Carbon\Carbon::parse($organization->thursday['close'])->format('h:i A'))}}" 
                                                                onclick="organizationTimeThuClose('thu','{{ Carbon\Carbon::parse($organization->thursday['open'])->format('h:i A')}}','{{ Carbon\Carbon::parse($organization->thursday['close'])->format('h:i A')}}')" 
                                                                    class="form-control w-75 day-section-thuclose-emp" name="thuclose" id="close" placeholder="{{__('Closing Time')}}" 
                                                                    {{$organization->thursday['open'] == NULL && $organization->thursday['close'] == NULL ? 'disabled':''}} 
                                                                    {{$organization->thursday['open'] != NULL && $organization->thursday['close'] != NULL ? 'required':''}}
                                                                />
                                                            </div>
                                                            @error('thuclose')                                    
                                                                <div class="invalid-div">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                    
                                                
                                                {{-- Friday --}}
                                                <label for="phone" class="form-control-label">{{__('Friday')}}</label>
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" value="{{$organization->friday['open'] == NULL ? 'Day Off':old('friopen',Carbon\Carbon::parse($organization->friday['open'])->format('h:i A'))}}" 
                                                                    onclick="organizationTimeFriOpen('fri','{{ Carbon\Carbon::parse($organization->friday['open'])->format('h:i A')}}','{{ Carbon\Carbon::parse($organization->friday['close'])->format('h:i A')}}')" 
                                                                    class="form-control w-75 day-section-friopen-emp" name="friopen" id="open" placeholder="{{__('Opening Time')}}" 
                                                                    {{$organization->friday['open'] == NULL && $organization->friday['close'] == NULL ? 'disabled':''}} 
                                                                    {{$organization->friday['open'] != NULL && $organization->friday['close'] != NULL ? 'required':''}}
                                                                />
                                                            </div>
                                                            @error('friopen')                                    
                                                                <div class="invalid-div">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" value="{{$organization->friday['close'] == NULL ? 'Day Off':old('friclose',Carbon\Carbon::parse($organization->friday['close'])->format('h:i A'))}}" 
                                                                onclick="organizationTimeFriClose('fri','{{ Carbon\Carbon::parse($organization->friday['open'])->format('h:i A')}}','{{ Carbon\Carbon::parse($organization->friday['close'])->format('h:i A')}}')" 
                                                                    class="form-control w-75 day-section-friclose-emp" name="friclose" id="close" placeholder="{{__('Closing Time')}}" 
                                                                    {{$organization->friday['open'] == NULL && $organization->friday['close'] == NULL ? 'disabled':''}} 
                                                                    {{$organization->friday['open'] != NULL && $organization->friday['close'] != NULL ? 'required':''}}
                                                                />
                                                            </div>
                                                            @error('friclose')                                    
                                                                <div class="invalid-div">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                    
                                                
                                                {{-- Saturday --}}
                                                <label for="phone" class="form-control-label">{{__('Saturday')}}</label>
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" value="{{$organization->saturday['open'] == NULL ? 'Day Off':old('satopen',Carbon\Carbon::parse($organization->saturday['open'])->format('h:i A'))}}" 
                                                                    onclick="organizationTimeSatOpen('sat','{{ Carbon\Carbon::parse($organization->saturday['open'])->format('h:i A')}}','{{ Carbon\Carbon::parse($organization->saturday['close'])->format('h:i A')}}')" 
                                                                    class="form-control w-75 day-section-satopen-emp" name="satopen" id="open" placeholder="{{__('Opening Time')}}" 
                                                                    {{$organization->saturday['open'] == NULL && $organization->saturday['close'] == NULL ? 'disabled':''}} 
                                                                    {{$organization->saturday['open'] != NULL && $organization->saturday['close'] != NULL ? 'required':''}}
                                                                />
                                                            </div>
                                                            @error('satopen')                                    
                                                                <div class="invalid-div">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" value="{{$organization->saturday['close'] == NULL ? 'Day Off':old('satclose',Carbon\Carbon::parse($organization->saturday['close'])->format('h:i A'))}}" 
                                                                    onclick="organizationTimeSatClose('sat','{{ Carbon\Carbon::parse($organization->saturday['open'])->format('h:i A')}}','{{ Carbon\Carbon::parse($organization->saturday['close'])->format('h:i A')}}')" 
                                                                    class="form-control w-75 day-section-satclose-emp" name="satclose" id="close" placeholder="{{__('Closing Time')}}" 
                                                                    {{$organization->saturday['open'] == NULL && $organization->saturday['close'] == NULL ? 'disabled':''}} 
                                                                    {{$organization->saturday['open'] != NULL && $organization->saturday['close'] != NULL ? 'required':''}}
                                                                />
                                                            </div>
                                                            @error('satclose')                                    
                                                                <div class="invalid-div">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border-top">
                                            <div class="card-body text-center rtl-float-none">
                                                <input type="submit" class="btn btn-primary rtl-float-none" value="{{__('Submit')}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection