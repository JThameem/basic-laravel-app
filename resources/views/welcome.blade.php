<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Laravel Image Resize Example</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container mt-5">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            Error occured.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <strong>{{ $message }}</strong>
        </div>
        <div class="row">
            {{-- <div class="col-md-4">
                <h3>Primary Image:</h3>
                <img src="/images/{{ Session::get('fileName') }}" />
            </div> --}}
            <div class="col-md-12">
                <h3>Profile Image:</h3>
                <div class="img-bg">
                    <img src="/profile-images/{{ Session::get('fileName') }}" />
                </div>
            </div>
        </div>
        @endif
        <form action="{{ route('img-resize') }}" enctype="multipart/form-data" method="post">
            @csrf
            {{-- <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div> --}}
            <div class="form-group">
                <input type="file" name="imgFile" class="imgFile">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
    </div>
</body>
</html>