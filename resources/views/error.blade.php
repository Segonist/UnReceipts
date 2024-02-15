<x-layout css="error" :title="$title">
    <div class="glass error">
        <h3>The server returned a {{ $code }} error code with the message: {{ $message }}</h3>
        <img src="{{ asset('img/desintegration.gif') }}" alt="not found">
        <button class="btn"><a href="javascript:history.back()">Go back</a></button>
    </div>
</x-layout>
