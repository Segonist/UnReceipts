<x-layout css="create-purchase" :title="$title">
    <main class="glass create-purchase">
        <form method="POST" action="/purchase/create">
            @csrf
            <label for="name">Purchase name:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">
            <label for="price">Purchase price:</label>
            <div>
                <input type="number" step="0.01" name="price" id="price" value="{{ old('price') }}">
                <span>$</span>
            </div>
            {{-- Категорії мають створюватись окремо --}}
            <label for="category">Category:</label>
            <input type="text" name="category" id="category" value="{{ old('category') }}">
            <div class="buttons">
                <input class="btn" type="submit" value="Add purchase">
                <a href="/dashboard" class="btn">Back</a>
            </div>
        </form>
    </main>
</x-layout>
