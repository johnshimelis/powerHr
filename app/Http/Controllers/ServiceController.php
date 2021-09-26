<?php

// namespace App\Http\Controllers\admin;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use App\Models\Service;
// use App\Models\Salon;

// class ServiceController extends Controller
// {
//     public function index()
//     {
//         $salon = Salon::where('owner_id', Auth()->user()->id)->first();

//         $services = Service::where([['salon_id', $salon->salon_id],['isdelete',0]])
//         ->with(['category'])
//         ->orderBy('service_id', 'DESC')
//         ->paginate(10);

//         return view('admin.pages.service', compact('services'));
//     }

//     public function create()
//     {
//         return view('admin.service.create');
//     }

//     public function store(Request $request)
//     {
//         $request->validate([
//             'name' => 'bail|required',
//             'time' => 'bail|required|numeric',
//             'gender' => 'bail|required',
//             'price' => 'bail|required|numeric',
//         ]);

//         $salon = Salon::where('owner_id', Auth()->user()->id)->first();
//         $service = new Service();

//         $service->name = $request->name;
//         $service->gender = $request->gender;
//         $service->price = $request->price;
//         $service->time = $request->time;
//         $service->cat_id = $request->cat_id;
//         $service->salon_id = $salon->salon_id;
//         $service->save();
//         return response()->json(['success' => true,'data' => $service, 'msg' => 'Service create'], 200);

//     }

//     public function show($id)
//     {
//         $data['service'] = Service::find($id);
//         return response()->json(['success' => true,'data' => $data, 'msg' => 'Service show'], 200);
//     }

//     public function edit($id)
//     {
//         $data['service'] = Service::find($id);
//         return response()->json(['success' => true,'data' => $data], 200);
//     }

//     public function update(Request $request, $id)
//     {
        
//         $request->validate([
//             'cat_id' => 'bail|required',
//             'name' => 'bail|required',
//             'time' => 'bail|required|numeric',
//             'gender' => 'bail|required',
//             'price' => 'bail|required|numeric',
//         ]);
//         $service = Service::find($id);
        
//         $service->name = $request->name;
//         $service->price = $request->price;
//         $service->time = $request->time;
//         $service->gender = $request->gender;
//         $service->cat_id = $request->cat_id;
       
//         $service->save();
//         return response()->json(['success' => true,'data' => $service, 'msg' => 'Service edit'], 200);
//     }
    
//     public function destroy($id)
//     {
//         $service = Service::find($id);
//         $service->isdelete = 1;
//         $service->status = 0;
//         $service->save();
//         return redirect('/admin/services');

//     }
//     public function hideService(Request $request)
//     {
//         $service = Service::find($request->serviceId);
//         if ($service->status == 0) 
//         {   
//             $service->status = 1;
//             $service->save();
//         }
//         else if($service->status == 1)
//         {
//             $service->status = 0;
//             $service->save();
//         }
//     }
// }
