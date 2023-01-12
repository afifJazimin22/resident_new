<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Resident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
Use Alert;

class ResidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resident = DB::table('residents')->join('cars', 'cars.resident_ID', '=', 'residents.id')->paginate(5);
        $i =0;
        return view('resident.index', compact('resident', 'i'));
    }

    
  
    public function store(Request $request)
    {
        try {
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
        } catch (QueryException $e) {
            $message = $e->getMessage();
            Alert::error('Opsss!', $message);
            return redirect()->back();
        }

        return redirect()->route('resident.index');
    }

    public function show($id)
    {   
        $resident = DB::table('residents')->join('cars', 'residents.id', '=', 'cars.resident_ID')->select('residents.*', 'cars.*')->where('residents.id', $id)->first();
        return view('resident.show', compact('resident'));
    }

    
    public function update(Request $request)
    {
        $id = $request->id;
        DB::table('residents')
        ->join('cars', 'residents.id', '=', 'cars.resident_ID')->where('residents.id', $request->id)->update([
            'residents.name'=>$request->name, 'residents.phone'=>$request->phone, 'residents.roomNumber'=>$request->roomNumber, 'residents.faculty'=>$request->faculty, 'cars.plateNumber'=>$request->plateNumber, 'cars.carType'=>$request->carType, 'cars.carColour'=>$request->carColour
        ]);

        Alert::success('Success', 'Record updated successfully');
        return redirect()->route('resident.index');
    }

 
    public function delete($id)
    {
        DB::table('cars')->where('resident_ID', $id)->delete();
        DB::table('residents')->where('id', $id)->delete();

        $message = $id . " records deleted successfully!";

        Alert::success('Success', $message);

        return back();
    }

    public function massdelete(Request $request)
    {   
        $ids = $request->input('user_ids');
        foreach ($ids as $id) {

            $data = DB::table('residents')->leftJoin('cars', 'residents.id', '=', 'cars.resident_ID')->where('residents.id', $id);
            DB::table('cars')->where('resident_ID', $id)->delete();
            $data->delete();
        }
        
        return response()->json(['success'=>"Records Deleted successfully."]); 
    }
}
