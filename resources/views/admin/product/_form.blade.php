@csrf
<div class="form-group">
    <label for="name">Product Name</label>
    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $product->name ?? '')}}">
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="slug">Product Slug</label>
    <input type="text" id="slug" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug', $product->slug ?? '') }}">
    @error('slug')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="price">Product Price</label>
    <input type="number" step="0.1" id="price" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $product->price ?? '') }}">
    @error('price')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="description">Product Description</label>
    <textarea rows="3" cols="5" name="description" class="form-control @error('description') is-invalid @enderror"> {{ old('description', $product->description ?? '') }}</textarea>            
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="size">Product Size</label>
    <input type="text" id="size" name="size" class="form-control @error('size') is-invalid @enderror" value="{{ old('size', $product->size ?? '')}}">            
    @error('size')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="metal">Product Metal</label>
    <input type="text" id="metal" name="metal" class="form-control @error('metal') is-invalid @enderror" value="{{ old('metal', $product->metal ?? '')}}">            
    @error('metal')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="stone">Product Stone</label>
    <input type="text" id="stone" name="stone" class="form-control @error('stone') is-invalid @enderror" value="{{ old('stone', $product->stone ?? '')}}">            
    @error('stone')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="recommended">Product Recommended</label>
    <select name="recommended" id="recommended"  class="form-control @error('recommended') is-invalid @enderror">
        <option value="0"
            @if( old('recommended') == "0" ) {{'selected'}} 
            @endif
        >Not recommended</option>
        <option value="1" 
            @if( isset($product->recommended)&&$product->recommended == "1" && old('recommended') == null || old('recommended') == "1" ) {{'selected'}} 
            @endif
        >Recommended</option> 
    </select>            
    @error('recommended')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div> 

<div class="form-group">
    <label for="availability">Product Availability</label>
    <select name="availability" id="availability"  class="form-control @error('availability') is-invalid @enderror">
        <option value="0"
            @if( old('availability') == "0" ) {{'selected'}} 
            @endif
        >On order</option>
        <option value="1" 
            @if( isset($product->availability)&&$product->availability == "1" && old('availability') == null || old('availability') == "1" ) {{'selected'}} 
            @endif
        >In stock</option> 
    </select>            
    @error('availability')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="">Category</label>
    <select name="category" id="category" class="form-control @error('category') is-invalid @enderror">
        <option value=""
            @if( old('category') !== true) {{'selected'}} 
            @endif
            >No category 
        </option>
    @foreach ($categories as $category)           
        <option value="{{ $category->id}}" 
            @if(( isset($product->category->name) && $product->category->name == $category->name) || (old('category') == $category->id) ) {{'selected'}} 
            @endif >
        {{ $category->name }}
        </option>
    @endforeach 
       
    </select>
</div> 

<div class="form-group">
    <label for="img">Main Image</label><br>
    <img src="{{$product->img ?? '/images/no_image-250x250.png'}}" alt="" style="width: 100px" id="mainImage">
    <div class="row" style="width: 100px">
        <span id="output"></span>
    </div>
    <input type="file" id="img" name="img" class="form-control @error('img') is-invalid @enderror">
    @error('img')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="images">Additional images</label><br>
    <div id="imagesAdditional">
        @if(isset($imagesProduct))    
            @foreach($imagesProduct as $imageProd)        
            <img src="{{$imageProd->img}}" style="width: 100px">
            @endforeach
            @else <img src="/images/no_image-250x250.png" style="width: 100px">
        @endif
    </div>
    <div class="row">
        <span id="outputMulti"></span>
    </div>
    <input type="file" id="images" name="images[]" multiple class="form-control @error('images') is-invalid @enderror">
    @error('images')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="row">
    <span id="outputMulti"></span>
</div>

<button class="btn btn-primary">Save</button> 

