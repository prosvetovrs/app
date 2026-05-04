@extends('layout.main')

@section('body')
    <main class="container mt-4">
        <table class="table table-bordered table-sm text-center align-middle">
            <thead class="table-light">
            <tr>
                <th rowspan="2">Группа</th>
                <th rowspan="2">Категория</th>
                @foreach($data as $month => $monthData)
                    <th colspan="{{ count($monthData['incomes']) * 2 }}">
                        {{ \Carbon\Carbon::parse($month . '-01')->translatedFormat('F Y') }}
                    </th>
                @endforeach
            </tr>
            <tr>
                <th></th>
                @foreach($data as $monthData)
                    @foreach($monthData['incomes'] as $date => $income)
                        <th colspan="2">
                            {{ \Carbon\Carbon::parse($date)->format('d.m') }}
                        </th>
                    @endforeach
                @endforeach
            </tr>
            <tr>
                <th></th>
                @foreach($data as $monthData)
                    @foreach($monthData['incomes'] as $income)
                        <th>План</th>
                        <th>Факт</th>
                    @endforeach
                @endforeach
            </tr>
            </thead>

            <tbody>
            @php
                $groups = [];
                $totals = [];
                $groupTotals = [];

                // собираем группы и категории
                foreach($data as $monthData) {
                    foreach($monthData['incomes'] as $income) {
                        foreach($income['groups'] as $groupName => $group) {
                            if (!isset($groups[$groupName])) {
                                $groups[$groupName] = [];
                            }
                            foreach($group['categories'] as $catName => $values) {
                                $groups[$groupName][$catName] = true;
                            }
                        }
                    }
                }
            @endphp

            {{-- строки категорий с группировкой --}}
            @foreach($groups as $groupName => $categories)
                @php $firstCategory = true; @endphp

                @foreach(array_keys($categories) as $category)
                    <tr>
                        @if($firstCategory)
                            <td rowspan="{{ count($categories) }}" class="align-middle bg-light fw-bold">
                                {{ $groupName }}
                            </td>
                            @php $firstCategory = false; @endphp
                        @endif

                        <td class="text-start ps-3">{{ $category }}</td>

                        @foreach($data as $monthData)
                            @foreach($monthData['incomes'] as $date => $income)
                                @php
                                    $values = $income['categories'][$category] ?? ['plan' => 0, 'fact' => 0];
                                    $plan = $values['plan'];
                                    $fact = $values['fact'];

                                    $totals[$date]['plan'] = ($totals[$date]['plan'] ?? 0) + $plan;
                                    $totals[$date]['fact'] = ($totals[$date]['fact'] ?? 0) + $fact;

                                    $groupTotals[$groupName][$date]['plan'] = ($groupTotals[$groupName][$date]['plan'] ?? 0) + $plan;
                                    $groupTotals[$groupName][$date]['fact'] = ($groupTotals[$groupName][$date]['fact'] ?? 0) + $fact;
                                @endphp

                                <td>
                                    {{ $plan ? number_format($plan, 0, '.', ' ') : '—' }}
                                </td>

                                <td class="@if($fact > $plan) table-danger @elseif($fact > 0) table-success @endif">
                                    {{ $fact ? number_format($fact, 0, '.', ' ') : '—' }}
                                </td>
                            @endforeach
                        @endforeach
                    </tr>
                @endforeach
            @endforeach

            {{-- ВСЕГО ПО ВСЕМ ГРУППАМ --}}
            <tr class="table-primary fw-bold">
                <td colspan="2" class="text-end pe-3">ВСЕГО ПО ВСЕМ ГРУППАМ:</td>
                @foreach($data as $monthData)
                    @foreach($monthData['incomes'] as $date => $income)
                        @php
                            $plan = $totals[$date]['plan'] ?? 0;
                            $fact = $totals[$date]['fact'] ?? 0;
                        @endphp
                        <td>{{ number_format($plan, 0, '.', ' ') }}</td>
                        <td>{{ number_format($fact, 0, '.', ' ') }}</td>
                    @endforeach
                @endforeach
            </tr>

            {{-- ОСТАТОК --}}
            <tr class="table-warning fw-bold">
                <td colspan="2" class="text-end pe-3">ОСТАТОК (Доход - Расходы):</td>
                @foreach($data as $monthData)
                    @foreach($monthData['incomes'] as $date => $income)
                        @php
                            $fact = $totals[$date]['fact'] ?? 0;
                            $balance = $income['income'] - $fact;
                        @endphp
                        <td colspan="2" class="{{ $balance < 0 ? 'text-danger' : 'text-success' }} text-center">
                            {{ number_format($balance, 0, '.', ' ') }}
                        </td>
                    @endforeach
                @endforeach
            </tr>
            </tbody>
        </table>
    </main>
@endsection
