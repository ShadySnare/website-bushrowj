<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Friendsgiving Menu / Survey</title>
  <link rel="stylesheet" href="menu.css">
  <link rel="icon" href="images/josh favicon.ico" type="favicon/x-icon">
</head>
<body>
    <?php 
    
        $name = $_GET['friend'] ?? 'Error: No name provided';
        $date = $_GET['date'] ?? 'Error: No date provided';
        $selectedMenu = $_GET['menu'] ?? [];
        $other_text = $_GET['other_text'] ?? '';


        echo "<h1>Thank you for your submission to friendsgiving 26, $name!</h1>";
        echo "<p>You have selected the following date: $date</p>";
        echo "<p>You have selected the following menu items: </p>";
        echo "<ul>";
        if (!empty($selectedMenu)) { // print list of selected menu items and the other text if provided
            foreach ($selectedMenu as $item) {
                if ($item == 'Other') {
                    echo "<li>$item: $other_text</li>";
                } else {
                    echo "<li>$item</li>";
                }
            }
        }
        else{
                echo "<p>No other suggestions provided.</p>";
            }
            
        echo "</ul>";
    
    ?>
</body>