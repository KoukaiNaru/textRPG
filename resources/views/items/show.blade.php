<head>
    <title>{{$item->catalog->name}}
    </title>

</head>
<h1>
    <strong>{{$item->catalog->name}}</strong>
</h1>
<ul>
    <h2>
        Type: {{$item->catalog->type}} | Power: {{$item->catalog->power}}
        <hr>
        <a href="/inventory/list" class="rpg-bth">Back</a>
    </h2>
</ul>

