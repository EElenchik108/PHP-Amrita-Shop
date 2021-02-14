@csrf

<div class="form-group">
    <label for="name">Article Name</label>
    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $article->name ?? '')}}">
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="slug">Article Slug</label>
    <input type="text" id="slug" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug', $article->slug ?? '') }}">
    @error('slug')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="topic">Article Topic</label>
    <input type="text" name="topic" class="form-control @error('topic') is-invalid @enderror" value="{{ old('topic', $article->topic ?? '') }}">
    @error('topic')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="description">Article Description</label>
    <textarea rows="2" cols="5" name="description" class="form-control @error('description') is-invalid @enderror"> {{ old('description', $article->description ?? '') }}</textarea>            
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="img">Image</label><br>
    <img src="{{$article->img ?? '/images/no_image-250x250.png'}}" alt="" style="width: 100px" id="mainImage">
    <div class="row" style="width: 100px">
        <span id="output"></span>
    </div>
    <input type="file" id="img" name="img" class="form-control @error('img') is-invalid @enderror">
    @error('img')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="text">Article Text</label>
    <textarea rows="3" cols="5" name="text" class="form-control @error('text') is-invalid @enderror"> {{ old('text', $article->text ?? '') }}</textarea>            
    @error('text')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="author">Article author</label>
    <input type="text" name="author" class="form-control @error('author') is-invalid @enderror" value="{{ old('author', $article->author ?? '') }}">
    @error('author')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<button class="btn btn-primary">Save</button> 

