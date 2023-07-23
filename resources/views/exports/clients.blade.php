<table border="2" style="width: 100%; border-collapse: collapse; margin:auto;">
    <thead>
        <tr style="background: rgb(85, 84, 84); color: white">
            <th style="width: 40px">#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Business Name</th>
            <th>Postcode</th>
            <th>Website URL</th>
            <th>Created at</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($clients as $client)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $client->name }}</td>
                <td>{{ $client->email }}</td>
                <td>{{ $client->phone }}</td>
                <td>{{ $client->business_name }}</td>
                <td>{{ $client->postcode }}</td>
                <td>{{ $client->website }}</td>
                <td>{{ date('d-m-Y',strtotime($client->created_at)) }}</td>





            </tr>
        @endforeach


    </tbody>
</table>

<style>
    th, td {
  padding: 2px;
  text-align: left;
  overflow: auto;
}
</style>