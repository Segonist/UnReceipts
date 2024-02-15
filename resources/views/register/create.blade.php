<x-layout css="auth" :title="$title">
    <main class="glass auth">
        <form method="POST" action="/register" autocomplete="off">
            @csrf
            <label for="username">Username:</label>
            <input class="auth-info-input" type="text" name="username" id="username" value="{{ old('username') }}">
            <label for="email">E-mail:</label>
            <input class="auth-info-input" type="text" name="email" id="email" value="{{ old('email') }}">
            <label for="password">Password:</label>
            <input class="auth-info-input" type="password" name="password" id="password">
            <label for="password_confirmation">Repeat password:</label>
            <input class="auth-info-input" type="password" name="password_confirmation" id="password_confirmation">
            <input class="btn" type="submit" value="Register">
        </form>
        <div class="errors">
            @error('username')
                <p class="error">{{ $message }}</p>
            @enderror
            @error('email')
                <p class="error">{{ $message }}</p>
            @enderror
            @error('password')
                <p class="error">{{ $message }}</p>
            @enderror
            @error('password_confirmation ')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <p>Already have an account? <a class="btn redirect-button" href="/login">Log in!</a></p>
    </main>
</x-layout>
