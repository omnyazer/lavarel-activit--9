<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détail du cadeau</title>
</head>
<body>

<h1>Détail du cadeau</h1>

<p><strong>Nom :</strong> {{ $gift->name }}</p>

<p><strong>Prix :</strong> {{ $gift->price }} €</p>

@if ($gift->url)
    <p>
        <strong>Lien :</strong>
        <a href="{{ $gift->url }}" target="_blank">
            {{ $gift->url }}
        </a>
    </p>
@endif

@if ($gift->details)
    <p><strong>Détails :</strong></p>
    <p>{{ $gift->details }}</p>
@endif

<a href="{{ route('gifts.index') }}">Retour à la liste</a>

</body>
</html>
