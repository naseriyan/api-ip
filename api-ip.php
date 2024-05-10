<head>
    <link rel="stylesheet " href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
</head>

<div class="container-fluid p-5 bg-primary text-white text-center">
<h1>IP API Project</h1>
  <p>دریافت یک آی پی و نمایش جزئیات آن </p> 
</div>


<div class="container p-5 my-5 bg-dark text-white">
<form method="GET" action="">

<p>Enter your ip:</p>
<input type="text" name="ip"/>
<input type="submit" value="Get Info"name="submit">
</div>

<?php

    if (!empty($_GET)) {
        if (!empty($_GET['ip'])) 
        {
            echo '<div class="container p-5 my-5 bg-primary text-white">';

            $json_string = file_get_contents('http://ip-api.com/json/'.$_GET['ip']);
            $jIP = json_decode($json_string);

            echo '<table class="table table-bordered table-hover" >';
            echo '<tr>';
                echo '<td>IP:</td>';
                echo '<td>'.$jIP->query.'</td>';
            echo '</tr>';
            echo '<tr>';
                echo '<td>country:</td>';
                echo '<td>'.$jIP->country.'</td>';
            echo '</tr>';
            echo '<tr>';
                echo '<td>regionName:</td>';
                echo '<td>'.$jIP->regionName.'</td>';
            echo '</tr>';
            echo '<tr>';
                echo '<td>city:</td>';
                echo '<td>'.$jIP->city.'</td>';
            echo '</tr>';

            echo '</table>';
            echo '</div>';

            if($jIP->country=="Iran")
            {
                echo '<div class="container p-5 my-5 bg-success text-white">';
                echo '<h1>it is IRAN IP!</h1>';
                echo '</div>';  
            }
            else
            {
                echo '<div class="container p-5 my-5 bg-danger text-white">';
                echo '<h1>it is not IRAN IP!</h1>';
                echo '</div>';  
            }


        }
    }

?>

</form>
