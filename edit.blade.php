<?php use App\VehiclesModel ; ?>

<!DOCTYPE html>
<html lang="en">
 <head>
     
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <!-- Fonts -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" rel="stylesheet"  crossorigin="anonymous">

</head>       


<h1 style="text-align:center"> Edit a record </h1><br>
  
<form action="{{ route('crud-panel.update', $vehiclesmodel->id) }}" method="post"> <br>
    @CSRF
    @method('PUT')
  
    <div class="form-group">
    <label for="text">Model:</label>
    <input type="text" class="form-control" name="vehmod" value={{ $vehiclesmodel->vehmod }} >
    </div>

    <div class="form-group">
    <label for="text">Mark:</label>
    <input type="text" class="form-control" name="vehmark" value={{ $vehiclesmodel->vehmark }} >
    </div>

    <div class="form-group">
    <label for="number">Year:</label>
    <input type="number" class="form-control" name="vehyear" value={{ $vehiclesmodel->vehyear }} >
    </div>

    <div class="form-group">
    <label for="text">Engine:</label>
    <input type="text" class="form-control" name="vehengine" value={{ $vehiclesmodel->vehengine }}>
    </div>

    <div class="form-group">
    <label for="text">Transmission:</label>
    <input type="text" class="form-control" name="vehtrans" value={{ $vehiclesmodel->vehtrans }}>
    </div>

    <button type="submit" class="btn btn-primary"> Edit the record! </button> <br>
  </form>
    