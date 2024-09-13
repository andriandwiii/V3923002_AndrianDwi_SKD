<?php  
function cipher($char, $key){
    if (ctype_alpha($char)) {
        $nilai = ord(ctype_upper($char) ? 'A' : 'a');
        $ch = ord($char);
        $mod = fmod($ch + $key - $nilai, 26);
        return chr($mod + $nilai);
    } else {
        return $char;
    }
} 

function enkripsi($input, $key){
    $output = "";
    $chars = str_split($input);
    foreach($chars as $char){
        $output .= cipher($char, $key);
    }
    return $output;
}


function dekripsi($input, $key){
    return enkripsi($input, 26 - $key);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>V3923020</title>
    <style>
    body {
        background-color: #f0f0f5;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        color: #333;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container {
        background-color: #ffffff;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        width: 100%;
        max-width: 450px;
        border: 2px solid #6c63ff;
    }

    h1 {
        color: #6c63ff;
        font-size: 1.8em;
        margin-bottom: 15px;
        text-align: center;
        text-transform: uppercase;
    }

    input[type="text"], input[type="number"], textarea {
        width: calc(100% - 20px);
        padding: 8px;
        margin: 8px 0;
        border: 2px solid #ff6584;
        border-radius: 8px;
        font-size: 1em;
        background-color: #f4f4fa;
        color: #333;
    }

    input[type="text"]::placeholder, input[type="number"]::placeholder, textarea::placeholder {
        color: #999;
    }

    textarea {
        height: 80px;
        resize: none;
        text-align: left;
    }

    .btn {
        background-color: #ff6584;
        color: #ffffff;
        border: none;
        padding: 10px 20px;
        font-size: 1em;
        cursor: pointer;
        border-radius: 8px;
        margin: 8px;
        transition: background-color 0.3s ease;
    }

    .btn:hover {
        background-color: #ff4060;
    }

    .footer {
        margin-top: 15px;
        font-size: 0.9em;
        color: #999;
        text-align: center;
    }

    .footer span {
        color: #6c63ff;
        font-weight: bold;
    }
</style>

</head>
<body>
    <div class="container">
        <h1>Sistem Keamanan Data</h1>
        <form action="" method="post">
            <input type="text" name="plain" placeholder="Masukkan kalimat" required />
            <input type="number" name="key" placeholder="Masukkan kunci (0-25)" required />
            <br />
            <button type="submit" name="enkripsi" class="btn">Enkripsi</button>
            <button type="submit" name="dekripsi" class="btn">Dekripsi</button>
            <br />
            <textarea readonly placeholder="Hasil"><?php  
                if (isset($_POST["enkripsi"])) { 
                    echo enkripsi($_POST["plain"], $_POST["key"]);
                } else if (isset($_POST["dekripsi"])) {
                    echo dekripsi($_POST["plain"], $_POST["key"]);
                }
            ?></textarea>
        </form>
        <div class="footer">
        </div>
    </div>
</body>
</html>
