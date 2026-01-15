<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des cadeaux</title>
</head>
<body>

<h1>Liste des cadeaux</h1>

<ul>
    @foreach ($gifts as $gift)
        <li>
            {{ $gift->name }} — {{ $gift->price }} €
            <a href="{{ route('gifts.show', $gift->id) }}">Voir</a>
            <a href="{{ route('gifts.edit', $gift->id) }}">Modifier</a>

            <form action="{{ route('gifts.destroy', $gift->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Supprimer</button>
            </form>
        </li>
    @endforeach
</ul>

<a href="{{ route('gifts.create') }}">Ajouter un cadeau</a>

</body>
</html>
