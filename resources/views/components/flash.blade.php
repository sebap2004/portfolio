<div x-data="{show: true}"
     x-show="show"
     x-init="setTimeout(() => show = false, 2000)"
     class="alert alert-success fixed bottom-5 right-5 py-2 px-4 w-96 max-w-full">
    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
    <span>{{session('success')}}</span>
</div>

