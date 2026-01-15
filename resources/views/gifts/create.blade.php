<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un cadeau</title>
</head>
<body>

<h1>Ajouter un cadeau</h1>

<form action="{{ route('gifts.store') }}" method="POST">
    @csrf

    <label for="name">Nom *</label><br>
    <input type="text" name="name" id="name" value="{{ old('name') }}"><br>
    @error('name')
        <p>{{ $message }}</p>
    @enderror
    <br>

    <label for="price">Prix *</label><br>
    <input type="text" name="price" id="price" value="{{ old('price') }}"><br>
    @error('price')
        <p>{{ $message }}</p>
    @enderror
    <br>

    <label for="url">Lien</label><br>
    <input type="text" name="url" id="url" value="{{ old('url') }}"><br>
    @error('url')
        <p>{{ $message }}</p>
    @enderror
    <br>

    <label for="details">Détails</label><br>
    <textarea name="details" id="details">{{ old('details') }}</textarea><br>
    @error('details')
        <p>{{ $message }}</p>
    @enderror
    <br>

    <button type="submit">Enregistrer</button>
</form>

<br>
<a href="{{ route('gifts.index') }}">Retour à la liste</a>

</body>
</html>
