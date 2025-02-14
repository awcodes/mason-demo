<x-section :bg-color="$backgroundColor">
    <div class="mx-auto grid w-full max-w-5xl grid-cols-1 gap-6 px-6 py-8 @3xl:py-12 @3xl:gap-10 @3xl:grid-cols-12 @3xl:gap-8">
        <h2 class="font-display max-w-xl text-3xl font-semibold tracking-tight text-balance text-gray-900 @3xl:text-4xl @3xl:col-span-7">{{ $heading }}</h2>
        <form wire:submit="submit" class="w-full max-w-md @3xl:col-span-5 @3xl:pt-2">
            <div class="flex gap-x-4">
                <label for="email-address" class="sr-only">Email address</label>
                <input id="email-address" name="email" type="email" autocomplete="email" required class="min-w-0 flex-auto rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-primary-600 @3xl:text-sm/6" placeholder="Enter your email" wire:model="email">
                <button type="submit" class="flex-none rounded-md bg-primary-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-xs hover:bg-primary-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600">Subscribe</button>
            </div>
            <p class="mt-4 text-sm/6 text-gray-900">We care about your data. Read our <a href="#" class="font-semibold text-primary-600 hover:text-primary-500">privacy&nbsp;policy</a>.</p>
        </form>
    </div>
</x-section>
