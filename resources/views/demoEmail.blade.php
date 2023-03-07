<div>
    @foreach($maildata as $data)
        <p>{{$data['title']}}</p>
        <p>{{$data['description']}}</p>
    @endforeach
</div>
