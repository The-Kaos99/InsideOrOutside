<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js"></script>
    <script>
        JsBarcode(".barcode").init();
    </script>
    <style>
        div{
            height: 74mm;
            width: 52mm;    
            /*background-color: #d6a09e;*/
            border-style: solid;
            margin: 5mm;
        }
        h1{
        text-align: center;
        text-transform: uppercase;
        }
        h2{
            text-align: center;
        text-transform: uppercase;
        }
    </style>
</head>
<body>
    <div>
        <h2 class="text-center">{{$alumno->nombre}} {{$alumno->apellidos}}</h2>
            {{$alumno->slug}}
    </div>
    <svg class="barcode"
    jsbarcode-format="upc"
    jsbarcode-value="123456789012"
    jsbarcode-textmargin="0"
    jsbarcode-fontoptions="bold">
  </svg>
    
    
    
</body>
</html>