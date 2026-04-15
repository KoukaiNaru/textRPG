@csrf
<head>
    <title>Potions</title>
</head>
<body><h1>Potions</h1></body>
<ul>
    <h2>
        <li>
            {{$item->title}} (Stats{{($item->description}})
        </li>
    </h2>
</ul>
