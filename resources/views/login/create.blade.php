<x-layout css="auth" :title="$title">
    <main class="glass auth">
        <form method="POST" action="/login" autocomplete="off">
            @csrf
            <label for="username">Username:</label>
            <input class="auth-info-input" type="text" name="username" id="username" value="{{ old('username') }}">
            <label for="password">Password:</label>
            <input class="auth-info-input" type="password" name="password" id="password">
            <input class="btn" type="submit" value="Log in">
        </form>
        <div class="errors">
            @error('login')
                <p class="error">{{ $message }}</p>
            @enderror
            @error('username')
                <p class="error">{{ $message }}</p>
            @enderror
            @error('password')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <p>Do not have an account? <a class="btn redirect-button" href="/register">Create!</a></p>
    </main>
</x-layout>
