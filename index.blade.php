<?php use App\VehiclesModel ?>

<html lang="en">
 <head>
     
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title></title>
 
    <!-- Fonts -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" rel="stylesheet"  crossorigin="anonymous">
     
    <!-- JavaScript --> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
     
     
</head>

<table id="customers">
       
<tr>
    <th> № </th>
    <th> Model </th>
    <th> Mark </th>
    <th> Year </th>
    <th> Engine </th>
    <th> Transmission </th>
    <th> Main picture </th>
    <th> Gallery </th>
    <th> Actions </th>
</tr>
    
<tbody>
    
</tbody>        
        
<?php   
  
    foreach ($vehiclesmodel as $VehiclesModel) {
    $vehallimages = explode("|", $VehiclesModel->vehgalimages) ;    
?>    
    
<tr>
    <td> {{ $VehiclesModel->id }} </td>
    <td> {{ $VehiclesModel->vehmod }} </td>
    <td> {{ $VehiclesModel->vehmark }} </td>
    <td> {{ $VehiclesModel->vehyear }} </td>
    <td> {{ $VehiclesModel->vehengine }} </td>
    <td> {{ $VehiclesModel->vehtrans }} </td>
    
    <td> 
        <img src="storage/veh-images/{{ $VehiclesModel->vehimage }}" alt="">
    </td>
    
    <td>
        <?php
        foreach($vehallimages as $vehgalimages) {
        ?>
        <img src="storage/veh-images/{{ $vehgalimages }}" alt="">
        <?php } ?>
    </td>
    
    <td> <a href="{{ route('crud-panel.edit', $VehiclesModel->id) }}"> <button type="button" class="btn btn-primary"> Edit </button> </a> 
        
         <form action="{{ route('crud-panel.destroy', $VehiclesModel->id) }}" method="post">
             @CSRF
             @method('DELETE')    

             <button type="submit" class="btn btn-danger" name="submit"> Delete </button>
         </form> 
    </td> 
    
</tr>
       
<?php  }  

echo $vehiclesmodel->links() ;
echo "The current number of all the vehicles is: " ."<b style=font-size:20px>" ."<b style=color:red>" .$vehiclesmodel->total() ."</b>"  ."<br>" ."<br>" ;

?>   
         
<a href="{{ route('crud-panel.create') }}"> <button type="button" class="btn btn-primary"> Add a record </button> </a> <br><br>
   
 <form action="{{ route('crud-panel.index') }}" method="GET" class="form-inline my-2 my-lg-0">
    @CSRF    
    <input type="text" name="vehsearch" value="{{ isset($vehsearch) ? $vehsearch: '' }}" placeholder="Search.." aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit"> Search </button>
  </form> <br><br>     
    
</table>
          
     
</html>   