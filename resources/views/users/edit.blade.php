@extends('layout')
@section('content')
<form method="POST" enctype="multipart/form-data" action="{{ route('users.update', ['user' => $user->id]) }}" 
  class="form-horizontal">

  @csrf
  @method('PUT')
  <div class="row">
    <div class="col-4">
    <img src="{{ $user->image ? $user->image->url() : '' }}" class="img-thumbnail avatar" />
      <div class="card mt-4">
        <div class="card-body">
          <h6>Upload different photo</h6>
          <input class="form-control-file" type="file" name="avatar">
        </div>
      </div>
    </div>
    <div class="col-8">
      <div class="form-group">
        <label for="name">Name:</label>
        <input class="form-control" type="text" value="" name="name">
      </div>
      <div class="form-group">
        <label for="name">{{ __('Language:') }}</label>
        <select class="form-control" name="locale">
          @foreach (App\User::LOCALES as $locale => $label)
            <option value="{{ $locale }}" {{ $user->locale != $locale ?: 'selected' }}>
              {{ $label }}
            </option>
          @endforeach
        </select>
      </div>
      <x-errors></x-errors>
      <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Save Changes">
      </div>
    </div>
  </div>
</form>
@endsection