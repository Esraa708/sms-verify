<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="container mx-auto ">
        <div class="row justify-content-center">
            <div class="col-md-8 mx-auto">
                <div class="card mt-3">
                    <div class="card-header">{{ __('Verify Your Phone Number') }}</div>
                    <div class="card-body">
                        @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{session('error')}}
                        </div>
                        @endif
                        Please enter the OTP sent to your number: {{session('phone_number')}}
                        <form action="{{route('verify-your-phone.store')}}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label for="verification_code" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>
                                <div class="col-md-6">
                                    <input type="hidden" name="phone_number" value="{{session('phone_number')}}">
                                    <input id="verification_code" type="tel" class="form-control @error('verification_code') is-invalid @enderror" name="verification_code" value="{{ old('verification_code') }}" required>
                                    @error('verification_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Verify Phone Number') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>