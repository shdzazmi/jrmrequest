<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }} | @yield('title')</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="shortcut icon" type="image/png" href="/jrm/public/favicon.png"/>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
          integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
          crossorigin="anonymous"/>

    @yield('third_party_stylesheets')

    @stack('page_css')

</head>

<table>
    <thead>
    <tr>
        <th>UID</th>
        <th>No.</th>
        <th>Nama Customer</th>
        <th>Tanggal</th>
        <th>Status</th>
        <th>Operator</th>
    </tr>
    </thead>
    <tbody>
    @foreach($salesOrder as $item)
        <tr>
            <td>{{ $item->uid }}</td>
            <td>{{ $item->id }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->tanggal }}</td>
            <td>{{ $item->status }}</td>
            <td>{{ $item->operator }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</html>
