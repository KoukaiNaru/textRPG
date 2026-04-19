<head><title>Create weapon</title></head>
<form method="post" action="/inventory">
    @csrf
    <input type="text" name="resource" placeholder="Resource">
    <input type="text" name="quantity" placeholder="Quantity">
    <button type="submit">Create</button>
</form>
<h2>
    <a href="/" class="rpg-bth">Back</a>
</h2>
