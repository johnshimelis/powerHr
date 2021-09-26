@extends('layouts.app')
@section('content')


@include('layouts.top-header', [
        'title' => __('Organization Edit'),
        'class' => 'col-lg-7'
    ])

<div class="container-fluid mt--6 mb-5 pb-5">
    <div class="row">
        <div class="col">
            <div class="card pb-6">
                <!-- Card header -->
                <div class="card-header border-0">
                    <span class="h3">{{__('Edit Organization')}}</span>
                </div>
                <form class="form-horizontal form" id="settingform" action="{{url('/admin/organization/update/'.$organization->organization_id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-3">
                        <div class="col-3">
                            <div class="nav-wrapper settings">
                                <ul class="nav navbar-nav nav-pills setting nav-fill" id="tabs-icons-text" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link text-left active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-scissors mr-2"></i> {{__('Organization Basic Details')}} </a>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a class="nav-link text-left" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i class="ni ni-time-alarm mr-2"></i> {{__('Organization Timings')}} </a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                        <div class="col-8">
                            @if($errors->any())
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{__('Error!')}}</strong> {{$errors->first()}}
                                </div>
                            @endif
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="tab-content" id="myTabContent">
                                        {{-- Tab 1 Organization Basic Details --}}
                                        <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                                            <h4 class="card-title">{{__('Organization Basic Details')}}</h4>

                                            <div class="form-group">
                                                <label class="form-control-label" for="name">{{__('Name')}}</label>
                                                <input type="text" value="{{old('name', $organization->name)}}" name="name" id="name" class="form-control" placeholder="{{__('Organization Name')}}" autofocus>
                                                @error('name')                                    
                                                    <div class="invalid-div">{{ $message }}</div>
                                                @enderror
                                            </div>
                    
                                            <div class="form-group">
                                                <label for="desc" class="form-control-label">{{__('Description')}}</label>
                                                <textarea class="form-control" rows="6" id="desc" name="desc" placeholder="{{__('Description of Organization')}}" >{{old('desc', $organization->desc)}}</textarea>
                                                @error('desc')                                    
                                                    <div class="invalid-div">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            {{-- Gender --}}
                                            {{-- <div class="form-group">
                                                <label class="form-control-label">{{__('Organization for')}}</label><br>
                                                <div class="custom-control custom-radio mb-2">
                                                    <input type="radio" id="male" name="gender" value="Male" class="custom-control-input" <?php if($organization->gender == "Male"){ echo "checked"; } ?>>
                                                    <label class="custom-control-label" for="male">{{__('Male')}}</label>
                                                </div>
                                                <div class="custom-control custom-radio mb-2">
                                                    <input type="radio" id="female" name="gender" value="Female" class="custom-control-input" <?php if($organization->gender == "Female"){ echo "checked"; } ?>>
                                                    <label class="custom-control-label" for="female">{{__('Female')}}</label>
                                                </div>
                                                <div class="custom-control custom-radio mb-2">
                                                    <input type="radio" id="both" name="gender" value="Both" class="custom-control-input" <?php if($organization->gender == "Both"){ echo "checked"; } ?>>
                                                    <label class="custom-control-label" for="both">{{__("Both")}}</label>
                                                </div>
                                            </div> --}}
                        
                                            {{-- Website --}}
                                            {{-- <div class="form-group">
                                                <label for="website" class="form-control-label">{{__('Website Name')}}</label>
                                                <input type="text" class="form-control" value="{{old('website', $organization->website)}}" name="website" id="website" placeholder="{{__('Website name')}}">
                                                @error('website')                                    
                                                    <div class="invalid-div">{{ $message }}</div>
                                                @enderror
                                            </div> --}}
                        
                                            {{-- Phone no --}}
                                            {{-- <div class="form-group">
                                                <label for="phone" class="form-control-label">{{__('Phone no')}}</label>
                                                <input type="text" class="form-control" value="{{old('phone', $organization->phone)}}" name="phone" id="phone" placeholder="{{__('Phone Number')}}" >
                                                @error('phone')                                    
                                                    <div class="invalid-div">{{ $message }}</div>
                                                @enderror
                                            </div> --}}
                                        </div>

                                        {{-- Tab 2 Organization Logo --}}
                                        <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                                            <h4 class="card-title">{{__('Organization Logo')}}</h4>
                                            
                                            {{-- Image --}}
                                            {{-- <div class="form-group">
                                                <label class="form-control-label">{{__('Organization Image')}}</label><br>
                                                <input type="file" id="image" name="image" accept="image/*" onchange="loadFile(event)"><br>
                                                <img id="output" class="uploadprofileimg mt-3" src="{{asset('storage/images/organization logos/'.$organization->image)}}"/>
                                            </div> --}}

                                            {{-- Logo --}}
                                            {{-- <div class="form-group">
                                                <label class="form-control-label"> {{__('Organization Logo')}} </label><br>
                                                <input type="file" name="logo" id="logo" accept="image/*" onchange="loadFile1(event)"><br>
                                                <img src="{{asset('storage/images/organization logos/'.$organization->logo)}}"  id="black_logo_output" class="mt-2 logo_size">
                                            </div> --}}
                            
                                        </div>

                                        {{-- Tab 3 timings --}}
                                        <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
                                            <h4 class="card-title">{{__('Organization Timings')}}</h4>
                                            <div>
                                                <div class="row align-items-center mb-4">
                                                    <div class="col">
                                                        <div>{{__('Opening Time')}}</div>
                                                    </div>
                                                    <div class="col">
                                                        <div>{{__('Closing Time')}}</div>
                                                    </div>
                                                    <div class="col-1">
                                                        <div>{{__('Day Off')}}</div>
                                                    </div>
                                                </div>
                                                @php
                                                    $base_url = url('/');
                                                @endphp

                                                {{-- Sunday --}}

                                                <label for="phone" class="form-control-label">{{__('Sunday')}}</label>
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" value="{{old('sunopen',$organization->sunday['open'])}}" class="form-control day-section-sunopen" name="sunopen" id="open" onchange="organizationDayOff('sun','{{$base_url}}')" {{$organization->sunday['open'] == null && $organization->sunday['close'] == null?'disabled': ''}}>
                                                            </div>
                                                            @error('sunopen')
                                                                <div class="invalid-div">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" value="{{old('sunclose',$organization->sunday['close'])}}" class="form-control day-section-sunclose" name="sunclose" id="close"  onchange="organizationDayOff('sun','{{$base_url}}')" {{$organization->sunday['open'] == null && $organization->sunday['close'] == null?'disabled': ''}}>
                                                            </div>
                                                            @error('sunclose')                                    
                                                                <div class="invalid-div">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-1">
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox input-group check_center">
                                                                <input type="checkbox" class="custom-control-input organizationCheck" name="sun" value="sun" id="sun_check" onchange="organizationDayOff('sun','{{$base_url}}')" {{$organization->sunday['open'] == null && $organization->sunday['close'] == null?'checked': ''}}>
                                                                <label class="custom-control-label" for="sun_check"></label>
                                                              </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                {{-- Monday --}}
                                                <label for="phone" class="form-control-label">{{__('Monday')}}</label>
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" value="{{old('monopen',$organization->monday['open'])}}" class="form-control day-section-monopen" name="monopen" id="open" onchange="organizationDayOff('mon','{{$base_url}}')" {{$organization->monday['open'] == null && $organization->monday['close'] == null?'disabled': ''}}>
                                                            </div>
                                                            @error('monopen')                                    
                                                                <div class="invalid-div">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" value="{{old('monclose',$organization->monday['close'])}}" class="form-control day-section-monclose" name="monclose" id="close"  onchange="organizationDayOff('mon','{{$base_url}}')" {{$organization->monday['open'] == null && $organization->monday['close'] == null?'disabled': ''}}>
                                                            </div>
                                                            @error('monclose')                                    
                                                                <div class="invalid-div">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-1">
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox input-group check_center">
                                                                <input type="checkbox" class="custom-control-input organizationCheck" name="mon" value="mon" id="mon_check" onchange="organizationDayOff('mon','{{$base_url}}')" {{$organization->monday['open'] == null && $organization->monday['close'] == null?'checked': ''}}>
                                                                <label class="custom-control-label" for="mon_check"></label>
                                                              </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                {{-- Tuesday --}}
                                                <label for="phone" class="form-control-label">{{__('Tuesday')}}</label>
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" value="{{old('tueopen',$organization->tuesday['open'])}}" class="form-control day-section-tueopen" name="tueopen" id="open" onchange="organizationDayOff('tue','{{$base_url}}')" {{$organization->tuesday['open'] == null && $organization->tuesday['close'] == null?'disabled': ''}}>
                                                            </div>
                                                            @error('tueopen')                                    
                                                                <div class="invalid-div">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" value="{{old('tueclose',$organization->tuesday['close'])}}" class="form-control day-section-tueclose" name="tueclose" id="close"  onchange="organizationDayOff('tue','{{$base_url}}')" {{$organization->tuesday['open'] == null && $organization->tuesday['close'] == null?'disabled': ''}}>
                                                            </div>
                                                            @error('tueclose')                                    
                                                                <div class="invalid-div">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-1">
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox input-group check_center">
                                                                <input type="checkbox" class="custom-control-input organizationCheck" name="tue" value="tue" id="tue_check" onchange="organizationDayOff('tue','{{$base_url}}')" {{$organization->tuesday['open'] == null && $organization->tuesday['close'] == null?'checked': ''}}>
                                                                <label class="custom-control-label" for="tue_check"></label>
                                                              </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                {{-- Wednesday --}}
                                                <label for="phone" class="form-control-label">{{__('Wednesday')}}</label>
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" value="{{old('wedopen',$organization->wednesday['open'])}}" class="form-control day-section-wedopen" name="wedopen" id="open" onchange="organizationDayOff('wed','{{$base_url}}')" {{$organization->wednesday['open'] == null && $organization->wednesday['close'] == null?'disabled': ''}}>
                                                            </div>
                                                            @error('wedopen')                                    
                                                                <div class="invalid-div">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" value="{{old('wedclose',$organization->wednesday['close'])}}" class="form-control day-section-wedclose" name="wedclose" id="close"  onchange="organizationDayOff('wed','{{$base_url}}')" {{$organization->wednesday['open'] == null && $organization->wednesday['close'] == null?'disabled': ''}}>
                                                            </div>
                                                            @error('wedclose')                                    
                                                                <div class="invalid-div">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-1">
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox input-group check_center">
                                                                <input type="checkbox" class="custom-control-input organizationCheck" name="wed" value="wed" id="wed_check" onchange="organizationDayOff('wed','{{$base_url}}')" {{$organization->wednesday['open'] == null && $organization->wednesday['close'] == null?'checked': ''}}>
                                                                <label class="custom-control-label" for="wed_check"></label>
                                                              </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                {{-- Thursday --}}
                                                <label for="phone" class="form-control-label">{{__('Thursday')}}</label>
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" value="{{old('thuopen',$organization->thursday['open'])}}" class="form-control day-section-thuopen" name="thuopen" id="open" onchange="organizationDayOff('thu','{{$base_url}}')" {{$organization->thursday['open'] == null && $organization->thursday['close'] == null?'disabled': ''}}>
                                                            </div>
                                                            @error('thuopen')                                    
                                                                <div class="invalid-div">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" value="{{old('thuclose',$organization->thursday['close'])}}" class="form-control day-section-thuclose" name="thuclose" id="close"  onchange="organizationDayOff('thu','{{$base_url}}')" {{$organization->thursday['open'] == null && $organization->thursday['close'] == null?'disabled': ''}}>
                                                            </div>
                                                            @error('thuclose')                                    
                                                                <div class="invalid-div">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-1">
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox input-group check_center">
                                                                <input type="checkbox" class="custom-control-input organizationCheck" name="thu" value="thu" id="thu_check" onchange="organizationDayOff('thu','{{$base_url}}')" {{$organization->thursday['open'] == null && $organization->thursday['close'] == null?'checked': ''}}>
                                                                <label class="custom-control-label" for="thu_check"></label>
                                                              </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                {{-- Friday --}}
                                                <label for="phone" class="form-control-label">{{__('Friday')}}</label>
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" value="{{old('friopen',$organization->friday['open'])}}" class="form-control day-section-friopen" name="friopen" id="open" onchange="organizationDayOff('fri','{{$base_url}}')" {{$organization->friday['open'] == null && $organization->friday['close'] == null?'disabled': ''}}>
                                                            </div>
                                                            @error('friopen')                                    
                                                                <div class="invalid-div">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" value="{{old('friclose',$organization->friday['close'])}}" class="form-control day-section-friclose" name="friclose" id="close"  onchange="organizationDayOff('fri','{{$base_url}}')" {{$organization->friday['open'] == null && $organization->friday['close'] == null?'disabled': ''}}>
                                                            </div>
                                                            @error('friclose')                                    
                                                                <div class="invalid-div">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-1">
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox input-group check_center">
                                                                <input type="checkbox" class="custom-control-input organizationCheck" name="fri" value="fri" id="fri_check" onchange="organizationDayOff('fri','{{$base_url}}')" {{$organization->friday['open'] == null && $organization->friday['close'] == null?'checked': ''}}>
                                                                <label class="custom-control-label" for="fri_check"></label>
                                                              </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                {{-- Saturday --}}
                                                <label for="phone" class="form-control-label">{{__('Saturday')}}</label>
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" value="{{old('satopen',$organization->saturday['open'])}}" class="form-control day-section-satopen" name="satopen" id="open" onchange="organizationDayOff('sat','{{$base_url}}')" {{$organization->saturday['open'] == null && $organization->saturday['close'] == null?'disabled': ''}}>
                                                            </div>
                                                            @error('satopen')                                    
                                                                <div class="invalid-div">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" value="{{old('satclose',$organization->saturday['close'])}}" class="form-control day-section-satclose" name="satclose" id="close"  onchange="organizationDayOff('sat','{{$base_url}}')" {{$organization->saturday['open'] == null && $organization->saturday['close'] == null?'disabled': ''}}>
                                                            </div>
                                                            @error('satclose')                                    
                                                                <div class="invalid-div">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-1">
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox input-group check_center">
                                                                <input type="checkbox" class="custom-control-input organizationCheck" name="sat" value="sat" id="sat_check" onchange="organizationDayOff('sat','{{$base_url}}')" {{$organization->saturday['open'] == null && $organization->saturday['close'] == null?'checked': ''}}>
                                                                <label class="custom-control-label" for="sat_check"></label>
                                                              </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Tab 4 Organization Address --}}
                                        <div class="tab-pane fade" id="tabs-icons-text-4" role="tabpanel" aria-labelledby="tabs-icons-text-4-tab">
                                            <h4 class="card-title">{{__('Organization Address')}}</h4>
                                            <div>
                        
                                                {{-- Address --}}
                                                <div class="form-group">
                                                    <label for="address" class="form-control-label">{{__('Address')}}</label>
                                                    <textarea class="form-control" rows="4" id="address" name="address" placeholder="{{__('Address of organization')}}" >{{old('address', $organization->address)}}</textarea>
                                                    @error('address')                                    
                                                        <div class="invalid-div">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                {{-- Zipcode --}}
                                                <div class="form-group">
                                                    <label for="zipcode" class="form-control-label">{{__('Zipcode')}}</label>
                                                    <input type="text" class="form-control" value="{{old('zipcode', $organization->zipcode)}}" name="zipcode" id="zipcode" placeholder="{{__('Zipcode')}}" >
                                                    @error('zipcode')                                    
                                                        <div class="invalid-div">{{ $message }}</div>
                                                    @enderror
                                                </div>
                            
                                                {{-- City --}}
                                                <div class="form-group">
                                                    <label for="city" class="form-control-label">{{__('City')}}</label>
                                                    <input type="text" class="form-control" value="{{old('city', $organization->city)}}" name="city" id="city" placeholder="{{__('City')}}" >
                                                    @error('city')                                    
                                                        <div class="invalid-div">{{ $message }}</div>
                                                    @enderror
                                                </div>
                            
                                                {{-- State --}}
                                                <div class="form-group">
                                                    <label for="state" class="form-control-label">{{__('State')}}</label>
                                                    <input type="text" class="form-control" value="{{old('state', $organization->state)}}" name="state" id="state" placeholder="{{__('State')}}" >
                                                    @error('state')                                    
                                                        <div class="invalid-div">{{ $message }}</div>
                                                    @enderror
                                                </div>
                            
                                                {{-- Country --}}
                                                <div class="form-group">
                                                    <label for="country" class="form-control-label">{{__('Country')}}</label>
                                                    <input type="text" class="form-control" value="{{old('country', $organization->country)}}" name="country" id="country" placeholder="{{__('Country')}}">
                                                    @error('country')                                    
                                                        <div class="invalid-div">{{ $message }}</div>
                                                    @enderror
                                                </div>  
                            
                                                {{-- Map --}}
                                                <div class="form-group">
                                                    <div class="mapsize my-0 mx-auto mb-4" id="location_map"></div>
                                                </div>
                                                
                                                {{-- Letitude --}}
                                                <div class="form-group">
                                                    <label class="form-control-label">{{__('Latitude')}}</label>
                                                    <input type="text" class="form-control" value="{{$organization->latitude}}" name="lat" id="lat" readonly>
                                                </div>
                                                
                                                {{-- Longitude --}}
                                                <div class="form-group">
                                                    <label class="form-control-label">{{__('Longitude')}}</label>
                                                    <input type="text" class="form-control" value="{{$organization->longitude}}" name="long" id="long" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Submit --}}
                                        <div class="border-top">
                                            <div class="card-body text-center">
                                                <input type="submit" class="btn btn-primary rtl-float-none" value="{{__('Submit')}}">
                                            </div>
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
@endsection