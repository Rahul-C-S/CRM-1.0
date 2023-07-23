<table border="2" style="width: 100%; border-collapse: collapse; margin:auto;">
    <thead>
        <tr>
            <th style="width: 10px">#</th>
            <th>Website</th>
            <th>Issue/Request</th>
            <th>Updated By</th>     
            <th>Status</th>
            <th>Created at</th>
            <th>Updated At</th>
            <th>Remarks</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($issues as $issue)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $issue->client->website }}</td>
                <td>{{ $issue->issue }}</td>
                <td>{{ $issue->updated_by }}</td>    
                <td>{{ $issue->status_text }}</td>
                <td>{{ date('d-M-Y',strtotime($issue->created_at) ) }}</td>
                <td>{{ date('d-M-Y',strtotime($issue->updated_at) ) }}</td>
                <td>{{ $issue->remarks }}</td>





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