<div class="flex flex-col px-10 justify-center content-center">
    <div class="flex justify-center">
        <h1 class="text-4xl">Register</h1>
    </div>
    <div class="card shrink-0 w-96 max-w-full shadow-xl bg-base-100">
        <form class="card-body">
            <x-form.input name="full name" placeholder="full name"/>
            <x-form.input name="username" placeholder="username"/>
            <x-form.input name="email" type="email" placeholder="email"/>
            <x-form.input name="password" placeholder="password"/>
            <div class="form-control mt-6">
                <button class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
</div>
