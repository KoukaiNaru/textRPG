<!DOCTYPE html>
<html>
<head><title>Items</title></head>
<body><h1>Inventory</h1>
<ul>
    <h2>
        @foreach($items as $item)
            <li><a href="/inventory/{{$item->id}}">
                    {{$item->title}} <br> {{$item->description}}
                </a>
            </li>
        @endforeach
    </h2>
</ul>
</body>
</html>
