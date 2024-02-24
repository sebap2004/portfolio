<div class="m-8 flex flex-col justify-center content-centerz">
    <div class="flex justify-center">
        <h1 class="text-4xl">Log In</h1>
    </div>
    <div class="card shrink-0 w-96 max-w-full shadow-xl bg-base-100">
        <form class="card-body" wire:submit="login">
            <x-form.input wire:model="username" name="username" placeholder="username" error="form.username"/>
            <x-form.input wire:model="password" name="password" placeholder="password" error="form.password" type="password"/>
            <div class="form-control mt-6">
                <button class="btn btn-primary" type="submit">Login</button>
            </div>
        </form>
    </div>
</div>
