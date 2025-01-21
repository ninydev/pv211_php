
<img src="{{ Storage::disk('avatars')->url("{$user->id}/avatar.webp") }}" alt="User Avatar">

<a href="{{ route('profile.avatar.generate') }}">Generate Avatar</a>

<form action="{{ route('profile.avatar.upload') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="avatar">Upload Avatar</label>
        <input type="file" name="avatar" id="avatar" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Upload</button>
</form>
