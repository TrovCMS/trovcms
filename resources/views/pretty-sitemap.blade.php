<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible"
        content="IE=edge">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">
    <title>Sitemap | {{ config('app.name') }}</title>

    <style>
        :root {
            --light-gray: #e2e8f0;
            --gray: #94a3b8;
            --dark-gray: #64748b;
            --black: #0f172a;
        }

        body {
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            max-width: 1200px;
            margin-inline: auto;
            padding-inline: 2rem;
            padding-block-end: 4rem;
            background-color: #f8fafc;
            color: var(--black);
        }

        table {
            width: 100%;
            border: solid 1px var(--dark-gray);
            border-collapse: collapse;
        }

        th {
            text-align: left;
            background-color: var(--gray);
            border: solid 1px var(--dark-gray);
            padding: .5rem .75rem;
            font-size: .75rem;
        }

        td {
            padding-block: .25rem;
            border: solid 1px var(--dark-gray);
            padding: .5rem .75rem;
        }

        tr:nth-of-type(even) {
            background-color: var(--light-gray);
        }
    </style>
</head>

<body>
    <h1>{{ config('app.name') }} Sitemap </h1>
    <table>
        <thead>
            <th>URL</th>
            <th>Last Modified</th>
        </thead>
        @if ($links)
            @foreach ($links as $link)
                <tr>
                    <td>
                        <a href="{{ trailing_slash_it($link->metaable->getPublicUrl()) }}">
                            {{ trailing_slash_it($link->metaable->getPublicUrl()) }}
                        </a>
                    </td>
                    <td>
                        {{ $link->metaable->updated_at->tz('UTC')->diffForHumans() }}
                    </td>
                </tr>
            @endforeach
        @endif
    </table>
</body>

</html>
