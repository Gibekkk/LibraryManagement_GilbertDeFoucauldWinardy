<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books Display</title>
</head>
<body>
    <header>
        <nav>
            <a href="/">Home</a>
            <a href="/cds">CDs</a>
            <a href="/newspapers">Newspapers</a>
            <a href="/books">Books</a>
            <a href="/journals">Journals</a>
            <a href="/final_year_projects">Final Year Projects</a>
        </nav>
    </header>

    <h1>Daftar {{ $type }}
        <a href="/{{ $location }}/{{ $sort == 'asc' ? 'desc' : 'asc' }}">
            (Change Order)
        </a>
    </h1>

    <table border="1">
        <thead>
            <tr>
                @foreach ($fields as $field)
                    <th>{{ $field }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $data)
                <tr>
                    @foreach ($fields as $field)
                        <td>{{ $data->{strtolower(implode("_", explode(" ", $field)))} }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
