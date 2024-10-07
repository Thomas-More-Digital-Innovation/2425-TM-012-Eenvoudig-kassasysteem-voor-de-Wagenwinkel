<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geld Selectie</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #87CEEB;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 50px;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            width: 600px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .display {
            background-color: #eee;
            height: 100px;
            margin-bottom: 20px;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            overflow-x: auto;
            padding: 10px;
        }
        .geld-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
            margin: 20px 0;
        }
        .geld-item {
            width: 200px;
            height: 100px;
            background-size: cover;
            cursor: pointer;
            border: 2px solid #ddd;
            border-radius: 5px;
            transition: transform 0.2s;
        }
        .geld-item:hover {
            transform: scale(1.1);
            border-color: #999;
        }

        .geld-item-munt {
            width: 100px;
            height: 100px;
            background-size: cover;
            cursor: pointer;
            border: 2px solid #ddd;
            border-radius: 5px;
            transition: transform 0.2s;
        }
        .geld-item-munt:hover {
            transform: scale(1.1);
            border-color: #999;
        }


        .display img {
            margin-right: 10px;
            height: 100px;
        }
        .buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .button {
            padding: 15px 25px;
            border-radius: 5px;
            font-size: 20px;
            color: #fff;
            cursor: pointer;
            width: 120px;
            text-align: center;
            transition: background-color 0.3s;
        }
        .button-back {
            background-color: #f00;
        }
        .button-back:hover {
            background-color: #c00;
        }
        .button-next {
            background-color: #0f0;
        }
        .button-next:hover {
            background-color: #0c0;
        }
        #total {
            font-size: 22px;
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="display" id="display"></div>
    <div class="geld-container">
        <div class="geld-item" style="background-image: url('http://kassasysteem.test/assets/images/money/5.png');" onclick="addAmount(5, 'http://kassasysteem.test/assets/images/money/5.png')"></div>
        <div class="geld-item" style="background-image: url('http://kassasysteem.test/assets/images/money/10.png');" onclick="addAmount(10, 'http://kassasysteem.test/assets/images/money/10.png')"></div>
        <div class="geld-item" style="background-image: url('http://kassasysteem.test/assets/images/money/20.png');" onclick="addAmount(20, 'http://kassasysteem.test/assets/images/money/20.png')"></div>
        <div class="geld-item" style="background-image: url('http://kassasysteem.test/assets/images/money/50.png');" onclick="addAmount(50, 'http://kassasysteem.test/assets/images/money/50.png')"></div>
        <div class="geld-item-munt" style="background-image: url('http://kassasysteem.test/assets/images/money/2.png');" onclick="addAmount(2, 'http://kassasysteem.test/assets/images/money/2.png')"></div>
        <div class="geld-item-munt" style="background-image: url('http://kassasysteem.test/assets/images/money/1.png');" onclick="addAmount(1, 'http://kassasysteem.test/assets/images/money/1.png')"></div>
        <div class="geld-item-munt" style="background-image: url('http://kassasysteem.test/assets/images/money/_50.png');" onclick="addAmount(0.5, 'http://kassasysteem.test/assets/images/money/_50.png')"></div>
        <div class="geld-item-munt" style="background-image: url('http://kassasysteem.test/assets/images/money/_20.png');" onclick="addAmount(0.2, 'http://kassasysteem.test/assets/images/money/_20.png')"></div>
        <div class="geld-item-munt" style="background-image: url('http://kassasysteem.test/assets/images/money/_10.png');" onclick="addAmount(0.1, 'http://kassasysteem.test/assets/images/money/_10.png')"></div>
        <div class="geld-item-munt" style="background-image: url('http://kassasysteem.test/assets/images/money/_5.png');" onclick="addAmount(0.05, 'http://kassasysteem.test/assets/images/money/_5.png')"></div>
    </div>
    <div class="buttons">
        <div class="button button-back" onclick="reset()">Reset</div>
        <div class="button button-next" onclick="next()">Verder</div>
    </div>
    <p id="total">Totaal: €0.00</p>
</div>

<script>
    let total = 0;

    function addAmount(amount, imgSrc) {
        // Update the total
        total += amount;
        document.getElementById('total').innerText = 'Totaal: €' + total.toFixed(2);

        // Add the selected image to the display area
        let img = document.createElement('img');
        img.src = imgSrc;
        img.alt = amount + ' euro';
        document.getElementById('display').appendChild(img);
    }

    function reset() {
        total = 0;
        document.getElementById('total').innerText = 'Totaal: €0.00';
        document.getElementById('display').innerHTML = ''; // Clear the display area
    }

    function next() {
        alert('Je totaalbedrag is €' + total.toFixed(2));
    }
</script>
</body>
</html>
