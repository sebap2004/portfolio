<div x-data="{show: true}"
     x-transition
     x-show="show"
     x-init="setTimeout(() => show = false, 2000)"
     class="alert tops alert-success fixed bottom-5 right-5 py-2 px-4 w-96 max-w-full">
<span class="material-symbols-outlined mr-3">
check_circle
</span><span>{{session('success')}}</span>
</div>

