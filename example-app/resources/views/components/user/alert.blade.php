<div class="alert alert-dismissible fade show {{ $type ?? null }}" role="alert" id="{{ $name }}">
    <span>{{ $slot }}</span>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onClick="alertClose('{{ $name }}')">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ms-auto"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
    </button>
</div>
