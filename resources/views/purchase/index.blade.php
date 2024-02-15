<x-layout css="purchases" :title="$title">
    <main class="purchases">
        @if ($purchases->count() !== 0)
            <ul class="table">
                <li class="table-header glass">
                    <div class="col name">Name</div>
                    <div class="col category">Category</div>
                    <div class="col price">Price</div>
                </li>
                @foreach ($purchases as $purchase)
                    <li class="table-row glass" id="{{ $purchase->id }}" onclick="redirect_purchase(this.id)">
                        <div title="{{ $purchase->name }}" class="col name">{{ $purchase->name }}</div>
                        <div title="{{ $purchase->category }}" class="col category">
                            {{ $purchase->category }}
                        </div>
                        <div title="{{ $purchase->price }}$" class="col price">{{ $purchase->price }}$</div>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="no-purchases">
                You have no purchases yet.
                <a href="purchase/create" class="btn glass">Create one!</a>
            </p>
        @endif
        <script>
            function redirect_purchase(id) {
                window.location.href = `purchase/${id}`;
            }
        </script>

    </main>
</x-layout>
