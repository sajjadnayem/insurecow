@extends('master')
@section('content')
    <section style="padding-top: 60px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            Import File
                        </div>
                        <div class="card-body">
                            <form action="{{route('import.file')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="from-group">
                                    <label for="file">Choose CSV</label>
                                    <input type="file" name="file" class="form-control">
                                </div><br>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection