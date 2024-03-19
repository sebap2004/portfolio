<div x-data="{ show: false, messageShow: '', typeShow: '' }"
     x-on:show-toast.window="show = true; messageShow = $event.detail.message; typeShow = $event.detail.type; setTimeout(() => { show = false; }, 2000); console.log('received, ' + event.detail.message + ' ' + event.detail.type)"
     x-bind:class="{ 'bg-green-500': typeShow === 'success', 'bg-red-500': typeShow === 'error', 'bg-yellow-500': typeShow === 'warning', 'bg-blue-500': typeShow === 'info' }"
    class="toast toast-bottom toast-center mb-10 rounded-2xl flex flex-row items-center z-[100] text-base-100"
x-show="show">
    <span class="material-symbols-outlined"
          x-text="typeShow === 'success' ? 'check_circle' : typeShow === 'error' ? 'error' : typeShow === 'warning' ? 'warning' : typeShow === 'info' ? 'info' : ''"></span>
    <span x-text="messageShow"></span>
</div>


