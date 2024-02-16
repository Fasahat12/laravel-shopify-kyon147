<form action="{{ url('/authenticate') }}" method="POST">
    @csrf
    <input type="text" name="shop" class="form-control">
    <input type="submit" value="submit" class="btn btn-primary">
</form>