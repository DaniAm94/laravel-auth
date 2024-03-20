@if ($project->exists)
    <form class="row row-gap-4 " action="{{ route('admin.projects.update', $project->id) }}" method="POST">
        @method('PUT')
    @else
        <form class="row row-gap-4 " action="{{ route('admin.projects.store') }}" method="POST">
@endif

@csrf

<div class="col-md-6">
    <label for="title" class="form-label">Titolo</label>
    <input type="text" name="title"
        class="form-control @error('title') is-invalid @elseif(old('title', '')) is-valid @enderror"
        id="title" value="{{ old('title', $project->title) }}" placeholder="Inserisci un titolo...">
    @error('title')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @else
        <div class="form-text">Inserisci un titolo compreso tra 10 e 40 caratteri</div>
    @enderror
</div>
<div class="col-md-6">
    <label for="slug" class="form-label">Slug</label>
    <input type="text" class="form-control" id="slug" value="{{ Str::slug(old('title', $project->slug)) }}"
        disabled>
</div>
<div class="col-12">
    <label for="description" class="form-label">Descrizione</label>
    <textarea name="description"
        class="form-control @error('description') is-invalid @elseif(old('description', '')) is-valid @enderror"
        id="description" rows="10">{{ old('description', $project->description) }}</textarea>
    @error('description')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @else
        <div class="form-text">Inserisci una descrizione</div>
    @enderror
</div>
<div class="col-11 d-flex flex-column justify-content-center">
    <label for="image" class="form-label">Immagine</label>
    <input type="url" name="image"
        class="form-control @error('image') is-invalid @elseif(old('image', '')) is-valid @enderror"
        id="image" value="{{ old('image', $project->image) }}" placeholder="http: / https: ...">
    @error('image')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @else
        <div class="form-text">Inserisci un url valido</div>
    @enderror
</div>
<div class="col-1  d-flex justify-content-center align-items-center">
    <figure class="mb-0" id="preview-container">
        <img src="{{ $project->image ?? 'https://media.istockphoto.com/id/1147544807/vector/thumbnail-image-vector-graphic.jpg?s=612x612&w=0&k=20&c=rnCKVbdxqkjlcs3xH87-9gocETqpspHFXu5dIGB4wuM=' }}"
            alt="{{ old('title', '') }}" class="img-fluid" id="preview">
    </figure>
</div>
<div class="col-12 form-check d-flex justify-content-end gap-3">
    <input class="form-check-input" name="is_completed" type="checkbox" value="1" id="is_completed"
        @if (old('is_completed', $project->is_completed)) checked @endif>
    <label class="form-check-label" for="is_completed">
        Progetto ultimato
    </label>
    @error('is_completed')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="col-12 d-flex justify-content-end gap-3">
    <button class="btn btn-sm btn-warning" type="reset">
        <i class="fa-solid fa-eraser"></i>
        Reset</button>
    <button type="submit" class="btn btn-sm btn-success ">
        <i class="fa-solid fa-floppy-disk"></i>
        Salva</button>
</div>
</form>
