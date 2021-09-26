@extends('layouts.app')
@section('content')

@include('layouts.top-header', [
        'title' => __('Organization') ,
        'class' => 'col-lg-7'
    ])


<div class="container-fluid mt--6 mb-5 only_search">
    <div class="row">
      <div class="col">
        <div class="card">
          <!-- Card header -->
          <div class="card-header border-0">
            <span class="h3">{{__('Organization table')}}</span>
          </div>
          <!-- table -->
          <div class="table-responsive">
            <table class="table align-items-center table-flush"  id="dataTableUser">
              <thead class="thead-light">
                <tr>
                    <th scope="col" class="sort">{{__('#')}}</th>
                    <th scope="col" class="sort">{{__('Image')}}</th>
                    <th scope="col" class="sort">{{__('Name')}}</th>
                    <th scope="col" class="sort">{{__('Owner name')}}</th>
                    <th scope="col" class="sort">{{__('Organization For')}}</th>
                    <th scope="col" class="sort">{{__('Created_at')}}</th>
                    <th scope="col" class="sort">{{__('Updated_at')}}</th>
                    <th scope="col" class="sort">{{__('Status')}}</th>
                    <th></th>
                </tr>
            </thead>
              <tbody class="list">
                    @foreach ($organizations as $key => $organization)
                    <tr>
                            <th>{{$loop->iteration}}</th>
                            <td>
                                <img src="{{asset('storage/images/organization logos/'.$organization->logo)}}" class="tableimage rounded">
                            </td>
                            <td>{{$organization->name}}</td>
                            <td>{{$organization->ownerName}}</td>
                            <td>{{$organization->gender}}</td>
                            <td>{{$organization->created_at}}</td>
                            <td>{{$organization->updated_at}}</td>
                            <td>
                              <label class="custom-toggle">
                                  <input type="checkbox"  onchange="hideOrganization({{$organization->organization_id}})" {{$organization->status == 0?'checked': ''}}>
                                  <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Hide"></span>
                              </label>
                            </td>
                            <td class="table-actions">
                                <a href="{{url('admin/organizations/'.$organization->organization_id)}}" class="table-action text-warning" data-toggle="tooltip" data-original-title="{{__('View Organization')}}">
                                      <i class="fas fa-eye"></i>
                                </a>
                          </td>
                        </tr>
                    @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection