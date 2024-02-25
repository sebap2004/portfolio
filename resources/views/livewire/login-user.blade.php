<div class="m-8 flex flex-col justify-center content-centerz">
    <div class="flex justify-center">
        <h1 class="text-4xl">Log In</h1>
    </div>
    <div class="card shrink-0 w-108 max-w-full shadow-xl bg-base-100">
        <form class="card-body" wire:submit="login">
            <x-form.input wire:model="username" name="username" placeholder="username" error="form.username"/>
            <x-form.input wire:model="password" name="password" placeholder="password" error="form.password" type="password"/>
            <div class="form-control mt-6">
                <button class="btn btn-primary" type="submit">Login</button>
            </div>
            @if ($formErrors)
                <div class="alert alert-error p-0 mt-4">
                    <ul>
                        @foreach ($formErrors as $error)
                            <div class="alert alert-error">
                                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                <li>{{ $error }}</li>
                            </div>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
    </div>
</div>
