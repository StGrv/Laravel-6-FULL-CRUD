<?php use App\VehiclesModel ; ?>

<!DOCTYPE html>
<html lang="en">
 <head>
     
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <!-- Fonts -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
     
    <!-- JavaScript -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>
    
    @error('vehmod')
        <div class="alert alert-danger">{{ 'The model field must contain max 50 symbols!' }}</div>
    @enderror  

    @error('vehmark')
        <div class="alert alert-danger">{{ 'The model field must contain max 50 symbols!' }}</div>
    @enderror  

    @error('vehyear')
        <div class="alert alert-danger">{{ 'The year field must contain max 50 symbols!' }}</div>
    @enderror      

    @error('vehengine')
        <div class="alert alert-danger">{{ 'The engine field must contain max 30 symbols!' }}</div>
    @enderror 
    
    @error('vehtrans')
        <div class="alert alert-danger">{{ 'The transmission field must contain max 40 symbols!' }}</div>
    @enderror 

    @error('vehimage*')
        <div class="alert alert-danger">{{ 'The main picture must not go above the limit of 64mb and it must have the following extensions: jpeg, jpg, png!' }}</div>
    @enderror 
    
    @error('vehgalimages*')
        <div class="alert alert-danger">{{ 'The gallery pictures must not go above the limit of 64mb and they must have the following extensions: jpeg, jpg, png!' }}</div>
    @enderror 
   

<h1> Create a record </h1><br>  
  <form action="{{ route('crud-panel.store') }}" method="post" enctype="multipart/form-data">
      @CSRF
      
        <div class="form-group">
        <label for="text">Model:</label>
        <input type="text" class="form-control" name="vehmod" placeholder="The model of the vehicle:" id="text">
        </div>
      
        <div class="form-group">
        <label for="text">Mark:</label>
        <input type="text" class="form-control" name="vehmark" placeholder="The mark of the vehicle:" id="text">
        </div>
      
        <div class="form-group">
        <label for="number">Year:</label>
        <input type="number" class="form-control" name="vehyear" placeholder="The year of the vehicle:" id="number">
        </div>
      
        <div class="form-group">
        <label for="text">Engine:</label>
        <input type="text" class="form-control" name="vehengine" placeholder="The engine of the vehicle:" id="text">
        </div>

        <div class="form-group">
        <label for="text">Transmission:</label>
        <input type="text" class="form-control" name="vehtrans" placeholder="The transmission of the vehicle:" id="text">
        </div>

        <div class="form-group">
        <label for="pic">Main picture:</label> <br>
        <input type="file" name="vehimage" required>
        </div>
      
        <div class="form-group">
        <label for="pic">Gallery:</label> <br>
        <input type="file" name="vehgalimages[]" multiple required>
        </div>

        <button type="submit" class="btn btn-primary"> Add the record! </button> <br>
  </form>
   
     
</html>