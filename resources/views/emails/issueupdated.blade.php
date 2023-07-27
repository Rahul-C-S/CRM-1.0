<h2>Issue has been updated!</h2>


<h3>Website: {{$website}}</h3>
<h3>Issue: {{$input->issue}}</h3>
<h3>Status: {{$input->status_text}}</h3>

<h3>Remarks: {{$input->remarks}}</h3>

<h3>Updated by: {{$input->updated_by}}</h3>
<h3>Updated on: {{date('d-m-Y', strtotime($input->updated_at))}}</h3>