@if (session('message'))
    <div id="message"></div>
@endif

@if (session('error'))
    <div id="error"></div>
@endif