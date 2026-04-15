@extends('layout.main')

@section('body')
    <main>
        <div class="col-md-7 col-lg-8 mx-auto">
            <h4 class="mb-3">Регистрация</h4>
            <form class="needs-validation" novalidate="">
                <div class="row g-3">
                    <div class="col-sm-6"><label for="firstName" class="form-label">Имя</label> <input
                            type="text"
                            class="form-control"
                            id="firstName"
                            placeholder=""
                            value=""
                            required="">
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>
                    <div class="col-sm-6"><label for="lastName" class="form-label">Фамилия</label>
                        <input type="text"
                               class="form-control"
                               id="lastName"
                               placeholder=""
                               value=""
                               required="">
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>
                    <div class="col-6"><label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="you@example.com">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>
                    <div class="col-6"><label for="password" class="form-label">Пароль</label>
                        <input type="password" class="form-control" id="password">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>
                </div>
                <hr>
                <button class="w-100 btn btn-primary btn-lg" type="submit">Зарегистрироваться</button>
            </form>
        </div>
    </main>
@endsection
