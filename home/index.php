<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Welcome | Kartar 13</title>
</head>

<body>
    <div class="main">
        <div class="navbar">
            <label class="logo">Kartar 13</label>
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="">About</a></li>
                <li><a href="">Contact</a></li>
            </ul>
        </div>
        <div class="content">
            <div id="clock"></div>
            <h1>SIKATAN</h1>
            <p>Sistem Karang Taruna</p>
            <div>
                <button type="button" class="btn"> <span> </span> Masuk</button>
            </div>
        </div>
    </div>
    <script>
        setInterval(() => {
            let date = new Date()
            let clock = document.getElementById('clock')
            clock.innerHTML =
                date.getHours() + ":" +
                date.getMinutes() + ":" +
                date.getSeconds()
        }, 1000);
    </script>
</body>

</html>