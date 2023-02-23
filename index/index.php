<?php

if (isset($_GET['search'])) {
    $search = $_GET['search'];


    $apiKey = 'AIzaSyDp8KYawOhF7cWSneuGNLTnO2D9mXCn2tY';
    $cx = '56a9d004278b942fa';

    $url = "https://www.googleapis.com/customsearch/v1?key={$apiKey}&cx={$cx}&q={$search}";


    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);


    $response = curl_exec($curl);


    curl_close($curl);


    $data = json_decode($response, true);

    if (array_key_exists('items', $data)) {
        $items = $data['items'];
    }


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h2>My Browser</h2>
<form method="GET" action="/index.php">
    <label for="search">Search:</label>
    <input type="text" id="search" name="search" value=""><br><br>
    <input type="submit" value="Submit">
</form>

<?php


if (isset($items)) {
    foreach ($items as $item) {
        echo '<h3>' . $item['title'] . '</h3>';
        echo '<p>' . $item['snippet'] . '</p>';
        echo '<a href="' . $item['link'] . '">Read more</a><br><br>';
    }
}
?>

</body>
</html>
