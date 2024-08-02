<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Money Denomination Calculator</title>
    <style>
        body {
            align-items: center;
            justify-content: center;
             height: 100vh;
            font-family: Arial, sans-serif;
        }
        .calculator {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 10 10 20px rgba(0, 0, 0, 0.1);
            width: 350px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 6px;
            text-align: left;
            border-bottom: 0.5px solid black;
            border-right: 2px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .total, .grand-total {
            font-weight: bold;
            font-size: 1.4em;
        }
        .btn {
            width: 100%;
            padding: 10px;
            font-size: 1em;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #ff8c00;
            color: #fff;
            margin-top: 10px;
        }
        .btn:hover {
            background-color: #ff7b00;
        }
    </style>
</head>
<body>
    <div class="calculator">
        <table>
            <thead>
                <tr>
                    <th>Note</th>
                    <th>Count</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>GHS 200</td>
                    <td><input type="number" id="note200" value="0" min="0" oninput="calculateTotal()"></td>
                    <td id="total200">0.00</td>
                </tr>
                <tr>
                    <td>GHS 100</td>
                    <td><input type="number" id="note100" value="0" min="0" oninput="calculateTotal()"></td>
                    <td id="total100"> 0.00</td>
                </tr>
                <tr>
                    <td>GHS 50</td>
                    <td><input type="number" id="note50" value="0" min="0" oninput="calculateTotal()"></td>
                    <td id="total50"> 0.00</td>
                </tr>
                <tr>
                    <td>GHS 20</td>
                    <td><input type="number" id="note20" value="0" min="0" oninput="calculateTotal()"></td>
                    <td id="total20"> 0.00</td>
                </tr>
                <tr>
                    <td>GHS 10</td>
                    <td><input type="number" id="note10" value="0" min="0" oninput="calculateTotal()"></td>
                    <td id="total10"> 0.00</td>
                </tr>
                <tr>
                    <td>GHS 5</td>
                    <td><input type="number" id="note5" value="0" min="0" oninput="calculateTotal()"></td>
                    <td id="total5">0.00</td>
                </tr>
                <tr>
                    <td>GHS 2</td>
                    <td><input type="number" id="note2" value="0" min="0" oninput="calculateTotal()"></td>
                    <td id="total2">0.00</td>
                </tr>
                <tr>
                    <td>GHS 1</td>
                    <td><input type="number" id="note1" value="0" min="0" oninput="calculateTotal()"></td>
                    <td id="total1"> 0.00</td>
                </tr>
                <tr>
                    <td>Gp 50</td>
                    <td><input type="number" id="coin50" value="0" min="0" oninput="calculateTotal()"></td>
                    <td id="totalCoin50"> 0.00</td>
                </tr>
                <tr>
                    <td>Gp 20</td>
                    <td><input type="number" id="coin20" value="0" min="0" oninput="calculateTotal()"></td>
                    <td id="totalCoin20">0.00</td>
                </tr>
                <tr>
                    <td>Gp 10</td>
                    <td><input type="number" id="coin10" value="0" min="0" oninput="calculateTotal()"></td>
                    <td id="totalCoin10"> 0.00</td>
                </tr>
                <tr class="grand-total">
                    <td>Total</td>
                    <td colspan="2" id="grandTotal">GHS 0.00</td>
                </tr>
            </tbody>
        </table>
        <button class="btn" onclick="clearInputs()">Clear</button>
    </div>

    <script>
        function calculateTotal() {
            const note200 = document.getElementById('note200').value * 200;
            const note100 = document.getElementById('note100').value * 100;
            const note50 = document.getElementById('note50').value * 50;
            const note20 = document.getElementById('note20').value * 20;
            const note10 = document.getElementById('note10').value * 10;
            const note5 = document.getElementById('note5').value * 5;
            const note2 = document.getElementById('note2').value * 2;
            const note1 = document.getElementById('note1').value * 1;
            const coin50 = document.getElementById('coin50').value * 0.50;
            const coin20 = document.getElementById('coin20').value * 0.20;
            const coin10 = document.getElementById('coin10').value * 0.10;

            document.getElementById('total200').innerText =  + note200.toFixed(2);
            document.getElementById('total100').innerText = '' + note100.toFixed(2);
            document.getElementById('total50').innerText = ' ' + note50.toFixed(2);
            document.getElementById('total20').innerText = ' ' + note20.toFixed(2);
            document.getElementById('total10').innerText = ' ' + note10.toFixed(2);
            document.getElementById('total5').innerText = ' ' + note5.toFixed(2);
            document.getElementById('total2').innerText = ' ' + note2.toFixed(2);
            document.getElementById('total1').innerText = ' ' + note1.toFixed(2);
            document.getElementById('totalCoin50').innerText = ' ' + coin50.toFixed(2);
            document.getElementById('totalCoin20').innerText = ' ' + coin20.toFixed(2);
            document.getElementById('totalCoin10').innerText = ' ' + coin10.toFixed(2);

            const grandTotal = note200 + note100 + note50 + note20 + note10 + note5 + note2 + note1 + coin50 + coin20 + coin10;
            document.getElementById('grandTotal').innerText = 'GHS ' + grandTotal.toFixed(2);
        }

        function clearInputs() {
            document.querySelectorAll('input[type="number"]').forEach(input => input.value = 0);
            document.querySelectorAll('td[id^="total"]').forEach(td => td.innerText = ' 0.00');
            document.getElementById('grandTotal').innerText = 'GHS 0.00';
        }
    </script>
</body>
</html>
