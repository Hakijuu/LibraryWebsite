@extends('layouts.main')
@section('content')
<form role="form" id="comment-form" method="POST" action="{{ route('update', $opinion) }}" class="col-md-12">
    {{ csrf_field() }}
    <input name="_method" type="hidden" value="PUT">
    <div class="box">
        <div class="box-body">
            <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}"
                 id="roles_box">
                <label><b>Opinia</b></label><br>
                <textarea name="message" id="message" class="col-md-12  border border-warning rounded" cols="30" rows="10" required>{{$opinion->message}}</textarea>
        </div>
         </div>
         </div>
         <div class="box-footer">
         <button type="submit" class="btn btn-success">Zapisz</button>
         </div>
</form>
@endsection
