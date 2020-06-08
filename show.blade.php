<?php use App\VehiclesModel ; ?>

<!DOCTYPE html>
<html lang="en">
 <head>
     
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <!-- Fonts -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" rel="stylesheet"  crossorigin="anonymous"> 

</head>
         
<img src="../storage/veh-images/{{ $vehiclesmodel->vehimage }}" alt=""> <br><br>    

<?php

echo "Model: " ." $vehiclesmodel->vehmod" ."<br>" ; 
echo "Mark: " ." $vehiclesmodel->vehmark" ."<br>" ; 
echo "Year: " ." $vehiclesmodel->vehyear" ."<br>" ; 
echo "Engine: " ." $vehiclesmodel->vehengine" ."<br>" ; 
echo "Transmission: " ." $vehiclesmodel->vehtrans " ."<br> <br>" ; 

?>

<h2> Gallery </h2>

<?php

foreach ($vehiclesmodel as $VehiclesModel) {
    
    $vehallimages = explode("|", $vehmodel->vehgalimages) ;
    
}

foreach($vehallimages as $vehgalimages) {
?>
    <img src="../storage/veh-images/{{ $vehgalimages }}" alt="">
    
<?php } ?>

  
</html>    