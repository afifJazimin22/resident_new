<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Resident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $resident = Resident::join('cars', 'cars.resident_ID', '=', 'residents.id')->get([
        //     'residents.id',
        //     'residents.name',
        //     'residents.phone',
        //     'residents.roomNumber',
        //     'residents.faculty',
        //     'cars.carType',
        //     'cars.carColour',
        //     'cars.plateNumber'

        // ]);
        $resident = DB::table('residents')->join('cars', 'cars.resident_ID', '=', 'residents.id')->paginate(1);
        $i =0;
        return view('resident.index', compact('resident', 'i'));
    }

    
  
    public function store(Request $request)
    {
        $resident = DB::table('residents')->insertGetId([
            'id'=> $request->id,
            'name'=> $request->name,
            'phone'=> $request->phone,
            'roomNumber'=> $request->roomNumber,
            'faculty'=> $request->faculty,
            'created_at' => now(),
            'updated_at'=> now()
        ]);

        DB::table('cars')->insert([
            'resident_ID'=> $resident,
            'plateNumber'=> $request->plateNumber,
            'carType'=> $request->carType,
            'carColour'=> $request->carColour,
            'created_at' => now(),
            'updated_at'=> now()
        ]);

        return redirect()->route('resident.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        // $resident = Resident::with('car')->find($id);
        $resident = DB::table('residents')->join('cars', 'residents.id', '=', 'cars.resident_ID')->select('residents.*', 'cars.*')->where('residents.id', $id)->first();
        return view('resident.show', compact('resident'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        DB::table('residents')
        ->join('cars', 'residents.id', '=', 'cars.resident_ID')->where('residents.id', $request->id)->update([
            'residents.name'=>$request->name, 'residents.phone'=>$request->phone, 'residents.roomNumber'=>$request->roomNumber, 'residents.faculty'=>$request->faculty, 'cars.plateNumber'=>$request->plateNumber, 'cars.carType'=>$request->carType, 'cars.carColour'=>$request->carColour
        ]);

        // Alert::success('Success', 'Updated successfully');
        return redirect()->route('resident.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        DB::table('cars')->where('resident_ID', $id)->delete();
        DB::table('residents')->where('id', $id)->delete();

        return back();
    }

    public function massdelete(Request $request)
    {   
        $ids = $request->input('user_ids');
        // $ids = $request->ids;
        // console.log($ids);
        foreach ($ids as $id) {

            $data = DB::table('residents')->leftJoin('cars', 'residents.id', '=', 'cars.resident_ID')->where('residents.id', $id);
            DB::table('cars')->where('resident_ID', $id)->delete();
            $data->delete();
        }
        
        // return response()->json(['status'=> true, 'message'=>'Deleted successfully.']);
        // return response('Records deleted successfully.', 200);
        return response()->json(['success'=>"Products Deleted successfully."]); 
        // return redirect()->route('resident.index');
    }
}
