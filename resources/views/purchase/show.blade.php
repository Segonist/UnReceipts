<x-layout css="purchase" :title="$title">
    <main class="purchase glass">
        <div class="buttons">
            <a href="/purchase/edit/{{ $purchase->id }}" class="btn">Edit</a>
            <form action="/purchase/edit/{{ $purchase->id }}" method="post">
                @csrf
                @method('DELETE')
                <input type="submit" class="btn" value="Delete">
            </form>
            <a href="/purchases" class="btn">Back</a>
        </div>
        <p class="name">{{ $purchase->name }}</p>
        <p><span class="label">Category:</span> {{ $purchase->category }}</p>
        <p><span class="label">Added:</span> {{ $purchase->created_at->format('d.m.Y') }}</p>
        <p><span class="label">Price:</span> {{ $purchase->price }}$</p>
    </main>
</x-layout>
