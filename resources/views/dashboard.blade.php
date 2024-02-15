<x-layout css="dashboard" :title="$title">
    <main class="dashboard">
        <h2>Dashboard of {{ auth()->user()->username }}</h2>
        <div class="cards">
            <a href="/purchases" class="btn glass dashboard-card">
                <img class="icon" src="{{ asset('img/shopping-cart.svg') }}">
                <p>See all purchases</p>
            </a>
            <a href="/purchase/create" class="btn glass dashboard-card new-purchase">
                <img class="icon" src="{{ asset('img/plus-circle.svg') }}">
                <p>Add new purchase</p>
            </a>
        </div>
        <p class="success">{{ session('success') }}</p>
    </main>
</x-layout>
