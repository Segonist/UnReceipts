<x-layout css="edit-purchase" :title="$title">
    <main class="glass edit-purchase">
        <form method="POST" action="/purchase/edit/{{ $purchase->id }}">
            @csrf
            @method('PUT')
            <label for="name">Purchase name:</label>
            <input type="text" name="name" id="name" value="{{ old('name') ?? $purchase->name }}">
            <label for="price">Purchase price:</label>
            <div>
                <input type="number" step="0.01" name="price" id="price"
                    value="{{ old('price') ?? $purchase->price }}">
                <span>$</span>
            </div>
            <label for="category">Category:</label>
            <input type="text" name="category" id="category" value="{{ old('category') ?? $purchase->category }}">
            <div class="buttons">
                <input class="btn" type="submit" value="Edit purchase">
                <a href="/purchase/{{ $purchase->id }}" class="btn">Back</a>
            </div>
        </form>
    </main>
</x-layout>
