<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un cadeau</title>
</head>
<body>

<h1>Modifier un cadeau</h1>

<form action="{{ route('gifts.update', $gift->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="name">Nom :</label><br>
    <input type="text" name="name" id="name" value="{{ old('name', $gift->name) }}"><br><br>

    <label for="price">Prix :</label><br>
    <input type="text" name="price" id="price" value="{{ old('price', $gift->price) }}"><br><br>

    <label for="url">Lien (optionnel) :</label><br>
    <input type="text" name="url" id="url" value="{{ old('url', $gift->url) }}"><br><br>

    <label for="details">Détails (optionnel) :</label><br>
    <textarea name="details" id="details">{{ old('details', $gift->details) }}</textarea><br><br>

    <button type="submit">Enregistrer les modifications</button>
</form>

<br>
<a href="{{ route('gifts.index') }}">Retour à l aliste</a>

</body>
</html>
