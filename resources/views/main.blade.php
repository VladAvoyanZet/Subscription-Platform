<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>CRUD</title>
</head>
<body>
<div class="container">
    <div class="row">
        <form method="post"  action="/subscribe/store">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Domain</label>
                <input type="text" name="domain" class="form-control" id="domain" placeholder="Domain">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Subscriber Id</label>
                <input type="number" name="subscriber_id" class="form-control" id="subscriberId" aria-describedby="emailHelp" placeholder="Enter subscriber Id">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.btn-primary').click(function (){
            let domain = $("#domain").val();
            let subscriber_id = $('#subscriberId').val();
            $.ajax({
                type: 'POST',
                url: '/subscribe/store',
                processData: false,
                dataType: 'json',
                contentType:false,
                data: {'domain':domain, 'subscriber_id': subscriber_id},
                beforeSend: function (request) {
                    return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                },
                success:function(response)
                {
                    if(response.success === true ){
                        alert('success');
                    }
                },
                error: function(errors) {


                }
            })
        })
    });
</script>
</body>
</html>
