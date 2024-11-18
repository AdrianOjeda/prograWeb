<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <!-- Email -->
            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <!-- User Type Selection -->
            <div class="mt-4">
                <x-label for="user_type" value="{{ __('Register as') }}" />
                <div class="flex items-center gap-4 mt-2">
                    <label class="flex items-center">
                        <input type="radio" name="user_type" value="alumni" id="user_type_alumni" class="form-radio text-indigo-600" onclick="toggleFields()" required>
                        <span class="ml-2 text-sm text-gray-700">{{ __('Alumno') }}</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="user_type" value="professor" id="user_type_professor" class="form-radio text-indigo-600" onclick="toggleFields()" required>
                        <span class="ml-2 text-sm text-gray-700">{{ __('Profesor') }}</span>
                    </label>
                </div>
            </div>

            <!-- Additional Fields -->
            <div id="role_fields" class="mt-4 hidden">
                <div>
                    <x-label for="role_name" value="{{ __('Nombre') }}" />
                    <x-input id="role_name" class="block mt-1 w-full" type="text" name="role_name" :value="old('role_name')" />
                </div>

                <div class="mt-4">
                    <x-label for="role_lastname" value="{{ __('Apellido') }}" />
                    <x-input id="role_lastname" class="block mt-1 w-full" type="text" name="role_lastname" :value="old('role_lastname')" />
                </div>

                <div class="mt-4">
                    <x-label for="role_code" value="{{ __('Codigo') }}" />
                    <x-input id="role_code" class="block mt-1 w-full" type="text" name="role_code" :value="old('role_code')" />
                </div>
            </div>

            <!-- Terms & Privacy -->
            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />
                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <!-- Submit Button -->
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>

    <!-- JavaScript for toggling fields -->
    <script>
        function toggleFields() {
            const roleFields = document.getElementById('role_fields');
            const alumniRadio = document.getElementById('user_type_alumni');
            const professorRadio = document.getElementById('user_type_professor');

            if (alumniRadio.checked || professorRadio.checked) {
                roleFields.classList.remove('hidden');
                document.querySelectorAll('#role_fields input').forEach(input => input.setAttribute('required', 'required'));
            } else {
                roleFields.classList.add('hidden');
                document.querySelectorAll('#role_fields input').forEach(input => input.removeAttribute('required'));
            }
        }
    </script>
</x-guest-layout>
