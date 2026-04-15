<head><title>Create weapon</title></head>
<form method="post" action="/inventory">
    @csrf
    <input type="text" name="title" placeholder="Name">
    <input type="text" name="description" placeholder="Description">
    <input type="text" name="power" placeholder="Damage">
    <button type="submit">Create</button>
</form>
