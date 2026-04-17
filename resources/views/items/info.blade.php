<!DOCTYPE html>
<html>
<head><title>Items</title></head>
<body><h1>Inventory</h1>
<ul>
    @foreach($items as $item)
        <h2>
            <li><a href="/inventory/{{$item->id}}">
                    {{$item->title}} <br> {{$item->description}}
                </a>
                <form action="/inventory/{{$item->id}}/delete" method="post">
                    @csrf
                    <button type="submit">Delete</button>
                </form>
            </li>
            <hr>
        </h2>
    @endforeach
</ul>
</body>
</html>
