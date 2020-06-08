<?php
namespace App\Http\Controllers ;
use App\VehiclesModel ;
use Illuminate\Http\Request ;

class VehiclesController extends Controller
{    
   // Used to display the crud-panel page as well as appending the search functionality & pagination.
   // The important step here is to compact the variable.
    public function index(Request $request)
    {
        $vehsearch = $request->input('vehsearch') ;
        $vehiclesmodel = VehiclesModel::search($vehsearch)->paginate(30) ;
   
        return view('crud-panel', compact('vehiclesmodel')) ;
    }
     
  // Used for storing the data into the database from the crud-panel's create form. 
  // There is also the single & many files upload functionalities.
    public function store(Request $request)
    {
        $vehiclesmodel = $request->validate([

        'vehmod' => 'max:50',
        'vehmark' => 'max:50',
        'vehyear' => 'max:50',
        'vehengine' => 'max:30',
        'vehtrans' => 'max:40',    
        'vehimage' => 'required', 
        'vehimage.*' =>'image|mimes:jpeg,jpg,png',
        'vehgalimages' => 'required', 
        'vehgalimages.*' =>'image|mimes:jpeg,jpg,png',  
            
        ]) ;
        
	// Uploading as many images as we want.
        $destinationPath = 'storage/veh-images' ;
        $vehgalimages = array() ;
        
        if($files=$request->file('vehgalimages')) {
            
        foreach($files as $file) {
            
            $filename = $file->getClientOriginalName() ;
            $file->move($destinationPath, $filename) ;
            $vehgalimages[] = $filename;
          }
        }
        
        //implode images with pipe symbol
        $vehallimages = implode("|",$vehgalimages) ;
        
        $vehiclesmodel = new VehiclesModel ;
        $vehiclesmodel->vehmod = $request->vehmod ;
        $vehiclesmodel->vehmark = $request->vehmark ;
        $vehiclesmodel->vehyear = $request->vehyear ;
        $vehiclesmodel->vehengine = $request->vehengine ;
        $vehiclesmodel->vehtrans = $request->vehtrans ;
        $vehiclesmodel->vehimage = $request->vehimage ;
        $vehiclesmodel->vehgalimages = $vehallimages ;
        
	// Uploading a single image
        $file = $vehiclesmodel->vehimage = $request->vehimage ;
        $filename = $file->getClientOriginalName() ;
        $destinationPath = 'storage/veh-images' ;
        $vehiclesmodel->vehimage = $filename; 
        $uploadSuccess = $file->move($destinationPath, $filename);
        
        $vehiclesmodel->save() ;
        
        return redirect('crud-panel')->with('success', 'The record has been added successfully!') ;
    }

    public function create()
    {
        
        return view('create') ;
        
    }
    
    // Navigating to a page with unique records fetched from the database using the ID field.
    public function show($id)
    {
        $vehiclesmodel = VehiclesModel::findOrFail($id) ;
        
        return view('show', compact('vehiclesmodel')) ;
    }

    // Editing the record.
    public function edit($id)
    {
        $vehiclesmodel = VehiclesModel::findOrFail($id) ;
        
        return view('edit', compact('vehiclesmodel')) ;
    }

    // This method gets triggered when we hit the "EDIT" button from the edit method.
    public function update(Request $request, $id)
    {
        $vehiclesmodel = VehiclesModel::findOrFail($id) ;
        
        $vehiclesmodel->update([
            
            $vehiclesmodel->vehmod = $request->vehmod ,
            $vehiclesmodel->vehmark = $request->vehmark ,
            $vehiclesmodel->vehyear = $request->vehyear ,
            $vehiclesmodel->vehengine = $request->vehengine , 
            $vehiclesmodel->vehtrans = $request->vehtrans ,
            
        ]);
        
        return redirect('crud-panel')->with('success', 'The record has been edited successfully') ;
    }

    // The method for deleting a record in a row
    public function destroy($id)
    {
        $vehiclesmodel = VehiclesModel::whereId($id)->delete() ;
        
        return redirect('crud-panel')->with('warning', 'The record has been deleted successfully!') ;
    }

        
} // Еnd of the controller class
