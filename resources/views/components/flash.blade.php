<div x-data="{show: true}"
     x-transition
     x-show="show"
     x-init="setTimeout(() => show = false, 2000)"
     class="toast toast-center toast-bottom rounded-xl text-base-100 flex flex-row items-center bg-success z-[150] mb-10 py-2 px-4 w-96 max-w-full">
<span class="material-symbols-outlined mr-3">
check_circle
</span><span>{{session('success')}}</span>
</div>

