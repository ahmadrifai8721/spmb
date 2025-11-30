<x-layouts.auth>
    <div class="flex flex-col gap-6 text-emerald-900 dark:text-emerald-200">
        <x-auth-header :title="__('Log in to your account')" :description="__('Enter your email and password below to log in')" class="text-emerald-800 dark:text-emerald-200" />

        <!-- Session Status -->
        <x-auth-session-status class="text-center text-emerald-600 dark:text-emerald-300" :status="session('status')" />

        <form method="POST" action="{{ route('login.store') }}" class="flex flex-col gap-6">
            @csrf

            <!-- Email Address -->
            <flux:input name="email" :label="__('Email address')" :value="old('email')" type="email" required
                autofocus autocomplete="email" placeholder="email@example.com"
                class="border-emerald-300 focus:border-emerald-500 focus:ring-emerald-500" />

            <!-- Password -->
            <div class="relative">
                <flux:input name="password" :label="__('Password')" type="password" required
                    autocomplete="current-password" :placeholder="__('Password')" viewable
                    class="border-emerald-300 focus:border-emerald-500 focus:ring-emerald-500" />

                @if (Route::has('password.request'))
                    <flux:link class="absolute top-0 text-sm end-0 text-emerald-600 hover:text-emerald-700"
                        :href="route('password.request')" wire:navigate>
                        {{ __('Forgot your password?') }}
                    </flux:link>
                @endif
            </div>

            <!-- Remember Me -->
            <flux:checkbox name="remember" :label="__('Remember me')" :checked="old('remember')"
                class="text-emerald-600" />

            <div class="flex items-center justify-end">
                <flux:button variant="primary" type="submit"
                    class="w-full bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 text-white"
                    data-test="login-button">
                    {{ __('Log in') }}
                </flux:button>
            </div>
        </form>

        @if (Route::has('register'))
            <div class="space-x-1 text-sm text-center rtl:space-x-reverse text-emerald-700 dark:text-emerald-300">
                <span>{{ __('Don\'t have an account?') }}</span>
                <flux:link :href="route('register')" wire:navigate class="text-emerald-600 hover:text-emerald-700">
                    {{ __('Sign up') }}</flux:link>
            </div>
        @endif
    </div>
</x-layouts.auth>
