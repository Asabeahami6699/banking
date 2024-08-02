<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Calculator</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .calculator {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        #display {
            width: 100%;
            padding: 10px;
            font-size: 1.5em;
            margin-bottom: 10px;
            text-align: right;
            border: none;
            background-color: #f9f9f9;
        }
        .buttons {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }
        .btn {
            padding: 20px;
            font-size: 1.2em;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #e0e0e0;
        }
        .btn:hover {
            background-color: #d0d0d0;
        }
        .btn:active {
            background-color: #c0c0c0;
        }
        .btn-operator {
            background-color: #ff8c00;
            color: #fff;
        }
        .btn-operator:hover {
            background-color: #ff7b00;
        }
        .btn-operator:active {
            background-color: #ff6a00;
        }
    </style>
</head>
<body>
    <div class="calculator">
        <input type="text" id="display" disabled>
        <div class="buttons">
            <button class="btn" onclick="appendToDisplay('7')">7</button>
            <button class="btn" onclick="appendToDisplay('8')">8</button>
            <button class="btn" onclick="appendToDisplay('9')">9</button>
            <button class="btn btn-operator" onclick="appendToDisplay('/')">/</button>
            <button class="btn" onclick="appendToDisplay('4')">4</button>
            <button class="btn" onclick="appendToDisplay('5')">5</button>
            <button class="btn" onclick="appendToDisplay('6')">6</button>
            <button class="btn btn-operator" onclick="appendToDisplay('*')">*</button>
            <button class="btn" onclick="appendToDisplay('1')">1</button>
            <button class="btn" onclick="appendToDisplay('2')">2</button>
            <button class="btn" onclick="appendToDisplay('3')">3</button>
            <button class="btn btn-operator" onclick="appendToDisplay('-')">-</button>
            <button class="btn" onclick="appendToDisplay('0')">0</button>
            <button class="btn" onclick="appendToDisplay('.')">.</button>
            <button class="btn" onclick="calculateResult()">=</button>
            <button class="btn btn-operator" onclick="appendToDisplay('+')">+</button>
            <button class="btn btn-operator" onclick="clearDisplay()">C</button>
        </div>
    </div>

    <script>
        function appendToDisplay(value) {
            document.getElementById('display').value += value;
        }

        function calculateResult() {
            try {
                let result = eval(document.getElementById('display').value);
                document.getElementById('display').value = result;
            } catch (error) {
                document.getElementById('display').value = 'Error';
            }
        }

        function clearDisplay() {
            document.getElementById('display').value = '';
        }
    </script>
</body>
</html>
