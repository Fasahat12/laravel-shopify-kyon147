<x-layout :titleBar=$titleBar>
  <div class="container mt-2">
    <form action="/products" method="POST">
        @csrf
        <h1>Add Product Form</h1>
        <div class="mt-1">
            <input name="title" type="text" placeholder="Enter Title..." />
        </div>
        @error('title')
            <p>{{$message}}</p>
        @enderror

        <div class="mt-1">
            <textarea name="body_html" placeholder="Enter Description..."></textarea>
        </div>
        @error('body_html')
            <p>{{$message}}</p>
        @enderror

        <div class="mt-1">
            <input name="price" type="text" placeholder="Enter Price..." />
        </div>
        @error('price')
            <p>{{$message}}</p>
        @enderror


        <div class="mt-1">
            <input name="quantity" type="number" placeholder="Enter Quantity..." />
        </div>
        @error('quantity')
            <p>{{$message}}</p>
        @enderror


        <div class="mt-1">
            <input name="submit" type="submit" value="Add Product" />
        </div>
        
      </form>
  </div>  
</x-layout>
