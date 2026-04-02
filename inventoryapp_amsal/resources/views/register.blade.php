@extends('layouts.app')

@section('title', 'Register - SanberBook')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Register</h5>

            <form action="{{ url('/welcome') }}" method="post">
                @csrf

                <div class="mb-3">
                    <label class="form-label">First name:</label>
                    <input type="text" name="fullName" class="form-control" style="max-width: 360px;">
                </div>

                <div class="mb-3">
                    <label class="form-label">Last name:</label>
                    <input type="text" name="lastName" class="form-control" style="max-width: 360px;">
                </div>

                <div class="mb-3">
                    <label class="form-label">Gender:</label>
                    <div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" value="male" id="genderMale">
                            <label class="form-check-label" for="genderMale">Male</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" value="female" id="genderFemale">
                            <label class="form-check-label" for="genderFemale">Female</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" value="other" id="genderOther">
                            <label class="form-check-label" for="genderOther">Other</label>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nationality:</label>
                    <select name="nationality" class="form-select" style="max-width: 360px;">
                        <option value="1">Indonesian</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Language Spoken:</label>
                    <div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="language[]" value="indonesia" id="langIndonesia">
                            <label class="form-check-label" for="langIndonesia">Bahasa Indonesia</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="language[]" value="english" id="langEnglish">
                            <label class="form-check-label" for="langEnglish">English</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="language[]" value="other" id="langOther">
                            <label class="form-check-label" for="langOther">Other</label>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">Bio</label>
                    <textarea name="bio" class="form-control" rows="5" style="max-width: 360px;"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Sign Up</button>
            </form>
        </div>
    </div>
@endsection
