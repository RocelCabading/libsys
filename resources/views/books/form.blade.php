@csrf

<div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" class="form-control"
        value="{{ old('title', $book->title ?? '') }}" required>
</div>

<div class="form-group">
    <label for="author_id">Author</label>
    <select name="author_id" class="form-control" required>
        <option value="">-- Select Author --</option>
        @foreach($authors as $author)
            <option value="{{ $author->id }}"
                {{ old('author_id', $book->author_id ?? '') == $author->id ? 'selected' : '' }}>
                {{ $author->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="category_id">Category</label>
    <select name="category_id" class="form-control" required>
        <option value="">-- Select Category --</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}"
                {{ old('category_id', $book->category_id ?? '') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="published_year">Published Year</label>
    <input type="number" name="published_year" class="form-control"
        value="{{ old('published_year', $book->published_year ?? '') }}">
</div>

<button type="submit" class="btn btn-primary">{{ $buttonText }}</button>
