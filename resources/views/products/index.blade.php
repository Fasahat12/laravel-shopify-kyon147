<x-layout :titleBar=$titleBar>
    <main>
        <section>
            <div class="card">
                <a href="/products/create" class="button secondary icon-addition" style="float:right;"></a>
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td><small>{{ $product->id }}</small></td>
                                <td><small>{{ $product->title }}</small></td>
                                <td>
                                    <form method="POST" action="/products/{{$product->id}}" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="secondary icon-trash">
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</x-layout>