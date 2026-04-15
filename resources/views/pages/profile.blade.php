@extends('layout.main')

@section('body')
    <main class="d-flex">
        <div class="row">
            <div class="col-md-5 col-lg-4">
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link active" aria-current="page">Личные данные</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-7 col-lg-8">
                <form class="needs-validation" novalidate="">
                    <div class="row g-3">
                        <div class="col-sm-6"><label for="firstName" class="form-label">Имя</label> <input
                                type="text"
                                class="form-control"
                                id="firstName"
                                placeholder=""
                                value="Роман"
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
                                   value="Просветов"
                                   required="">
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>
                        <div class="col-6"><label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" value="prosvetovrs@mail.ru"
                                   placeholder="you@example.com">
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
                    <button class="w-100 btn btn-primary btn-lg" type="submit">Сохранить</button>
                </form>
            </div>
        </div>
    </main>
@endsection
